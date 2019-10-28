<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id', 'billing_address', 'shipping_address', 'mobile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
