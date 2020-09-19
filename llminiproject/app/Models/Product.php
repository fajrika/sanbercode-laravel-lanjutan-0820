<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Product extends Model
{
    use HasFactory,Uuid;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function order_details(){
        return $this->hasMany(Order_detail::class);
    }
}
