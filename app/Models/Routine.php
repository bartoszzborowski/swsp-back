<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Routine
 *
 * @property int $id
 * @property int|null $class_id
 * @property int|null $section_id
 * @property int|null $subject_id
 * @property int|null $teacher_id
 * @property int|null $room_id
 * @property int|null $school_id
 * @property string|null $starting_hours
 * @property string|null $ending_hour
 * @property string|null $starting_minute
 * @property string|null $ending_minute
 * @property string|null $day
 * @property string|null $session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereEndingHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereEndingMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereStartingHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereStartingMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Routine whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Routine extends Model
{
    protected $table = Database::ROUTINES;
}
