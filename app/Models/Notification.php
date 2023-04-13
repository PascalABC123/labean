<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'service_id',
        'type',
    ];

    public function sender() {
        return $this->belongsTo(User::class);
    }

    public function receiver() {
        return $this->belongsTo(User::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
