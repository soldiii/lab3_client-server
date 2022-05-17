<?php
class Customer {

private $conn;

// свойства объекта
public $ID_Customer;
public $CompanyName;
public $FirstName;
public $LastName;
public $Phone;
public $Fax;
public $Address;
public $City;
public $Country;

public function __construct($db) {
	$this->conn = $db;
}

function FullInformation ($customerId) {

    $query = 'SELECT
    ID_Customer, CompanyName, LastName, FirstName, Phone, Fax, Address, City, Country
FROM
     customers 
WHERE
    ID_Customer LIKE :id'; 
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(':id', $customerId);
    $stmt->execute();
    
    return $stmt;
    
    }

    function GeneralInformation ($customerId) {

        $query = 'SELECT
            ID_Customer, CompanyName, Phone
        FROM
             customers 
        WHERE
            ID_Customer LIKE :id';  
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $customerId);
        $stmt->execute();
        
        return $stmt;    
    }

    
        function POSTCustomer($data){
            $id = $data['ID_Customer'];
            $Cname = $data['CompanyName'];
            $Lname = $data['LastName'];
            $Fname = $data['FirstName'];
            $phone = $data['Phone'];
            $fax = $data['Fax'];
            $address = $data['Address'];
            $city = $data['City'];
            $country = $data['Country'];

            $query = 'INSERT INTO customers (ID_Customer, CompanyName, LastName, FirstName, Phone, Fax, Address, City, Country) VALUES (:id, :Cname, :Lname, :Fname, :phone, :fax, :address, :city, :country)';  
              
              $stmt = $this->conn->prepare($query);
              $stmt->bindValue(':id', $id);
              $stmt->bindValue(':Cname', $Cname,PDO::PARAM_STR);
              $stmt->bindValue(':Lname', $Lname,PDO::PARAM_STR);
              $stmt->bindValue(':Fname', $Fname,PDO::PARAM_STR);
              $stmt->bindValue(':phone', $phone,PDO::PARAM_STR);
              $stmt->bindValue(':fax', $fax,PDO::PARAM_STR);
              $stmt->bindValue(':address', $address,PDO::PARAM_STR);
              $stmt->bindValue(':city', $city,PDO::PARAM_STR);
              $stmt->bindValue(':country', $country,PDO::PARAM_STR);

      
              if($stmt->execute())
              echo("Покупатель успешно создан, идентификатор покупателя - $id");
             
              return;
          }

          function PUTCustomer($goodID,$data){
            $id = $data['ID_Customer'];
            $Cname = $data['CompanyName'];
            $Lname = $data['LastName'];
            $Fname = $data['FirstName'];
            $phone = $data['Phone'];
            $fax = $data['Fax'];
            $address = $data['Address'];
            $city = $data['City'];
            $country = $data['Country'];

            $query = 'UPDATE customers SET ID_Customer = :id, CompanyName = :Cname, LastName = :Lname, FirstName = :Fname, Phone = :phone, Fax = :fax, Address = :address, City = :city, Country = :country WHERE customers.ID_Customer = :goodID';  
              
              $stmt = $this->conn->prepare($query);
              $stmt->bindValue(':id', $id);
              $stmt->bindValue(':Cname', $Cname,PDO::PARAM_STR);
              $stmt->bindValue(':Lname', $Lname,PDO::PARAM_STR);
              $stmt->bindValue(':Fname', $Fname,PDO::PARAM_STR);
              $stmt->bindValue(':phone', $phone,PDO::PARAM_STR);
              $stmt->bindValue(':fax', $fax,PDO::PARAM_STR);
              $stmt->bindValue(':address', $address,PDO::PARAM_STR);
              $stmt->bindValue(':city', $city,PDO::PARAM_STR);
              $stmt->bindValue(':country', $country,PDO::PARAM_STR);
              $stmt->bindValue(':goodID', $goodID);
      
              if($stmt->execute())
              echo("Покупатель успешно изменен, идентификатор покупателя - $id");
             
              return;
          }

          function DELETECustomer($goodID){
            $query = 'DELETE FROM customers WHERE customers.ID_Customer = :goodID';  
              
              $stmt = $this->conn->prepare($query);
              $stmt->bindValue(':goodID', $goodID);
      
              if($stmt->execute())
              echo("Покупатель успешно удален, идентификатор удаленного покупателя - $goodID");
             
              return;
          }

    
}
?>