<?php
$file_container = "test_file2.txt";

$title = "Title 5"." |";
$description = "Description 5"." |";
$content = " This is a test content number 5"." |";
$super_string = $title.$description.$content;
/* echo $super_string;
$array_containsSS = explode("|",$super_string);
echo "<br>";
print_r($array_containsSS); */



function generateArticle ($file_container,$super_string){
    if(file_exists($file_container)){
        $file_handler = fopen($file_container,"a");
        fwrite($file_handler,"\n".$super_string);
        fclose(($file_handler));
    }else{
        $file_handler = fopen($file_container,"w");
        fwrite($file_handler,$super_string);
        fclose(($file_handler));
    }
}

function readMyFile($file_container){
    if(file_exists($file_container)){
        $file_content =file_get_contents($file_container);
        if($file_content !== false){
            echo "<pre>" . ($file_content) . "</pre>";
        }else {
            echo "File corrupted! IMPOSSIBLE TO READ";
        }
    } else {
        echo "The file does not exist";
    }
}

function deleteMyFile($file_container){
    if(file_exists($file_container)){
        unlink($file_container);
    }else {
        echo "Nothing to delete. The file does not exist!";
    }
}

function deleteSpecificLine($file_container, $line_number) {
    if (file_exists($file_container)) {
        $lines = file($file_container); // Read file into an array of lines
        if ($line_number >= 0 && $line_number < count($lines)) {
            unset($lines[$line_number]); // Remove the specified line
            file_put_contents($file_container, implode("", $lines)); // Write the modified array back to the file
            echo "Line " . ($line_number + 1) . " deleted successfully.";
        } else {
            echo "Invalid line number.";
        }
    } else {
        echo "The file does not exist.";
    }
}

generateArticle ($file_container,$super_string);
readMyFile($file_container);
//deleteMyFile($file_container);
//deleteSpecificLine($file_container,1);


?>