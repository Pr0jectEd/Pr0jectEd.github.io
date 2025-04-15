<?php
// File path
$file_path = "articles.txt";

// Get data from POST
$title = $_POST['Title'] ?? '';
$description = $_POST['Description'] ?? '';
$content = $_POST['Content'] ?? '';

// Initialize articles array
$articles = [];

// Load existing articles (if any)
if (file_exists($file_path)) {
    $file_contents = file_get_contents($file_path);
    if (!empty($file_contents)) {
        $articles = explode("\n", trim($file_contents)); // Convert text file into an array
    }
}

// Add new article if data is provided
if (!empty($title) && !empty($description) && !empty($content)) {
    $article_entry = "$title | $description | $content";
    $articles[] = $article_entry;
    file_put_contents($file_path, implode("\n", $articles) . "\n"); // Save articles back to file
}

// Generate HTML for display
$html = "<h2>Saved Articles: (" . count($articles) . ")</h2>";
foreach ($articles as $article) {
    list($saved_title, $saved_description, $saved_content) = explode(" | ", $article);
    $html .= "<div>";
    $html .= "<h3>" . htmlspecialchars($saved_title) . "</h3>";
    $html .= "<p><em>" . htmlspecialchars($saved_description) . "</em></p>";
    $html .= "<p>" . htmlspecialchars($saved_content) . "</p>";
    $html .= "<hr>";
    $html .= "</div>";
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode($html);
