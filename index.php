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
                        // Подключение к БД и выборка товаров
                        session_start(); 
                        require("connection.php");

                        $sql = $db->query('SELECT items.id, figures.name AS figure_name, items.color, items.price, items.quantity FROM items INNER JOIN figures ON items.id_figure = figures.id;');
                        $items = $sql->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($items as $item) {
                            
                            echo '<li class="figure-shop__item">';
                            echo '<div class="figure-shop__figure">';

                            if($item['color'] == '#266beb') {
                                $color = "Синий";
                                echo '<div class="figure figure__'. $item['figure_name'] . ' figure_blue"></div>';
                            } elseif($item['color'] == '#e23e3e') {
                                $color = "Красный";
                                echo '<div class="figure figure__'. $item['figure_name'] . ' figure_red"></div>';
                            } else {
                                $color = "Зелёный";
                                echo '<div class="figure figure__'. $item['figure_name'] . ' figure_green"></div>';
                            }

                            if($item['figure_name'] == "circle") {
                                $figure = 'Круг';
                            }
                            else {
                                $figure = 'Квадрат';
                            }
                            
                            echo '</div>';
                            echo '<div class="figure-shop__price">'. $item['price'] . ' ₽</div>';
                            echo '<div class="figure-shop__inner">';
                            echo '<div class="figure-shop__title">'. $figure .'</div>';
                            echo '<div class="figure-shop__descr">'. $color . '</div>';
                            echo '<div class="button" data-product-id="'. $item['id'] .'" data-product-name="Круг" data-product-price="'. $item['price'] . '">В корзину</div>';
                            echo '</div>';
                            echo'</li>';
                            // echo '<li>';
                            // echo '<h2>' . $item['id_figure'] . '</h2>';
                            // echo '<p>' . $item['description'] . '</p>';
                            // echo '<p>Цена: $' . $item['price'] . '</p>';
                            // echo '<p>Цвет: ' . $item['color'] . '</p>';
                            // echo '<form method="post">';
                            // echo '<input type="hidden" name="action" value="add_to_cart">';
                            // echo '<input type="hidden" name="item_id" value="' . $item['item_id'] . '">';
                            // echo '<input type="submit" value="Добавить в корзину">';
                            // echo '</form>';
                            // echo '</li>';
                        }
                    ?>
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