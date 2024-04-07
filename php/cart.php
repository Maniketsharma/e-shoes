<?php
session_start();

// Include database connection
include 'db_config.php';

// Check if product ID is set
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Retrieve product details from database
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Add product to cart session
        $_SESSION['cart'][$product_id] = array(
            'name' => $row['name'],
            'price' => $row['price'],
            'quantity' => 1 // Set default quantity to 1
        );
    }
}

header("Location: userdata.php"); // Redirect to the product page
exit();
?>
