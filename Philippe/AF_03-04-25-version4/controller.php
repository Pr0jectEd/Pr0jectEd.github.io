<?php
header('Content-Type: application/json');

$dictionary = [
    'cat' => 'chat',
    'dog' => 'chien',
    'bird' => 'oiseau',
    'bunny' => 'lapin',
];

$word = $_POST["word"] ; 
$translate_direction= $_POST["translation_direction"];

if($translate_direction==="en_to_fr"){//looking for the value to obtain the key
    $key = array_search(strtolower($word),$dictionary);
    if($key=== false){
        $response = [
            'success' => false,
            'original' => $word,
            'translation' => null,
            'message' => "The word '$word' does not exist in the dictionary."
        ];
    
    } else {
    
        $response = [
            'success' => true,
            'original' => $word,
            'translation' =>$key,
            'message' => "The word '$word' exist in the dictionary."
        ];

    }
     
    
    } else{//looking for the key

    if (array_key_exists(strtolower($word), $dictionary)) {
        $response = [
            'success' => true,
            'original' => $word,
            'translation' => $dictionary[strtolower($word)],
            'message' => "The word '$word' exists in the dictionary."
        ];
    } else {
        $response = [
            'success' => false,
            'original' => $word,
            'translation' => null,
            'message' => "The word '$word' does not exist in the dictionary."
        ];
    }
}




echo json_encode($response);

                    
                    

?>