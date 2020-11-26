function mascara(o, f) {
	v_obj = o
	v_fun = f
	setTimeout("execmascara()", 1)
}

function execmascara() {
	v_obj.value = v_fun(v_obj.value);
}

function mcep(v) {
	v = v.replace(/\D/g, "") //Remove tudo o que não é dígito
	v = v.replace(/^(\d{5})(\d)/, "$1-$2")
	return v
}

function mtel(v) {
	v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
	v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
	v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
	return v;
}

function mcnpj(v) {
	v = v.replace(/\D/g, "") //Remove tudo o que não é dígito
	v = v.replace(/^(\d{2})(\d)/, "$1.$2") //Coloca ponto entre o segundo e o terceiro dígitos
	v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
	v = v.replace(/\.(\d{3})(\d)/, ".$1/$2") //Coloca uma barra entre o oitavo e o nono dígitos
	v = v.replace(/(\d{4})(\d)/, "$1-$2") //Coloca um hífen depois do bloco de quatro dígitos
	return v
}

function mcpf(v) {
	v = v.replace(/\D/g, "") //Remove tudo o que não é dígito
	v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
	v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
	//de novo (para o segundo bloco de números)
	v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
	v = v.substring(0, 14) // Limita o tamanho
	return v
}

function mdata(v) {
	v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
	v = v.replace(/(\d{2})(\d)/, "$1/$2");
	v = v.replace(/(\d{2})(\d)/, "$1/$2");
	v = v.replace(/(\d{2})(\d{2})$/, "$1$2");
	v = v.substring(0, 10) // Limita o tamanho
	return v;
}

function mtempo(v) {
	v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
	v = v.replace(/(\d{1})(\d{2})(\d{2})/, "$1:$2.$3");
	return v;
}

function mhora(v) {
	v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
	v = v.replace(/(\d{2})(\d)/, "$1h$2");
	return v;
}

function dois_pontos(tempo) {
	if (event.keyCode < 48 || event.keyCode > 57) {
		event.returnValue = false;
	}
	if (tempo.value.length == 2 || tempo.value.length == 5) {
		tempo.value += ":";
	}
}

function valida_horas(tempo) {
	horario = tempo.value.split("h");
	var horas = parseInt(horario[0]);
	var minutos = parseInt(horario[1]);
	if (horas > 24 || minutos > 59) {
		alert("Horário informado inválido");
		document.getElementById(tempo.id).value = '';
	}
}

function mrg(v) {
	v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
	v = v.replace(/(\d)(\d{7})$/, "$1.$2"); //Coloca o . antes dos últimos 3 dígitos, e antes do verificador
	v = v.replace(/(\d)(\d{4})$/, "$1.$2"); //Coloca o . antes dos últimos 3 dígitos, e antes do verificador
	v = v.replace(/(\d)(\d)$/, "$1-$2"); //Coloca o - antes do último dígito
	return v;
}

function mnum(v) {
	v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
	return v;
}

function mvalor(v) {
	v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
	v = v.replace(/(\d)(\d{8})$/, "$1.$2"); //coloca o ponto dos milhões
	v = v.replace(/(\d)(\d{5})$/, "$1.$2"); //coloca o ponto dos milhares
	v = v.replace(/(\d)(\d{2})$/, "$1,$2"); //coloca a virgula antes dos 2 últimos dígitos
	return v;
}

function mcc(v) {
	v = v.replace(/\D/g, ""); // Permite apenas dígitos
	v = v.replace(/(\d{4})/g, "$1 "); // Coloca um ponto a cada 4 caracteres
	v = v.replace(/\.$/, ""); // Remove o ponto se estiver sobrando
	v = v.substring(0, 19) // Limita o tamanho
	return v;
}

function vCPF(cpf) {
	cpf = cpf.replace(/[^\d]+/g, '');
	if (cpf == '') return false;
	// Elimina CPFs invalidos conhecidos
	if (cpf.length != 11 ||
		cpf == "00000000000" ||
		cpf == "11111111111" ||
		cpf == "22222222222" ||
		cpf == "33333333333" ||
		cpf == "44444444444" ||
		cpf == "55555555555" ||
		cpf == "66666666666" ||
		cpf == "77777777777" ||
		cpf == "88888888888" ||
		cpf == "99999999999")
		return false;
	// Valida 1o digito
	add = 0;
	for (i = 0; i < 9; i++)
		add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(9)))
		return false;
	// Valida 2o digito
	add = 0;
	for (i = 0; i < 10; i++)
		add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(10)))
		return false;
	return true;
}
