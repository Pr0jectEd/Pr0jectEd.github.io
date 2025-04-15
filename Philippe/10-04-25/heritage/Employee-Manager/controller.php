<?php
require "Employee.php";
require "Manager.php";

$empolyee1= new Employee("Pedro",12000);
$manager1= new Manager("Juan",20000,5000);

/* echo $empolyee1;
echo "<br>";
echo $empolyee1->EmployeeCost();
echo "<br>";
echo $manager1;
echo "<br>";
echo $manager1->EmployeeCost(); */
$html = <<<EOD
<html>
    <body>
        <p>
            $empolyee1<br>
            $manager1<br>
        </p>
    </body>
</html>
EOD;
?>