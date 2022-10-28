<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InfoFromImport implements ToCollection, WithMultipleSheets
{
/**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    function sheets(): array
    {
        return [
            0 => $this,
            1 => $this,
        ];
    }
    public function collection(Collection $rows)
    {


    }

}
