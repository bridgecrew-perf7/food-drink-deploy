<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $primaryKey = "id";

    protected $fillable = [
        'image',
        'product_id',
        'STT',
        'status'
    ];

    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}