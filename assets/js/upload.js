$(document).ready(function (){
    var intervalFunc = function (){
        $('#file').html($('#file').val());
    };
    $('#upload').on('click', function (){
        $('#file').click();
        setInterval(intervalFunc, 1);
        return false;
    });
});
