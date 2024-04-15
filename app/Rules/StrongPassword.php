<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrongPassword implements Rule
{
    public function passes($attribute, $value)
    {
        // Verifica che la password contenga almeno 8 caratteri
        if (strlen($value) < 8) {
            return false;
        }

        // Verifica che la password contenga almeno una lettera minuscola
        if (!preg_match('/[a-z]/', $value)) {
            return false;
        }

        // Verifica che la password contenga almeno una lettera maiuscola
        if (!preg_match('/[A-Z]/', $value)) {
            return false;
        }

        // Verifica che la password contenga almeno un numero
        if (!preg_match('/[0-9]/', $value)) {
            return false;
        }

        // Verifica che la password contenga almeno un carattere speciale
        if (!preg_match('/[\W_]/', $value)) {
            return false;
        }

        return true; // La password soddisfa tutti i criteri di validazione
    }

    public function message()
    {
        return 'La password deve contenere almeno 8 caratteri, una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale.';
    }
}
