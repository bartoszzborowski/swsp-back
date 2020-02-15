<?php

namespace Tests\Unit\Feature;

use App\GraphQL\Types\Input\Filters\FiltersStudentType;
use App\GraphQL\Types\Input\PaginationType;
use App\Models\Classes;
use App\Models\School;
use App\Models\Session;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SessionTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function testGetSession(): void
    {
        $baseSchool = factory(School::class)->create();
        $session = factory(Session::class, 2)->create(['school_id' => $baseSchool->getId()]);

        $graphql = <<<'GRAPHQL'
            query($take: Int!, $page: Int!) {
              sessions(pagination: { take: $take, page: $page }) {
                data {
                  id
                  name
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

        $expectedResult['data']['sessions']['data'] = $session->map(static function ($item) {
            return [
                'id' => $item->getId(),
                'name' => $item->getName()
            ];
        })->toArray();

        $this->assertSame($expectedResult, $result);
    }

    public function testCreateSession(): void
    {
        $baseSchool = factory(School::class)->create();
        $session = factory(Session::class)->make(['school_id' => $baseSchool->getId()]);

        $graphql = <<<'GRAPHQL'
            mutation($input: SessionInputType) {
              createSession(input: $input){
                name
                status
                school_id
              }
            }
            GRAPHQL;

        $input = ['input' => [
            'name' => $session->getName(),
            'status' => $session->getStatus(),
            'school_id' => $baseSchool->getId()
        ]];

        $result = $this->graphql($graphql, [
            'expectErrors' => false,
            'variables' => $input
        ]);

        $expectedResult = [
            'data' => [
                'createSession' => [
                    'name' => $session->getName(),
                    'status' => $session->getStatus(),
                    'school_id' => $session->getSchoolId()
                ]
            ]
        ];

        $this->assertSame($expectedResult, $result);
    }

    public function testUpdateSession(): void
    {
        $baseSchool = factory(School::class)->create();
        $session = factory(Session::class)->create(['school_id' => $baseSchool->getId()]);
        $newSessionVersion = factory(Session::class)->make(['school_id' => $baseSchool->getId()]);

        $graphql = <<<'GRAPHQL'
            mutation($input: UpdateSessionInputType) {
              updateSession(input: $input){
                id
                name
                status
                school_id
              }
            }
            GRAPHQL;

        $input = ['input' => [
            'id' => $session->getId(),
            'name' => $newSessionVersion->getName(),
            'status' => $newSessionVersion->getStatus(),
            'school_id' => $newSessionVersion->getSchoolId()
        ]];

        $result = $this->graphql($graphql, [
            'expectErrors' => false,
            'variables' => $input
        ]);

        $expectedResult = [
            'data' => [
                'updateSession' => [
                    'id' => $session->getId(),
                    'name' => $newSessionVersion->getName(),
                    'status' => $newSessionVersion->getStatus(),
                    'school_id' => $newSessionVersion->getSchoolId()
                ]
            ]
        ];

        $this->assertSame($expectedResult, $result);
    }
}
