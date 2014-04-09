$(window).load(function() {
		$("#nc").keypress(verificaNumero);
		$("#codSeg").keypress(verificaNumero);
var valor = "";
$("#cc").hide();

		$("input:radio[name=pagamento]").click(function() {
			$('input:radio[name=pagamento]').each(function() {
				if($(this).is(':checked')){
					valor = $(this).val();

		if(valor == "boleto"){
			$("#cc").hide();
			boleto();
		}

		if((valor == "visa") || (valor == "master")){
			$("#cc").show();
			$('html, body').animate({
    scrollTop: $("#cc").offset().top
}, 1000);
		}

		if(valor == "pagseguro"){
			$("#cc").hide();
			alert("Voce será redirecionado para a pagina do pagseguro, para efetuar o pagamento.");
			href.location="http://pagseguro.com.br";
		}
				}
				
			});
		});
		
	}); //Exibe o box do cartao dependendo da escolha do metodo de pagamento (exibir presione crtl+shift+[)

		$("#nc").blur(function() {
			var cctype= "";
			$('input:radio[name=pagamento]').each(function() {
					if($(this).is(':checked')){
						cctype = $(this).val();
					}

			});
			campo = $(this).val();
			if(cctype == "master"){
				if(campo.length == 16){
						$("#nc").attr('invalid', 'valid');
						$(".status").html("");

						$("#nc").removeClass('cmpInvalido');

					filto = /^5[1-5]/;
					if(filto.test(campo)){
						$(".status").html("");
						$("#nc").attr('invalid', 'valid');
						$("#nc").removeClass('cmpInvalido');

					}else{
						$("#nc").attr('invalid', 'invalid');
						$("#nc").addClass('cmpInvalido');
						$(".status").html("Numero de cartão Master invalido");
					}
				}else{
						$("#nc").attr('invalid', 'invalid');
						$("#nc").addClass('cmpInvalido');
						$(".status").html("Quantidade de digitos errado");
					}
			}

			if(cctype == "visa"){
				if(campo.length == 13 || campo.length == 16){
						$("#nc").attr('invalid', 'valid');
						$(".status").html("");

						$("#nc").removeClass('cmpInvalido');

					filto = /^4/;
					if(filto.test(campo)){
						$(".status").html("");
						$("#nc").attr('invalid', 'valid');
						$("#nc").removeClass('cmpInvalido');

					}else{
						$("#nc").attr('invalid', 'invalid');
						$("#nc").addClass('cmpInvalido');
						$(".status").html("Numero de cartão Visa invalido");
					}
				}else{
						$("#nc").attr('invalid', 'invalid');
						$("#nc").addClass('cmpInvalido');
						$(".status").html("Quantidade de digitos errado");
					}
			}	
		});// Função de validação ao sair do campos Numero do Cartao(exibir presione crtl+shift+[)

	$("#sub").click(function(event) {
		 event.preventDefault();
		cont = 0;
		cctype = "";
			$('input:radio[name=pagamento]').each(function() {
					if($(this).is(':checked')){
						cctype = $(this).val();
					}

			});
		if(cctype == "visa" || cctype == "master"){
		$("#cc input").each(function() {
			if($(this).attr('invalid') == "invalid"){
				cont++;
			}
			
		});
		if(cont == 0){
			$("#form").submit();
		}else{
			alert("existem campos com erros verifique");
		}
		}else{
			$("#form").submit();
		}

	}); // Verifica se nao existe erros nos dados do Cartao, se tudo certo ele submita o form (exibir presione crtl+shift+[)

	function verificaNumero(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            } // Funcao para nao colocar Letras nos campos que so é aceito numeros em tempo real (exibir presione crtl+shift+[)


$("#nomeCartao").keypress(function(event) {
	campo = $(this).val();
	if(campo == ""){
		$(this).addClass('cmpInvalido');
	}else{
		$(this).attr('invalid', 'valid');
		$(this).removeClass('cmpInvalido');
	}
});

$("#nomeCartao").blur(function(event) {
	campo = $(this).val();
	if(campo == ""){
		$(this).addClass('cmpInvalido');
	}else{
		$(this).attr('invalid', 'valid');
		$(this).removeClass('cmpInvalido');
	}
}); // Eventos do Nome no cartao

$("#codSeg").blur(function(event) {
	campo = $(this).val();
	if(campo == "" || campo.length != 3 ){
		$(this).addClass('cmpInvalido');
	}else{
		$(this).attr('invalid', 'valid');
		$(this).removeClass('cmpInvalido');
	}
}); // Evento Codigo de Seguran

