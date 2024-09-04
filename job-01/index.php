<?php

class Product{
    // Properties :
    private int $id;
    private string $name;
    private array $photos;
    private int $price;
    private string $description;
    private int $quantity;
    private Datetime $createdAt;
    private Datetime $updatedAt;


    // Constructor to initiate properties :
    public function __construct(int $id, sting $name, array $photos, int $price, string $description, int $quantity, Datetime $createdAt, Datetime $updatedAt){
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this-> description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    } // Constructor closed


    // Getters :
    public function getId(): int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getPhotos(): array{
        return $this->photos;
    }

    public function getPrice(): int{
        return $this->price;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getQuantity(): int{
        return $this->quantity;
    }

    public function getCreatedAt(): Datetime{
        return $this->createdAt;
    }

    public function getUpdatedAt(): Datetime{
        return $this->updatedAt;
    }


    // Setters : 
    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }

    public function setPhotos(array $photos): void{
        $this->photos = $photos;
    }

    public function setPrice(int $price): void{
        $this->price = $price;
    }

    public function setDescription(string $description): void{
        $this->description = $description;
    }

    public function setQuantity(int $quantity): void{
        $this->quantity = $quantity;
    }

    public function setCreatedAt(DateTime $createdAt): void{
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void{
        $this->updatedAt = $updatedAt;
    }

} // Class Product closed

// Test de la classe Product
$product = new Product(1, "Laptop", ["photo1.jpg", "photo2.jpg"], 1500, "A high-performance laptop", 10, new DateTime('now'), new DateTime('now'));

?>