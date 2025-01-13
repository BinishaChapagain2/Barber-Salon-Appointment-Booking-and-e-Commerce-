<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Category;
use App\Models\course;
use App\Models\gallery;
use App\Models\product;
use App\Models\review;
use App\Models\service;
use App\Models\servicecategory;
use App\Models\staff;
use Illuminate\Http\Request;

class PageController extends Controller
{



    //master page controller for all pages






    public function homepage()
    {
        $galleries = gallery::limit(4)->get();
        $products = product::where('stock', '>', 0)->limit(4)->get();



        $services = service::where('status', 'show')->latest()->limit(4)->get();


        // Display form and reviews

        $reviews = review::orderBy('rating', 'desc')->get();

        return view('welcome', compact('galleries', 'products', 'reviews', 'services'));
    }
    public function aboutpage()
    {

        $staffs = staff::all();

        return view('aboutpage', compact('staffs'));
    }

    public function coursepage()
    {

        $courses = course::all();

        return view('coursepage', compact('courses'));
    }

    public function productpage()
    {

        $products = Product::where('status', 'show')->where('stock', '>', 0)->latest()->limit(4)->get();
        return view('productpage', compact('products'));
    }




    public function viewproductdetail($id)
    {
        $product = Product::where('status', 'show')->find($id);
        $relatedproducts = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->limit(8)->get();
        return view('viewproductdetail', compact('product', 'relatedproducts'));
    }

    public function categoryproduct($id)
    {
        $category = Category::find($id);

        $products = Product::where('status', 'Show')->where('category_id', $id)->where('stock', '>', 0)->paginate(8);
        return view('categoryproduct', compact('products', 'category'));
    }


    public function checkout($cartid)
    {
        $cart = cart::find($cartid);
        if ($cart->product->discounted_price == '') {
            $cart->total = $cart->product->price * $cart->qty;
        } else {
            $cart->total = $cart->product->discounted_price * $cart->qty;
        }
        return view('checkout', compact('cart'));
    }



    public function search(Request $request)
    {
        $qry = $request->search;
        $products = Product::where('name', 'like', '%' . $qry . '%')->orWhere('description', 'like', '%' . $qry . '%')->get();
        return view('search', compact('products'));
    }

    //search for services
    public function searchservice(Request $request)
    {
        $qry = $request->search;
        $services = service::where('name', 'like', '%' . $qry . '%')->orWhere('description', 'like', '%' . $qry . '%')->get();
        return view('searchservicepage', compact('services'));
    }

    //service page

    public function servicepage()
    {

        $services = service::where('status', 'show')->latest()->limit(4)->get();

        $servicecategories = servicecategory::all();

        return view('servicepage', compact('services', 'servicecategories'));
    }

    public function viewservicedetail($id)
    {
        $service = service::where('status', 'show')->find($id);
        $relatedservices = service::where('servicecategory_id', $service->servicecategory_id)->where('id', '!=', $id)->limit(4)->get();
        return view('viewservicedetail', compact('service', 'relatedservices'));
        //
    }

    public function categoryservice($id)
    {
        $category = servicecategory::find($id);

        $services = service::where('status', 'Show')->where('servicecategory_id', $id)->paginate(8);
        return view('categoryservice', compact('services', 'category'));
    }

    public function gallerypage()
    {
        $galleries = gallery::all();
        return view('gallerypage', compact('galleries'));
    }

    public function contactpage()
    {
        return view('contactpage');
    }
}
