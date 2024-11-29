<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'content',
        'likes'
    ];

    public function comments(){
        return $this->hasmany(comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($q,$input){
        if(isset($input['search']) && !empty($input['search'])){
            $q->where('content','like','%'.$input['search'].'%');
        }

        return $q;
    }
    public function likes(){
        return $this->belongstomany(user::class,'idea_like')->withTimestamps();
    }
}
