<?php

namespace ConstruLink\Http\Controllers;

use ConstruLink\Repositories\OrderRepository;
use ConstruLink\Repositories\ProductRepository;
use ConstruLink\Repositories\UserRepository;
use Illuminate\Http\Request;

use ConstruLink\Http\Requests;

class CheckoutsController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(
        OrderRepository $repository
        , UserRepository $userRepository
        , ProductRepository $productRepository
    )
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function create()
    {
        $products = $this->productRepository->pluck();
        return view('customer.order.create', compact('products'));
    }
}
