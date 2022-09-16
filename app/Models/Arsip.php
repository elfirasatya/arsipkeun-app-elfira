<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\Category;

class Arsip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function file(){
        return $this->hasOne(File::class, 'id','file_id');
    }
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
