<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $votes = [
            ['vote' => 'DPG', 'vote_value' => 1],
            ['vote' => 'Scadente', 'vote_value' => 2],
            ['vote' => 'Mediocre', 'vote_value' => 3],
            ['vote' => 'Efficiente', 'vote_value' => 4],
            ['vote' => 'Queen', 'vote_value' => 5],
        ];
        foreach ($votes as $vote) {
            $newvote= new Vote;
            $newvote->vote=$vote['vote'];
            $newvote->vote_value=$vote['vote_value'];
            
    
            $newvote->save();
        }
    }
}
