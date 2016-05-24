<?php

namespace ConstruLink\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ConstruLink\Repositories\OrderRepository;
use ConstruLink\Models\Order;
use ConstruLink\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace ConstruLink\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
