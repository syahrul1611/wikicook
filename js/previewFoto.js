// preview foto
$("#file").change(function() {
    fadeInAdd();
    getURL(this);
});

$("#file").on('click', function() {
    fadeInAdd();
});

function getURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#file").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function(e) {
            debugger;
            $('#preview').attr('src', e.target.result);
            $('#preview').hide();
            $('#preview').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loadAnimate").hide();
}

function fadeInAdd() {
    fadeInAlert();
}

function fadeInAlert(text) {
    $(".alert").text(text).addClass("loadAnimate");
}
