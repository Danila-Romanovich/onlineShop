<?php
class productOrderFacade {

    public $productID = '';
    
    public function __construct($pID) {
        $this->productID = $pID;
    }
    
    public function generateOrder() {
    
        if($this->qtyCheck() > 0) {
    
            // Добавление продукта в корзину
            $this->addToCart();
    
            // Расчёт стоимости доставки
            $this->calulateShipping();
    
            // Расчёт скидки
            $this->applyDiscount();
    
            // Генерация заказа
            $this->placeOrder();
    
        }
    
    }
    
    private function addToCart () {
        /* .. добавление продукта в корзину ..  */
    }
    
    private function qtyCheck() {
    
        $qty = 'get product quantity from database';
    
        if($qty > 0) {
            return true;
        } else {
            return true;
        }
    }
    
    
    private function calulateShipping() {
        $shipping = new shippingCharge();
        $shipping->calculateCharge();
    }
    
    private function applyDiscount() {
        $discount = new discount();
        $discount->applyDiscount();
    }
    
    private function placeOrder() {
        $order = new order();
        $order->generateOrder();
    }
    }
?>