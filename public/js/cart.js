$(document).ready(function () {
    // Sự kiện khi nhấn nút giảm
    $(document).on('submit', '.decreaseForm', function (e) {
        e.preventDefault();

        updateCart($(this).data('action'), $(this).serialize());
    });

    // Sự kiện khi nhấn nút tăng
    $(document).on('submit', '.increaseForm', function (e) {
        e.preventDefault();

        updateCart($(this).data('action'), $(this).serialize());
    });

    function updateCart(action, formData) {
        $.ajax({
            type: 'POST',
            url: action,
            data: formData,
            success: function (response) {
                // Cập nhật số lượng sản phẩm
                $('#quantityInput-'+ response.product_id).val(response.quantity);

                // hiển thị tổng tiền của mỗi sản phẩm
                $('#productTotal-' + response.product_id).text(response.productTotal);

                // cập nhật totalAmount
                $('#totalAmount').text(response.totalAmount);                
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

});

$(document).ready(function () {
    // Sự kiện khi nhấn nút xóa
    $(document).on('submit', '.removeForm', function (e) {
        e.preventDefault();

        removeItem($(this).data('action'), $(this).serialize());
    });

    function removeItem(action, formData) {
        $.ajax({
            type: 'POST',
            url: action,
            data: formData,
            success: function (response) {
                console.log(response);
                // Xóa sản phẩm khỏi giao diện
                var productId = response.product_id;
                $('#cartItem-' + productId).remove();
                
                // Cập nhật totalAmount
                $('#totalAmount').text(response.totalAmount);

                // Hiển thị thông báo thành công 
                alert(response.message);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});
