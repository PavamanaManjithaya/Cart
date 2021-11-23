<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\food;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function food(){
        return $this->hasOne(food::class,'category_id','id');
    }
}
