<?php 

include("./clases.php");

$calculate = new Calculate();
$data = new Data();

// echo $_POST['name'];
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $type_pizza = $_POST['type_pizza'];
    $units_pizza = $_POST['units_pizza'];
    $type_mass = $_POST['type_mass'];
    $type_media = $_POST['type_media'];
    $type_client = $_POST['type_client'];

    $discountMedia = $data->typeMedia($type_media);

    if($units_pizza == 1){
        $discountUnits = 0;
    }
    else if($units_pizza == 2){
        $discountUnits = $data->numberUnits('dos');
    }
    else if($units_pizza == 3){
        $discountUnits = $data->numberUnits('tres');
    }
    else if($units_pizza > 3){
        $discountUnits = $data->numberUnits('tres_+');
    }

    $discountClient = $data->typeClient($type_client);

    $priceProduct = $data->typePizza($type_pizza);
    $units = $units_pizza;
    $priceMass = $data->typeMass($type_mass);

    $totalDiscount = $calculate->calculateTotalDiscount($discountMedia, $discountUnits, $discountClient);
    $totalProducts = $calculate->sumProducts($priceProduct, $units, $priceMass);
    $totalPay = $calculate->calculateTotalToBeTurnedOff($totalProducts,$totalDiscount);

    $response = [
        "name"=>$name,
        "address"=>$address,
        "product"=>$type_pizza,
        "discount"=>$totalDiscount,
        "units"=>$units_pizza,
        "total"=>$totalPay
    ];

    echo json_encode($response);
    
}else{
    echo "error";
}
