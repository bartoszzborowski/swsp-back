<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Exam
 *
 * @property int $id
 * @property string $name
 * @property string $starting_date
 * @property string $ending_date
 * @property int $school_id
 * @property int $session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereEndingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereStartingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Exam whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Exam extends Model
{
    protected $table = Database::EXAMS;
}
