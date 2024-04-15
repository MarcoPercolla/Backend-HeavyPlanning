<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'operator_id' => 1,
                'vote_id' => 5,
                'comment' => 'Servizio eccezionale! Consiglio vivamente.',
                'author' => 'Luca',
                'user_email' => 'Luca@example.com',

            ],
            [
                'operator_id' => 2,
                'vote_id' => 3,
                'comment' => 'Buona esperienza complessiva. Potrebbe migliorare in alcune aree.',
                'author' => 'marco',
                'user_email' => 'marco@example.com',

            ],
            [
                'operator_id' => 2,
                'vote_id' => 4,
                'comment' => 'Un artista stupefacente.',
                'author' => 'piero',
                'user_email' => 'piero@example.com',

            ],
            [
                'operator_id' => 3,
                'vote_id' => 5,
                'comment' => 'Mai sentito nulla di simile.',
                'author' => 'francesca',
                'user_email' => 'francesca@example.com',

            ],
            [
                'operator_id' => 3,
                'vote_id' => 5,
                'comment' => 'Solo una parola: SPETTACOLARE.',
                'author' => 'irene',
                'user_email' => 'irene@example.com',

            ],
            [
                'operator_id' => 4,
                'vote_id' => 1,
                'comment' => 'UNA CAMPANA STONATA.',
                'author' => 'Maria de Filippi',
                'user_email' => 'Mdfmediaset@example.com',

            ],
            [
                'operator_id' => 4,
                'vote_id' => 1,
                'comment' => 'Mi vergogno io per loro.',
                'author' => 'gennaro',
                'user_email' => 'gennaro@example.com',

            ],
            [
                'operator_id' => 6,
                'vote_id' => 3,
                'comment' => 'Servizio eccezionale.',
                'author' => 'mario',
                'user_email' => 'mario@example.com',

            ],
            [
                'operator_id' => 5,
                'vote_id' => 3,
                'comment' => 'Buona esperienza complessiva.',
                'author' => 'gordon',
                'user_email' => 'gordon@example.com',

            ],
            [
                'operator_id' => 6,
                'vote_id' => 3,
                'comment' => 'ti offre cio che promette.',
                'author' => 'Valerio',
                'user_email' => 'valerio@example.com',

            ],
            [
                'operator_id' => 5,
                'vote_id' => 4,
                'comment' => "Non vedo l'ora di poterli risentire.",
                'author' => 'daniela',
                'user_email' => 'daniela@example.com',

            ],
            [
                'operator_id' => 4,
                'vote_id' => 1,
                'comment' => 'Mai Piu.',
                'author' => 'Mohammed',
                'user_email' => 'Mohammed@example.com',

            ],
            [
                'operator_id' => 7,
                'vote_id' => 2,
                'comment' => 'spero abbassino i prezzi, non valgono quanto pensano.',
                'author' => 'Pasquale',
                'user_email' => 'pasquale@example.com',

            ],
            [
                'operator_id' => 8,
                'vote_id' => 4,
                'comment' => 'super professionali.',
                'author' => 'Diletta',
                'user_email' => 'Diletta@example.com',

            ],
            [
                'operator_id' => 8,
                'vote_id' => 4,
                'comment' => 'mi è piaciuto moltissimo nella seconda parte dello spettacolo.',
                'author' => 'Rachele',
                'user_email' => 'rachele@example.com',

            ],
            [
                'operator_id' => 9,
                'vote_id' => 5,
                'comment' => 'Una Rockstar.',
                'author' => 'Michele',
                'user_email' => 'michele@example.com',

            ],
            [
                'operator_id' => 9,
                'vote_id' => 4,
                'comment' => 'Non mi sarei aspettato tanto a questo prezzo.',
                'author' => 'Riccardo',
                'user_email' => 'riccardo@example.com',

            ],
            [
                'operator_id' => 10,
                'vote_id' => 4,
                'comment' => 'Consigliato.',
                'author' => 'Federico',
                'user_email' => 'federico@example.com',

            ],
            [
                'operator_id' => 10,
                'vote_id' => 5,
                'comment' => 'Che voce.',
                'author' => 'Francesca',
                'user_email' => 'francesca@example.com',

            ],
            [
                'operator_id' => 7,
                'vote_id' => 1,
                'comment' => 'Una truffa praticamente, avrei pagato di nuovo per farlo smettere.',
                'author' => 'fabio',
                'user_email' => 'fabio@example.com',

            ],
            [
                'operator_id' => 11,
                'vote_id' => 5,
                'comment' => 'leggendari.',
                'author' => 'vanessa',
                'user_email' => 'vanessa@example.com',

            ],
            [
                'operator_id' => 12,
                'vote_id' => 3,
                'comment' => 'senza infamia e senza lode.',
                'author' => 'mauro',
                'user_email' => 'mauro@example.com',

            ],
            [
                'operator_id' => 12,
                'vote_id' => 3,
                'comment' => 'molto professionale.',
                'author' => 'virginia',
                'user_email' => 'virginia@example.com',

            ],
            [
                'operator_id' => 11,
                'vote_id' => 4,
                'comment' => 'mi è piaciuto molto e ha un gran carattere.',
                'author' => 'maurizio',
                'user_email' => 'maurizio@example.com',

            ],
            [
                'operator_id' => 13,
                'vote_id' => 2,
                'comment' => 'Nota dolente, non si riusciva a sentire nulla da dietro, ti do due stelle anziche una a fiducia ma non ho sentito neanche un momento la tua voce.',
                'author' => 'mirko',
                'user_email' => 'mirko@example.com',

            ],
            [
                'operator_id' => 15,
                'vote_id' => 5,
                'comment' => 'Il miglior concerto della mia vita.',
                'author' => 'veronica',
                'user_email' => 'veronica@example.com',

            ],
            [
                'operator_id' => 14,
                'vote_id' => 1,
                'comment' => 'antipatico, altezzoso e ubriaco sul palco.',
                'author' => 'pierina',
                'user_email' => 'pierina@example.com',

            ],
            [
                'operator_id' => 14,
                'vote_id' => 1,
                'comment' => 'Fai pena, cambia mestiere.',
                'author' => 'Lorenzo',
                'user_email' => 'lorenzo@example.com',

            ],
            [
                'operator_id' => 15,
                'vote_id' => 5,
                'comment' => 'la sua presenza scenica è quella di un grande della scena internazionale.',
                'author' => 'Loredana',
                'user_email' => 'loredana@example.com',

            ],
            [
                'operator_id' => 13,
                'vote_id' => 3,
                'comment' => 'ne carne ne pesce.',
                'author' => 'Ada',
                'user_email' => 'Ada@example.com',

            ],
            [
                'operator_id' => 15,
                'vote_id' => 4,
                'comment' => 'che suoni signori.',
                'author' => 'Alessandra',
                'user_email' => 'Alessandra@example.com',

            ],
            [
                'operator_id' => 16,
                'vote_id' => 4,
                'comment' => 'esattamente cio che mi aspettavo, consigliato.',
                'author' => 'Mariella',
                'user_email' => 'Mariella@example.com',

            ],
            [
                'operator_id' => 17,
                'vote_id' => 4,
                'comment' => 'il miglior artista emergente mai sentito live.',
                'author' => 'Nathan',
                'user_email' => 'nathan@example.com',

            ],
            [
                'operator_id' => 18,
                'vote_id' => 3,
                'comment' => 'meglio di cio che sembra.',
                'author' => 'Steve',
                'user_email' => 'steve@example.com',

            ],
            [
                'operator_id' => 18,
                'vote_id' => 4,
                'comment' => 'li risentiro alla prima occasione.',
                'author' => 'Carla',
                'user_email' => 'carla@example.com',

            ],
            [
                'operator_id' => 19,
                'vote_id' => 5,
                'comment' => 'mi sono innamorato.',
                'author' => 'domenico',
                'user_email' => 'domenico@example.com',

            ],
            [
                'operator_id' => 19,
                'vote_id' => 2,
                'comment' => 'leggo i commenti precedenti e secondo me sono ubriachi.',
                'author' => 'Silvana',
                'user_email' => 'Silvana@example.com',

            ],
            [
                'operator_id' => 20,
                'vote_id' => 4,
                'comment' => 'Wow.',
                'author' => 'Boris',
                'user_email' => 'boris@example.com',

            ],

        ];
        foreach ($reviews as $review) {
            $newreview = new Review;
            $newreview->operator_id = $review['operator_id'];
            $newreview->vote_id = $review['vote_id'];
            $newreview->comment = $review['comment'];
            $newreview->author = $review['author'];
            $newreview->user_email = $review['user_email'];

            $newreview->save();
        }
    }
}
