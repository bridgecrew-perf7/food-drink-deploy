<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluates extends Model
{
    use HasFactory;
    protected $table = "evaluates";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function scopeGetWithProducts($query, $rating)
    {
        $query->selectRaw('product_id')->groupBy('product_id')->havingRaw("AVG(rating) >= " . $rating);
    }

    public function scopeByProductId($query, $productId)
    {
        $query->where('product_id', '=', $productId);
    }

    public function scopeByUserId($query, $userId)
    {
        $query->where('user_id', '!=', $userId);
    }
}
