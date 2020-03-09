<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StudentSubject
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $session
 * @property int|null $class_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentSubject whereUpdatedAt($value)
 */
class StudentSubject extends Model
{
    protected $table = Database::STUDENT_SUBJECTS;

    protected $fillable = [
        'name',
        'slug',
        'session',
        'class_id',
        'school_idx'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return string|null
     */
    public function getSession(): ?string
    {
        return $this->session;
    }

    /**
     * @return int|null
     */
    public function getClassId(): ?int
    {
        return $this->class_id;
    }
}
