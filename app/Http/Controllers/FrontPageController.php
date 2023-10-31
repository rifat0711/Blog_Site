<?php

namespace App\Http\Controllers;

use App\Models\Upload_blog;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
  
        public function index() {
        
            $posts= Upload_blog::all();
            return view('welcome',compact('posts'));
            
        
        }
        
    
}
