<?php

function sumArray($array): int {
    $sum = 0;
    foreach($array as $value) {
        $sum += $value;
    }
    return $sum;
}

function findMax($values): int {
    $max = $values[0];
    foreach($values as $value) {
        if ($value > $max):
            $max = $value;
        endif;        
    }
    return $max;
}

function averageAge($people): int {    
    $ageSum = 0;

    foreach($people as $person) {
        $ageSum += $person['age'];       
    }

    $ageAverage = $ageSum/count($people);
    return $ageAverage;
}

function filterAge($people, $maxAge): array {

    $newArray = [];

    foreach($people as $person) {
        if($person['age'] >= $maxAge):
            $newArray[] = $person;
        endif;      
    }
    return $newArray;
}

/* function reverseString($string): string {

    $newString = strrev($string);

    return $newString;
} */

/* function reverseString($string): string {

    $newString = '';
    $length = strlen($string);

    for($i = 0; $i < $length; $i++) {
        $newString[$length - $i - 1] = $string[$i];    
    }

    return $newString;
} */

function reverseString($string): string {
    $chars = mb_str_split($string, 1, 'UTF-8');
    return implode('', array_reverse($chars));
}

function reverseWords($string): string {

    $words = explode(' ', $string);
    $newString = '';

    for($i = 0; $i < count($words); $i++) {
        if ($i !== 0):
            $newString = $words[$i].' '.$newString;
        else:
            $newString = $words[$i].$newString;
        endif;   
    }

    return $newString;
}

function reverseCharactersInWords($string): string {

    $words = explode(' ', $string);
    $newString = '';

    for($i = 0; $i < count($words); $i++) {

        $newWord = reverseString($words[$i]);

        if ($i !== count($words)-1):
            $newString = $newString.$newWord.' ';
        else:
            $newString = $newString.$newWord;
        endif;
    }

    return $newString;
}