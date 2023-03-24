$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "http://localhost:8000/api/province",
        dataType: "json",
        success: function (result) {
            var province = result.data;
            for (var i = 0; i < province.length; i++) {
                $('#province').append($('<option>', {
                    value: province[i].id,
                    text: province[i].name
                }));
            }
        }
    })
    // when the province dropdown changes
    $("#province").change(function () {
        $('#district').html('<option value="" selected="selected" disabled>Chọn</option>');
        $('#ward').html('<option value="" selected="selected" disabled>Chọn</option>');
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/api/district?id=" + $("#province").val(),
            dataType: "json",
            success: function (result) {
                var district = result.data;
                for (var i = 0; i < district.length; i++) {
                    $('#district').append($('<option>', {
                        value: district[i].id,
                        text: district[i].name
                    }));
                }
            }
        })
    });
    // when the district dropdown changes
    $("#district").change(function () {
        $('#ward').html('<option value="" selected="selected" disabled>Chọn</option>');
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/api/ward?id=" + $("#district").val(),
            dataType: "json",
            success: function (result) {
                var ward = result.data;
                for (var i = 0; i < ward.length; i++) {
                    $('#ward').append($('<option>', {
                        value: ward[i].id,
                        text: ward[i].name
                    }));
                }
            }
        })
    })

    $(".btn-add-image").click(function(){
        $('#file_upload').trigger('click');
    });

    $('.list-input-hidden-upload').on('change', '#file_upload', function(event){
        let today = new Date();
        let time = today.getTime();
        let image = event.target.files[0];
        let file_name = event.target.files[0].name;
        let box_image = $('<div class="box-image"></div>');
        box_image.append('<img src="' + URL.createObjectURL(image) + '" class="picture-box">');
        box_image.append('<div class="wrap-btn-delete"><span data-id='+time+' class="btn-delete-image">x</span></div>');
        $(".list-images").append(box_image);

        $(this).removeAttr('id');
        $(this).attr( 'id', time);
        let input_type_file = '<input type="file" name="image[]" id="file_upload" class="myfrm form-control hidden">';
        $('.list-input-hidden-upload').append(input_type_file);
    });

    $(".list-images").on('click', '.btn-delete-image', function(){
        let id = $(this).data('id');
        $('#'+id).remove();
        $(this).parents('.box-image').remove();
    });
});
