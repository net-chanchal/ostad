<?php

/**
 * Represents a product in the online shopping cart system.
 * Class Product
 */
class Product
{
    /**
     * @var int The unique identifier of the product.
     */
    private int $id;

    /**
     * @var string The name of the product.
     */
    private string $name;

    /**
     * @var float The price of the product.
     */
    private float $price;

    /**
     * Product constructor.
     *
     * @param int $id The unique identifier of the product.
     * @param string $name The name of the product.
     * @param float $price The price of the product.
     */
    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Get the formatted price of the product.
     *
     * @return float The formatted price as a string with two decimal places.
     */
    public function getFormattedPrice(): float
    {
        return number_format($this->price, 2);
    }

    /**
     * Print the details of the product to the console.
     */
    public function showDetails(): void
    {
        echo "Product Details:", PHP_EOL;
        echo "- ID    : ", $this->id, PHP_EOL;
        echo "- Name  : ", $this->name, PHP_EOL;
        echo "- Price : $", $this->getFormattedPrice(), PHP_EOL;
    }
}

$product = new Product(1, "T-shirt", 39.99);
$product->showDetails();