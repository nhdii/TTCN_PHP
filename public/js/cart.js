// Inside your existing script tag or a separate JavaScript file

$(document).ready(function() {
    $('.increase-quantity').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        updateQuantity(productId, 'increase');
    });

    $('.decrease-quantity').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        updateQuantity(productId, 'decrease');
    });

    $('.remove-item').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        removeItemFromCart(productId);
    });

    function updateQuantity(productId, action) {
        var cart = getCartFromLocalStorage();
        var cartKey = productId;

        if (cart.hasOwnProperty(cartKey)) {
            if (action === 'increase') {
                cart[cartKey]['quantity']++;
            } else if (action === 'decrease' && cart[cartKey]['quantity'] > 1) {
                cart[cartKey]['quantity']--;
            }

            // Update your cart UI using the updated quantity
            updateCartUI(cart);
            // Save the updated cart to local storage
            saveCartToLocalStorage(cart);
        }
    }

    function removeItemFromCart(productId) {
        var cart = getCartFromLocalStorage();
        var cartKey = productId;

        if (cart.hasOwnProperty(cartKey)) {
            delete cart[cartKey];

            // Update your cart UI after removing the item
            updateCartUI(cart);
            // Save the updated cart to local storage
            saveCartToLocalStorage(cart);
        }
    }

    function updateCartUI(cart) {
        // Update your cart UI using the cart data
        // For example, update the quantity and total amount in the cart summary
        console.log(cart);
    }

    function getCartFromLocalStorage() {
        var cart = localStorage.getItem('cart');
        return cart ? JSON.parse(cart) : {};
    }

    function saveCartToLocalStorage(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }
});
