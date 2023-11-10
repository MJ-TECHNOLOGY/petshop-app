function addCliente(id, nome, cpf, email, data_nascimento, telefone, logradouro, numero, bairro, cidade, cep, ponto_referencia) {
    if (nome !== "") {
        $.ajax({
            type: "POST",
            url: "/produto/save",
            data: {
                id: id,
                nome: nome,
                cpf: cpf,
                email: email,
                data_nascimento: data_nascimento,
                telefone: telefone,
                logradouro: logradouro,
                numero: numero,
                bairro: bairro,
                cidade: cidade,
                cep: cep,
                ponto_referencia: ponto_referencia,
            },
            dataType: 'json',
            success: function (result) {
                console.log(result.response_data)
            },
            error: function (result) {
                console.log(result)
            }
        });
    }
}

function getClienteById(id) {
    $.ajax({
        type: "GET",
        url: "/cliente/get-by-id?id=" + id,
        dataType: 'json',
        success: function (result) {
            $('#nome').val(result.response_data.nome);
            $('#cpf').val(result.response_data.cpf);
            $('#email').val(result.response_data.email);
            $('#data_nascimento').val(result.response_data.data_nascimento);
            $('#telefone').val(result.response_data.telfone);
            $('#logradouro').val(result.response_data.logradouro);
            $('#numero').val(result.response_data.numero);
            $('#bairro').val(result.response_data.bairro);
            $('#cidade').val(result.response_data.cidade);
            $('#cep').val(result.response_data.cep);
            $('#ponto_referencia').val(result.response_data.ponto_referencia);
            $('#id').val(result.response_data.id);
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteCliente(id) {
    $.ajax({
        type: "GET",
        url: "/cliente/delete?id=" + id,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableCliente() {   
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
  
}

$(document).ready(function () {    
    loadTableCliente();

    $('.btn-edit').click(function (event) {
        getClienteById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteCliente(event.target.id);

        window.location.reload(true);
    })
})