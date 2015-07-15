$(document).ready(function() {

    $(".panel-tools .minimise-tool").click(function (event) {
        $(this).parents(".panel").find(".panel-body").slideToggle(100);
        return false;
    });

    $('.user-register').multiselect({
        enableFiltering: true,
        enableClickableOptGroups: true,
        buttonWidth: '340px',
        maxHeight: 720,
        onDropdownShow: function (event) {
            var bodyhegith = $('.registration-form').height();
            $('.registration-form').css({'height': bodyhegith + 570 + 'px'});
        },
        onDropdownHidden: function (event) {
            var bodyhegith = $('.registration-form').height();
            $('.registration-form').css({'height': bodyhegith - 570 + 'px'});
        }
    });

    $("form[data-remote-account]").on('submit', function(e){
        var form = $(this);
        data = form.serialize();
        $.ajax({
            type: 'POST',
            url: form.prop('action'),
            data: data,
            success: function (data) {
                if (data.fail) {


                    $('[data-show-error]').hide().popover('hide');

                    $.each(data.errors, function (index, value) {

                        var popover = $('[data-show-error=' + index + ']').show().popover();
                        popover.attr('data-content', value);

                    });

                } else {
                    //uploader.start();
                    $('[data-show-error]').hide().popover('destroy');
                    $('.flash').empty().append('Акаунтът е създаден!').fadeIn(500).delay(1000).fadeOut(500);
                    if(uploader.files.length < 1){
                        $.ajax({
                            url: '/accounts/accounts/?page='+$( ".page-users").size(),
                            type: "GET", // not POST, laravel won't allow it
                            success: function(data){
                                $data = $(data); // the HTML content your controller has produced
                                $('.ajax-users-load').html($data);
                            }
                        });
                        $('.panel-body').hide();
                        $('input[name="name"]').val('');
                        $('input[name="email"]').val('');
                        $('input[name="password"]').val('');
                        $('input[name="password_confirmation"]').val('');
                        $('#avatar-upload').empty();
                        $('#multiple-optgroups').multiselect('deselectAll', false);
                        $('#multiple-optgroups').multiselect('updateButtonText');
                    }
                    //$('.panel-body table tbody').append('<tr class="info"><td ><div class="list-image"><img src="/avatar/'+data.id+'" alt="img" class="img"></div></td></tr>')
                }
            }
        });
        e.preventDefault();
    });
});