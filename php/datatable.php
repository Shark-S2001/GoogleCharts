
<?php
    $conn = new PDO("mysql:host=localhost;dbname=superdb", "root","Kiarithaini");
 
    $stmt = $conn->prepare('SELECT product_name as product,unit_price as price FROM product LIMIT 20');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($results);

?>
 