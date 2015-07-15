$(document).ready(function() {
    var table = $('#users-table').DataTable({
        "language": {
            "sProcessing":   "Обработка на резултатите...",
            "sLengthMenu":   "Покажи _MENU_",
            "sZeroRecords":  "Няма намерени резултати",
            "sInfo":         "",
            "sInfoEmpty":    "Показване на резултати от 0 до 0 от общо 0",
            "sInfoFiltered": "(филтрирани _END_ от общо _MAX_ резултата)",
            "sInfoPostFix":  "",
            "sSearch":       "Търсене:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst": "Първа",
                "sPrevious": "Предишна",
                "sNext": "Следваща",
                "sLast": "Последна"
            }
        },
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });



    $('.nameEdit').editable({
        type: 'text',
        url: '/accounts/namechange',
        title: 'Enter username',
        mode: 'inline',
        params:{_token: Globals._token}
    });

    $('.roleselect').editable({
        mode: 'inline',
        type: 'select',
        title:"Select status",
        url: '/accounts/rolechange',
        value: 2,
        source: [
            {value: 1, text: 'Administrator'},
            {value: 2, text: 'Moderator'},
            {value: 3, text: 'Base'}
        ],
        params:{_token: Globals._token}
    });

    $('.user-bdate').editable({
        title:"Select date",
        type:'combodate',
        mode: 'inline',
        url: '/accounts/bdatechange',
        format: 'DD/MM/YYYY',
        viewformat: 'DD / MM / YYYY',
        template: 'D/MM/YYYY',
        combodate: {
            minYear: 1950,
            maxYear: 2050,
            minuteStep: 1
        },
        params:{_token: Globals._token}
    });

    $('.user-salaray').editable({
        type: 'text',
        url: '/accounts/salarychange',
        title: 'Enter salary',
        mode: 'inline',
        params:{_token: Globals._token}
    });

    $('.select-account-position').multiselect({
        enableFiltering: true,
        enableClickableOptGroups: true,
        maxHeight: 500,
        onChange: function (option, checked, select) {
            user_id = $(option).closest('form').find('input[name="user_id"]').val();
            $.ajax({
                type: 'POST',
                url: '/accounts/office',
                data: {
                    '_token': Globals._token,
                    'user_id': user_id,
                    'category_id': $(option).val(),
                    'bool': checked
                },
                success: function (data) {
                }
            })
        }
    });

    $('#users-table').show();
});


