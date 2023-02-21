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
        'item_code_2',
        'quantity',
        'item_cost',
        'cost_type',
        'unit_cost',
        'extra_cost_2',
        'extra_cost_3'
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
        'item_code_2' => 'string',
        'quantity' => 'integer',
        'item_cost' => 'decimal:2',
        'cost_type' => 'string',
        'unit_cost' => 'decimal:2',
        'extra_cost_2' => 'decimal:2',
        'extra_cost_3' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
