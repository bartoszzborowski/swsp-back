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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @return int|null
     */
    public function getStudentId(): ?int
    {
        return $this->student_id;
    }

    /**
     * @return int|null
     */
    public function getSchoolId(): ?int
    {
        return $this->school_id;
    }

    /**
     * @return \Illuminate\Support\Carbon|null
     */
    public function getCreatedAt(): ?\Illuminate\Support\Carbon
    {
        return $this->created_at;
    }

    /**
     * @return \Illuminate\Support\Carbon|null
     */
    public function getUpdatedAt(): ?\Illuminate\Support\Carbon
    {
        return $this->updated_at;
    }
}
