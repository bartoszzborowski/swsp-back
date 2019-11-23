<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentParent
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $student_id
 * @property int|null $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentParent whereUserId($value)
 * @mixin \Eloquent
 */
class StudentParent extends Model
{
    protected $table = Database::PARENT;
}
