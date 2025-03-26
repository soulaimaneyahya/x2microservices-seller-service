<?php

namespace App\Http\Controllers\Sellers;

use App\Models\Seller;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetSellersListController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->successResponse(Seller::select([
            'id', 'name', 'email'
        ])->get());
    }
}
