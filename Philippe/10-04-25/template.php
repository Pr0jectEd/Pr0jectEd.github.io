<?php

/**
 * Generic class template demonstrating:
 * - Private/public/protected properties
 * - Private/public/protected methods
 * - Static members
 * - 'this' and self usage
 * - Getters/setters
 */
class GenericTemplate
{
    // Public static property (shared across all instances)
    public static int $instanceCount = 0;
    
    // Private static property
    private static int $MAX_INSTANCES = 100;
    
    // Public property
    public string $publicProperty;
    
    // Private property
    private mixed $privateProperty;
    
    // Protected property (accessible to subclasses)
    protected int $protectedProperty;
    
    // Constructor
    public function __construct(string $publicProperty, mixed $privateProperty, int $protectedValue)
    {
        $this->publicProperty = $publicProperty;
        $this->privateProperty = $privateProperty;
        $this->protectedProperty = $protectedValue;
        
        // Increment instance count
        self::$instanceCount++;
        
        // Validate instance count
        $this->validateInstanceCount();
    }
    
    // Public method
    public function publicMethod(): void
    {
        echo "Public method called. Public property: {$this->publicProperty}\n";
        $this->privateMethod(); // Can call private method from within class
    }
    
    // Private method
    private function privateMethod(): void
    {
        echo "Private method called. Private property: {$this->privateProperty}\n";
    }
    
    // Protected method (accessible to subclasses)
    protected function protectedMethod(): string
    {
        return "Protected value: {$this->protectedProperty}";
    }
    
    // Public static method
    public static function staticMethod(): void
    {
        echo "Static method called. Instance count: " . self::$instanceCount . "\n";
        // Can't use $this in static methods, use self:: for static properties
    }
    
    // Private static method
    private static function validateInstanceCount(): void
    {
        if (self::$instanceCount > self::$MAX_INSTANCES) {
            throw new Exception("Maximum instance count exceeded");
        }
    }
    
    // Getter for private property (public access)
    public function getPrivateProperty(): mixed
    {
        return $this->privateProperty;
    }
    
    // Setter for private property (with validation)
    public function setPrivateProperty(mixed $value): void
    {
        if ($value !== null) {
            $this->privateProperty = $value;
        } else {
            throw new Exception("Invalid value for private property");
        }
    }
    
    // Method demonstrating $this binding
    public function methodWithCallback(callable $callback): void
    {
        // In PHP, closures automatically capture $this when used in class context
        $callback();
    }
}

// Extended class demonstrating inheritance
class ExtendedTemplate extends GenericTemplate
{
    public function __construct()
    {
        parent::__construct("public", 42, 100);
    }
    
    public function showProtected(): void
    {
        echo $this->protectedMethod() . "\n"; // Can access protected method
        // $this->privateMethod(); // Would error - private to parent
    }
}

// Example usage

// Static property access
echo "Initial instance count: " . GenericTemplate::$instanceCount . "\n";

// Instance creation
$instance = new GenericTemplate("Hello", "Secret", 50);
$instance->publicMethod();
// $instance->privateMethod(); // Would error - private
echo "Private property via getter: " . $instance->getPrivateProperty() . "\n";

// Static method call
GenericTemplate::staticMethod();

// Extended class usage
$extended = new ExtendedTemplate();
$extended->showProtected();
?>