<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow, SkipsOnError
{

    use Importable, SkipsErrors;

    public function model(array $row)
    {
        return new User([
            'name'  => $row['name'],
            'email' => $row['email'],
            'phone'    => $row['phone'],
            'password'    => $row['password'],
            'created_at'    => $row['created'],
            'updated_at'    => $row['updated'],
        ]);
    }
}
