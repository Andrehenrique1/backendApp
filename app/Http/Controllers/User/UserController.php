<?php

namespace App\Http\Controllers\User;
use IUserService;
use function response;

class UserController extends \App\Http\Controllers\Controller
{
    private $userService;

    public function __constructor(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function storeOrUpdate(\Illuminate\Http\Client\Request $request)
    {
        return response()->json($this->userService->storeOrUpdate($request));
    }

    public function login(\Illuminate\Http\Client\Request $request)
    {
        return response()->json($this->userService->login($request));
    }
}
