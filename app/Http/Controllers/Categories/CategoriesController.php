<?php

namespace App\Http\Controllers\Categories;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\Categories\CategoriesService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoriesController extends Controller
{
    use ApiResponser;

    public function __construct(
        public CategoriesService $categoriesService
    ) {
    }

    public function __invoke(): JsonResponse
    {
        return $this->successResponse($this->categoriesService->getCategories());
    }
}
