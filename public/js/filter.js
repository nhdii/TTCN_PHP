$(document).ready(function () {
    $('#applyFilters').on('click', function () {
        var brandFilter = $('#brandFilter').val();
        var genderFilter = $('#genderFilter').val();
        var categoryFilter = $('#categoryFilter').val();

        $.ajax({
            type: 'GET',
            url: '{{ route("filter-products") }}',
            data: {
                brand: brandFilter,
                gender: genderFilter,
                category: categoryFilter,
            },
            success: function (data) {
                console.log(data); // Log the response data
                $('#product').html(data);
                
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
