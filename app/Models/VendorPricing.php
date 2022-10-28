<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class VendorPricing extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table="costs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company',
        'item',
        'item_code',
        'item_code_2',
        'quantity',
        'item_cost',
        'cost_type',
        'unit_cost',
        'cost_2',
        'cost_3',



    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];
}
