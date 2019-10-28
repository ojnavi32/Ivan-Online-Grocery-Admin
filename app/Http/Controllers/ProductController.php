<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repo;
    protected $categoryRepo;

    public function __construct()
    {
        $this->repo = new ProductRepository;
        $this->categoryRepo = new CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repo->paginatedList();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->parentsList(true);

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inputs = $request->only($this->repo->getFillables());
            $inputs['category_id'] = $request->input('category_id');

            $path = $request->file('image')->store('products', 'public');
            $inputs['image'] = "/images/{$path}";

            $this->repo->store($inputs);
            session()->flash('message', $this->repo->storeSuccess);
    
            return redirect(route('products.index'));
        } catch (\Exception $e) {
            \Log::error($e);
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repo->get($id);
        $categories = $this->categoryRepo->parentsList(true);
        $categoryIds = $product->categories->pluck('id')->toArray();

        return view('product.edit', compact('product', 'categories', 'categoryIds'));
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
            $inputs = array_merge($inputs, [
                            'id' => $id,
                            'image-old' => $request->input('image-old')
                        ]);

            if ($request->hasFile('image')) {
                $img = substr($inputs['image-old'], 1);
                \File::delete(public_path($img));
                $path = $request->file('image')->store('products', 'public');
                $inputs['image'] = "/images/{$path}";
            }

            $this->repo->update($inputs);
            session()->flash('message', $this->repo->updateSuccess);
    
            return redirect(route('products.index'));
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
