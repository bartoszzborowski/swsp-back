<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ClassesSections
 *
 * @property int $class_id
 * @property int $section_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassesSections newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassesSections newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassesSections query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassesSections whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassesSections whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassesSections whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ClassesSections whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClassesSections extends Pivot
{
    public const CLASSES_ID = 'class_id';
    public const SECTION_ID = 'section_id';
    
    protected $table = Database::CLASSES_SECTIONS;
}
