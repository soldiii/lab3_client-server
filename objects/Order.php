<?php
class Order {

private $conn;

// свойства объекта
public $ID_Order;
public $ID_Customer;
public $OrderDate;
public $DeliveryDate;
public $IDProduct;
public $ProductName;
public $Price;
public $Quantity;
public $Discount;

public function __construct($db) {
	$this->conn = $db;
}

function ListOfOrders ($customerId) {

    $query = 'SELECT
    ID_Customer, ID_Order, OrderDate, DeliveryDate
FROM
     orders 
WHERE
    ID_Customer LIKE :id'; 
    
    // nomrororKa sanpoca
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(':id', $customerId);
    // wunomisem sampoc
    $stmt->execute();
    
    return $stmt;
    
    }
    
    function FullInfoAboutOrder ($orderId) {

        $query = 'SELECT
        orders.ID_Order as ID_Order, orders.ID_Customer as ID_Customer, orders.OrderDate as OrderDate, orders.DeliveryDate as DeliveryDate, products.ID_Product as ID_Product, products.ProductName as ProductName, products.Price as Price, order_details.Quantity as Quantity , order_details.Discount as Discount
    FROM
        orders INNER JOIN order_details ON orders.ID_Order = order_details.ID_Order INNER JOIN products ON products.ID_Product = order_details.ID_Product
    WHERE
        orders.ID_Order LIKE :orderId';  
        
        // nomrororKa sanpoca
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':orderId', $orderId);
        // wunomisem sampoc
        $stmt->execute();
        
        return $stmt;
        
        }

        function POSTOrder($data){
            $Ordid = $data['ID_Order'];
            $Custid=$data['ID_Customer'];
            $Odate=$data['OrderDate'];
            $Ddate=$data['DeliveryDate'];

            $query = 'INSERT INTO orders (ID_Order, ID_Customer, OrderDate, DeliveryDate) VALUES (:Ordid, :Custid, :Odate, :Ddate)';  
              
              $stmt = $this->conn->prepare($query);
              $stmt->bindValue(':Ordid', $Ordid);
              $stmt->bindValue(':Custid', $Custid);
              $stmt->bindValue(':Odate', $Odate,PDO::PARAM_STR);
              $stmt->bindValue(':Ddate', $Ddate,PDO::PARAM_STR);

      
              if($stmt->execute())
              echo("Заказ успешно создан, идентификатор заказа - $Ordid");
             
              return;
          }

          function PUTOrder($goodID,$data){
            $Ordid = $data['ID_Order'];
            $Custid=$data['ID_Customer'];
            $Odate=$data['OrderDate'];
            $Ddate=$data['DeliveryDate'];

            $query = 'UPDATE orders SET ID_Order = :Ordid, ID_Customer = :Custid, OrderDate = :Odate, DeliveryDate = :Ddate WHERE orders.ID_Order = :goodID';  
              
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':Ordid', $Ordid);
            $stmt->bindValue(':Custid', $Custid);
            $stmt->bindValue(':Odate', $Odate,PDO::PARAM_STR);
            $stmt->bindValue(':Ddate', $Ddate,PDO::PARAM_STR);
            $stmt->bindValue(':goodID', $goodID);
      
              if($stmt->execute())
              echo("Заказ успешно изменен, идентификатор заказа - $Ordid");
             
              return;
          }

          function DELETEOrder($goodID){
            $query = 'DELETE FROM orders WHERE orders.ID_Order = :goodID';  
              
              $stmt = $this->conn->prepare($query);
              $stmt->bindValue(':goodID', $goodID);
      
              if($stmt->execute())
              echo("Заказ успешно удален, идентификатор удаленного заказа - $goodID");
             
              return;
          }
    
}
?>