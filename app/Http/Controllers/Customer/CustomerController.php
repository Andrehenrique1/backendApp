<?php

namespace App\Http\Controllers\Customer;
use ICustomerService;
use function response;

class CustomerController extends \App\Http\Controllers\Controller
{
    private $customerService;

    public function __constructor(ICustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function storeOrUpdate(\Illuminate\Http\Client\Request $request)
    {
        return response()->json($this->customerService->storeOrUpdate($request));
    }

    public function login(\Illuminate\Http\Client\Request $request)
    {
        return response()->json($this->customerService->login($request));
    }
}
