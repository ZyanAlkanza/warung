<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    // protected $fillable = ['product_name'];
    
    protected $guarded = ['id'];
    
    public function categories(){
        return $this->belongsTo(Categories::class);
    }
}
