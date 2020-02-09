<?php

namespace App\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class GetByIdCriteria
 * @package App\Criteria
 */
class GetByIdCriteria implements CriteriaInterface
{
    private $searchedId;
    private $column;

    public function __construct(int $searchedId, $column = null)
    {
        $this->searchedId = $searchedId;
        $this->column = $column;
    }

    public function apply($model, RepositoryInterface $repository): Builder
    {
        $modelClass  = $repository->model();
        $columnName = $this->column ?? $modelClass::ID;

        return $model->where([$columnName => $this->searchedId]);
    }
}
