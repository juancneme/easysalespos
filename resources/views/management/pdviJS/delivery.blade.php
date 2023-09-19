function addAddress() {
    $('#newAddress').modal('show');
}

function saveAddress() {
    var token = '{{csrf_token()}}';

    if (sessionStorage.getItem('data')) {
        json = JSON.parse(sessionStorage.getItem('data'));
        data = json[0];
        person_id = data['person'];
    } else {
        person_id = 0;
    }

    $.ajax({
        url: '/management/pdvi/ajax?type=newAddress',
        type: 'post',
        data: {
            'neighborhood': $('#neighborhood').val(),
            'address': $('#address').val(),
            'default': $('#default').val(),
            'typeaddress': $('#typeaddress').val(),
            'person_id': $('#person_id').val(),
            'indications': $('#indications').val(),
            'person': person_id,
            'city': $('#city').val(),
            _token: token
        },
        success: function (response) {
            res = JSON.parse(response);
            $('#addresses').append('<option value="' + res.id + '">' + res.typeaddressname + ' : ' + res.address + ', ' + res.city + '</option>');
        }
    });
}

function addDelivery() {
    delivery = true;
    if (delivery == true) {
        $("#modalDelivery").modal('hide');
        $('#modalAddress').modal('show');
    }
}

$('#noDelivery').on('click', function () {
    console.log("paso por el punto seleccionado");
    cleanMessageModal();
    var token = '{{csrf_token()}}';

    if (sessionStorage.getItem('data') !== null) {
        json = JSON.parse(sessionStorage.getItem('data'));
        data = json[0];
        client_id = data['id'];
    } else {
        client_id = 0;
    }

    $.ajax({
        url: '/management/pdvi/ajax?type=delivery',
        type: 'post',
        data: {
            'address': 0,
            'company': 0,
            'clientid': mId.idcliente,
            'transaction_id': mId.id,
            _token: token
        },
        success: function (response) {
            res = JSON.parse(response);
            console.log(res);
            $('#modalDelivery').modal('hide');
            $('#modalAddress').modal('hide');

            messageDelivery(res.company, res.sale);
            $('#Notificacion').modal({'show': true, keyboard: false, backdrop: 'static'});

            @if(empty(auth()->guard('client')->user()))
            $('#addresses').empty();
            cleanClient();
            @endif

            $('#btnAccept').click(function (e) {
                $('#lbmensaje').text('');
                message('¿Desea imprimir su factura?', true, res.sale);
            })
            console.log("Al fibnalizar ajax");
        }
    });
});

function generateDelivery() {
    cleanMessageModal();

    if (sessionStorage.getItem('data') !== null) {
        json = JSON.parse(sessionStorage.getItem('data'));
        data = json[0];
        return generateInternalDelivery(data['id']);
    }

    var token = '{{csrf_token()}}';

    $.ajax({
        url: '/management/pdvi/ajax?type=delivery',
        type: 'post',
        data: {
            'address': $('#addresses').val(),
            _token: token
        },
        success: function (response) {
            res = JSON.parse(response);
            $('#newAddress').modal('hide');
            $('#modalAddress').modal('hide');

            messageDelivery(res.company, res.sale);
            $('#Notificacion').modal({'show': true, keyboard: false, backdrop: 'static'});

            $('#btnAccept').click(function (e) {
                $('#lbmensaje').text('');
                message('¿Desea imprimir su factura?', true, res.sale);
            })

            @if(empty(auth()->guard('client')->user()))
            $('#addresses').empty();
            cleanClient();
            @endif
        }
    });
}

function addNewAddress() {
    $('#modalNewAddress').modal('show');
}

function generateInternalDelivery(client_id) {
    var token = '{{csrf_token()}}';
    cleanMessageModal();

    $.ajax({
        url: '/management/pdvi/ajax?type=delivery',
        type: 'post',
        data: {
            'address': $('#addresses').val(),
            'company': $('#delivery_company').val(),
            'clientid': client_id,
            'transaction_id': mId.id,
            _token: token
        },
        success: function (response) {
            res = JSON.parse(response);
            console.log('venta', res.sale);
            $('#newAddress').modal('hide');
            $('#modalAddress').modal('hide');

            messageDelivery(res.company, res.sale);

            $('#Notificacion').modal({'show': true, keyboard: false, backdrop: 'static',});

            @if(empty(auth()->guard('client')->user()))
            $('#addresses').empty();
            cleanClient();
            @endif

            $('#btnAccept').click(function (e) {
                message('¿Desea imprimir su factura?', true, res.sale);
            })
        }
    });
}

function showAddressModal() {
    $("#modalDelivery").modal('show');
}
