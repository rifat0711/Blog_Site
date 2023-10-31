<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
class Upload_blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'title',
        'slug',
        'post_date',
        'image',
        'description',    
    ];
    //__Join with Category__//
    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }
    //__Join with Category__//
    public function subcategory(){

        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    //__Join with User__//
    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }


}
