<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersPropertiesImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        return new Property([
            'user_id' => $row['user_id'],
            'title' => $row['title'],
            'region_id' => $row['region_id'],
            'township_id' => $row['township_id'],
            'type' => $row['type'],
            'price' => $row['price'],
            'area' => $row['area'],
            'bed_room' => $row['bed_room'],
            'bath_room' => $row['bath_room'],
            'description' => $row['description'],
            'phone' => $row['phone'],
            'as_agent' => $row['as_agent'],
            'sale_rent' => $row['sale_rent'],
            'is_boosted' => $row['is_boosted'],
            'boost_exp_date' => $row['boost_exp_date'],
            'images' => $row['images'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}
