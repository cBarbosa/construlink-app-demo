<?php

namespace ConstruLink\Http\Controllers;

use ConstruLink\Repositories\OrderRepository;
use ConstruLink\Repositories\ProductRepository;
use ConstruLink\Repositories\UserRepository;
use ConstruLink\Services\OrderService;
use Illuminate\Http\Request;

use ConstruLink\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
    /**
     * @var OrderderService
     */
    private $service;

    public function __construct(
        OrderRepository $repository
        , UserRepository $userRepository
        , ProductRepository $productRepository
        , OrderService $service
    )
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    public function index()
    {
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;

        $orders = $this->repository->scopeQuery(function($query) use($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return view('customer.order.index', compact('orders'));
    }

    public function create()
    {
        $products = $this->productRepository->pluck();
        return view('customer.order.create', compact('products'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);

        return redirect()->route('customer.order.index');
    }
}
