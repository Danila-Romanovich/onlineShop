'use strict'
// Класс для добавления товаров в корзину
class Cart {
    constructor() {
        this.items = [];
    }

    addItem(item) {
        this.items.push(item);
    }
}

// Класс для расчета скидки
class DiscountCalculator {
    applyDiscount(cart) {
        // Реализуйте расчет скидки здесь
    }
}

// Класс для расчета стоимости доставки
class ShippingCalculator {
    calculateShippingCost(cart) {
        // Реализуйте расчет стоимости доставки здесь
    }
}

// Класс для генерации заказа
class OrderGenerator {
    generateOrder(cart) {
        // Генерируйте заказ на основе содержимого корзины
        return {
            items: cart.items,
            total: cart.items.reduce((total, item) => total + item.price, 0),
        };
    }
}


class OrderFacade {
    constructor() {
        this.cart = new Cart();
        this.discountCalculator = new DiscountCalculator();
        this.shippingCalculator = new ShippingCalculator();
        this.orderGenerator = new OrderGenerator();
    }

    addItemToCart(item) {
        this.cart.addItem(item);
    }

    placeOrder() {
        const discount = this.discountCalculator.applyDiscount(this.cart);
        const shippingCost = this.shippingCalculator.calculateShippingCost(this.cart);
        const order = this.orderGenerator.generateOrder(this.cart);

        // Реализуйте логику оплаты заказа здесь

        return {
            order,
            discount,
            shippingCost,
        };
    }
}

const orderFacade = new OrderFacade();

// Добавляем товары в корзину
const item1 = { name: 'Круг', price: 100 };
const item2 = { name: 'Квадрат', price: 120 };
orderFacade.addItemToCart(item1);
orderFacade.addItemToCart(item2);

// Формируем и оплачиваем заказ
const orderDetails = orderFacade.placeOrder();

console.log('Заказ:', orderDetails.order);
console.log('Скидка:', orderDetails.discount);
console.log('Стоимость доставки:', orderDetails.shippingCost);
