<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $listProducts = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        if($cart!=null){
            $this->listProducts = $cart->listProducts;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function addToCart($product,$id){
        $newProduct = ['quantity'=>0,'price'=>$product->price,'info'=>$product];
        if($this->listProducts){
            if(array_key_exists($id,$this->listProducts)){
                $newProduct = $this->listProdcts[$id];
            }
        }
        $newProduct['quantity']++;
        $newProduct['price'] =$newProduct['quantity'] * $product->price;
        $this->listProducts[$id] = $newProduct;
        $this->totalPrice += $newProduct['price'];
        $this->totalQuantity++;

    }
}
