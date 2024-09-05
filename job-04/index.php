<?php

// Connection to database
$host = 'localhost';
$dbname = 'draft-shop';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}



// Class Product :
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
    private int $category_id;


    // Constructor to initiate properties :
    public function __construct(int $id = 0, string $name = '', array $photos = [], int $price = 0, string $description = '', int $quantity = 0, Datetime $createdAt = null, Datetime $updatedAt = null, int $category_id = 0){
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this-> description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->updatedAt = $updatedAt ?? new DateTime();
        $this->category_id = $category_id;
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

    public function getCategoryId(): int{
        return $this->category_id;
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

    public function setCategoryId(int $category_id){
        $this->category_id = $category_id;
    }

} // Class Product closed




// Class Category :
class Category{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $createdAt;
    private DateTime $updatedAt;


    // Constructor to initiate properties :
    public function __construct(int $id, string $name, string $description, DateTime $createdAt, DateTime $updatedAt){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters :
    public function getId(): int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getCreatedAt(): DateTime{
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime{
        return $this->updatedAt;
    }





    // Setters :
    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setCreatedAt(DateTime $createdAt){
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt){
        $this->updatedAt = $updatedAt;
    }


} // Class Category closed



// Class category test
// Creating an instance of the category
$category = new Category(1, "Electronics", "Category for electronics products", new DateTime('now'), new DateTime('now'));

// Class Product test
// Creating an instance of the product
$product = new Product(1, "Laptop", ["photoLaptop.jpg"], 1500, "A high-performance laptop", 10, new DateTime('now'), new DateTime('now'), $category->getId());
$product2 = new Product();

// Use of getters
// $product
echo "Product 1:<br>";
var_dump($product->getId());echo '<br>';
var_dump($product->getName());echo '<br>';
var_dump($product->getPhotos());echo '<br>';
var_dump($product->getPrice());echo '<br>';
var_dump($product->getDescription());echo '<br>';
var_dump($product->getQuantity());echo '<br>';
var_dump($product->getCreatedAt());echo '<br>';
var_dump($product->getUpdatedAt());echo '<br>';
var_dump($product->getCategoryId());echo '<br><br>';

// Use of setters
// $product
$product->setPrice(1200);
$product->setQuantity(9);
$product->setCategoryId(2);

// Modifications checking :
// $product
echo "changes product1:<br>";
var_dump($product->getPrice());echo '<br>';
var_dump($product->getQuantity());echo '<br>';
var_dump($product->getCategoryId()); echo '<br><br><br>';

// $product2 :
echo "Product 2:<br>";
var_dump($product2->getId());echo '<br>';
var_dump($product2->getName());echo '<br>';
var_dump($product2->getPhotos());echo '<br>';
var_dump($product2->getPrice());echo '<br>';
var_dump($product2->getDescription());echo '<br>';
var_dump($product2->getQuantity());echo '<br>';
var_dump($product2->getCreatedAt());echo '<br>';
var_dump($product2->getUpdatedAt());echo '<br>';
var_dump($product2->getCategoryId());echo '<br><br>';

// Use of setters
// $product2
$product2->setName('PS5');
$product2->setPrice(40);
$product2->setQuantity(3);
$product2->setCategoryId(5);

// Modifications checking :
// $product
echo "changes product2:<br>";
var_dump($product2->getName());echo '<br>';
var_dump($product2->getPrice());echo '<br>';
var_dump($product2->getQuantity());echo '<br>';
var_dump($product2->getCategoryId()); echo '<br><br><br>';


// Request to retrieve the product with id 7
$id = 7;
$sql = "SELECT * FROM product WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();


// Retrieve product data in the form of an associative array
$productData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($productData) {
    echo "Product successfully found !<br>";
} else {
    die("No products found with id $id.");
}


// Hydrate a new instance of the Product class with data from the database
if ($productData) {
    $product = new Product(
        $productData['id'],
        $productData['name'],
        explode(',', $productData['photos']),
        $productData['price'],
        $productData['description'],
        $productData['quantity'],
        new DateTime($productData['createdAt']),
        new DateTime($productData['updatedAt']),
        $productData['category_id']
    );

    // Viewing product data to verify everything is working
    echo "Product ID : " . $product->getId() . "<br>";
    echo "Product name : " . $product->getName() . "<br>";
    echo "Product photos : " . implode(", ", $product->getPhotos()) . "<br>";
    echo "Product price : " . $product->getPrice() . "<br>";
    echo "Product description : " . $product->getDescription() . "<br>";
    echo "Product quantity : " . $product->getQuantity() . "<br>";
    echo "Product created at : " . $product->getCreatedAt()->format('Y-m-d H:i:s') . "<br>";
    echo "Product updated at : " . $product->getUpdatedAt()->format('Y-m-d H:i:s') . "<br>";
    echo "Product category ID : " . $product->getCategoryId() . "<br>";
}
?>


