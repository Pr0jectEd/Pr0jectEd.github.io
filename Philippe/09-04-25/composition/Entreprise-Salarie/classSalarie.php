<?php
declare(strict_types=1);

class Salarie{

    private string $nameEmployee;
    private float $monthSalary;

    public function __construct(string $nombreEmpleado, float $salarioMensual){
        $this->nameEmployee = $nombreEmpleado;
        $this->monthSalary = $salarioMensual;
    }

    public function getName(): string {
        return $this->nameEmployee;
    }

    public function getMonthSalary():float{
        return $this->monthSalary;
    }

    public function __toString()
    {
        $message ="Name Employee: {$this->nameEmployee}  Month Salary{$this->monthSalary}";
        return $message;
    }

}

?>