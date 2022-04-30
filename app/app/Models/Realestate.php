<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realestate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'adress',
        'breadth',
        'floor_plan',
        'tenancy_status'
    ];

    public function accounts()
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeSearch($query)
    {
    }
}
