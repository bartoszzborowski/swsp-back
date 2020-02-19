<?php

namespace App\Models;

use App\Constants\Database;
use App\Elasticsearch\Index\ParentIndexConfigurator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use ScoutElastic\Searchable;

/**
 * App\Models\StudentParent
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $student_id
 * @property int|null $school_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
 * @property-read User $user
 * @property \ScoutElastic\Highlight|null $highlight
 */
class StudentParent extends Model
{
    use Searchable;

    protected $table = Database::PARENT;

    public function searchableAs(): string
    {
        return 'parents';
    }

    /**
     * @var string
     */
    protected $indexConfigurator = ParentIndexConfigurator::class;

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

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->updated_at;
    }
}
