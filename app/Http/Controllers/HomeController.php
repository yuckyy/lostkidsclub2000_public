<?php

namespace App\Http\Controllers;

use App\Services\HomeProductService;

class HomeController extends Controller
{
    protected HomeProductService $productService;

    public function __construct(HomeProductService $productService)
    {
        $this->productService = $productService;
    }
    public function home($cat_id = 'lastdrop' ) : string
    {

        $pageTitle = "LOSTKIDSCLUB2000";

        return view('home', compact( 'pageTitle' ));

    }


}

