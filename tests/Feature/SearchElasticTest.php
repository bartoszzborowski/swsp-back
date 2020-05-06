<?php
//
//namespace Tests\Unit\Feature;
//
//use App\GraphQL\Types\Input\PaginationType;
//use App\Models\School;
//use App\Models\Session;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\WithFaker;
//use Tests\TestCase;
//
//class SearchElasticTest extends TestCase
//{
//    use DatabaseTransactions;
//    use WithFaker;
//
//    public function testGetSession(): void
//    {
//        $baseSchool = factory(School::class)->create();
//        $session = factory(Session::class, 2)->create(['school_id' => $baseSchool->getId()]);
//
//        $graphql = <<<'GRAPHQL'
//            query($page: Int!, $take: Int!, $filters: FiltersElasticSearchInputType) {
//              search(
//                filters: $filters
//                pagination: { page: $page, take: $take }
//              ) {
//                ... on StudentType {
//                  id,
//                  user {
//                    name
//                  }
//                }
//              }
//            }
//            GRAPHQL;
//
//        $input = [
//            'filters' => [
//                'index' => 'students',
//                'query' => 'tests'
//            ],
//            PaginationType::FIELD_TAKE => 10,
//            PaginationType::FIELD_PAGE => 1
//        ];
//
//        $result = $this->graphql($graphql, [
//            'variables' => $input,
//            'expectErrors' => false,
//        ]);
//
//        $expectedResult['data']['sessions']['data'] = $session->map(static function ($item) {
//            return [
//                'id' => $item->getId(),
//                'name' => $item->getName()
//            ];
//        })->toArray();
//
//        $this->assertSame($expectedResult, $result);
//    }
//}
