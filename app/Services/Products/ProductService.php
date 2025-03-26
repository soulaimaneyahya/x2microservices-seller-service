<?php

namespace App\Services\Products;

use App\Traits\RequestServices;

class ProductService
{
    use RequestServices;

    /**
     * The base uri to consume the products service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the products service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.products.base_uri');
        $this->secret = config('services.products.secret');
    }

    public function getProducts(): array
    {
        return $this->performRequest('GET', '/products');
    }
}
