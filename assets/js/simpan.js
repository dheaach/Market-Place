$(document).ready(function (){
    var intervalFunc = function (){
        $('#submit').html($('#submit').val());
    };
    $('#upload').on('click', function (){
        $('#submit').afterclick();
        setInterval(intervalFunc, 1);
        return false;
    });
});
