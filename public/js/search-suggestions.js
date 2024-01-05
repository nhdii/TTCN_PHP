// document.addEventListener('DOMContentLoaded', function () {
//     const searchInput = document.querySelector('input[name="keywords"]');
//     const suggestionsContainer = document.getElementById('suggestionsContainer');

//     searchInput.addEventListener('input', function () {
//         const keywords = this.value.trim();

//         // Kiểm tra nếu từ khóa không rỗng
//         if (keywords !== '') {
//             // Gửi yêu cầu AJAX để lấy gợi ý tìm kiếm
//             fetch(`/search-suggestions?keyword=${keywords}`)
//                 .then(response => response.json())
//                 .then(data => {
//                     // Xóa tất cả các gợi ý hiện tại
//                     suggestionsContainer.innerHTML = '';

//                     // Hiển thị gợi ý mới
//                     data.forEach(suggestion => {
//                         const suggestionItem = document.createElement('div');
//                         suggestionItem.classList.add('suggestion-item');
//                         suggestionItem.textContent = suggestion.product_name; // Thay thế 'product_name' bằng trường dữ liệu phù hợp

//                         // Xử lý sự kiện khi người dùng chọn gợi ý
//                         suggestionItem.addEventListener('click', function () {
//                             // Đặt giá trị của ô tìm kiếm thành gợi ý được chọn
//                             searchInput.value = suggestion.product_name; // Thay thế 'product_name' bằng trường dữ liệu phù hợp
//                             // Xóa các gợi ý
//                             suggestionsContainer.innerHTML = '';
//                         });

//                         suggestionsContainer.appendChild(suggestionItem);
//                     });
//                 })
//                 .catch(error => console.error('Error fetching search suggestions:', error));
//         } else {
//             // Nếu từ khóa rỗng, xóa tất cả các gợi ý
//             suggestionsContainer.innerHTML = '';
//         }
//     });

//     // Xử lý sự kiện khi nhấn Enter trong ô tìm kiếm
//     searchInput.addEventListener('keydown', function (event) {
//         if (event.key === 'Enter') {
//             // Thực hiện tìm kiếm theo từ khóa
//             const keywords = this.value.trim();
//             if (keywords !== '') {
//                 window.location.href = `/search?keywords=${keywords}`;
//             }
//         }
//     });

//     // Xử lý sự kiện khi click bất kỳ nơi nào trên trang
//     document.addEventListener('click', function (event) {
//         // Nếu người dùng click ra khỏi ô tìm kiếm hoặc gợi ý
//         if (!event.target.matches('input[name="keywords"]') && !event.target.closest('.suggestion-item')) {
//             // Ẩn danh sách gợi ý
//             suggestionsContainer.innerHTML = '';
//         }
//     });
// });

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[name="keywords"]');
    const suggestionsContainer = document.getElementById('suggestionsContainer');
    const dropdown = document.getElementById('suggestionsDropdown');

    searchInput.addEventListener('input', function () {
        const keywords = this.value.trim();

        // Kiểm tra nếu từ khóa không rỗng
        if (keywords !== '') {
            // Gửi yêu cầu AJAX để lấy gợi ý tìm kiếm
            fetch(`/search-suggestions?keyword=${keywords}`)
                .then(response => response.json())
                .then(data => {
                    // Xóa tất cả các mục trong dropdown
                    dropdown.innerHTML = '';

                    // Hiển thị gợi ý mới trong dropdown
                    data.forEach(suggestion => {
                        const suggestionItem = document.createElement('li');
                        suggestionItem.classList.add('suggestion-item');
                        suggestionItem.textContent = suggestion.product_name; // Thay thế 'product_name' bằng trường dữ liệu phù hợp

                        // Xử lý sự kiện khi người dùng chọn gợi ý
                        suggestionItem.addEventListener('click', function () {
                            // Đặt giá trị của ô tìm kiếm thành gợi ý được chọn
                            searchInput.value = suggestion.product_name; // Thay thế 'product_name' bằng trường dữ liệu phù hợp
                            // Xóa tất cả các mục trong dropdown
                            dropdown.innerHTML = '';
                        });

                        dropdown.appendChild(suggestionItem);
                    });

                    // Hiển thị dropdown nếu có gợi ý
                    if (data.length > 0) {
                        suggestionsContainer.style.display = 'block';
                    } else {
                        suggestionsContainer.style.display = 'none';
                    }
                })
                .catch(error => console.error('Error fetching search suggestions:', error));
        } else {
            // Nếu từ khóa rỗng, xóa tất cả các mục trong dropdown
            dropdown.innerHTML = '';
            suggestionsContainer.style.display = 'none';
        }
    });

    // Xử lý sự kiện khi click bất kỳ nơi nào trên trang
    document.addEventListener('click', function (event) {
        // Nếu người dùng click ra khỏi ô tìm kiếm hoặc dropdown
        if (!event.target.matches('input[name="keywords"]') && !event.target.closest('.suggestion-item')) {
            // Ẩn dropdown
            suggestionsContainer.style.display = 'none';
        }
    });
});