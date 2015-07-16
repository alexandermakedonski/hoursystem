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
                    console.log(data);
              }
            }
        });
        e.preventDefault();
    });

    $(".bdate-select").dateDropdowns({
        defaultDateFormat:'dd/mm/yyyy',
        submitFormat:'dd/mm/yyyy',
        daySuffixes:false,
        monthFormat:'numeric',
        monthSuffixes:false
    });


});