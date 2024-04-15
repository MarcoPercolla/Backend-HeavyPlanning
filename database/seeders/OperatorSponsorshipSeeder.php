<?php

namespace Database\Seeders;

use App\Models\Operator;
use App\Models\OperatorSponsorship;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatorSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operators_sponsorships = [
            [
                "operator_id" => 1,
                "sponsorship_id" => 1,
            ],
            [
                "operator_id" => 2,
                "sponsorship_id" => 2,
            ],
            [
                "operator_id" => 3,
                "sponsorship_id" => 3,
            ],
            [
                "operator_id" => 4,
                "sponsorship_id" => 1,
            ],
            [
                "operator_id" => 5,
                "sponsorship_id" => 2,
            ],
            [
                "operator_id" => 6,
                "sponsorship_id" => 3,
            ]
        ];

        date_default_timezone_set('Europe/Rome');

        for($i=0; $i<sizeof($operators_sponsorships); $i++){
            $date = date("Y-m-d H:i:s");
            $sponsorship = Sponsorship::find($operators_sponsorships[$i]["sponsorship_id"]);
            $duration = $sponsorship->duration;
            $object_date = date_create($date);
            $result = date_add($object_date, date_interval_create_from_date_string($duration));

            $operator = Operator::find($operators_sponsorships[$i]["operator_id"]);
            $operator->sponsorships()->attach($operators_sponsorships[$i]["sponsorship_id"], [
                "start_date" => $date,
                "end_date" => $result
            ]);
        }
    }
}
