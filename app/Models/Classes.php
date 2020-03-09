<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClassSection[] $sections
 * @property-read int|null $sections_count
 */
class Classes extends Model
{
    public const ID = 'id';
    public const NAME = 'name';
    public const SCHOOL_ID = 'school_id';

    protected $table = Database::CLASSES;

    protected $fillable = [
        self::NAME,
        self::SCHOOL_ID,
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSchoolId(): int
    {
        return $this->school_id;
    }

    public function getCreatedAt(): ?\Illuminate\Support\Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?\Illuminate\Support\Carbon
    {
        return $this->updated_at;
    }

    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(ClassSection::class, Database::CLASSES_SECTIONS, 'class_id', 'section_id');
    }
}
