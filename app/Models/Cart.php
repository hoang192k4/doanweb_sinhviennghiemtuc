<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $listProductVariants = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;



    public function setCart($cart){
        if($cart!=null){
            $this->listProductVariants = $cart->listProductVariants;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }
    public function addToCart($product,$variant,$quantity,$variant_id){
        $newProductVariant = ['quantity'=>0,'price'=>0,'product_info'=>$product,'variant_info'=>$variant];
        if($this->listProductVariants){
            if(array_key_exists($variant_id,$this->listProductVariants)){
                $newProductVariant = $this->listProductVariants[$variant_id];
            }
        }
        $newProductVariant['price'] += ($quantity*$variant->price);
        $newProductVariant['quantity']+=$quantity;
        $this->listProductVariants[$variant_id] = $newProductVariant;
        $this->totalPrice += $quantity*$variant->price;
        $this->totalQuantity+=$quantity;
    }
}
