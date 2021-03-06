<?php

namespace App\Models;

use App\Traits\Favoritable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable;

    public $with = ["creator"];
    public $appends = ["ago"];
    protected $fillable = ['user_id', 'thread_id', 'content'];

    public function creator()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }


}
