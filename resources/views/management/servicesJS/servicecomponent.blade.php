<script>
    jQuery(document).ready(function ($) {
        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'name', name: 'name', title: "{{ __('Name') }}"},
                {data: 'purchaseprice', name: 'purchaseprice', title: "{{ __('Purchase Price') }}"},
                {data: 'saleprice', name: 'saleprice', title: "{{ __('Sales Price') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
            ],
            "order": [[0, "asc"]]
        });

    });


    $(".btn-charge").on('click', function () {
        $("#modalServices").modal('show');
    })

    $(".btn-services").on('click', function () {
        var idcat = $('.select-send').val();
            var token = '{{csrf_token()}}';
        var llamada=  $.ajax({

                url: '/management/service/service?type=loadService',
                type: 'post',
                data: {
                    'idcat': idcat,
                    _token: token,

                },
                beforeSend: function () {
                    $(".loader").removeAttr('hidden');
                    $("#modalServices").modal('hide');
                },
            success: function (response) {
                res = JSON.parse(response);
                if (res.success) {
                    $(".loader").attr('hidden', true);
                    setTimeout(function () {
                        $.message('{{__('Products added successfully')}}', "success", true);
                    }, 500);
                } else {
                    if(!res.data){
                        $(".loader").attr('hidden', true);
                        setTimeout(function () {
                            $.message("No hay datos disponibles", "error", true);
                        }, 500);
                    }
                    $(".loader").attr('hidden', true);
                    if(res.data.original.status === 401){
                        setTimeout(function () {
                            $.message(res.data.original.message, "error", true);
                        }, 500);
                    }
                }
            }
            });
    });
    $(".btn-delete-services").on('click', function () {
        $("#modalDelServices").modal('show');

    });
    $(".btn-del-services").on('click', function () {
        var idcat = $('#id_cate').val();
        var pacages =$('#pacages').val();
        var token = '{{csrf_token()}}';
        
        $.ajax({

            url: '/management/service/service?type=deleteService',
            type: 'post',
            data: {
                'idcat': idcat,
                'idpacages':pacages,
                _token: token,

            },
            beforeSend: function () {
                $(".loader").removeAttr('hidden');
                $("#modalDelServices").modal('hide');

            },
            success: function (response) {
                res = JSON.parse(response);
                if (res.success) {
                    $(".loader").attr('hidden', true);
                    setTimeout(function () {
                        $.message('{{_("Products successfully removed")}}', "success", true);
                        location.reload(true);
                    }, 1000);
                } else {
                    $(".loader").attr('hidden', true);
                    setTimeout(function () {
                        $.message("{{__('Error deleting the product, if error continues contact an administrator')}}", "error", true);
                    }, 1000);
                }
            }
        });
    });

    $(".btn-send-charge").on('click', function () {
        var idamount = $('#amount').val();
        var operators = $('select#operators').val();
        var idcat = $('#idcate').val();
        var token = '{{csrf_token()}}';
        $.ajax({

            url: '/management/service/service?type=createRechargeService',
            type: 'post',
            data: {
                'idamount': idamount,
                'idoperators': operators,
                _token: token,

            },
            beforeSend: function () {
                if (idamount == '') {
                    $.message("{{__('Please select a valid quantity')}}", "error", true);
                } else if (operators == null) {
                    $.message("{{__('Please select at least one operator')}}", "error", true);
                } else {
                    $(".loader").removeAttr('hidden');

                }
            },

            success: function (response) {
                res = JSON.parse(response);
                if (res.success) {
                    $(".loader").attr('hidden', true);
                    setTimeout(function () {
                        $.message('{{__('Products added successfully')}}', "success", true);
                    }, 1000);
                } else {
                    $(".loader").attr('hidden', true);
                    if(res.data.original.status === 401){
                        setTimeout(function () {
                            $.message(res.data.original.message, "error", true);
                        }, 1000);
                    }

                }
            }
        });

    });

    $(".prueba").on('click', function () {

        xhr.open('POST', '/tarjetarecaudo', true);
        xhr.responseType = 'blob';
        xhr.onload = function(e) {
            if (this.status == 200) {
                var blob = new Blob([this.response], {type: 'application/pdf'});
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = "tarjeta_recaudo.pdf";
                link.click();
            }
        };
        xhr.send();



    });



</script>
