<?php

namespace App\Models;

use App\MyIndexConfigurator;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

/**
 * App\Models\Article
 *
 * @property \ScoutElastic\Highlight|null $highlight
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article query()
 * @mixin \Eloquent
 */
class Article extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'article';
    }

    /**
     * @var string
     */
    protected $indexConfigurator = MyIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    // Here you can specify a mapping for model fields
    protected $mapping = [
        'properties' => [
            'body' => [
                'type' => 'text'
            ],
            'title' => [
                'type' => 'text',
            ],
            'tags' => [
                'type' => 'keyword',
            ]
        ]
    ];
}
