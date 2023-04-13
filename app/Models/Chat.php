<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'specialist_id',
        'service_id',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chat()
    {
        return $this->belongsTo(User::class);
    }
}
