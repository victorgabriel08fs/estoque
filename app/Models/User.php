<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'permission_end_at',
        'avatar',
        'phone',
    ];

    protected $casts = [
        'permission_end_at' => 'date',
    ];


    public function active()
    {
        return $this->permission_end_at->endOfDay()->greaterThanOrEqualTo(now());
    }
}
