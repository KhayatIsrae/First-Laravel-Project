<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function idea(){
        return $this->hasmany(idea::class);
    }
    public function comments(){
        return $this->hasmany(comment::class);
    }
    public function followings(){
        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id');
    }
    public function followers(){
        return $this->belongsToMany(User::class,'follower_user','user_id','follower_id');
    }
    public function follows(User $user){
        return $this->followings()->where('user_id',$user->id)->exists();
    }
    public function likes(){
        return $this->belongstomany(idea::class,'idea_like')->withTimestamps();
    }
    public function likesPost(idea $idea){
        return $this->likes()->where('idea_id',$idea->id)->exists();
    }
    public function getImageURL(){
        if($this->image){
            return url('storage/'. $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed= {{ $this->name }}";
    }
    public function Stories(){
        return $this->hasmany(story::class);
    }
    public function hasStories(){
        if($this->Stories()->exists()){
            return true;
        }else{
            return false;
        }
    }
}
