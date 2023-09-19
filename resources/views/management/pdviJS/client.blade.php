function cleanClient() {
    if ('{{auth()->guard('client')->user()}}' == null) {
        return null;
    } else if (sessionStorage.getItem('data')) {
        $('#client_name').empty();
        $('#client_name').append('<option value="default">Cliente Mostrador</option>');
        sessionStorage.removeItem('data');
        $('#emailUser').val('informacion@easynet.com');
        $('#addresses').empty();
        $('#typedoc1').val('');
        $('#numberdocument1').val('');
    }
    $('#btn_clean').hide();
    $('#searchClient').show();
}

// Add Clients
function addClient() {
    var number = $("#numberdocument1").val();
    var type = $("#typedoc1").val();
    var digit = $("#digitcheck-name").val();
    location.href = "/{{strtolower($group.'/'.$page)}}/addpersons/client";
    list_clients = [];
    list_clients.push({
        "type": type,
        "number": number,
        "digit": digit
    });
    json_clients = JSON.stringify(list_clients);
    sessionStorage.setItem('doc', json_clients);
    $('#numberdocument').reset();
    $('#typedoc').reset();
}

function searchClient() {
    $.ajax({
        url: '/management/pdvi/ajax?type=searchclient',
        type: $('#formSearch').attr('method'),
        data: $('#formSearch').serialize(),
        success: function (response) {
            res = JSON.parse(response);

            if (res.status == false) {
                cleanClient();
                var number = $("#numberdocument1").val();
                var type = $("#typedoc1").val();
                var digit = $("#digitcheck-name").val();

                list_docs = [];
                list_docs.push({
                    "type": type,
                    "number": number,
                    "digit": digit
                });
                json_docs = JSON.stringify(list_docs);
                sessionStorage.setItem('doc', json_docs);

                $('#add').show();
                $('#alert').removeClass();
                $('#alert').addClass("alert alert-danger");
                $('#alert').text(res.message + ' ');
                $('#alert').append('<a href="/{{strtolower($group."/".$page)}}/addpersons/client" class="alert-link">Registrese aqui</a>');
                $('#alert').removeAttr('hidden');
                $('#alert').show();

            } else {
                address = res.clientaddresses;
                address.forEach(clientAddresses);

                if(emailclient = '')
                    $('#emailUser').val(res.clientemail);
                else
                    $('#emailUser').val('informacion@easynet.com');

                $('#alert').removeClass();
                $('#alert').addClass("alert alert-success");
                $('#alert').text(res.message + ':' + ' ' + res.socialreason + res.clientname + ' ' + res.clientothernames + ' ' + res.clientlastname + ' ' + res.clientotherlastname);
                $('#alert').removeAttr('hidden');
                $('#alert').show();
                $('#add').hide();
                $("#modalNewClient").modal('hide');
                //$('#clean').show();

                $('#client_name option:first').hide();
                $('#client_name').append('<option value="' + res.clientid + '"selected>' + res.socialreason + res.clientname + ' ' + res.clientothernames + ' ' + res.clientlastname + ' ' + res.clientotherlastname + '</option>');
                $('#client_name').trigger('change');

                $('#searchClient').hide();
                $('#btn_clean').show();

                $('#alert').removeClass();
                $('#alert').text('');
                $('#alert').hide();

                list_client = [];

                list_client.push({
                    "firstname": res.clientname,
                    "othernames": res.clientothernames,
                    "lastname": res.clientlastname,
                    "otherlastname": res.clientothernames,
                    "socialreason": res.socialreason,
                    "id": res.clientid,
                    "person": res.person,
                    "client": true,
                    "clientemail": res.clientemail
                });
                json_client = JSON.stringify(list_client);
                sessionStorage.setItem('data', json_client);
            }
        }
    });
}

if (sessionStorage.getItem("data")) {
    if (!sessionStorage.getItem('default')) {
        cleanClient();
    } else {
        json = JSON.parse(sessionStorage.getItem('data'));
        data = json[0];

        var firstname = data["firstname"];
        var othernames = data["othernames"];
        var lastname = data["lastname"];
        var otherlastname = data["otherlastname"];
        var socialreason = data["socialreason"];
        var id = data["id"];
        var email = data['clientemail'];

        $.ajax({
            url: '/management/pdvi/ajax?type=searchclient',
            type: 'get',
            data: {
                'id': id,
                'default': true
            },
            success: function (response) {
                res = JSON.parse(response);

                $('#searchClient').hide();
                $('#btn_clean').show();

                //$('#client_name option:first').hide();
                $('#client_name').empty();
                $('#client_name').append('<option value="' + id + 'selected">' + socialreason + firstname + ' ' + othernames + ' ' + lastname + ' ' + otherlastname + '</option>');
                $('#client_name').trigger('change');

                emailclient = data['clientemail'];

                if(emailclient = '')
                    $('#emailUser').val(emailclient);
                else
                    $('#emailUser').val('informacion@easynet.com');

                address = res.clientaddresses;
                address.forEach(clientAddresses);
            }

        });
        sessionStorage.removeItem('default');
    }
}

function clientAddresses(item) {
    $('#addresses').append('<option value="' + item.id + '">' + item.typeaddress + ' : ' + item.address + ', ' + item.city + '</option>');
    return item;
}

function addNewClientModal() {
    $("#modalNewClient").modal('show');
}


function closeClientModal() {
    $("#formSearch")[0].reset();
    $('#alert').hide();
    $('#add').show();
}

function addClientModal() {
    $('#numberdocument').reset();
    $('#typedoc').reset();
    $("#modalNewClientAdd").modal('show');
}