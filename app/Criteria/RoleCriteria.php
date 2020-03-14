<?php

namespace App\Criteria;

use App\Models\ClassesSections;
use App\Models\ClassSection;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GetByIdCriteria
 * @package App\Criteria
 */
class RoleCriteria implements CriteriaInterface
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
        $role = Role::whereName($this->searchedId)->get()->first();
        if ($role) {
            return $model->joinRoleUser()->where('role_user.role_id', $role->getId());
        }

        return $model;
    }
}
