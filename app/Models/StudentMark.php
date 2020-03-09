<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentMark
 *
 * @property int $id
 * @property int|null $student_id
 * @property int|null $subject_id
 * @property int|null $class_id
 * @property int|null $section_id
 * @property int|null $exam_id
 * @property int|null $school_id
 * @property int|null $mark_obtained
 * @property string $comment
 * @property int|null $session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereMarkObtained($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentMark whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StudentMark extends Model
{
    protected $table = Database::STUDENT_MARKS;
}
