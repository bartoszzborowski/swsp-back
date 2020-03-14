<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $department_id
 * @property int|null $school_id
 * @property string|null $designation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Teacher whereUserId($value)
 * @mixin \Eloquent
 * @property-read User $user
 */
class Teacher extends Model
{
    protected $table = Database::STUDENTS_TEACHERS;

    protected $fillable = [
        'user_id',
        'department_id',
        'school_id',
        'designation'
    ];

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
    public function getDepartmentId(): ?int
    {
        return $this->department_id;
    }

    /**
     * @return int|null
     */
    public function getSchoolId(): ?int
    {
        return $this->school_id;
    }

    /**
     * @return string|null
     */
    public function getDesignation(): ?string
    {
        return $this->designation;
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

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
