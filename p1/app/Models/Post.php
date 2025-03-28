<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        "title",
        "content",
        "user_id",
    ];
    protected $dates = ["created_at","updated_at", "deleted_at"];
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
