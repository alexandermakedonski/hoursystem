$(document).ready(function() {

    ajaxuserstable = function(){
        $.ajax({
            type: 'GET',
            url: '/accounts/userstable',
            error:function(er){

            },
            success: function (data) {
                $('.users-table-ajax').html(data);
                table();
            }
        });
    };

    ajaxuserstable();

    var multiselectUser = function(){
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
    };



    var namedit = function(){
        $('.nameEdit').editable({
            type: 'text',
            url: '/accounts/namechange',
            title: 'Enter username',
            mode: 'inline',
            params:{_token: Globals._token}
        });
    };

    var dd = new Array();
    roles.forEach(function(role){
        var temp = {value:role.id,text:role.role_title};
        dd.push(temp);
    });

    var rolesselect = function(){
        $('.roleselect').editable({
            mode: 'inline',
            type: 'select',
            title:"Select status",
            url: '/accounts/rolechange',
            value: 2,
            source: dd,
            params:{_token: Globals._token}
        });
    };

    var userBdate = function(){
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
    };

    var userSalary = function(){
        $('.user-salaray').editable({
            type: 'text',
            url: '/accounts/salarychange',
            title: 'Enter salary',
            mode: 'inline',
            params:{_token: Globals._token},
            inputclass:'salary-beauty'
        });
    };


    var table = function(){
        $('#users-table').DataTable({
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
            "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Всички"]],
            "fnDrawCallback":
                function( oSettings ) {
                    multiselectUser();
                    userBdate();
                    rolesselect();
                    userSalary();
                    namedit();
                }
        });
    };

});


