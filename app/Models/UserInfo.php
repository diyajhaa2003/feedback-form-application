<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
   protected $fillable = [
        'username',
        'email',
    ];
   
    public function user_feedback()
    {
            return $this->hasMany(UserFeedback::class, 'user_id');

    }

     public function user_answer()
    {
            return $this->hasMany(FeedbackAnswer::class, 'user_id', 'id');

    }
}
