<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Cache;
use Illuminate\Support\str;

class CategoryController extends Controller
{
    //__Index method__//
    public function index() {
        //__Query bilder__//
        // $category=DB::table('categories')->get();

        //__Eloquent__//
        $category=Category::all();
        return view('admin.category.index',compact('category'));

        //__Collection of laravel___//
        // $average= collect([1 , 1, 2, 4])->avg();
        // return $average;
        // $collection= collect([1,2,3,4,5,6,7,8,9]);
        // $chanks= $collection->$chunk(5);

        $posts=Cache::remember('posts',15,function(){
            return Category::all();

        });

    
    }

    //__Create Method___//

    public function create() {
        return view('admin.category.create');
    
    }

    //__Store Method___//

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request) {
        //return view('admin.category.store');
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ]);

        // //___Insert method___//
        // Category::insert([
        //     'category_name' =>$request->category_name,
        //     'category_slug' =>Str::of($request->category_name)->slug('-'),

        // ]);



        //Save method
        $category=new Category;
        $category->category_name= $request->category_name;
        // $category->category_name= setAttribute($request->category_name);
        $category->category_slug= Str::of($request->category_name)->slug('-');
        $category->save();

        return redirect()->back();
    
    }

    //___Edit Method___//
    public function edit($id) {
        //return $id;
        //$data=DB::table('categories')->where('id',$id)->first();
        $data= Category::find($id);
        return view('admin.category.edit',compact('data'));
    }

    //__Update Method__//

    public function update(Request $request ,$id) {
        $category= Category::find($id);
        // $category->update([
        //     'category_name' =>$request->category_name,
        //     'category_slug' =>Str::of($request->category_name)->slug('-'),
    
        // ]);
        $category->category_name= $request->category_name;
        $category->category_slug= Str::of($request->category_name)->slug('-');
        $category->save();

        return redirect()->route('category.index');

    }

    public function destroy($id) {
        //__Query bilder__//
       // DB::table('categories')->where('id',$id)->delete();
       $category = Category::find($id);
       $category->delete();
       //$category->destroy();
        return redirect()->back();
    }



}
