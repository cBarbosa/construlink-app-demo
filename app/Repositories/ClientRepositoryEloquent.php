<?php

namespace ConstruLink\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ConstruLink\Repositories\ClientRepository;
use ConstruLink\Models\Client;
use ConstruLink\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace ConstruLink\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
