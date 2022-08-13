<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
    private $category;
    
    public function index(){
        return view('admin.category.add');
    }

  public function create(Request $request){
     Category::newCategory($request);
     return redirect()->back()->with('message','category created successfully.');

  }


    public function manage(){
        $this->categories=Category::orderby('id','desc')->get();
        return view('admin.category.manage',['categories'=>$this->categories]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id){
        Category::updateCategory($request, $id);
        return redirect('/manage-category')->with('category info update succesfully');
    }

    public function delete($id)
    {
        $this->category = Category::find($id);
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);
        }
        $this->category->delete();
        return redirect('/manage-category')->with('message', 'Category info delete successfully.');
    }
}
