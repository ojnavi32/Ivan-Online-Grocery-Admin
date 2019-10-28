<?php

namespace App\Http\Controllers\API;

use App\Repositories\ProductRepository;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class Product extends Controller
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new ProductRepository;
    }

    public function byCategory(Request $request)
    {
        $slug = $request->input('slug');
        $parent = $request->input('parent');
        
        try {
            $products = ProductResource::collection($this->repo->byCategory($slug, $parent));
            return $this->success(compact('products'));
        }
        catch (\Exception $e) {
            Log::error($e);
            return $this->error();
        }
    }

    public function single($name)
    {
        $name = str_replace('-', ' ', $name);

        try {
            $product = $this->repo->single($name);
            return $this->success(compact('product'));
        }
        catch (\Exception $e) {
            Log::error($e);
            return $this->error();
        }
    }

    public function bestSellers()
    {
        try {
            $res = $this->repo->byCategory('snacks');
            for ($i = 0; $i <= 20; $i++) {
                $res[0]['image'] = url($res[0]['image']);
                $lists[] = $res[0];
            }

            // $lists = ProductResource::collection($this->repo->byCategory('snacks'));
            return $this->success(compact('lists'));
        }
        catch (\Exception $e) {
            Log::error($e);
            return $this->error();
        }
    }

    public function hotDeals()
    {
        try {
            $lists = ProductResource::collection($this->repo->byCategory('snacks'));
            return $this->success(compact('lists'));
        }
        catch (\Exception $e) {
            Log::error($e);
            return $this->error();
        }
    }
}
