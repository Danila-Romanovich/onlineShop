<?php

class cart {
    private $cart;

    public function __construct() {
        $this->cart = array();
    }

    public function setCart() {
        require('connection.php');
        $sql = "SELECT order_items.id_item as id, items.name, items.colorName as color, (items.price * order_items.quantity) as sum, order_items.quantity FROM order_items INNER JOIN items ON order_items.id_item = items.id;";
        $result = mysqli_query($conn, $sql);
        $incr = 0;
        foreach($result as $row) {
            $this->cart[$incr] = $row;
            $incr += 1;
        }
        
    }

    public function getCart() {
        return $this->cart;
    }

    public function addToCart($itemId, $orderId) {
        require('connection.php');
        $sql = "SELECT * FROM order_items WHERE id_item=$itemId AND id_order=$orderId";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            $quantity = $row['quantity'] + 1;
            $sqlUpd = "UPDATE order_items SET quantity=$quantity WHERE id_item=$itemId";
            mysqli_query($conn, $sqlUpd);
        } else {
            $sqlInsert = "INSERT INTO order_items (id_item, id_order, quantity) VALUES ($itemId, $orderId, 1    )";
            mysqli_query($conn, $sqlInsert);
        }
    }

    public function carLength() {
        return count($this->cart);
    }

    public function showCart() {
        echo "<hr class=\"cart__line\">";
        echo'<ul id="cart__list" class="cart__list">';
                
        foreach ($this->cart as $item) {
            $name = $item['name'];
            $color = $item['color'];
            $quantity = $item['quantity'];
            $sum = $item['sum'];
            echo "<li class=\"cart__item\">Название: $name | Цвет: $color | Кол-во: $quantity | Цена: $sum ₽";
        }

        echo '</ul>';
    }
}

class discount {
    private $discountValue;

    public function __construct() {
        $this->discountValue = 0;
    }

    public function discountCalculator($cart) {
        $count = 0;
        forEach($cart as $item) {
            $count += $item['quantity'];
        }

        if ($count >= 10) {
            $this->discountValue = 15;
        } else if ($count >= 5 && $count < 10) {
            $this->discountValue = 10;
        } else if ($count >= 3) {
            $this->discountValue = 5;
        } else {
            $this->discountValue = 0;
        }
        return $this->discountValue;
    }
}

class shipping {
    private $shippingValue;

    public function __construct() {
        $this->shippingValue = 250;
    }

    public function shippingCalculator($cart) {
        $totalSum = 0;
        forEach($cart as $item) {
            $totalSum += $item['sum'];
        }

        if ($totalSum >= 1150) {
            $this->shippingValue = 0;
        } else if ($totalSum >= 500 && $totalSum < 1000) {
            $this->shippingValue = 150;
        } else if ($totalSum >= 250) {
            $this->shippingValue = 200;
        } else {
            $this->shippingValue = 250;
        }
        return $this->shippingValue;
    }

    
}

class sum {
    private $totalSum;

    public function __construct() {
        $this->totalSum = 0;
    }

    public function sumCalc($cart) {
        forEach($cart as $item) {
            $this->totalSum += $item['sum'];
        }
        return $this->totalSum;
    }
}


class productOrderFacade {
    private $orderId = '';
    private $cart;
    private $discount;
    private $shipping;
    private $sum;
    
    public function __construct($pID) {
        $this->orderId = $pID;
        $this->cart = new cart();
        $this->cart->setCart();
        $this->discount = new discount();
        $this->shipping = new shipping();
        $this->sum = new sum();
    }

    public function addToCart($id) {
        $this->cart->addToCart($id, $this->orderId);
        $this->cart->setCart();
    }
    
    public function generateOrder() {
    
        if($this->qtyCheck() > 0) {
    
            $sum = $this->sumCalculator();
            echo "<p id=\"cart_summ\">Сумма: $sum</p>";
            // Расчёт скидки
            $discount = $this->discountCalculator();
            echo "<p id=\"cart__discount\">Скидка: $discount %</p>";
            $shipping = $this->shippingCalculator();
            echo "<p id=\"cart__shipping\">Доставка: $shipping ₽</p>";
            
            $total = ($sum * ((100 - $discount)/100)) + $shipping;
            echo "<p id=\"cart__total\" class=\"cart__total\">Итого: $total ₽</p>";

            $this->cart->showCart();
    
        }
    
    }

    private function qtyCheck() {    
        $qty = $this->cart->carLength();      
        if($qty > 0) { 
            return true;
        } 
        else { 
            return false; 
        }   	
    }

    private function shippingCalculator() {    
        return $this->shipping->shippingCalculator($this->cart->getCart());	
    }

    private function discountCalculator() {    
        return $this->discount->discountCalculator($this->cart->getCart());
    }        

    private function sumCalculator() {
        return $this->sum->sumCalc($this->cart->getCart());
    }
        
    }

    $facade = new productOrderFacade(1);
?>