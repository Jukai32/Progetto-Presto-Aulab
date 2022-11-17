<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['firstName', 'lastName', 'address', 'phone', 'city', 'country', 'zipCode', 'img', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
