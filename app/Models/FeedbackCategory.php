<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackCategory extends Model
{
    protected $fillable = ['category_name'];

    public function feedbackquestion()
    {
    return $this->hasMany(FeedbackQuestion::class, 'feedback_Category_id', 'id');
    }
  
}
