$(document).ready(function () {
    var $pathArray = window.location.pathname.split( '/' );
    $('.'+$pathArray[1]).addClass('active');
});