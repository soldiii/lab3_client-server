<?php
class Product {

private $conn;

// свойства объекта
public $ID_Product;
public $ProductName;
public $Price;
public $OrderDate;
public $DeliveryDate;
public $Quantity;

public function __construct($db) {
	$this->conn = $db;
}

function PriceList () {

    $query = 'SELECT
    ProductName, Price
FROM
     products
ORDER BY
     ProductName'; 
    
    $stmt = $this->conn->prepare($query);

    $stmt->execute();
    
    return $stmt;
    
    }

    function Statistics ($begin,$end) {

        $query = 'SELECT 
             products.ProductName as ProductName, SUM(order_details.Quantity) as Quantity
           FROM
             orders INNER JOIN order_details ON orders.ID_Order = order_details.ID_Order INNER JOIN products ON products.ID_Product = order_details.ID_Product
           WHERE
             orders.OrderDate >= :begin AND orders.OrderDate <= :end
            GROUP BY
            products.ProductName';  
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':begin', $begin,PDO::PARAM_STR);
        $stmt->bindValue(':end', $end,PDO::PARAM_STR);

        $stmt->execute();
        
        return $stmt;
        
        }

    function POSTProduct($data){
      $id = $data['ID_Product'];
      $name = $data['ProductName'];
      $price = $data['Price'];
      $query = 'INSERT INTO products (ID_Product, ProductName, Price) VALUES (:id, :name, :price);';  
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name,PDO::PARAM_STR);
        $stmt->bindValue(':price', $price,PDO::PARAM_STR);

        if($stmt->execute())
        echo("Товар успешно создан, идентификатор товара - $id");
       
        return;
    }

    function PUTProduct($goodID,$data){
      $id = $data['ID_Product'];
      $name = $data['ProductName'];
      $price = $data['Price'];
      $query = 'UPDATE products SET ID_Product = :id, ProductName = :name, Price = :price WHERE products.ID_Product = :goodID;';  
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name,PDO::PARAM_STR);
        $stmt->bindValue(':price', $price,PDO::PARAM_STR);
        $stmt->bindValue(':goodID', $goodID);

        if($stmt->execute())
        echo("Товар успешно изменен, идентификатор товара - $id");
       
        return;
    }

    function DELETEProduct($goodID){
      $query = 'DELETE FROM products WHERE products.ID_Product = :goodID';  
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':goodID', $goodID);

        if($stmt->execute())
        echo("Товар успешно удален, идентификатор удаленного товара - $goodID");
       
        return;
    }


    
}