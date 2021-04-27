<?php

class Data{
    private $type_pizza_price;
    private $type_client_dicount;
    private $type_mass_price;
    private $type_media_discount;
    private $discount_for_units;

    public function __construct() {
        $this->type_pizza_price = [
            "personal"=>5,
            "grande"=>12,
            "gigante"=>16
        ];

        $this->type_client_dicount = [
            "frecuente"=>5,
            "grande"=>7,
            "empresarial"=>9
        ];

        $this->type_mass_price = [
            "pan_pizza"=>2,
            "masa_alta"=>3
        ];

        $this->type_media_discount = [
            "telefono"=>15,
            "internet"=>17,
            "sucursal"=>13
        ];

        $this->discount_for_units = [
            "dos"=>25,
            "tres"=>30,
            "tres_+"=>35
        ];
    }

    public function typePizza($selected){
        
        if($selected == "personal"){
            return $this->type_pizza_price["personal"];
        }
        else if($selected == "grande"){
            return $this->type_pizza_price["grande"];
        }
        else if($selected == "gigante"){
            return $this->type_pizza_price["gigante"];
        }
    }

    public function typeMass($selected){
        if($selected == "pan_pizza"){
            return $this->type_mass_price["pan_pizza"];
        }
        else if($selected == "masa_alta"){
            return $this->type_mass_price["masa_alta"];
        }
    }

    public function typeClient($selected){
        if($selected == "frecuente"){
            return $this->type_client_dicount["frecuente"];
        }
        else if($selected == "grande"){
            return $this->type_client_dicount["grande"];
        }
        else if($selected == "empresarial"){
            return $this->type_client_dicount["empresarial"];
        }
    }

    public function typeMedia($selected){
        if($selected == "telefono"){
            return $this->type_media_discount["telefono"];
        }
        else if($selected == "internet"){
            return $this->type_media_discount["internet"];
        }
        else if($selected == "sucursal"){
            return $this->type_media_discount["sucursal"];
        }
    }

    public function numberUnits($selected){
        if($selected == "dos"){
            return $this->discount_for_units["dos"];
        }
        else if($selected == "tres"){
            return $this->discount_for_units["tres"];
        }
        else if($selected == "tres_+"){
            return $this->discount_for_units["tres_+"];
        }
    }

}

class Calculate{

    public function calculateTotalDiscount($discount_media, $discount_units, $discount_client){
        $total = $discount_media + $discount_units + $discount_client;
        return $total;
    }

    public function sumProducts($price_product, $units, $price_mass){
        $total = $units * ($price_product + $price_mass);
        return $total;
    }

    public function calculateTotalToBeTurnedOff($total_purchase, $total_discount){
        $result = $total_purchase / 100;
        $desc = $result * $total_discount;
        $total = $total_purchase - $desc;
        return $total;
    }


}

?>