<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Магазин фигур</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="header__navmenu">
                <div class="header__logo">
                    <h2 class="title__logo"><a href="index.php">FigureShop</a></h2>
                    <div class="header__line"></div>
                </div>
            </nav>
        </div>
    </header>

    <section class="figure-shop">
        <div class="container">
            <h2 class="title">Магазин</h2>    
            <div class="figure-shop__wrapper">
                <ul class="figure-shop__list">
                    <!-- <li class="figure-shop__item">
                        <div class="figure-shop__figure">
                            <div class="figure figure__circle figure_blue"></div>
                        </div>
                        <div class="figure-shop__price">100$</div>
                        <div class="figure-shop__inner">
                            <div class="figure-shop__title">Круг</div>
                            <div class="figure-shop__descr">Синий</div>
                            <div class="button">В корзину</div>
                        </div>
                    </li> -->
                    <?php
                        
                        session_start(); 
                        require('items.php');
                        
                        $product1->displayProductInfo();
                        $product2->displayProductInfo();
                        $product3->displayProductInfo();
                        $product4->displayProductInfo();
                        $product5->displayProductInfo();
                        $product6->displayProductInfo();
                        
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="cart">
        <div class="container">
            <h2 class="title">Корзина</h2> 
            <form action="POST" class="cart__form">
                <p id="cart__total" class="cart__total">Итого: 0 ₽</p>
                <hr class="cart__line">
                <ul id="cart__list" class="cart__list">
                    
                </ul>
                <button class="btn-sbmt">Оформить заказ</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            
            <div class="footer__author">
                <a href="https://vk.com/sdanilr" class="footer__link">Direct by <span class="footer__ellow">Danila Sakovskiy</span></a>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>