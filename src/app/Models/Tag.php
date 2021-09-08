<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use DB;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tags";
    protected $primaryKey = "id";

    protected $fillable = [
        'id','name','slug','number_of_search','status'
    ];

    protected $guarded = [];

    public function product_tag()
    {
        return $this->hasMany(Product_Tag::class,'tag_id');
    }

    public function number_of_search()
    {
        return $this->hasMany(Number_Of_Search::class,'tag_id');
    }

    public function scopeSlug($query, $slug) {
        return $query->where('slug', $slug);
    }

    public function scopeStatusTag($query)
    {
        return $query->where('status', '=', Status::ACTIVE)->inRandomOrder()->limit(5);
    }

    public function scopeJoinNumberOfSearch($query)
    {
        return $query->join('number_of_search','number_of_search.tag_id','=','tags.id');
    }

    public function scopeSelectIndexTag($query)
    {
        return $query->select('tags.name','number_of_search.number_of_search');
    }

    public function scopeSelectSearchTag($query)
    {
        return $query->select('tags.name','number_of_search.number_of_search',
        DB::raw('sum(number_of_search.number_of_search) as number_of_search_tag'));
    }

    public function scopeWhereCreatedAt($query,$time)
    {
        return $query->where('number_of_search.created_at','like','%'.$time.'%')
        ->orderBy('number_of_search.number_of_search','desc');
    }

    public function scopeWhereBetweenCreatedAt($query,$start_week,$end_week)
    {
        return $query->whereBetween('number_of_search.created_at',[$start_week,$end_week])
        ->orderBy('number_of_search.number_of_search','desc');
    }
}
