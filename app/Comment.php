<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
    ];

    public function user() {
    	return $this->belongsTo(User::class, 'author_id');
    }

    public function gallery() {
    	return $this->belongsTo(Gallery::class);
    }
}
