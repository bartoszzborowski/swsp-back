<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ClassRoom
 *
 * @property int $id
 * @property string $name
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $capacity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassRoom whereCapacity($value)
 */
class ClassRoom extends Model
{
    protected $table = Database::CLASSROOMS;

    protected $fillable = [
        'name',
        'school_id',
        'capacity',
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSchoolId(): int
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

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }
}
