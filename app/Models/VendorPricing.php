<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class VendorPricing
 * @package App\Models
 * @version January 11, 2023, 11:29 pm UTC
 *
 * @property string $company
 * @property string $item
 * @property string $item_code
 * @property integer $quantity
 * @property number $item_cost
 * @property string $cost_type
 * @property number $unit_cost
 * @property string $created_at
 * @property string $updated_at
 */
class VendorPricing extends Model
{


    public $table = 'costs';
    



    public $fillable = [
        'company',
        'item',
        'item_code',
        'quantity',
        'item_cost',
        'cost_type',
        'unit_cost',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company' => 'string',
        'item' => 'string',
        'item_code' => 'string',
        'quantity' => 'integer',
        'item_cost' => 'decimal:2',
        'cost_type' => 'string',
        'unit_cost' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
