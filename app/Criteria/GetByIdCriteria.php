<?php

namespace App\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GetByIdCriteria
 * @package App\Criteria
 */
class GetByIdCriteria implements CriteriaInterface
{
    private $searchedId;
    private $column;
    private $isDate;

    public function __construct($searchedId, $column = null, $isDate = false)
    {
        $this->searchedId = $searchedId;
        $this->column = $column;
        $this->isDate = $isDate;
    }

    /**
     * @param Model $model
     * @param RepositoryInterface $repository
     * @return Model|\Illuminate\Database\Query\Builder
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $modelClass = $repository->model();
        $columnName = $this->column ?? $modelClass::ID;

        return $this->isDate ? $model->whereDate($columnName, '=', $this->searchedId) : $model->where([$columnName => $this->searchedId]);
    }
}
