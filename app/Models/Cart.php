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
        if($newProductVariant['quantity']> $variant->stock)
            return false;
        $this->listProductVariants[$variant_id] = $newProductVariant;
        $this->totalPrice += $quantity*$variant->price;
        $this->totalQuantity+=$quantity;
        return true;
    }
    public function deleteItemCart($variant_id)
    {
        $this->totalQuantity -= $this->listProductVariants[$variant_id]['quantity'];
        $this->totalPrice -= $this->listProductVariants[$variant_id]['price'];
        unset($this->listProductVariants[$variant_id]);
    }

    public function minusOnQuantity($variant_id)
    {
        $this->totalQuantity -=1;
        $this->totalPrice -= $this->listProductVariants[$variant_id]['variant_info']->price;
        $this->listProductVariants[$variant_id]['quantity']-=1;
        $this->listProductVariants[$variant_id]['price']-=$this->listProductVariants[$variant_id]['variant_info']->price;
    }

}
