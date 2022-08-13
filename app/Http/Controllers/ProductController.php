<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\subcategory;
use App\Models\Brand;
use App\Models\OtherImage;
use App\Models\Unit;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public $product;
   public $products;
   public $categoryId;
   public $subCategories;

    public function index(){
        return view('admin.product.add',[
            'categories'=>category::all(),
            'subcategories'=>subcategory::all(),
            'brands'=>brand::all(),
            'units'=>unit::all(),

        ]);
    }

    

    public function create(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request, $this->product->id);
        return redirect()->back()->with('message', 'Product info create successfully.');
    }

    public function getSubCategory()
    {
        $this->categoryId       = $_GET['bitm'];
        $this->subCategories    = SubCategory::where('category_id', $this->categoryId)->get();
        return response()->json($this->subCategories);
    }
    public function manage()
    {
        return view('admin.product.manage', [
            'products' => Product::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($id)
    {
        $this->product = Product::find($id);
        return view('admin.product.detail', ['product' => $this->product]);
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'categories'        => Category::all(),
            'subcategories'    => subcategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
            'product'           => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        if ($request->file('other_image'))
        {
            OtherImage::updateOtherImage($request, $id);
        }
        return redirect('/manage-product')->with('message', 'Product info update successfully.');
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect('/manage-product')->with('message', 'Product info delete successfully.');
    }
   
    

    
}
