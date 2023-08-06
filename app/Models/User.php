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
        'password',
        'type',
        'phone',
    ];

    protected $casts = [
        'permission_end_at' => 'date',
    ];

    public function scopeSearch($query, $request)
    {
        return $query->when(isset($request->name), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->name . '%');
        })->when(isset($request->email), function ($query) use ($request) {
            return $query->where('email', 'like', '%' . $request->email . '%');
        })->when(isset($request->status), function ($query) use ($request) {
            return $query->whereDate('permission_end_at', ($request->status == 'true' ? '>=' : '<'), now());
        });
    }

    public function active()
    {
        return $this->permission_end_at->endOfDay()->greaterThanOrEqualTo(now());
    }

    static function createPassword()
    {
        return 'password';
    }
}
