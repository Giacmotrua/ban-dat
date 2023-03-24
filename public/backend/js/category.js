$(function () {
    // $(".deleteCategory").on('click', function () {
    //     let self = $(this);
    //     var idCategory = self.attr('id');
    //     console.log(idCategory);
    //     if ($.isNumeric(idCategory)) {
    //         $.ajax({
    //             url: urlDeleteCategory + idCategory,
    //             type: 'delete',
    //             data: {
    //                 _token: $("input[name=_token]").val(),
    //                 id: idCategory
    //             },
    //             beforeSend: function () {
    //                 self.text('Loading ...');
    //             },
    //             success: function (response) {
    //                 if (response.code === 200) {
    //                     window.location.reload();
    //                 } else {
    //                     alert('Xoá danh mực thất bại!');
    //                 }
    //             }
    //         })
    //     } else {
    //         alert('có lỗi xảy ra, vui lòng thử lại');
    //     }
    // });
});
