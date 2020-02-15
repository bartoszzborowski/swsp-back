<?php

namespace Tests\Unit\Feature;

use App\GraphQL\Types\Input\Filters\FiltersStudentType;
use App\GraphQL\Types\Input\PaginationType;
use App\Models\Classes;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ParentsTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /**
     * @var School
     */
    private $baseSchool;

    /**
     * @var Collection|StudentParent
     */
    private $parents;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var School $baseSchool */
        $baseSchool = factory(School::class)->create();
        $userParents = factory(User::class, 5)->create(['school_id' => $baseSchool->getId()]);

        $parents = new Collection();

        $userParents->each(static function ($parent) use ($parents, $baseSchool) {
            $parents->push(factory(StudentParent::class)->create(['school_id' => $baseSchool->getId(),
                'user_id' => $parent->getId()]));
        });

        $this->parents = $parents;
        $this->baseSchool = $baseSchool;
    }

    public function testGetClasses(): void
    {
        $graphql = <<<'GRAPHQL'
            query($take: Int!, $page: Int!) {
              parents(pagination: { take: $take, page: $page }) {
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

        $expectedResult['data']['parents']['data'] = $this->parents->map(static function ($item) {
            return [
                'id' => $item->getId(),
                'user' => [
                    'name' => $item->user->getName(),
                    'email' => $item->user->getEmail()
                ]
            ];
        })->toArray();

        $this->assertSame($expectedResult, $result);
    }
}
