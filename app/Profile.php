<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/noavatar.png';
        return '/storage/' . $imagePath;
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);   
    }
    public function user() // na osnovu spoljnog kljuca u bazi (user_id) on ce ovde znati da poveze Profile i User-a
    {
        return $this->belongsTo(User::class);
    }
    
}
