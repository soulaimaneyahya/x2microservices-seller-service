<?php

namespace App\Http\Controllers\OAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetAuthSellerController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return $this->successResponse($request->user());
    }
}
