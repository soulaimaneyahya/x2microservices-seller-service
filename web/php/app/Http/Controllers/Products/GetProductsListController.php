<?php

namespace App\Http\Controllers\Products;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\Products\ProductService;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetProductsListController extends Controller
{
    use ApiResponser;

    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(): JsonResponse
    {
        return $this->jsonResponse($this->productService->getProducts());
    }
}
