'use strict'

document.addEventListener('DOMContentLoaded', () => {
    const items = [
        {
            id: 1,
            name: "Круг",
            figure: "circle",
            color: "Синий",
            colorClass: "blue", 
            price: 70,
            quantity: 8
        },
        {
            id: 2,
            name: "Круг",
            figure: "circle",
            color: "Зелёный",
            colorClass: "green", 
            price: 60,
            quantity: 12
        },
        {
            id: 3,
            name: "Квадрат",
            figure: "square",
            color: "Красный",
            colorClass: "red", 
            price: 50,
            quantity: 10
        },
        {
            id: 4,
            name: "Квадрат",
            figure: "square",
            color: "Синий",
            colorClass: "blue", 
            price: 70,
            quantity: 8
        }
    ];

    const figuresList = document.querySelector('.figure-shop__list');
    const cartTotal = document.getElementById('cart__total');
    const cartSumm = document.getElementById('cart__summ');
    const cartDiscount = document.getElementById('cart__discount');
    const cartShipping = document.getElementById('cart__shipping');
    const cartItemsList = document.getElementById('cart__list');

    function showItemsList(arr, selector) {
        selector.innerHTML = "";
        arr.forEach((item, i) => {
            if (item.quantity != 0) {
                selector.innerHTML += `
                <li class="figure-shop__item">
                    <div class="figure-shop__figure">
                        <div class="figure figure__${item.figure} figure_${item.colorClass}"></div>
                    </div>
                    <div class="figure-shop__price">${item.price} ₽</div>
                    <div class="figure-shop__inner">
                        <div class="figure-shop__title">${item.name}</div>
                        <div class="figure-shop__descr">${item.color}</div>
                        <div class="button" data-id="${item.id}">В корзину</div>
                    </div>
                </li>
            `
            }
            
        });

        const addToCartButtons = document.querySelectorAll('.button');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.getAttribute('data-id');
                addToCart(items[productId-1]);
            })
                
        });
    }

    showItemsList(items, figuresList);

    figuresList.addEventListener('click', (e) => {
        const target = e.target;
        console.log(target);
    });

    let cart = [];

    function addToCart(item) {
        
        const existingCartItem = cart.find(cartItem => cartItem.id === item.id);

        if (existingCartItem) {
            
            existingCartItem.quantity++;
        } else {

            item.quantity = 1;
            cart.push(item);
        }

        console.log(cart)
        
        updateCartDisplay();
    }

    function updateCartDisplay() {
        cartItemsList.innerHTML = '';
        let summ = 0;
        let total = 0;
        let discount = checkDiscount() / 100;
        let shipping = checkShipping();

        cart.forEach(item => {
            const cartItem = document.createElement('li');
            cartItem.classList.add("cart__item");
            cartItem.textContent = `${item.name} - ${item.price} ₽ (${item.quantity} шт.)`;
            cartItemsList.appendChild(cartItem);

            summ += item.price * item.quantity;
            

        });
        console.log(summ);
        total = (summ * (1 - discount)) + shipping;
        console.log(total);
        cartSumm.textContent = `Сумма без скидки: ${summ} ₽`;
        cartDiscount.textContent = `Скидка: ${discount * 100} %`;
        cartShipping.textContent = `Доставка: ${shipping} ₽`;
        cartTotal.textContent = `Итого: ${total} ₽`;
        console.log(checkDiscount());
    }

    showItemsList(items, figuresList);

    function checkDiscount() {
        let count = 0;
        let discount = 0;
        cart.forEach(item => {
            count += item.quantity;
        })
     
        if (count >= 10) {
            discount = 15;
        } else if (count >= 5 && count < 10) {
            discount = 10;
        } else if (count >= 3) {
            discount = 5;
        } else {
            discount = 0;
        }
        return discount;
    }

    function checkShipping() {
        let summ = 0;
        let shipping = 0;
        cart.forEach(item => {
            summ += item.price * item.quantity;
        })
     
        if (summ >= 1150) {
            shipping = 0;
        } else if (summ >= 500 && summ < 1150) {
            shipping = 150;
        } else if (summ >= 250) {
            shipping = 200;
        } else {
            shipping = 250;
        }
        return shipping;
    }
});