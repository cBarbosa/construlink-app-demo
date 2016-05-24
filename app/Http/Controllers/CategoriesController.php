<?php

namespace ConstruLink\Http\Controllers;

use ConstruLink\Http\Requests\AdminCategoryRequest;
use ConstruLink\Repositories\CategoryRepository;

use ConstruLink\Http\Requests;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        /*echo "<h1>Categories!</h1>";
        $nome  = "Chalres";
        $linguagens = [
            'Java'
            , 'Dotnet'
            , 'PHP'
        ];
        return view('admin.categories.index', compact('nome', 'linguagens'));
        */

        $categories = $this->repository->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create', []);
    }

    public function store(AdminCategoryRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        //dd($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        //dd($request->all());

        return redirect()->route('admin.categories.index');
    }
}
