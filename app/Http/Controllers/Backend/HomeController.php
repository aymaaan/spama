<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Categories;
use App\Brands;
use App\Products;
use App\MotherProducts;
use App\Coupons;
use App\CustomersAssessmentProducts;
use Cache;
use Auth;
use App\NamesMotherProducts;
use App\Features;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */








    public function index(Request $request , $lang = null)
    {
$lang = LangUser($lang);
$totalSuppliers = Supplier::where('status',1)->count();
$totalMotherProducts = MotherProducts::where('status',1)->count();
$totalCategories = Categories::where('status',1)->count();
$totalBrands = Brands::where('status',1)->count();
$totalProducts = Products::count();
$products_data = Products::latest()->take(10)->get();
$totalCoupons = Coupons::groupBy('title')->get();
$totalAssessment = CustomersAssessmentProducts::groupBy('customer_id')->get();
return view('backend.pages.index' , compact('totalAssessment','totalCoupons','totalMotherProducts','products_data','totalSuppliers','totalCategories','totalBrands','totalProducts')  );
    }


public function quotations_page(Request $request , $lang = null)
{
$lang = LangUser($lang);
return view('backend.pages.pages.quotations_page');

}

public function orders_page(Request $request , $lang = null)
{
$lang = LangUser($lang);
return view('backend.pages.pages.orders_page');

}

public function assessments_page(Request $request , $lang = null)
{
$lang = LangUser($lang);
return view('backend.pages.pages.assessments_page');
}

public function purchase_orders_page(Request $request , $lang = null)
{
$lang = LangUser($lang);
return view('backend.pages.pages.purchase_orders_page');
}

public function products_page(Request $request , $lang = null)
{
$lang = LangUser($lang);
return view('backend.pages.pages.products_page');
}

public function customers_service_page(Request $request , $lang = null)
{
$lang = LangUser($lang);
return view('backend.pages.pages.customers_service_page');
}

public function hr_page(Request $request , $lang = null)
{
$lang = LangUser($lang);
return view('backend.pages.pages.hr_page');
}
 
 

}
