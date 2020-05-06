<?php
//
//namespace Tests\Unit\Feature;
//
//use App\GraphQL\Types\Input\Filters\FiltersStudentType;
//use App\GraphQL\Types\Input\PaginationType;
//use App\Models\Classes;
//use App\Models\ClassSection;
//use App\Models\DailyAttendance;
//use App\Models\School;
//use App\Models\Student;
//use App\Models\StudentParent;
//use App\Models\User;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Support\Collection;
//use Tests\TestCase;
//
//class AttendanceTest extends TestCase
//{
//    use DatabaseTransactions;
//    use WithFaker;
//
//    public function testGetClasses(): void
//    {
//        $baseSchool = factory(School::class)->create();
//        $user = factory(User::class)->create(['school_id' => $baseSchool->getId()]);
//        $classes = factory(Classes::class)->create(['school_id' => $baseSchool->getId()]);
//        $classesSections = factory(ClassSection::class)->create(['school_id' => $baseSchool->getId()]);
//        $student = factory(Student::class)->create(
//            [
//                'school_id' => $baseSchool->getId(),
//                'user_id' => $user->getId(),
//                'classes_id' => $classes->getId(),
//            ]
//        );
//
//        $dailyAttendance = factory(DailyAttendance::class, 4)->create(
//            [
//                'school_id' => $baseSchool->getId(),
//                'section_id' => $classesSections->getId(),
//                'student_id' => $student->getId(),
//                'class_id' => $student->classes->getId()
//            ]
//        );
//
//        $graphql = <<<'GRAPHQL'
//            query($take: Int!, $page: Int!) {
//              attendance(pagination: { take: $take, page: $page }) {
//                data {
//                  id
//                }
//              }
//            }
//            GRAPHQL;
//
//        $input = [
//            PaginationType::FIELD_TAKE => 10,
//            PaginationType::FIELD_PAGE => 1
//        ];
//
//        $result = $this->graphql($graphql, [
//            'variables' => $input,
//            'expectErrors' => false,
//        ]);
//        $expectedResult['data']['attendance']['data'] = $dailyAttendance->map(static function (DailyAttendance $item) {
//            return [
//                'id' => $item->getId(),
//            ];
//        })->toArray();
//
//        $this->assertSame($expectedResult, $result);
//    }
//}
