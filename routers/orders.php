<?php
    header ("Access-Control-Allow-Origin: *");
    header ("Content-Type: application/json; charset=UTF-8");
    include_once 'config/database.php';
    include_once 'objects/Order.php';

// Роутер
function route($method, $urlData, $formData) {

    $database = new Database();
    $db = $database->getConnection();
    $order = new Order($db);
    // Получение информации о покупателе
    if ($method === 'GET') {
        // Получаем id товара
        $customerId = $_GET['Cust_id'];
        $orderId = $_GET['Ord_id'];
        
        $format = $_GET['format'];
        if($format != 'xml' && $format != 'json' && $format != ''){
            echo('Недопустимый параметр для format');
            return;
        }
        if($customerId == "" && $orderId == ""){
            echo "Введите идентификатор заказа или покупателя";
            return;
        }
        if($orderId != '')
        $stmt = $order ->FullInfoAboutOrder($orderId);
        else
        $stmt = $order ->ListOfOrders($customerId);
        $num = $stmt->rowCount();
        if ($num>0) {
            $orders_arr=array();
            $orders_arr["records"]=array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract ($row);
                if($orderId== '')
                $order_item=array(
                    "ID_Customer"=>$ID_Customer,
                    "ID_Order"=>$ID_Order,
                    "OrderDate" =>$OrderDate,
                    "DeliveryDate"=>$DeliveryDate

                );
                else
                 $order_item=array(
                        "ID_Order"=>$ID_Order,
                        "ID_Customer"=>$ID_Customer,
                        "OrderDate" =>$OrderDate,
                        "DeliveryDate"=>$DeliveryDate,
                        "ID_Product"=>$ID_Product,
                        "ProductName"=>$ProductName,
                        "Price"=>$Price,
                        "Quantity"=>$Quantity,
                        "Discount"=>$Discount
                    );
                array_push ($orders_arr["records"], $order_item);
            }
                http_response_code (200) ;
                include_once 'config/XmlEncoder.php';
                if($format == 'xml')
                xml_encode($orders_arr);
                else
                if($format == 'json' || $format == '')
                echo json_encode($orders_arr);
        }
            else {
                http_response_code (104) ;
                echo json_encode (array ("message" => "Заказы не найдены."), JSON_UNESCAPED_UNICODE);
            }
    }
    



    // Добавление нового товара
    // POST /goods
    if ($method === 'POST' && empty($urlData)) {

        $order->POSTOrder($formData);

        
        return;
    }


    // Обновление всех данных товара
    // PUT /goods/{goodId}
    if ($method === 'PUT' && count($urlData) === 1) {
        // Получаем id товара
        $goodId = $urlData[0];

        $order->PUTOrder($goodId,$formData);


        return;
    }

    // Удаление товара
    // DELETE /goods/{goodId}
    if ($method === 'DELETE' && count($urlData) === 1) {
        // Получаем id товара
        $goodId = $urlData[0];

        $order->DELETEOrder($goodId);
        
        return;
    }

}
?>
