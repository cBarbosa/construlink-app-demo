<?php

namespace ConstruLink\Http\Controllers;

use ConstruLink\Http\Requests\AdminProductRequest;
use ConstruLink\Repositories\CategoryRepositoryEloquent;
use ConstruLink\Repositories\ProductRepository;

use ConstruLink\Http\Requests;

class ProductsController extends Controller
{
    private $repository, $categoryRepository;

    public function __construct(ProductRepository $repository, CategoryRepositoryEloquent $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->repository->paginate();
        return view('admin.products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->pluck();
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(AdminProductRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        //dd($request->all());

        return redirect()->route('admin.products.index');
    }

    public function create()
    {
        $categories = $this->categoryRepository->pluck();
        return view('admin.products.create', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        //dd($request->all());

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.products.index');
    }

}
