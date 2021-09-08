<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use DB;
// use Laravel\Scout\Searchable;

class Product extends Model
{
    // use HasFactory,Searchable;
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'amount_of',
        'price',
        'content',
        'slug',
        'status'
    ];

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class,'product_id');
    }

    public function evaluates()
    {
        return $this->hasMany(Evaluates::class,'product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class,'product_id');
    }

    // public function searchableAs()
    // {
    //     return "products";
    // }

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();
    //     return $array;
    // }
    
    public function product_tag()
    {
        return $this->hasMany(Product_Tag::class,'product_id');
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeSearchName($query, $keyword)
    {
        return $query->where('products.name', 'like', '%' . $keyword . '%')->conditionProduct();
    }

    public function scopeProductDetail($query, $slug)
    {
        return $query->where('products.slug', '=', $slug)->conditionProduct();

    }

    public function scopeDecrementProduct($query, $productId, $quantity)
    {
        return $query->find($productId)->decrement('amount_of', $quantity);
    }

    public function scopeFindName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function scopeConditionProduct($query) {
        return $query->where('products.amount_of', '>', '0')
            ->where('products.status', '=', Status::ACTIVE)
            ->whereHas('categories', function ($query_categories) {
                $query_categories->where('categories.status', '=', Status::ACTIVE);
            });
    }

    public function scopeJoinTagSearchProduct($query)
    {
        return $query->join('product_tag','products.id','=','product_tag.product_id')
        ->join('tags','product_tag.tag_id','=','tags.id')
        ->join('images','images.product_id','=','products.id');
    }

    public function scopeWhereTagImage($query,$slug)
    {
        return $query->where('images.STT', 1)->where('tags.slug', $slug);
    }

    public function scopeSelectSearchProductByTag($query)
    {
        return $query->select('products.id as id_product','products.name as name_product','images.image','products.price',
        'products.created_at','products.slug as slug_product');
    }

    public function scopeProductJoin($query)
    {
        return $query->join('categories','categories.id','=','products.category_id')->join('images','product_id','=','products.id');
    }

    public function scopeSelectProduct($query)
    {
        return $query->select('products.id as id_product','products.name as name_product','categories.name as name_category',
        'images.image','products.amount_of','products.price','products.status as status_product')
        ->where('images.STT',1);
    }

    public function scopeSelectProductByCategory($query,$id_category)
    {
        return $query->select('products.id as id_product','products.name as name_product','categories.name as name_category',
        'images.image','products.amount_of','products.price','products.status as status_product')
        ->where('products.category_id',$id_category)
        ->where('images.STT',1);
    }

    public function scopeIncrementProduct($query, $productId, $quantity)
    {
        return $query->where('id', '=', $productId)->increment('amount_of', $quantity);
    }

    public function scopeJoinOrderProductAndImage($query)
    {
        return $query->join('order_product','products.id','=','order_product.product_id')
        ->join('images','images.product_id','=','products.id');
    }

    public function scopeSelectProductOrder($query)
    {
        return $query->select('products.id as id_product','products.name','images.image','products.price',
        'order_product.amount_of as amount_of_product','order_product.total_money');
    }

    public function scopeWhereProductOrder($query,$id_order)
    {
        return $query->where('order_product.order_id',$id_order)->where('images.STT',1);
    }

    public function scopeProductJoinOrderProduct($query)
    {
        return $query->join('order_product','products.id','=','order_product.product_id');
    }

    public function scopeWhereProduct($query,$time)
    {
        return $query->where('order_product.created_at','like','%'.$time.'%');
    }

    public function scopeSelectProducOrder($query)
    {
        return $query->selectRaw('sum(order_product.amount_of) as amount_of_order')
        ->groupBy('order_product.product_id')
        ->orderBy('amount_of_order','desc')
        ->limit(5);
    }

    public function scopeSelectProducName($query)
    {
        return $query->selectRaw('sum(order_product.amount_of) as amount_of_order','products.name as name_product')
        ->groupBy('order_product.product_id')
        ->orderBy('amount_of_order','desc')
        ->limit(5);
    }
}
