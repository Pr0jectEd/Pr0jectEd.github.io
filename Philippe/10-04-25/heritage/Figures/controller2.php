<?php
require_once "Square.php";
require_once "Rectangle.php";

// Create figures
$figure1 = new Rectangle(3, 5, "green", 4.5, 7);
$figure2 = new Square(5, 6, "red", 4);
$figure3 = new Rectangle(5, 6, "red", 4, 6.2);
$figure4 = new Square(5, 6, "red", 5);
$figure5 = new Square(5, 6, "red", 3);

$tableauFigures = [$figure1, $figure2, $figure3, $figure4, $figure5];

function presentation(array $arrayFigures): string {
    $html = <<<HTML
    <!DOCTYPE html>
    <html>
    <head>
        <title>Geometric Figures</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            .figure-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            .figure-table th, .figure-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            .figure-table th {
                background-color: #f2f2f2;
            }
            .figure-table tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            .figure-color {
                display: inline-block;
                width: 20px;
                height: 20px;
                border: 1px solid #000;
                vertical-align: middle;
                margin-right: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Geometric Figures</h1>
        <table class="figure-table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Position (X,Y)</th>
                    <th>Color</th>
                    <th>Dimensions</th>
                    <th>Perimeter</th>
                </tr>
            </thead>
            <tbody>
    HTML;

    foreach ($arrayFigures as $figure) {
        // Get figure type (class name without namespace)
        $type = basename(str_replace('\\', '/', get_class($figure)));
        
        // Get color box
        $colorBox = '<span class="figure-color" style="background-color: ' 
                  . htmlspecialchars($figure->getColor()) . '"></span>';
        
        // Get dimensions (different for rectangle vs square)
/*         if ($figure instanceof Square) {
            $dimensions = "Side: {$figure->getSide()}";
        } else {
            $dimensions = "Length: {$figure->getLength()}, Height: {$figure->getHeight()}";
        } */

        $html .= <<<HTML
                <tr>
                    <td>{$type}</td>
                    <td>({$figure->getPosX()}, {$figure->getPosY()})</td>
                    <td>{$colorBox} {$figure->getColor()}</td>
                    
                    <td>{$figure->calclulatePerimeter()}</td>
                </tr>
        HTML;
    }

    $html .= <<<HTML
            </tbody>
        </table>
    </body>
    </html>
    HTML;

    return $html;
}

// Output the HTML
echo presentation($tableauFigures);