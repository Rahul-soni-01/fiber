<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'message','mark_as_read'];

    public function sender()
    {
        return $this->belongsTo(tbl_user::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(tbl_user::class, 'receiver_id');
    }
}
