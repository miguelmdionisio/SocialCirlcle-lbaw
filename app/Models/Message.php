<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Message extends Model
{
    public $timestamps  = false;
    protected $table = 'usermessage';
    protected $primaryKey = 'messageid';

    protected $fillable = [
        'sourceid',
        'targetid',
        'sent_at',
        'message'
    ];

    public function sender() {
        return User::find($this->sourceID);
    }

    public function receiver() {
        return User::find($this->targetID);
    }

    public function date() {
        return $this->sent_at;
    }
   
}