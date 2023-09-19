/*
Function to add and delete Address
*/
$(".btn-addpdf").click(function(){
    var html = $(".clone-add").html();
    $(".increment").before(html);
});

$("body").on("click",".btn-delpdf",function(){
    $(this).parents(".control-group").remove();
});

/*
Eliminar address con carga de datos
*/
var totaleliminaradd = new Array();
$(".btn-editadd").on("click",function(){
    if($(this).hasClass('btn-danger')){
        $(this).parents(".control-group").hide();
        var dataId = $(this).attr("data-id");
        totaleliminaradd.push(dataId);
        document.getElementById('idadd').value=totaleliminaradd;
    }
});

/*
Function to add and delete Emails
*/
$(".btn-addemail").click(function(){
    var html = $(".clone-email").html();
    $(".increment-email").before(html);
});

$("body").on("click",".btn-delemail",function(){
    $(this).parents(".control-group").remove();
});

/*
Eliminar email con carga de datos
*/
var totalbotonaeliminar = new Array();
$(".btn-editemail2").on("click",function(){
    if($(this).hasClass('btn-danger')){
        $(this).parents(".control-group").hide();
        var dataId = $(this).attr("data-id");
        totalbotonaeliminar.push(dataId);
        document.getElementById('prueba').value=totalbotonaeliminar;
        console.log(totalbotonaeliminar);
    }
});

/*
Function to add and delete Phones
*/
$(".btn-addphone").click(function(){
    var html = $(".clone-phone").html();
    $(".increment-phone").before(html);
});

$("body").on("click",".btn-delphone",function(){
    $(this).parents(".control-group").remove();
});

/*
Eliminar phones con carga de datos
*/
var totaleliminarphone = new Array();
$(".btn-editphone").on("click",function(){
    if($(this).hasClass('btn-danger')){
        $(this).parents(".control-group").hide();
        var dataId = $(this).attr("data-id");
        totaleliminarphone.push(dataId);
        document.getElementById('phone2').value=totaleliminarphone;
    }
});

/*
Funcion que valida el primer botton en la carga y lo deabilita de address
*/
$(".btn-editadd").ready(function(){
    var index = $(".btn-editadd").index()
    $(".btn-editadd").eq(0).hide();
});

$("#typeper-name").on("change", function (event) {
    console.log("1ra rutina");
    <!--Evaluar si es Parsona Natural o Persona Juridica-->
    <!--Apagar o prender SWeditPN y SWeditPJ-->
    if ($("#typeper-name").val() == 3 ){
        <!--persona juridica-->
        $("#firstname-name").val('');
        $("#othernames-name").val('');
        $("#lastname-name").val('');
        $("#otherlastname-name").val('');
        $("#typesex-name").val('');

        $('#labelpernat').hide("slow");
        $('#labelperjur').show("slow");
        $('#pernat1').hide("slow");
        $('#perjur1').show("slow");
        $('#perjur2').show("slow");

    }
    else {
        <!--persona natural-->
        $("#socialreason-name").val('');

        $('#labelpernat').show("slow");
        $('#labelperjur').hide("slow");
        $('#pernat1').show("slow");
        $('#perjur1').hide("slow");
        $('#perjur2').hide("slow");
    }
});

$('#typeper-name').on('change',function(e){
    console.log("2da rutina");

    var idtipoPersona = e.target.value;
    var item = $('#typedoc-name').val();

    @foreach ($itemstypedocument as $docum)
        @if ( $docum->id == 10 ) return; @endif
    @endforeach
    console.log("ajax");
    $.ajax({
        url: '/management/persons/ajax?type=selectIdentificacion',
        type: 'get',
        data: {
            "id": idtipoPersona
        },
        async: false,

        success: function (response) {
            res = JSON.parse(response);

            if(res.success){
                $("#typedoc-name").empty();
                $("#typedoc-name").append('<option value="true" selected  disabled>{{ __("Select a type of identification") }}</option>');
                if (res.data != ''){
                    $.each(res.data,function(index, datas){
                        if (item == datas.id )
                            $("#typedoc-name").append('<option value="'+datas.id+'"  selected>'+datas.name+'</option>');
                        else
                            $("#typedoc-name").append('<option value="'+datas.id+'">'+datas.name+'</option>');
                    });
                }
            }else {
                $.message("Error en la consulta", "error", true);
            }
        }
    });
});

$('#locouthnd').hide("slow");
$('#citytext').hide("slow");

$('#country-name').on('change',function(e){

    var $options = $();

    var codepais = $(this).val();
    console.log("codepais ",codepais);
    if (codepais != '1047'){
        $('#locouthnd').show("slow");
        $('#citytext').show("slow");
        $('#state-name').hide("slow");
        $('#city-name').hide("slow");
    } else {
        $('#locouthnd').hide("slow");
        $('#citytext').hide("slow");
        $('#state-name').show("slow");
        $('#city-name').show("slow");
    }

});

var municipios = [
@foreach ($itemscities as $munic)
    [ '{{ $munic->id }}', '{{ $munic->code }}', '{{ $munic->name }}' ],
@endforeach
];

$('#state-name').on('change',function(e){

    var $options = $();

    var codedep = $(this).val();
    console.log(codedep);
    console.log(municipios);
    console.log(codedep.substr(0, 5));
    $options = $options.add($("<option>{{ __("Select a city") }}</option>").attr('value', 'true' ));
    for (i = 0; i < municipios.length; i++) {

        if (codedep.substr(0, 5) == municipios[i][1].substr(0, 5))
            $options = $options.add($("<option>").attr('value', municipios[i][0]).html( municipios[i][2] ));
    }
    $('#city-name').html($options).trigger('change');

});

$('#typeper-name').trigger('change');
$('#country-name').trigger('change');

$("#A0").attr('disabled',true);

var url = location.pathname;
if(url.includes("client")){

    $('#divCivil').hide();
    $('#divsex').hide();
    $('#divVariate').hide();


    if(sessionStorage.getItem('doc') !== null){
        json = JSON.parse(sessionStorage.getItem('doc'));
        data = json[0];


    var number = data["number"];
    var type = data["type"];
    var digit = data["digit"];

    $('#numberdocument-name').val(number);

    if(type ==6){
        $('#typeper-name').val(3);
        $('#digitcheck-name').val(digit);
    }
    else{
        $('#typeper-name').val(2);
        $('#typecivilstatus-name').val('86');
        $('#typesex-name').attr("checked",true);
    }


    $('#typeper-name').trigger('change');

    $('#typedoc-name').val(type);
    $('#typedoc-name').trigger('change');

    sessionStorage.removeItem('doc');
    }

    $("#botoncancel").click(function () {
        // location.href = "javascript:window.history.back()";
        location.href = "javascript:window.history.go(-1)";
    });



    

    
}




