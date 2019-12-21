jQuery(document).ready(function () {

    $('.openForm').click(function () {
        $("#formGo #url").val(location.href);
        $('#formBox, #bgBox').animate({opacity: "show"});
        return false;
    });

    $('.close').click(function () {
        $('#formBox, #bgBox').animate({opacity: "hide"})
    });

    $('#formGo').submit(function () {
        if ($('#url').val() == location.href) {
            var msg = $('#formGo').serialize();
            var url = $('#formBox').attr('data-url');
            $.ajax({
                type: "POST",
                url: url + '/ajax.php',
                data: msg,
                success: function (data) {
                    $('#formGo').html(data);
                },
                error: function () {
                    alert(xhr.responseText + '|\n' + status + '|\n' + error);
                }
            })
        } else {
            alert('Похоже ты робот')
        }
        return false;
    });

});
