<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number_Of_Search extends Model
{
    use HasFactory;

    protected $table = "number_of_search";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
