<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Корзина</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="header__navmenu">
                <div class="header__logo">
                    <h2 class="title__logo"><a href="index.php">FigureShop</a></h2>
                    <div class="header__line"></div>
                </div>
                <div class="header__trolley">
                    
                    <div class="header__trolley-wrapper">
                        <a href="cart.php" class="header__link-trolley">
                            <img src="img/icons8-корзина-90.png" alt="" class="header__img">
                        </a>
                        <div class="header__pointer"></div>
                    </div>
    
                </div>
            </nav>
        </div>
    </header>

    <section class="cart">
        <div class="container">
            <?php
                require('orderFacade.php');        
                $facade->generateOrder();
            ?>
            <!-- <p id="cart__summ">1</p>
            <p id="cart__discount">2</p>
            <p id="cart__shipping">3</p>
            <p id="cart__total" class="cart__total">Итого: 0 ₽</p>
            <hr class="cart__line">
            <ul id="cart__list" class="cart__list">
                <li class="cart__item"></li>
            </ul> -->
            <button class="btn-sbmt">Оформить заказ</button>
            
        </div>
    </section>


    <footer class="footer">
        <div class="container">
            <div class="footer__author">
                <a href="https://vk.com/sdanilr" class="footer__link">Direct by <span class="footer__ellow">Danila Sakovskiy</span></a>
            </div>
        </div>
    </footer>
    
</body>
</html>