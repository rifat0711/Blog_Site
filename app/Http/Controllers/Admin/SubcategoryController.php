<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use DB;
use Illuminate\Support\Str;


class SubcategoryController extends Controller
{
    //___Create Method____//

    public function index() {
        //__Query bilder__//
        // $category=DB::table('categories')->get();


        // $data= DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories_id')->get();
        // return response()->json($data);
        // dd($data);
        //$data= DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')->select('categories.category_name','subcategories.*')->get();
        //dd($data);
        $data= Subcategory::all();
        return view('admin.subcategory.index',compact('data'));
        
        //return response()->json($data);

        //__Eloquent__//
        // $subcategory=Subcategory::all();
        // return view('admin.subcategory.index',compact('subcategory'));
    
    }
    public function create() {
        $categories=Category::all();
        return view('admin.subcategory.create',compact('categories'));
    
        
    }
    //__Store Method___//
    public function store(Request $request) {
        //return view('admin.category.store');
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);
        $subcategory=new Subcategory;
        $subcategory->category_id= $request->category_id;
        $subcategory->subcategory_name= $request->subcategory_name;
        $subcategory->subcategory_slug= Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        $notification=array('meaasge' => 'Sub Category Inserted', "alert-type" =>'success');
        return redirect()->back()->with($notification);
   

    }

    //___Delete Method___//

    public function destroy($id) {
        
       Subcategory::destroy($id);
       $notification=array('meaasge' => 'Sub Category Delete', "alert-type" =>'success');
       return redirect()->back()->with($notification);
    }

    //___Edit method___//

public function edit($id)
{
    $categories =Category::all();
    $data=Subcategory::find($id);
    return view('admin.subcategory.edit',compact('categories','data'));

}

 //__Update Method__//

 public function update(Request $request ,$id) {
    $subcategory= Subcategory::find($id);
    $subcategory->category_id= $request->category_id;
    $subcategory->subcategory_name= $request->subcategory_name;
    $subcategory->subcategory_slug= Str::of($request->subcategory_name)->slug('-');
    $subcategory->save();
    $notification=array('meaasge' => 'Sub Category Update', "alert-type" =>'success');
    return redirect()->route('subcategory.index')->with($notification);

}

 



}