<?php

namespace App\Elasticsearch\Index;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ParentIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name = 'parents';

    // You can specify any settings you want, for example, analyzers.
    protected $settings = [
        'analysis' => [
            'analyzer' => [
                'autocomplete' => [
                    'tokenizer' => 'autocomplete',
                    'filter' =>[
                        'lowercase',
                        'asciifolding'
                    ],
                ],
                'autocomplete_search' => [
                    'tokenizer' => 'lowercase',
                ]
            ],
            'tokenizer' => [
                'autocomplete' => [
                    'type' => 'edge_ngram',
                    'min_gram' => 2,
                    'max_gram' => 10,
                    'token_chars' => [
                        'letter',
                        'digit'
                    ]
                ],
            ],
        ]
    ];
}
