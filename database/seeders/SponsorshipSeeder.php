<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            [
                "duration" => "24 hours",
                "price" => 2.99
            ],
            [
                "duration" => "72 hours",
                "price" => 5.99
            ],
            [
                "duration" => "144 hours",
                "price" => 9.99
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship;
            $new_sponsorship->duration = $sponsorship['duration'];
            $new_sponsorship->price = $sponsorship['price'];
            $new_sponsorship->save();
        }
    }

}
