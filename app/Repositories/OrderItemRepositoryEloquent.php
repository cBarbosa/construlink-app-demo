<?php

namespace ConstruLink\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ConstruLink\Repositories\OrderItemRepository;
use ConstruLink\Models\OrderItem;
use ConstruLink\Validators\OrderItemValidator;

/**
 * Class OrderItemRepositoryEloquent
 * @package namespace ConstruLink\Repositories;
 */
class OrderItemRepositoryEloquent extends BaseRepository implements OrderItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderItem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
