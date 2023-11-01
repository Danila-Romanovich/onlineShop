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
                <div class="header__trolley">
                    
                    <div class="header__trolley-wrapper">
                        <a href="trolley.php" class="header__link-trolley">
                            <img src="img/icons8-корзина-90.png" alt="" class="header__img">
                        </a>
                        <div class="header__pointer"></div>
                    </div>
    
                </div>
            </nav>
        </div>
    </header>

    <section class="figure-shop">
        <div class="container">
            <h2 class="title">Магазин</h2>    
            <div class="figure-shop__wrapper">
                <ul class="figure-shop__list">
                    <li class="figure-shop__item">
                        <div class="figure-shop__figure">
                            <div class="figure figure__circle figure_blue"></div>
                        </div>
                        <div class="figure-shop__price">100$</div>
                        <div class="figure-shop__inner">
                            <div class="figure-shop__title">Круг</div>
                            <div class="figure-shop__descr">Синий</div>
                            <div class="button">В корзину</div>
                        </div>
                    </li>
                    <li class="figure-shop__item">
                        <div class="figure-shop__figure">
                            <div class="figure figure_red"></div>
                        </div>
                        <div class="figure-shop__price">100$</div>
                        <div class="figure-shop__inner">
                            <div class="figure-shop__title">Квадрат</div>
                            <div class="figure-shop__descr">красный</div>
                            <div class="button">В корзину</div>
                        </div>
                    </li>
                    <li class="figure-shop__item">
                        <div class="figure-shop__figure">
                            <div class="figure figure__circle figure_green"></div>
                        </div>
                        <div class="figure-shop__price">100$</div>
                        <div class="figure-shop__inner">
                            <div class="figure-shop__title">Квадрат</div>
                            <div class="figure-shop__descr">Зелёный</div>
                            <div class="button">В корзину</div>
                        </div>
                    </li>
                </ul>
            </div>
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