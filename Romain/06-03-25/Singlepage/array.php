    <?php
    $name = $_POST["phrase"];
    $fruits = isset($_POST["fruits"]) ? $_POST["fruits"] : [];

    function createTable3($arrayFruits, $user)
    {
        echo "Hello $user this is the:";
        echo __FUNCTION__;
        sort($arrayFruits);
        echo "<table>";
        echo " <tr><th>Index</th><th>Fruits</th></tr>";
        foreach ($arrayFruits as $key => $values) {
            echo "<tr>";
            echo "<td>" . ($key + 1) . "</td>" . "<td>" . $values . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    createTable3($fruits, $name);


    ?>