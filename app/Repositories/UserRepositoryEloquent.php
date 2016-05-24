<?php

namespace ConstruLink\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ConstruLink\Repositories\UserRepository;
use ConstruLink\Models\User;
use ConstruLink\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace ConstruLink\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getDeliverymen()
    {
        return $this->model->where(['role' => 'deliveryman'])->lists('name','id');
    }
}
