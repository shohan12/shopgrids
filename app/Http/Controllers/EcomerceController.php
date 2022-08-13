<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class EcomerceController extends Controller
{
    private $categories;
    private $products;
    private $product;
    
    public function index()
    {
        $this->products = Product::orderBy('id', 'desc')->take(8)->get();
        return view('front.home.home', [
            'products'  => $this->products
        ]);
    }

    public function categoryProduct($id)
    {
        $this->products = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.categoryproduct', ['products' => $this->products]);
    }


    public function subcategoryProduct($id)
    {
        $this->products = Product::where('subcategory_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.subcategoryproduct', ['products' => $this->products]);
    }

     public function productDetail($id)
     {
         $this->product = Product::find($id);
         return view('front.product.detail', ['product' => $this->product]);
     }

   

     
 

}
