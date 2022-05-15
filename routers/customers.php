<?php
    header ("Access-Control-Allow-Origin: *");
    header ("Content-Type: application/json; charset=UTF-8");
    include_once 'config/database.php';
    include_once 'objects/Customer.php';

// Роутер
function route($method, $urlData, $formData) {

    $database = new Database();
    $db = $database->getConnection();
    $customer = new Customer($db);
    // Получение информации о покупателе
    if ($method === 'GET') {
        // Получаем id товара
        $customerId = $_GET['id'];
        $info = $_GET['general'];

        if($info != 1 && $info != 0 && $info != ''){
            echo('Недопустимый параметр для general');
            return;
        }
        $format = $_GET['format'];
        if($format != 'xml' && $format != 'json' && $format != ''){
            echo('Недопустимый параметр для format');
            return;
        }
        if($customerId == ""){
            echo "Введите идентификатор покупателя";
            return;
        }
        $flag = ($info=="")?0:1;
        if($flag == 0){
            $stmt = $customer->FullInformation($customerId);
        }
        else{
            $stmt = $customer->GeneralInformation($customerId);
        }
        $num = $stmt->rowCount();
        if ($num>0) {
            $customers_arr=array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract ($row);
                if($flag==0){
                 $customer_item=array(
                        "ID_Customer"=>$ID_Customer,
                        "CompanyName"=>$CompanyName,
                        "LastName" =>$LastName,
                        "FirstName"=>$FirstName,
                        "Phone"=>$Phone,
                        "Fax"=>$Fax,
                        "Address"=>$Address,
                        "City"=>$City,
                        "Country"=>$Country
                    );
                }
                else{
                    $customer_item=array(
                        "ID_Customer"=>$ID_Customer,
                        "CompanyName"=>$CompanyName,
                        "Phone"=>$Phone,
                    );
                }
                array_push ($customers_arr, $customer_item);
            }
                http_response_code (200) ;
                include_once 'config/XmlEncoder.php';
                if($format == 'xml')
                xml_encode($customers_arr);
                else
                if($format == 'json' || $format == '')
                echo json_encode($customers_arr);
        }
            else {
                http_response_code (104) ;
                echo json_encode (array ("message" => "Клиенты не найдены."), JSON_UNESCAPED_UNICODE);
            }
    }
    



    // Добавление нового товара
    // POST /goods
    if ($method === 'POST' && empty($urlData)) {
        $customer->POSTCustomer($formData);


        
        return;
    }


    // Обновление всех данных товара
    // PUT /goods/{goodId}
    if ($method === 'PUT' && count($urlData) === 1) {
        // Получаем id товара
        $goodId = $urlData[0];
        $customer->PUTCustomer($goodId,$formData);
        

        return;
    }


    // Удаление товара
    if ($method === 'DELETE' && count($urlData) === 1) {
        // Получаем id товара
        $goodId = $urlData[0];

        $customer->DELETECustomer($goodId);
        
        return;
    }

}
?>
