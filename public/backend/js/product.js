$(function () {
    $("input[data-type='currency']").on({
        keyup: function() {
            var input_val = $(this).val();
            input_val = input_val.replace(/\D/g, "");
            $(this).val(input_val);
        }
    });

    // $(".deleteProduct").on('click', function () {
    //     let self = $(this);
    //     var idProduct = self.attr('id');
    //     console.log(idProduct);
    //     if ($.isNumeric(idProduct)) {
    //         $.ajax({
    //             url: urlDeleteProduct,
    //             type: 'delete',
    //             data: {
    //                 _token: $("input[name=_token]").val(),
    //                 id: idProduct
    //             },
    //             beforeSend: function () {
    //                 self.text('Loading ...');
    //             },
    //             success: function (response) {
    //                 if (response.code === 200) {
    //                     window.location.reload();
    //                 } else {
    //                     alert('Xoá sản phẩm thất bại!');
    //                 }
    //             }
    //         })
    //     } else {
    //         alert('có lỗi xảy ra, vui lòng thử lại');
    //     }
    // })
})
