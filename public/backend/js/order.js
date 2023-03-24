$(function () {
    $(".deliveryStatus").on('change', function () {
        $(this).parent("form").submit();
    })
})
