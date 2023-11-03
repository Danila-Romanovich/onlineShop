<?php

class Product {
    private $id;
    private $figureType;
    private $figureName;
    private $color;
    private $colorName;
    private $price;
    private $quantity;
    
    public function __construct($id, $figureType, $colorName, $price, $quantity) {
        $this->id = $id;
        $this->figureType = $figureType;
        if($figureType == 'circle') {
            $this->figureName = 'Круг';
        } else {
            $this->figureName = 'Квадрат';
        }
        $this->colorName = $colorName;
        if($colorName == 'Синий') {
            $this->color = "blue";
        } elseif($colorName == 'Красный') {
            $this->color = "red";
        } else {
            $this->color = "green";
        }
        $this->price = $price;
        $this->quantity = $quantity;
        
    }

    public function getId() {
        return $this->id;
    }

    public function getFigureType() {
        return $this->figureType;
    }

    public function getFigureName() {
        return $this->figureName;
    }

    public function getColorClass() {
        return $this->color;
    }

    public function getColorName() {
        return $this->colorName;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function displayProductInfo() {
        echo '<li class="figure-shop__item">';
        echo '<div class="figure-shop__figure">';
        echo '<div class="figure figure__'. $this->figureType . ' figure_' . $this->color . '"></div>';       
        echo '</div>';
        echo '<div class="figure-shop__price">'. $this->price . ' ₽</div>';
        echo '<div class="figure-shop__inner">';
        echo '<div class="figure-shop__title">'. $this->figureName .'</div>';
        echo '<div class="figure-shop__descr">'. $this->colorName . '</div>';
        echo '<div class="button" data-product-id="'. $this->id .'" data-product-price="'. $this->price . '" data-product-type="' . $this->figureType . '">В корзину</div>';
        echo '</div>';
        echo'</li>';
    }
}

$product1 = new Product(1, "circle", "Синий", 25.00, 27);
$product2 = new Product(2, "square", "Зелёный", 36.00, 24);
$product3 = new Product(3, "circle", "Красный", 56.00, 30);
$product4 = new Product(4, "square", "Синий", 43.00, 25);
$product5 = new Product(5, "circle", "Зелёный", 27.00, 32);
$product6 = new Product(6, "square", "Красный", 37.00, 28);
// Пример использования класса Product


?>