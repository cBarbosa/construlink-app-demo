<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 24/05/2016
 * Time: 09:54
 */

namespace ConstruLink\Services;


use ConstruLink\Repositories\ClientRepository;
use ConstruLink\Repositories\UserRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $clientRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {

        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @param $id
     */
    public function update(array $data, $id)
    {
        $this->clientRepository->update($data, $id);
    }
}