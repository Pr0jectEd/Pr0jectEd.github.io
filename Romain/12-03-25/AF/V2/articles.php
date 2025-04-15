<?php
// Get data from POST
$title = $_POST['Title'];
$description = $_POST['Description'];
$content = $_POST['Content'];

// Create article data
$article = [
    'title' => $title,
    'description' => $description,
    'content' => $content,
];

$articles = []; // Initialize articles array

// Load existing articles (if any)
if (file_exists("articles.json")) {
    $json = file_get_contents("articles.json");
    $articles = json_decode($json, true); // Decode JSON to array
    if (!is_array($articles)) {
        $articles = []; // Ensure articles is always an array
    }
}

// Add the new article
$articles[] = $article;

// Save to JSON file
file_put_contents("articles.json", json_encode($articles, JSON_PRETTY_PRINT));

// Generate HTML for display
$html = "<h2>Saved Articles:</h2>";
foreach ($articles as $article) {
    $html .= "<div>";
    $html .= "<h3>" . htmlspecialchars($article['title']) . "</h3>";
    $html .= "<p><em>" . htmlspecialchars($article['description']) . "</em></p>";
    $html .= "<p>" . htmlspecialchars($article['content']) . "</p>";
    $html .= "<hr>";
    $html .= "</div>";
}

// Output JSON with the HTML
header('Content-Type: application/json');
echo json_encode($html);
?>