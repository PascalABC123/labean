<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialization_id',
        'user_id',
        'header',
        'body',
        'min_price',
        'max_price',
        'deadline',
        'city',
    ];

    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
