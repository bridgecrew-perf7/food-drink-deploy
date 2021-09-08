<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Tag extends Model
{
    use HasFactory;

    protected $table = "product_tag";
    protected $primaryKey = "id";
    protected $fillable = [
        'product_id','tag_id'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }

    public function scopeJoinTag($query)
    {
        return $query->join('tags','tags.id','=','product_tag.tag_id');
    }

    public function scopeWhereProductTag($query,$id_product)
    {
        return $query->where('product_tag.product_id',$id_product);
    }

    public function scopeSelectTag($query)
    {
        return $query->select('tags.id as id_tag','tags.name');
    }
}
