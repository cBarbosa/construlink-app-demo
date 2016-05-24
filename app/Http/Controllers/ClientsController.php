<?php

namespace ConstruLink\Http\Controllers;

use ConstruLink\Http\Requests\AdminClientRequest;
use ConstruLink\Http\Requests;
use ConstruLink\Repositories\ClientRepository;

class ClientsController extends Controller
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $clients = $this->repository->paginate();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        //dd($request->all());

        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->repository->find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        //dd($request->all());

        return redirect()->route('admin.clients.index');
    }
}
