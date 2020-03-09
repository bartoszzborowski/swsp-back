<?php

namespace App\Models;

use App\Constants\Database;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\ClassSection
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $class_id
 * @property int|null $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassSection whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ClassesSections[] $classes
 * @property-read int|null $classes_count
 */
class ClassSection extends Model
{
    protected $table = Database::SECTIONS;

    protected $fillable = [
        'name',
        'class_id',
        'school_id'
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
     * @return int|null
     */
    public function getClassId(): ?int
    {
        return $this->class_id;
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

//    public function classes(): BelongsToMany
//    {
//        return $this->belongsToMany(Classes::class, Database::CLASSES_SECTIONS, 'class_id', 'section_id');
//    }

    public function classes(): HasMany
    {
        return $this->hasMany(ClassesSections::class, 'section_id', 'id');
    }

    public function joinClassesSections()
    {
        return $this->join(Database::CLASSES_SECTIONS, 'id', '=', 'section_id');
    }
}
