<?php

namespace App\Repositories;

use App\Models\Cost;
use App\Repositories\BaseRepository;

/**
 * Class CostRepository
 * @package App\Repositories
 * @version January 11, 2023, 11:05 pm UTC
*/

class CostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cost::class;
    }
}
