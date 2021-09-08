<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = "notifications";
    protected $primaryKey = "id";

    protected $fillable = [
        'user_id',
        'content',
    ];
    
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
