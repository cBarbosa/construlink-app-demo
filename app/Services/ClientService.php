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
        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;
        $this->clientRepository->update($data, $id);
        $this->userRepository->update($data['user'], $userId);
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $data['user']['password'] = bcrypt("fogo");
        $user = $this->userRepository->create($data['user']);
        $data['user_id'] = $user->id;
        $this->clientRepository->create($data);
    }
}