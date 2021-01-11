<?php

namespace App\Imports;

use App\Models\UserPoint;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersPointImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        return new UserPoint([
            'user_id'  => $row['userid'],
            'points' => $row['points'],
            'created_at'    => $row['created'],
            'updated_at'    => $row['updated'],
        ]);
    }
}
