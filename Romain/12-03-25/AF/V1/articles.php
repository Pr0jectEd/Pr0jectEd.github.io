<?php
$title = $_POST['Title'];
$description = $_POST['Description'];
$content = $_POST['Content'];

//echo $title . $description . $content;

file_put_contents("Article.txt", $title ." ". $description." ". $content . "\n", FILE_APPEND);

$file = fopen("Article.txt", "r");

if ($file) {
    echo "<h2>Saved Articles:</h2><pre>";

    // Read and display the content
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }

    echo "</pre>";
} else {
    echo "Unable to open file!";
}

/* header('Content-Type: application/json');//I was missing this line
echo json_encode($data); */


?>