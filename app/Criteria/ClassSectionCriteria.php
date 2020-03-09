<?php

namespace App\Criteria;

use App\Models\ClassesSections;
use App\Models\ClassSection;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GetByIdCriteria
 * @package App\Criteria
 */
class ClassSectionCriteria implements CriteriaInterface
{
    private $searchedId;
    private $column;
    private $isDate;

    public function __construct($searchedId)
    {
        $this->searchedId = $searchedId;
    }

    /**
     * @param ClassSection $model
     * @param RepositoryInterface $repository
     * @return Model|\Illuminate\Database\Query\Builder
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->joinClassesSections()->where('classes_sections.class_id', $this->searchedId);
    }
}
