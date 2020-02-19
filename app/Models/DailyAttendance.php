<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DailyAttendance
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $class_id
 * @property int $section_id
 * @property int $student_id
 * @property int $status
 * @property int $school_id
 * @property string $timestamp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DailyAttendance whereUpdatedAt($value)
 */
class DailyAttendance extends Model
{
    protected $table = Database::DAILY_ATTENDANCE;

    protected $fillable = [
        'class_id',
        'section_id',
        'student_id',
        'status',
        'school_id',
        'timestamp'
    ];
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getClassId(): int
    {
        return $this->class_id;
    }

    /**
     * @return int
     */
    public function getSectionId(): int
    {
        return $this->section_id;
    }

    /**
     * @return int
     */
    public function getStudentId(): int
    {
        return $this->student_id;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getSchoolId(): int
    {
        return $this->school_id;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
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
