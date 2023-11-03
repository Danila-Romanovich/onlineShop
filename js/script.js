// Обработчик нажатия на кнопки "Добавить в корзину"
const addToCartButtons = document.querySelectorAll('.button');
const cartItemsList = document.getElementById('cart__list');
const cartTotal = document.getElementById('cart__total');

let cart = [];

addToCartButtons.forEach(button => {
    button.addEventListener('click', () => {
        const productId = button.getAttribute('data-product-id');
        const productName = button.getAttribute('data-product-type');
        const productPrice = parseFloat(button.getAttribute('data-product-price'));

        const item = {
            id: productId,
            name: productName,
            price: productPrice
        };

        cart.push(item);

        // Отображение товара в корзине
        const cartItem = document.createElement('li');
        cartItem.classList.add("cart__item");
        cartItem.textContent = `${item.name} - ${item.price} ₽`;
        cartItemsList.appendChild(cartItem);

        // Обновление общей стоимости
        const total = cart.reduce((acc, item) => acc + item.price, 0);
        cartTotal.textContent = `Итого: ${total} ₽`;
    });
});

// Отправка данных корзины на сервер для обработки и сохранения в БД
// Здесь нужно использовать AJAX-запрос или Fetch API для отправки данных на сервер (PHP).
