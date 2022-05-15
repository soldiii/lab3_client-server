<?php
    header ("Access-Control-Allow-Origin: *");
    header ("Content-Type: application/json; charset=UTF-8");
    include_once 'config/database.php';
    include_once 'objects/Product.php';

// Роутер
function route($method, $urlData, $formData) {

    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);
    // Получение информации о покупателе
    if ($method === 'GET') {
        // Получаем id товара
        $begin = $_GET['begin'];
        $end = $_GET['end'];

        if($begin == '' && $end != '' || $begin != '' && $end == '' ){
            echo("Неправильно задан промежуток времени");
            return;
        }

        $format = $_GET['format'];
        if($format != 'xml' && $format != 'json' && $format != ''){
            echo('Недопустимый параметр для format');
            return;
        }
        if($begin == '' && $end == '')
        $stmt=$product->PriceList();
        else{
            $flag =1;
        $stmt=$product->Statistics($begin,$end);
        }
        $num = $stmt->rowCount();
        if ($num>0) {
            $products_arr=array();
            $products_arr["records"]=array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract ($row);
                if($flag !=1)
                $product_item=array(
                    "ProductName"=>$ProductName,
                    "Price"=>$Price
                );
                else{
                    $product_item=array(
                        "ProductName"=>$ProductName,
                        "Quantity"=>$Quantity
                    );
                }
                array_push ($products_arr["records"], $product_item);
            }
                http_response_code (200) ;
                include_once 'config/XmlEncoder.php';
                if($format == 'xml')
                xml_encode($products_arr);
                else
                if($format == 'json' || $format == '')
                echo json_encode($products_arr);
        }
            else {
                http_response_code (104) ;
                echo json_encode (array ("message" => "Товары не найдены."), JSON_UNESCAPED_UNICODE);
            }
    }
    



    // Добавление нового товара
    if ($method === 'POST' && empty($urlData)) {
    
        $product->POSTProduct($formData);
        
        return;
    }


    // Обновление всех данных товара
    if ($method === 'PUT' && count($urlData) === 1) {
        // Получаем id товара
        $goodId = $urlData[0];
        $product->PUTProduct($goodId,$formData);

        return;
    }

    // Удаление товара
    if ($method === 'DELETE' && count($urlData) === 1) {
        // Получаем id товара
        $goodId = $urlData[0];
        $product->DELETEProduct($goodId);

        return;
    }

}
?>