<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Realestate;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
        'role'
    ];

    public function realestates()
    {
        return $this->hasMany(Realestate::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($account) {
            $account->realestates()->delete();
        });
    }
}
