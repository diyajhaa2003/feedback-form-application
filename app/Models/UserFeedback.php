<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
      protected $fillable = [
        'user_id',
        'user_feedback_category_id',
    ];
    public function feedback_Category_id()
{
    return $this->belongsTo(FeedbackCategory::class,'user_feedback_category_id');
}

  
     public function user_info()
    {
            return $this->belongsTo(UserInfo::class, 'user_id');

    }
}
