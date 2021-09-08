<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    use HasFactory;
    protected $table = "category_type";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Categories::class,'category_types_id');
    }

    public function products()
    {
      return $this->hasManyThrough(
        Product::class,Categories::class,'category_types_id','category_id'
        );
    }

    public function scopeSlug($query, $slug) {
        return $query->where('slug', $slug);
    }

    public function scopeCategoryTypeJoin($query)
    {
        return $query->join('categories','categories.category_types_id','=','category_type.id')
        ->join('products','products.category_id','=','categories.id')
        ->join('images','images.product_id','=','products.id');
    }

    public function scopeSelectProductByCategoryType($query)
    {
        return $query->select('products.id as id_product','products.name as name_product','categories.name as name_category',
        'images.image','products.amount_of','products.price','products.status as status_product');
    }

    public function scopewhereCategoryType($query,$id_categoryType)
    {
        return $query->where('categories.category_types_id',$id_categoryType)->where('images.STT',1);
    }

}
