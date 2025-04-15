<?php
header('Content-Type: application/json');

$dictionary = [
    'cat' => 'chat',
    'dog' => 'chien',
    'bird' => 'oiseau',
    'bunny' => 'lapin',
    'lion' => 'lion',
    'tiger' => 'tigre',
    'elephant' => 'éléphant',
    'monkey' => 'singe',
    'horse' => 'cheval',
    'cow' => 'vache',
    'pig' => 'cochon',
    'sheep' => 'mouton',
    'goat' => 'chèvre',
    'chicken' => 'poulet',
    'duck' => 'canard',
    'goose' => 'oie',
    'turkey' => 'dinde',
    'mouse' => 'souris',
    'rat' => 'rat',
    'hamster' => 'hamster',
    'guinea pig' => 'cobaye',
    'rabbit' => 'lapin', 
    'squirrel' => 'écureuil',
    'fox' => 'renard',
    'wolf' => 'loup',
    'bear' => 'ours',
    'zebra' => 'zèbre',
    'giraffe' => 'girafe',
    'deer' => 'cerf',
    'elk' => 'élan',
    'moose' => 'orignal',
    'camel' => 'chameau',
    'llama' => 'lama',
    'alpaca' => 'alpaga',
    'kangaroo' => 'kangourou',
    'koala' => 'koala',
    'panda' => 'panda',
    'sloth' => 'paresseux',
    'beaver' => 'castor',
    'otter' => 'loutre',
    'seal' => 'phoque',
    'whale' => 'baleine',
    'dolphin' => 'dauphin',
    'shark' => 'requin',
    'fish' => 'poisson',
    'goldfish' => 'poisson rouge',
    'salmon' => 'saumon',
    'tuna' => 'thon',
    'trout' => 'truite',
    'frog' => 'grenouille',
    'toad' => 'crapaud',
    'snake' => 'serpent',
    'lizard' => 'lézard',
    'turtle' => 'tortue',
    'crocodile' => 'crocodile',
    'alligator' => 'alligator',
    'dinosaur' => 'dinosaure', 
    'bee' => 'abeille',
    'ant' => 'fourmi',
    'butterfly' => 'papillon',
    'mosquito' => 'moustique',
    'spider' => 'araignée',
    'ladybug' => 'coccinelle',
    'snail' => 'escargot',
    'worm' => 'ver',
    'jellyfish' => 'méduse',
    'starfish' => 'étoile de mer',
    'crab' => 'crabe',
    'lobster' => 'homard',
    'shrimp' => 'crevette',
    'squid' => 'calmar',
    'octopus' => 'poulpe',
    'eagle' => 'aigle',
    'owl' => 'hibou',
    'hawk' => 'faucon',
    'penguin' => 'pingouin',
    'ostrich' => 'autruche',
    'parrot' => 'perroquet',
    'swan' => 'cygne',
    'peacock' => 'paon',
    'robin' => 'rouge-gorge',
    'sparrow' => 'moineau',
    'crow' => 'corbeau',
    'seagull' => 'mouette',
    'hummingbird' => 'colibri',
    'ostrich' => 'autruche', 
    'gorilla' => 'gorille',
    'chimpanzee' => 'chimpanzé',
    'orangutan' => 'orang-outan',
    'hyena' => 'hyène',
    'cheetah' => 'guépard',
    'leopard' => 'léopard',
    'jaguar' => 'jaguar',
    'rhinoceros' => 'rhinocéros',
    'hippopotamus' => 'hippopotame',
    'gazelle' => 'gazelle',
    'antelope' => 'antilope',
    'bison' => 'bison',
    'buffalo' => 'buffle',
    'yak' => 'yak',
    'donkey' => 'âne',
    'mule' => 'mulet',
    'ferret' => 'furet',
    'skunk' => 'moufette',
    'hedgehog' => 'hérisson',
    'mole' => 'taupe',
    'bat' => 'chauve-souris',
    'camel' => 'chameau', 
    'llama' => 'lama', 
    'alpaca' => 'alpaga', 
    'kangaroo' => 'kangourou', 
    'koala' => 'koala', 
    'panda' => 'panda', 
    'sloth' => 'paresseux', 
];

$word = strtolower(trim($_POST["word"] ?? ''));


if ($word === '') {
    echo json_encode([
        'success' => false,
        'original' => null,
        'translation' => null,
        'message' => "No se ha proporcionado ninguna palabra."
    ]);
    exit;
}


$found = false;
foreach ($dictionary as $en => $fr) {
    if ($word === strtolower($en)) {
        $response = [
            'success' => true,
            'original' => $word,
            'translation' => $fr,
            'message' => "Traducción del inglés al francés."
        ];
        $found = true;
        break;
    } elseif ($word === strtolower($fr)) {
        $response = [
            'success' => true,
            'original' => $word,
            'translation' => $en,
            'message' => "Traducción del francés al inglés."
        ];
        $found = true;
        break;
    }
}

if (!$found) {
    $response = [
        'success' => false,
        'original' => $word,
        'translation' => null,
        'message' => "La palabra '$word' no existe en el diccionario."
    ];
}

echo json_encode($response);
?>