<?php

namespace Tests\Unit;

use App\GraphQL\Types\Input\PaginationType;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class StudentsTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /**
     * @var Collection|Student
     */
    private $students;
    /**
     * @var Collection|StudentParent
     */
    private $parents;
    /**
     * @var School
     */
    private $baseSchool;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var School $baseSchool */
        $baseSchool = factory(School::class)->create();
        $userStudents = factory(User::class, 10)->create(['school_id' => $baseSchool->getId()]);
        $userParents = factory(User::class, 5)->create(['school_id' => $baseSchool->getId()]);

        $students = new Collection();
        $parents = new Collection();

        $userParents->each(static function ($parent) use ($parents, $baseSchool) {
            $parents->push(factory(StudentParent::class)->create(['school_id' => $baseSchool->getId(),
                'user_id' => $parent->getId()]));
        });

        $userStudents->each(static function ($user, $index) use ($baseSchool, $students, $parents) {
            $students->push(factory(Student::class)->create(['school_id' => $baseSchool->getId(),
                'user_id' => $user->getId(), 'parent_id' => $parents->get($index % 5)->getId()]));
        });

        $this->students = $students;
        $this->parents = $parents;
        $this->baseSchool = $baseSchool;
    }

    public function testGetStudents(): void
    {
        $graphql = <<<'GRAPHQL'
            query($take: Int!, $page: Int!) {
              students(pagination: { take: $take, page: $page }) {
                data {
                  id
                  user {
                    name
                    email
                  }
                }
              }
            }
            GRAPHQL;

        $input = [
            PaginationType::FIELD_TAKE => 10,
            PaginationType::FIELD_PAGE => 1
        ];

        $result = $this->graphql($graphql, [
            'variables' => $input,
            'expectErrors' => false,
        ]);

        $expectedResult['data']['students']['data'] = $this->students->map(static function ($item) {
            return [
                'id' => $item->id,
                'user' => [
                    'name' => $item->user->name,
                    'email' => $item->user->email
                ]];
        })->toArray();

        $this->assertSame($expectedResult, $result);
    }

    public function testCreateStudent(): void
    {
        /** @var User $user */
        $user = factory(User::class)->make();
        $graphql = <<<'GRAPHQL'
            mutation($input: StudentInputType) {
              createStudent(input: $input) {
                user {
                    name,
                    email
                }
              }
            }
            GRAPHQL;

        $input = ['input' => [
            'name' => $user->getName(),
            'phone' => $user->getPhone(),
            'address' => $user->getAddress(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'blood_group' => $user->getBloodGroup(),
            'school_id' => $this->baseSchool->getId()
        ]];

        $result = $this->graphql($graphql, [
            'expectErrors' => false,
            'variables' => $input
        ]);

        $expectedResult = [
            'data' => [
                'createStudent' => [
                    'user' => [
                        'name' => $user->getName(),
                        'email' => $user->getEmail()
                    ]
                ]
            ]
        ];

        $this->assertSame($expectedResult, $result);
    }

    public function testUUpdateStudent(): void
    {
        $student = $this->students->first();
        $newUser = factory(User::class)->make();

        $graphql = <<<'GRAPHQL'
            mutation($input: UpdateStudentInputType) {
              updateStudent(input: $input) {
                user {
                    name,
                    email
                }
              }
            }
            GRAPHQL;

        $input = ['input' => [
            'id' => $student->getId(),
            'name' => $newUser->getName(),
            'phone' => $newUser->getPhone(),
            'address' => $newUser->getAddress(),
            'email' => $newUser->getEmail(),
            'password' => $newUser->getPassword(),
            'blood_group' => $newUser->getBloodGroup(),
            'school_id' => $this->baseSchool->getId()
        ]];

        $result = $this->graphql($graphql, [
            'expectErrors' => false,
            'variables' => $input
        ]);

        $expectedResult = [
            'data' => [
                'updateStudent' => [
                    'user' => [
                        'name' => $newUser->getName(),
                        'email' => $newUser->getEmail()
                    ]
                ]
            ]
        ];

        $this->assertSame($expectedResult, $result);
    }

    public function testDeleteStudents(): void
    {
        $graphql = <<<'GRAPHQL'
            mutation($ids: [Int]) {
              deleteStudents(ids: $ids)
            }
            GRAPHQL;

        $input = [
            'ids' => [$this->students->first()->getId(), $this->students->last()->getId()]
        ];

        $result = $this->graphql($graphql, [
            'expectErrors' => false,
            'variables' => $input
        ]);

        $this->assertTrue($result['data']['deleteStudents']);
    }
}
