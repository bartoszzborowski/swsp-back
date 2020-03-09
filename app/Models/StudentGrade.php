<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentGrade
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $grade_point
 * @property string|null $mark_from
 * @property string|null $mark_upto
 * @property string $comment
 * @property int $school_id
 * @property string|null $session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereGradePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereMarkFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereMarkUpto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentGrade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StudentGrade extends Model
{
    protected $table = Database::STUDENT_GRADE;
}
