<?php

namespace Database\Seeders;

use App\Models\AccountGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'group_name' => 'CASH-IN-HAND',
                'group_type' => 'default'
            ],
            [
                'group_name' => 'SUNDRY DEBTORS',
                'group_type' => 'default'
            ],
            [
                'group_name' => 'SUNDRY CRETORS',
                'group_type' => 'default'
            ],
            [
                'group_name' => 'EXPENSES',
                'group_type' => 'default'
            ],
            [
                'group_name' => 'INCOME',
                'group_type' => 'default'
            ],
            [
                'group_name' => 'PURCHASE ACCOUNT',
                'group_type' => 'default'
            ],
            [
                'group_name' => 'SALES CENTRAL',
                'group_type' => 'default'
            ],
        ];
        AccountGroup::insert($data);
    }
}
