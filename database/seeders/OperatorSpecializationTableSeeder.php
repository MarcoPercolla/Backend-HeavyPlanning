<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatorSpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operator = Operator::find(1);
        $operator->specializations()->sync([1, 2]);

        $operator = Operator::find(2);
        $operator->specializations()->sync([12, 6]);

        $operator = Operator::find(3);
        $operator->specializations()->sync([2, 12]);

        $operator = Operator::find(4);
        $operator->specializations()->sync([3, 6]);

        $operator = Operator::find(5);
        $operator->specializations()->sync([13, 14]);

        $operator = Operator::find(6);
        $operator->specializations()->sync([2, 4]);

        $operator = Operator::find(7);
        $operator->specializations()->sync([3, 7]);

        $operator = Operator::find(8);
        $operator->specializations()->sync([13, 15]);

        $operator = Operator::find(9);
        $operator->specializations()->sync([1, 8]);

        $operator = Operator::find(10);
        $operator->specializations()->sync([4, 15]);

        $operator = Operator::find(11);
        $operator->specializations()->sync([6, 7, 9]);

        $operator = Operator::find(12);
        $operator->specializations()->sync([13, 14, 12]);

        $operator = Operator::find(13);
        $operator->specializations()->sync([5, 2, 12]);

        $operator = Operator::find(14);
        $operator->specializations()->sync([3, 10]);

        $operator = Operator::find(15);
        $operator->specializations()->sync([3, 2]);

        $operator = Operator::find(16);
        $operator->specializations()->sync([1, 6, 9]);

        $operator = Operator::find(17);
        $operator->specializations()->sync([14, 5]);

        $operator = Operator::find(18);
        $operator->specializations()->sync([12, 11]);

        $operator = Operator::find(19);
        $operator->specializations()->sync([11, 8]);

        $operator = Operator::find(20);
        $operator->specializations()->sync([4]);
    }
}
