
<?php
$dictionary = [
    'cat' => 'chat',
    'dog' => 'chien',
    'bird' => 'oiseau',
    'bunny' => 'lapin',
];

$word = "bird";
$temp = "fr_to_en   en_to_fr";
$translate_direction= "fr_to_en";

if($translate_direction==="en_to_fr"){//looking for the value to obtain the key
$key = array_search(strtolower($word),$dictionary);
if($key=== false){
    $response = [
        'success' => false,
        'original' => $word,
        'translation' => null,
        'message' => "The word '$word' does not exist in the dictionary."
    ];
    print_r($response);

} else {

    $response = [
        'success' => false,
        'original' => $word,
        'translation' =>$key,
        'message' => "The word '$word' exist in the dictionary."
    ];
    print_r($response);

    echo $key;
//var_dump($key);
echo "Qué pasa";
}



} else{ //looking for the key to find the value.

    if (array_key_exists(strtolower($word), $dictionary)) {
        $response = [
            'success' => true,
            'original' => $word,
            'translation' => $dictionary[strtolower($word)],
            'message' => "The word '$word' exists in the dictionary."
        ];
        print_r($response);
    } else {
        $response = [
            'success' => false,
            'original' => $word,
            'translation' => null,
            'message' => "The word '$word' does not exist in the dictionary."
        ];
        print_r($response);
    }
}






                    
?>