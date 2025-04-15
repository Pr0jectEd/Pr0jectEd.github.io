<?php
class DieException extends Exception {
    private string $severity;

    public function __construct(string $message, string $severity, int $code = 0) {
        $this->severity = $severity;
        parent::__construct($message, $code);
    }

    public function getSeverity(): string {
        return $this->severity;
    }
}
?>
