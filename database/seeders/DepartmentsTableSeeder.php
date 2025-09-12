<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'TI',
            'Recursos Humanos',
            'Financeiro',
            'Marketing',
            'Vendas',
            'Logística'
        ];

        foreach ($departments as $dept) {
            Department::create(['name' => $dept]);
        }
    }
}
