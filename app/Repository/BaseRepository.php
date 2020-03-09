<?php


namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository
{
    /**
     * Retrieve all data of repository, paginated
     *
     * @param null $limit
     * @param int $page
     * @param array $columns
     * @param string $method
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function paginate($limit = null, $page = null, $columns = ['*'], $method = 'paginate')
    {
        $this->applyCriteria();
        $this->applyScope();
        $limit = is_null($limit) ? config('repository.pagination.limit', 15) : $limit;
        $results = $this->model->{$method}($limit, $columns, 'page', $page);
        $results->appends(app('request')->query());
        $this->resetModel();
        $this->resetCriteria();

        return $this->parserResult($results);
    }

    public function toSql()
    {
        $this->applyCriteria();
        $this->applyScope();
        $query = $this->model->toSql();
        $bindings = $this->model->getBindings();
        $pdo = DB::connection()->getPdo();
        foreach ($bindings as $key => $binding) {
            $regex = is_numeric($key)
                ? "/\?(?=(?:[^'\\\']*'[^'\\\']*')*[^'\\\']*$)/"
                : "/:{$key}(?=(?:[^'\\\']*'[^'\\\']*')*[^'\\\']*$)/";
            if (!is_int($binding) && !is_float($binding)) {
                $binding = $pdo->quote($binding);
            }
            $query = preg_replace($regex, $binding, $query, 1);
        }
        return $query;
    }

    public function getQueryBuilder(): Model
    {
        $this->applyCriteria();
        $this->applyScope();
        return $this->model;
    }
}
