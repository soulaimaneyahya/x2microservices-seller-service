<?php

namespace App\Services\Categories;

use App\Traits\RequestServices;

class CategoriesService
{
    use RequestServices;

    /**
     * The base uri to consume the categories service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the categories service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.categories.base_uri');
        $this->secret = config('services.categories.secret');
    }

    public function getCategories(): array
    {
        return $this->performRequest('GET', '/categories');
    }
}
