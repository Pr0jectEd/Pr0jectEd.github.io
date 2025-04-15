<?php
declare(strict_types=1);

class Employee{

    protected string $EmployeeName;
    protected float $yearSalaryEmployee;
    protected float $costEmployee;
    
public function __construct(string $nombreEmpleado, float $salarioAnaulEmpleado)
{
    $this->EmployeeName = $nombreEmpleado;
    $this->yearSalaryEmployee = $salarioAnaulEmpleado;
    $this->costEmployee = $salarioAnaulEmpleado*1.9;
}

public function EmployeeCost(){
    $this->costEmployee = $this->yearSalaryEmployee*1.9;
    return $this->costEmployee;
}

public function __toString()
{
    $message= "Prenom Employee:{$this->EmployeeName} Salaire Employee:{$this->yearSalaryEmployee} coutAnnuel: {$this->costEmployee}";
    return $message;
}
    
}

?>