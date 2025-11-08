<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackAnswer extends Model
{
    protected $fillable=['feedback_question_id','answer','user_id'];

    public function feedback_questions()
    {
            return $this->belongsTo(FeedbackQuestion::class, 'feedback_question_id', 'id');

    }

     public function user_answer()
    {
            return $this->belongsTo(UserInfo::class, 'user_id', 'id');

    }
}
