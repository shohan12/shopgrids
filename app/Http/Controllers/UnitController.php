<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return view('admin.unit.add');
    }
    public function create(Request $request)
    {
        Unit::newUnit($request);
        return redirect()->back()->with('message', 'Unit info create successfully.');
    }
    public function manage()
    {
        $this->units = Unit::orderBy('id', 'desc')->get();
        return view('admin.unit.manage', ['units' => $this->units]);
    }

    public function edit($id){
        $unit=unit::find($id);
        return view('admin.unit.edit',compact('unit'));
        
    }

    public function update(Request $request, $id){
        $unit=Unit::updateBrand($request, $id);
        return redirect('/manage-unit')->with('message','unit info upadated successfully');
    }

    public function delete($id)
    {
        $this->brand = Unit::find($id);
        if (file_exists($this->brand->image))
        {
            unlink($this->brand->image);
        }
        $this->brand->delete();
        return redirect('/manage-brand')->with('message', 'brand info delete successfully.');
    }
}
