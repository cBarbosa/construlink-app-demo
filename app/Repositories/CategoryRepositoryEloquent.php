<?php

namespace ConstruLink\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ConstruLink\Repositories\CategoryRepository;
use ConstruLink\Models\Category;
use ConstruLink\Validators\CategoryValidator;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace ConstruLink\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function pluck()
    {
        return $this->model->lists('name','id');
    }

}
