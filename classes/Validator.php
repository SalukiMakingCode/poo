<?php
//Créer une class Validator qui va servir à valider les données envoyer par le formulaire. Cette
//classe contiendra des méthodes qui pourront valider : - une chaine de caractère - un entier - un
//nombre à virgule - etc.
class Validator
{
    public function validateString ($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        if (!$string) return false;
        return true;
    }

    public function validateInteger ($integer) {
        $integer = filter_var($integer, FILTER_SANITIZE_NUMBER_INT);
        $integer = filter_var($integer, FILTER_VALIDATE_INT);
        if (!$integer) return false;
        return true;
    }

    public function validateFloat ($float) {
        $float = filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT);
        $float = filter_var($float, FILTER_VALIDATE_FLOAT);
        if (!$float) return false;
        return true;
    }

    public function validateEmail ($email) {
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) return false;
        return true;
    }
}