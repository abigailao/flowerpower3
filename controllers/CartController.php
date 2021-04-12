<?php


class cartController
{
    //add a product to store cart
    public function addToCart($id, $product, $amount)
    {
        //check if the product isn't already in the session array
        if (isset($_SESSION["cart_item"]) && array_key_exists($id, $_SESSION["cart_item"])) {
            //if it is add the new amount to the amount already in the cart
            $_SESSION["cart_item"][$id]['amount'] = $_SESSION["cart_item"][$id]['amount'] + $amount;
        } else {
            //if it is not add the product to the cart
            $cart = array("id" => $id, "product" => $product, "amount" => $amount);
            $_SESSION["cart_item"][$id] = $cart;
        }

    }

    //remove the product from the cart
    public function removeFromCart($id)
    {
        //check it the product is in the cart
        if (array_key_exists($id, $_SESSION["cart_item"])) {
            //remove it from the session array
            unset($_SESSION["cart_item"][$id]);
        }
    }

}