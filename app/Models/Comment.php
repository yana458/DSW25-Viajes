<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
     protected $fillable = ['activity_id', 'commentText', 'author'];

    public $timestamps = false;

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}
