<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    public $incrementing = false;  // インクリメントIDを無効化
    public $timestamps = false; // update_at, created_at を無効化

    // Relation
    public function toUserId()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id');
    }
}
