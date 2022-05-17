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

        if(count($urlData) === 2 && $urlData[0] === 'general_info'){
            $customerId = $urlData[1];
            $stmt = $customer->GeneralInformation($customerId);
        }

        if(count($urlData) === 1){
            $customerId = $urlData[0];
            $stmt = $customer->FullInformation($customerId);
        }

        if(count($urlData) === 2 && $urlData[1] === 'orders'){
            $customerId = $urlData[0];
            $stmt =$customer ->ListOfOrders($customerId);
        }

       
        $format = $_GET['format'];
        if($format != 'xml' && $format != 'json' && $format != ''){
            echo('Недопустимый параметр для format');
            return;
        }

        $num = $stmt->rowCount();
        if ($num>0) {
            $customers_arr=array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract ($row);
                if(count($urlData) === 1)
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
                else if (count($urlData) === 2 && $urlData[0] === 'general_info')
                    $customer_item=array(
                        "ID_Customer"=>$ID_Customer,
                        "CompanyName"=>$CompanyName,
                        "Phone"=>$Phone
                    );
                    else if (count($urlData) === 2 && $urlData[1] === 'orders')
                    $customer_item=array(
                        "ID_Customer"=>$ID_Customer,
                        "ID_Order"=>$ID_Order,
                        "OrderDate"=>$OrderDate,
                        "DeliveryDate"=>$DeliveryDate

                    );
                    array_push ($customers_arr, $customer_item);
                }
            
                http_response_code (200) ;
                include_once 'config/XmlEncoder.php';
                if($format == 'xml'){
                $xml = new SimpleXMLElement('<result/>');
                to_xml($xml,$customers_arr);
                echo($xml->asXML());
                }
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
    if ($method === 'POST' && empty($urlData)) {
        $customer->POSTCustomer($formData);
        return;
    }


    // Обновление всех данных товара
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
