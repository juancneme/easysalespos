$(function(){
	var form = $('.cform');
	var totalPrice = Number($('.total_price').text());
	var remainingPrice = $('.remaining_price');
	var paymentList = $('.pl');
	var paymentClose = $('.pl ul em');
	var paymentBtns = $('.payment_buttons');
	var QrSection = $('.qr_section');
	var ChSection = $('.change_section');
	var submitBttn = $('.submit_bttn button');
	var refFields = $('.ref_fields');

    // Botón cerrar
	$('.pl ul').on('click','em', function(e){
		var plAmount = Number($(this).closest('li').find('.pl_amount').text());
		remainingPrice.text(Number(remainingPrice.text()) + plAmount );
		$(this).closest('li').remove();
		if(!paymentList.find('li').length){
			paymentList.hide();
		}
	});

    // Mostrar y ocultar campos QR referencias y cambio
	paymentBtns.find('button').on('click', function(){
		$(this).addClass('cbtn_active').siblings().removeClass('cbtn_active');
		var type = $(this).data('type');
		if(type == 'barcode'){
			QrSection.show();
		}
		else{
			QrSection.hide();
		}

		if(type == 'refs'){
			refFields.show();
		}
		else{
			refFields.hide();
		}
		if(type == 'cash'){
			ChSection.show();
		}
		else{
			ChSection.hide();
		}
	});

	$('#btnAddEfectivo').on('click',function(){
		console.log("Esta en click 1");
		var paymentList = $('.pl');
		var paymentMethod = paymentBtns.find('.cbtn_active').text();
		paymentList.find('ul').append('<li><em>×</em><i>'+paymentMethod+'</i><div>$<span class="pl_amount">'+inpt+'</span></div></li>');
	});

    // Trigger function when click on submit button
	form.on('submit', function(e){
		e.preventDefault();

		var inpt = submitBttn.prev().val();
		if(inpt){
			if(!isNumeric(inpt)){
				alert('Please enter numeric value.');
				submitBttn.prev().val('');
				return false;
			}

			inpt = Number(inpt);
			var rP = Number($('.remaining_price').text());

			if(rP <= 0){
				submitBttn.text("VENTA COMPLETA");
				$(this).unbind('submit').submit();
				return;
			}

			if(inpt > rP){
				alert('Please enter value less than or equals to '+rP+'');
				return false;
			}

			if(inpt <= 0 && (rP > 0)){
				alert('Please enter value greater than 0.');
				return false;
			}

			paymentList.show();
			var paymentMethod = paymentBtns.find('.cbtn_active').text();
			var flag = false;
			$.each(paymentList.find('li'), function(i,v){
				if($(v).find('i').text() == paymentMethod){
					$(v).find('.pl_amount').text( Number($(v).find('.pl_amount').text()) + inpt );
					flag = true;
					return false;
				}
			});

			if(!flag){
				paymentList.find('ul').append('<li><em>×</em><i>'+paymentMethod+'</i><div>$<span class="pl_amount">'+inpt+'</span></div></li>');
			}

			remainingPrice.text( Number(remainingPrice.text()) - inpt );

			if(Number(remainingPrice.text()) <= 0){
				submitBttn.text("VENTA COMPLETA");
				return;
			}

		}
	});

	/*//////////////MODAL PRICES////////////////////*/

	// Get the modal
	var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn1");
//var btn = document.querySelectorAll(".myBtn1, .myBtn2");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

	/*//////////////////////////////////*/


	// Model

	$('[data-m-box] > div').prepend('<span class="log-cls js-log-cls">×</span>');
	$('[data-m-id]').on('click', function(e){
	    e.preventDefault();
	     var mName = $(this).attr('data-m-id'),
	         mBox  =  $('[data-m-box='+mName+']'),
	         width = (mBox.attr('data-width')) ? mBox.attr('data-width') : null;

	  if(!mBox.hasClass('not-display')){
	   mBoxe(mBox,width);
	  }
	  
	});

	$('[data-m-id],[data-m-box] > div').on('click', function(e){
	  e.stopPropagation();
	});
	$(document).on('click','[data-m-box]' ,removeModel );
	$(document).on('click','.js-log-cls', removeModel1);
	$('[data-m-box]').on('click' ,removeModel );
	$('.js-log-cls').on('click', removeModel1);

	function removeModel(){
	  $(this).children().removeClass('cSlideInDown').addClass('cSlideUp');
	  $(this).fadeOut(250);
	}
	function removeModel1(){
	  $(this).parent().removeClass('cSlideInDown').addClass('cSlideUp');
	  $(this).closest('[data-m-box]').fadeOut(250);
	}


});

function mBoxe(mBox,width = null){
    mBox.fadeIn(250);
    mBox.children().css('max-width', width).removeClass('cSlideUp').addClass('cSlideInDown');
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}


//REVISAR
showNumber();

function separators(num)
{
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return num_parts.join(",");
}

//REVISAR
function showNumber() {
    document.getElementById("valortotal_").innerHTML = separators(3000000.98);
	document.getElementById("valorpagado_").innerHTML = separators(3000000.98);
}

