<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Federico Rossi",
                "email" => "federicorossi@gmail.com"
            ],
            [
                "name" => "Giulia Bianchi",
                "email" => "giuliabianchi@gmail.com"
            ],
            [
                "name" => "Luca Moretti",
                "email" => "lucamoretti@gmail.com"
            ],
            [
                "name" => "Martina Ferrari",
                "email" => "martinaferrari@gmail.com"
            ],
            [
                "name" => "Nicola De Santis",
                "email" => "nicoladesantis@gmail.com"
            ],
            [
                "name" => "Bob Marley",
                "email" => "bobmarley@gmail.com"
            ],
            [
                "name" => "Francesco Buonanimo",
                "email" => "francescobuonanimo@gmail.com"
            ],
            [
                "name" => "Davide Salerno",
                "email" => "davidesalerno@gmail.com"
            ],
            [
                "name" => "Eva Francellini",
                "email" => "evafrancellini@gmail.com"
            ],
            [
                "name" => "Giulia Cavalieri",
                "email" => "giuliacavalieri@gmail.com"
            ],
            [
                "name" => "Olivia Romano",
                "email" => "oliviaromano@gmail.com"
            ],
            [
                "name" => "Paola Esposito",
                "email" => "paolaesposito@gmail.com"
            ],
            [
                "name" => "Quirino Martini",
                "email" => "quirinomartini@gmail.com"
            ],
            [
                "name" => "Rosa Marchetti",
                "email" => "rosamarchetti@gmail.com"
            ],
            [
                "name" => "Salvatore Ricci",
                "email" => "salvatorericci@gmail.com"
            ],
            [
                "name" => "Teresa Morelli",
                "email" => "teresamorelli@gmail.com"
            ],
            [
                "name" => "Umberto Rossi",
                "email" => "umbertorossi@gmail.com"
            ],
            [
                "name" => "Valentina De Lellis",
                "email" => "valentinadelellis@gmail.com"
            ],
            [
                "name" => "Walter White",
                "email" => "walterwhite@gmail.com"
            ],
            [
                "name" => "Nello Taver",
                "email" => "nellotaver@gmail.com"
            ],
        ];

    foreach ($users as $user) {
        $newuser= new User;
        $newuser->name=$user['name'];
        $newuser->email=$user['email'];
        $newuser->password = Hash::make('password');

        $newuser->save();
    }
}
}
