<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\subcategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $Categories;
    private $Category;
    private $subCategory;
    private $subCategories;

    public function index(){
         $this->Categories=Category::all();
        return view('admin.subcategory.add',['categories'=>$this->Categories]);
    }

    public function create(Request $request){
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('message', 'Sub category info create successfully.');
    }
  
    public function manage(){
        
        $this->subCategories=subCategory::orderby('id', 'desc')->get();
        return view('admin.subcategory.manage',['subcategories'=>$this->subCategories]);
    }

    public function edit($id){
        $this->subCategory = subcategory::find($id);
        $this->Categories=Category::all();
        return view('admin.subcategory.edit',
        ['subcategory'=>$this->subCategory,
         'categories'=>$this->Categories
    ]);
       }  
   
       public function update(Request $request, $id){
       subcategory::updateSubCategory($request, $id);
       return redirect('/manage-sub-category')->with('message','sub category info created successfully');
   
    }

    public function delete(Request $request, $id)
    {
        subcategory::deleteSubCategory($id);
        return redirect('/manage-sub-category')->with('message', 'Sub category info delete successfully.');
    }

    

}
  