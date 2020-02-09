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

class ClassesTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function testGetClasses(): void
    {
        $baseSchool = factory(School::class)->create();
        $classes = factory(Classes::class, 2)->create(['school_id' => $baseSchool->getId()]);

        $graphql = <<<'GRAPHQL'
            query($take: Int!, $page: Int!) {
              classes(pagination: { take: $take, page: $page }) {
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

        $expectedResult['data']['classes']['data'] = $classes->map(static function ($item) {
            return [
                'id' => $item->getId(),
                'name' => $item->getName()
            ];
        })->toArray();

        $this->assertSame($expectedResult, $result);
    }
}
