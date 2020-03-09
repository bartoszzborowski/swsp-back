<?php

namespace App\Repository;

use App\Models\Classes;
use App\Models\ClassesSections;
use Illuminate\Support\Arr;

class ClassRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Classes::class;
    }

    public function create(array $attributes)
    {
        /** @var Classes $class */
        $class =  parent::create($attributes);

        if ($sections = Arr::get($attributes, 'sections')) {
            $class->save();
            $class->sections()->sync($sections);
        }

        return $class;
    }

    public function update(array $attributes, $id)
    {
        $class =  parent::update($attributes, $id);

        if ($sections = Arr::get($attributes, 'sections')) {
            $class->sections()->sync($sections);
        }

        $class->refresh();
        return $class;
    }
}
