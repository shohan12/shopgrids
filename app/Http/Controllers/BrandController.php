<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brands;
    private $brand;
    
    public function index(Request $request){
        
        return view('admin.brand.add');
    }


    public function create(Request $request)
    {
        Brand::newBrand($request);
        return redirect()->back()->with('message', 'Brand info create successfully.');
    }
    public function manage()
    {
        $this->brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brand.manage', ['brands' => $this->brands]);
    }

    public function edit($id){
        $brand=brand::find($id);
        return view('admin.brand.edit',compact('brand'));
        
    }

    public function update(Request $request, $id){
        $brand=brand::updateBrand($request, $id);
        return redirect('/manage-brand')->with('message','brand info upadated successfully');
    }

    public function delete($id)
    {
        $this->brand = Brand::find($id);
        if (file_exists($this->brand->image))
        {
            unlink($this->brand->image);
        }
        $this->brand->delete();
        return redirect('/manage-brand')->with('message', 'brand info delete successfully.');
    }
    
}
