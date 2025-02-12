document.addEventListener('DOMContentLoaded', function() {
    Checkout.add_events();
    Checkout_Data.display_total_price();
});

const Checkout = (function() {

    const checkoutForm = document.getElementById('checkout-form');
    const paymentMethod = document.querySelector('input[name="payment-method"]');
    const applyVoucherBtn = document.getElementById('apply-voucher');

    function add_events() {
        checkoutForm.addEventListener('submit', submit_checkout);
        applyVoucherBtn.addEventListener('click', Checkout_Data.display_total_price);
    }


    function submit_checkout(e) {
        e.preventDefault();
        Popup1.show_confirm_dialog('Are you sureyou want to checkout?', () => Request_Checkout.pay_online(checkoutForm));
    }
    

    return {
        add_events,
    }
    
})();


const Checkout_Data = (function() {
    const totalPrice = document.getElementById('total-price');

    function get_items() {
        return [
                {
                    "name": "Leather Handbag",
                    "quantity": 1,
                    "amount": 2500,
                    "currency": "PHP",
                    "images": ["https://m.media-amazon.com/images/I/61RSyB+kbzL._AC_SL1200_.jpg"],
                    "description": "Brown, medium-sized, smooth-textured, made of genuine leather."
                },
                {
                    "name": "Canvas Tote Bag",
                    "quantity": 2,
                    "amount": 1200,
                    "currency": "PHP",
                    "images": ["https://transferit.com.ph/pcimages/5997622/152927057/12/1/EFEFEF/prod.jpg?b=11429348&v=1720481852"],
                    "description": "Beige, large-sized, soft-textured, made of durable canvas fabric."
                },
                {
                    "name": "Nylon Backpack",
                    "quantity": 1,
                    "amount": 1800,
                    "currency": "PHP",
                    "images": ["https://colehaan.com.ph/cdn/shop/files/BaseTransform1_e0459d22-cc37-4870-a765-598ab27df01d.jpg?v=1722935327&width=1946"],
                    "description": "Black, compact-sized, water-resistant, made of high-quality nylon."
                }
            ]
    }

    function get_billing_info() {
        return {
            name: "John Andrew San Victores",
            email: "sanvictoresjohnandrewe@gmail.com",
            phone: "09167003378",
            address: {
                line1: "123 Main St",
                line2: "Unit 5",
                city: "Lucena",
                state: "Quezon",
                postal_code: "4301",
                country: "PH"
            }
        }
    }


    function get_total_price() {
        let subtotal = get_subtotal();
        let shippingFee = get_shipping_fee();
        let discount = get_discount();

        return subtotal + shippingFee + discount;
    }

    function display_total_price() {
        totalPrice.textContent = `₱${get_total_price().toFixed(2)}`;
    }

    function get_discount() {
        const voucherCode = document.getElementById('voucher-code').value;
        if (voucherCode === 'DISCOUNT') {
            return -50;
        }
        return 0;
    }

    function get_shipping_fee() {
        return 99.99;
    }

    function get_subtotal() {
        return 399.99;
    }

    function get_payment_method() {
        return document.querySelector('input[name="payment-method"]:checked').value;
    }

    return {
        get_items,
        get_billing_info,
        get_total_price,
        display_total_price,
        get_payment_method,
    }
    
})();

const Request_Checkout = (function() {
    function pay_online(form) {
        const formData = new FormData(form);
        formData.append('items', JSON.stringify(Checkout_Data.get_items()));
        formData.append('amount', Checkout_Data.get_total_price());
        formData.append('billing_info', JSON.stringify(Checkout_Data.get_billing_info()));
        formData.append('payment_method', Checkout_Data.get_payment_method());

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/dfs-ecommerce/api/process_online_payment.php', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Redirect to PayMongo checkout page
                        window.location.replace(response.redirect_url);
                    } else {
                        Popup1.show_message(response.message, 'error');
                    }
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };
        xhr.send(formData);
    }

    return {
        pay_online,
    }
})();