<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cost
 * @package App\Models
 * @version January 11, 2023, 11:05 pm UTC
 *
 * @property string $company
 * @property string $item
 * @property string $item_code
 * @property string $item_code_2
 * @property integer $quantity
 * @property number $item_cost
 * @property string $cost_type
 * @property number $unit_cost
 * @property number $extra_cost_2
 * @property number $extra_cost_3
 */
class Cost extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'costs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



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
        'company' => 'required|string|max:255',
        'item' => 'nullable|string|max:1020',
        'item_code' => 'required|string|max:255',
        'item_code_2' => 'nullable|string|max:255',
        'quantity' => 'required|integer',
        'item_cost' => 'required|numeric',
        'cost_type' => 'required|string|max:255',
        'unit_cost' => 'nullable|numeric',
        'extra_cost_2' => 'nullable|numeric',
        'extra_cost_3' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
