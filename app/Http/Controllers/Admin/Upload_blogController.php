<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Upload_blog;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;



class Upload_blogController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index() {
        
        $upload_blogs= Upload_blog::all();
        return view('admin.upload_blog.index',compact('upload_blogs'));
        
    
    }

     //__Uplpad create page__//
     public function create() {

        $category=Category::all();
        return view("admin.upload_blog.create",compact('category'));
        
    }

     //__Store Method___//
    public function store(Request $request) {

        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',         
            'description' => 'required',
        ]);
     
        $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug=STR::of($request->title)->slug('-');
        
        // $upload_blog=new Upload_blog;
        // $upload_blog->category_id= $request-> $categoryid;
        // $upload_blog->subcategory_id= $request->subcategory_id;
        // $upload_blog->title= $request->title;
        // $upload_blog->slug= $slug;
        // $upload_blog->post_date= $request->post_date;
        // $upload_blog->description= $request->description;
        // $upload_blog->user_id=Auth::user()->id;
        // $upload_blog->status= $request->status;
        // $upload_blog->image= $request->image;
        // $upload_blog->save();
            
        $data=array();
        $data['category_id'] =  $categoryid;
        $data['subcategory_id']=$request->subcategory_id;
        $data['title']=$request->title;
        $data['slug']= $slug;
        $data['post_date']=$request->post_date;
        $data['description']=$request->description;
        $data['user_id']=Auth::user()->id;
        $photo=$request->image;
        if( $photo){
            $photoname= $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,300)->save('public/media/'.$photoname);
            $data['image']= 'public/media/'.$photoname;
            
            DB::table('upload_blogs')->insert($data);
            $notification=array('meaasge' => 'Post Created', "alert-type" =>'success');
            return redirect()->back()->with($notification);
        
        
        }else{
            
            //__Without any image__//
            DB::table('upload_blogs')->insert($data);
            $notification=array('meaasge' => 'Post Created', "alert-type" =>'success');
            return redirect()->back()->with($notification);
        
        }
                        

    }


      //___Delete Method___//

      public function destroy($id) {
        
        $upload_blog=Upload_blog::find($id);
        if(File::exists($upload_blog->image)){
            File::delete($upload_blog->image);
        }
        $upload_blog->delete();
        $notification=array('meaasge' => 'Blog Delete', "alert-type" =>'success');
        return redirect()->back()->with($notification);
     }

         //___Edit method___//

public function edit($id)
{
    $category =Category::all();
    $upload_blog=Upload_blog::find($id);
    return view('admin.upload_blog.edit',compact('category',  'upload_blog' ));

}

//__Update Method__//

public function update(Request $request ,$id) {
    $validated = $request->validate([
        'subcategory_id' => 'required',
        'title' => 'required',         
        'description' => 'required',
    ]);
 
    $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
    $slug=STR::of($request->title)->slug('-');
   
        
    $data=array();
    $data['category_id'] =  $categoryid;
    $data['subcategory_id']=$request->subcategory_id;
    $data['title']=$request->title;
    $data['slug']= $slug;
    $data['post_date']=$request->post_date;
    $data['description']=$request->description;
    $data['user_id']=Auth::user()->id;
    $photo=$request->image;
    if( $photo){
        $photoname= $slug.'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(600,300)->save('public/media/'.$photoname);
        $data['image']= 'public/media/'.$photoname;
        
        DB::table('upload_blogs')->where('id',$id)->update($data);
        if(File::exists($request->old_image)){
            File::delete($request->old_image);
        }
        $notification=array('meaasge' => 'Post Created', "alert-type" =>'success');
        return redirect()->route('upload_blog.index')->with($notification);
    
    
    }else{
        $data['image']=$request->old_image;
        
        //__Without any image__//
        DB::table('upload_blogs')->insert($data);
        $notification=array('meaasge' => 'Post Created', "alert-type" =>'success');
        return redirect()->route('upload_blog.index')->with($notification);
    
    }
   
}


}
