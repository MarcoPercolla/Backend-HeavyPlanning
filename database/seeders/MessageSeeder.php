<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'operator_id' => 1,
                'text' => 'Salve, saremmo molto interessati a metterci in contatto con una rock band per poter organizzare un evento a Roma',
                'user_email' => 'DavidColeman1234@gmail.com',
                'author' => 'David Coleman'
            ],
            [
                'operator_id' => 2,
                'text' => 'Buongiorno! Sarei interessato ad organizzare un party privato nei dintorni della periferia di Roma, avrebbe dei suggerimenti su quali artisti di musica elettronica poter contattare?',
                'user_email' => 'johndover87@yahoo.com',
                'author' => 'John Dover'
            ],
            [
                'operator_id' => 3,
                'text' => 'Buongiorno! avrei bisogno di contattarvi per un evento da organizzare per il prossimo mese.',
                'user_email' => 'mary.smith_22@hotmail.com',
                'author' => 'Mary Smith'
            ],
            [
                'operator_id' => 4,
                'text' => 'Salve, potreste fornirmi maggiori informazioni riguardo ai vostri servizi di event catering ?',
                'user_email' => 'alexander1234@outlook.com',
                'author' => 'Alexander Bashmakov'
            ],
            [
                'operator_id' => 5,
                'text' => 'Ciao! Sono interessato all ingaggio dei vostri migliori artisti di musica classica, potete indicarmi il prezzo e le modalità di pagamento?',
                'user_email' => 'emily.green789@icloud.com',
                'author' => 'Emilia Verdi'
            ],
            [
                'operator_id' => 6,
                'text' => 'Salve! Vorrei ingaggiare degli artisti di musica Indie Rock, avete dei suggerimenti?',
                'user_email' => 'samantha.jones45@live.com',
                'author' => 'Samantha Jones'
            ],
            [
                'operator_id' => 7,
                'text' => 'Buongiorno, sto cercando informazioni riguardo ai vostri servizi di event catering, potreste aiutarmi?',
                'user_email' => 'davidbrown2000@aol.com',
                'author' => 'Davide Marrone'
            ],
            [
                'operator_id' => 8,
                'text' => 'Ciao! Sto valutando l acquisto del vostro servizio. siete disponibili ad essere contattati telefonicamente?',
                'user_email' => 'lisa.adriani1996@protonmail.com',
                'author' => 'Lisa Adriani'
            ],
            [
                'operator_id' => 9,
                'text' => 'Salve, sono interessato al vostro servizio. Come posso ingaggiare un artista?',
                'user_email' => 'robert.williams77@inbox.com',
                'author' => 'Robert Williams'
            ],
            [
                'operator_id' => 10,
                'text' => 'Buongiorno! Avrei bisogno di assistenza per configurare il mio account. Potete aiutarmi?',
                'user_email' => 'Michele.Giasoni_88@yandex.com',
                'author' => 'Michele Giasoni'
            ],
            [
                'operator_id' => 11,
                'text' => 'Ciao! Sto cercando un concerto di jazz questo weekend. Avete qualche suggerimento?',
                'user_email' => 'jazzlover123@sumup.com',
                'author' => 'Germano Mosconi'
            ],
            [
                'operator_id' => 12,
                'text' => 'Salve! Mi piacerebbe avere informazioni sul concerto rock della prossima settimana. Come posso procedere?',
                'user_email' => 'rockfan456@gmail.com',
                'author' => 'Richard Benson'
            ],
            [
                'operator_id' => 13,
                'text' => 'Buongiorno, sto cercando informazioni sui concerti di musica classica in programma questo mese. Potete aiutarmi?',
                'user_email' => 'classicalmusiclover@yandex.com',
                'author' => 'Giovanni Molinari'
            ],
            [
                'operator_id' => 14,
                'text' => 'Ciao! Vorrei avere informazioni sul concerto di venerdì sera. Quali sono le opzioni disponibili?',
                'user_email' => 'popmusicfan789@hotmail.com',
                'author' => 'Hotline Mary'
            ],
            [
                'operator_id' => 15,
                'text' => 'Salve, mi chiedevo se ci sono concerti di musica indie in programma per il prossimo mese. Potete darmi qualche dettaglio?',
                'user_email' => 'indiemusiclover@gmail.com',
                'author' => 'Patty Wilson'
            ],
            [
                'operator_id' => 16,
                'text' => 'Buongiorno! Ho bisogno di assistenza per modificare l ingaggio per il concerto di hip hop . Potete aiutarmi?',
                'user_email' => 'hiphopfan2000@yahoo.com',
                'author' => 'Kate Mordrel'
            ],
            [
                'operator_id' => 17,
                'text' => 'Ciao, vorrei organizzare un concerto di musica latina tra due mesi. Come posso procedere?',
                'user_email' => 'latinmusiclover@xtag.com',
                'author' => 'Armando Diaz'
            ],
            [
                'operator_id' => 18,
                'text' => 'Salve! Sono interessato al concerto di musica country previsto per il mese prossimo. Dove posso trovare ulteriori dettagli?',
                'user_email' => 'countrymusicfan123@gmail.com',
                'author' => 'Tommy Vercetti'
            ],
            [
                'operator_id' => 19,
                'text' => 'Buongiorno, volevo sapere se ci sono concerti di musica elettronica previsti per il prossimo weekend. Grazie!',
                'user_email' => 'electronicmusiclover@yandex.ru',
                'author' => 'Dimitri Bulgakov'
            ],
            [
                'operator_id' => 20,
                'text' => 'Ciao! Sto cercando informazioni sul concerto rap di venerdì. Posso contattarvi tramite e-mail?',
                'user_email' => 'rapfanatic@hotmail.com',
                'author' => 'Marshall Mathers'
            ]
            
        ];
        foreach ($messages as $message) {
            $newmessage= new Message;
            $newmessage->operator_id=$message['operator_id'];
            $newmessage->text=$message['text'];
            $newmessage->user_email=$message['user_email'];
            $newmessage->author=$message['author'];

            $newmessage->save();
        }
    }
}
