<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Classes
 *
 * @property int $id
 * @property string $name
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Classes extends Model
{
    public const ID = 'id';
    protected $table = Database::CLASSES;

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
}
