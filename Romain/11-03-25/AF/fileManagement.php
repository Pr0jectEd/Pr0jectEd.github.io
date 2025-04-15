<?php

// fopen: Opens a file or URL
// Example 1: Opening a file for reading
$file = fopen("myfile.txt", "r");

if ($file) {
    // File opened successfully
    // ... file operations ...
    
    fclose($file); // Important!
} else {
    echo "Unable to open file!";
}

// Example 2: Opening a file for writing (creates or overwrites)
$fileWrite = fopen("output.txt", "w");

if($fileWrite){
    fputs($fileWrite, "This is written to the file.\n");
    fclose($fileWrite);
} else {
    echo "Unable to open output.txt for writing";
}

// Example 3: Appending to a file
$fileAppend = fopen("log.txt", "a");
if ($fileAppend){
    fputs($fileAppend, date('Y-m-d H:i:s') . " - Log entry.\n");
    fclose($fileAppend);
}

// fclose: Closes an open file pointer
// (See the examples above, fclose is used after every fopen)

// fgetc: Gets a character from a file pointer
$fileReadChar = fopen("myfile.txt", "r");
if ($fileReadChar) {
    while (($char = fgetc($fileReadChar)) !== false) {
        // Process each character
        echo $char; // uncomment to see each char
    }
    fclose($fileReadChar);
}

// fgets: Gets a line from a file pointer
$fileReadLine = fopen("myfile.txt", "r");
if ($fileReadLine) {
    while (($line = fgets($fileReadLine)) !== false) {
        // Process each line
        echo $line;
    }
    fclose($fileReadLine);
}

// fgetss: Gets a line from a file pointer and strips HTML tags
/* $htmlFile = fopen("test.html", "r");
if ($htmlFile) {
    while (($line = fgetss($htmlFile, 1024, "<b>")) !== false) { // 1024 is max line length
        // Process each line (without HTML)
        echo $line;
    }
    fclose($htmlFile);
} */

// fputs (or fwrite): Writes to a file pointer
// (See the fopen examples above)

// fscanf: Parses input from a file according to a format
$datafile = fopen("data.txt", "r"); // example data: "John 25"
if ($datafile) {
    while ($data = fscanf($datafile, "%s %d")) {
        list($name, $age) = $data;
        echo "Name: $name, Age: $age\n";
    }
    fclose($datafile);
}

// Example data.txt:
// John 25
// Jane 30
// Peter 22

// unlink: Deletes a file
$fileToDelete = "temp.txt";
$fileHandle = fopen($fileToDelete, "w"); //create temp file for demonstration
fwrite($fileHandle, "test");
fclose($fileHandle);

if (file_exists($fileToDelete)) {
    if (unlink($fileToDelete)) {
        echo "File '$fileToDelete' deleted successfully.\n";
    } else {
        echo "Unable to delete file '$fileToDelete'.\n";
    }
} else {
    echo "File '$fileToDelete' does not exist.\n";
}

?>