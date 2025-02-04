<?php

namespace App\Models;

use App\Constants\Database;
use App\Elasticsearch\Index\StudentIndexConfigurator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use ScoutElastic\Searchable;

/**
 * App\Models\Student
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $parent_id
 * @property int|null $school_id
 * @property int|null $session_id
 * @property int|null $section_id
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $classes_id
 * @property-read \App\Models\Classes $classes
 * @property-read \App\Models\StudentParent $parent
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereClassesId($value)
 * @property \ScoutElastic\Highlight|null $highlight
 * @property-read \App\Models\Session $session
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereSessionId($value)
 * @property int|null $subject_id
 * @property-read \App\Models\StudentSubject $subject
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereSubjectId($value)
 * @property-read \App\Models\ClassSection $section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereSectionId($value)
 */
class Student extends Model
{
    use Searchable;

    public const ID = 'id';

    protected $table = Database::STUDENTS;

    protected $indexConfigurator = StudentIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    // Here you can specify a mapping for model fields
    protected $mapping = [
        'properties' => [
            'id' => [
                'type' => 'integer'
            ],
            'name' => [
                'type' => 'text',
                'analyzer' => 'autocomplete',
                'search_analyzer' => 'autocomplete_search',
                'fields' => [
                    'raw' => [
                        'type' => 'completion',
                    ]
                ]
            ],
        ]
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->user->getName()
        ];
    }

    protected $fillable = [
        'user_id',
        'parent_id',
        'school_id',
        'classes_id',
        'subject_id',
        'session_id',
        'section_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function classes(): HasOne
    {
        return $this->hasOne(Classes::class, 'id', 'classes_id');
    }

    public function parent(): HasOne
    {
        return $this->hasOne(StudentParent::class, 'id', 'parent_id');
    }

    public function session(): HasOne
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function subject(): HasOne
    {
        return $this->hasOne(StudentSubject::class, 'id', 'subject_id');
    }

    public function section(): HasOne
    {
        return $this->hasOne(ClassSection::class, 'id', 'section_id');
    }

    public function school(): HasOne
    {
        return $this->hasOne(School::class, 'id', 'school_id');
    }

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
    public function getParentId(): ?int
    {
        return $this->parent_id;
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
    public function getCode(): ?string
    {
        return $this->code;
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
