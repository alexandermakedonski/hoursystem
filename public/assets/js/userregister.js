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


                    $('[data-show-error]').hide().popover('destroy');
                    if(uploader.files.length > 0){
                        uploader.start();
                    }else{
                        location.reload();
                    }
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

    var uploader = new plupload.Uploader({
        runtimes: 'html5',
        browse_button: 'avatar-upload',
        chunk_size: '50kb',
        url: '/accounts/useravatar',
        multi_selection: false,
        flash_swf_url: '/assets/plugins/plupload-2.1.7/js/Moxie.swf',
        silverlight_xap_url: '/assets/plugins/plupload-2.1.7/js/Moxie.xap',
        filters: {
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png,jpeg"}
            ]
        }
    });

    uploader.init();

    uploader.bind('FilesAdded', function (up, files) {
        $('#avatar-upload').empty();
        $.each(files, function () {

            var img = new mOxie.Image();

            img.onload = function () {
                this.embed($('#avatar-upload').get(0), {
                    width: 100,
                    height: 100,
                    crop: true
                });
            };

            img.onembedded = function () {
                this.destroy();
            };

            img.onerror = function () {
                this.destroy();
            };

            img.load(this.getSource());

        });
        if (uploader.files.length > 1){
            uploader.splice(0,uploader.files.length-1)
            uploader.refresh();
        }

    });

    uploader.bind('BeforeUpload', function (up, file) {
        up.settings.multipart_params = {"email": $('input[name="email"]').val(), "_token": Globals._token};
    });

    uploader.bind('UploadComplete',function(up, files){
        location.reload();
    });

});