<?php

namespace App\Http\Controllers\API;

use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Customer extends Controller
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new CustomerRepository;
    }

    public function initialize(Request $request)
    {
        try {
            $customer = $request->user();
            return $this->success(compact('customer'));
        }
        catch (\Exception $e) {
            \Log::error($e);
            return $this->error();
        }
    }
}