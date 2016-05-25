<?php

namespace ConstruLink\Http\Controllers;

use ConstruLink\Http\Requests\AdminCupomRequest;
use ConstruLink\Repositories\CupomRepository;
use Illuminate\Http\Request;

use ConstruLink\Http\Requests;

class CupomsController extends Controller
{
    /**
     * @var CupomRepository
     */
    private $repository;

    /**
     * CupomsController constructor.
     * @param CupomRepository $repository
     */
    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $cupoms  = $this->repository->paginate();
        return view('admin.cupoms.index', compact('cupoms'));
    }

    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('admin.cupoms.index');
    }
}
