<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fooditem;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function food(){
        return $this->hasOne(Fooditem::class,'category_id','id');
    }
}


