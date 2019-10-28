<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repo->paginatedList();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = $this->repo->parentsList();

        return view('category.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestñ
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inputs = $request->only($this->repo->getFillables());
            $this->repo->store($inputs);

            session()->flash('message', $this->repo->storeSuccess);
    
            return redirect(route('categories.index'));
        } catch (\Exception $e) {
            \Log::error($e);
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->repo->get($id);
        $parents = $this->repo->parentsList();

        return view('category.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $inputs = $request->only($this->repo->getFillables());
            $inputs = array_merge($inputs, ['id' => $id]);

            $this->repo->update($inputs);

            session()->flash('message', $this->repo->updateSuccess);

            return redirect(route('categories.index'));
        } catch (\Exception $e) {
            \Log::error($e);
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->repo->delete(intval($id));
            session()->flash('message', $this->repo->deleteSuccess);

            return redirect()->back();
        } catch (\Exception $e) {
            \Log::error($e);
            throw new \Exception($e->getMessage());
        }
    }
}
