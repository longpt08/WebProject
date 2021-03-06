<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\InvoiceService;
use App\Http\Services\OrderService;
use App\Http\Services\ProductService;
use App\Http\Services\UserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var UserService
     */
    public $userService;

    /**
     * @var ProductService
     */
    public $productService;

    /**
     * @var CategoryService
     */
    public $categoryService;

    /**
     * @var OrderService
     */
    public $orderService;

    /**
     * @var InvoiceService
     */
    public $invoiceService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->productService = new ProductService();
        $this->categoryService = new CategoryService();
        $this->orderService = new OrderService();
        $this->invoiceService = new InvoiceService();
    }
}
