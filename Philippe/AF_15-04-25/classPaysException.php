<?php
declare(strict_types=1);

class PaysException extends Exception {
    public $color;

    public function __construct($message, $color = "red") {
        parent::__construct($message);
        $this->color = $color;
    }
}

?>