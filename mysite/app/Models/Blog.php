<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        "title","description","user_id",
    ];

    public function isAuthor($id){
        return $this->user->id == $id;
    }
    public function user(){
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class,'user_id','id'). same(class, foreign_key_in_this_class, this_class_key).

    }
}
