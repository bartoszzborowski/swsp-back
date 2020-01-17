<?php

namespace Tests\Unit;

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
//        $userStudents = factory(User::class, 20)->create(['school_id' => $baseSchool->getId()]);
//        $userParents = factory(User::class, 10)->create(['school_id' => $baseSchool->getId()]);
//
//        $students = new Collection();
//        $parents = new Collection();
//
//        $userParents->each(static function ($parent) use ($parents, $baseSchool) {
//            $parents->push(factory(StudentParent::class)->create(['school_id' => $baseSchool->getId(),
//                'user_id' => $parent->getId()]));
//        });
//
//        $userStudents->each(static function ($user, $index) use ($baseSchool, $students, $parents) {
//            $students->push(factory(Student::class)->create(['school_id' => $baseSchool->getId(),
//                'user_id' => $user->getId(), 'parent_id' => $parents->get($index % 10)->getId()]));
//        });
//
//
//        $this->students = $students;
//        $this->parents = $parents;
        $this->baseSchool = $baseSchool;
    }

    public function testGetStudents(): void
    {
        $graphql = <<<'GRAPHQL'
            query{
              students {
                id,
                user {
                    name,
                    email
                }
              }
            }
            GRAPHQL;

        $result = $this->graphql($graphql, [
            'expectErrors' => false,
        ]);

        $expectedResult['data']['students'] = $this->students->map(static function ($item) {
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

    public function testUpdateEventName(): void
    {
//        $baseSchool = factory(School::class)->create();
//        $user = factory(User::class)->create(['schoolId' => $baseSchool->id]);
//        $graphql = <<<'GRAPHQL'
//            mutation($input: UserInputType) {
//              createUser(input: $input) {
//                name,
//                surname,
//                admin,
//                email
//              }
//            }
//            GRAPHQL;
//
//
//        $input = ['input' => [
//            'name' => $user->name,
//            'surname' => $user->surname,
//            'email' => $user->email,
//            'password' => $user->password,
//            'base_city' => City::whereId($user->base_city)->first()->slug,
//            'admin' => $user->admin,
//        ]];
//
//        $result = $this->graphql($graphql, [
//            'expectErrors' => false,
//            'variables' => $input,
//        ]);
//
//        $expectedResult = [
//            'data' => [
//                'createUser' => [
//                    'name' => $user->name,
//                    'surname' => $user->surname,
//                    'admin' => $user->admin,
//                    'email' => $user->email,
//                ],
//            ],
//        ];
//        $this->assertSame($expectedResult, $result);
    }
}
