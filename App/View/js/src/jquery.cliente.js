function addCliente(id, nome, cpf, email, data_nascimento, telefone, logradouro, numero, bairro, cidade, cep, ponto_referencia) {
    if (nome !== "") {
        $.ajax({
            type: "POST",
            url: "/cliente/save",
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
                ponto_referencia: ponto_referencia
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
            $('#txtNome').val(result.response_data.cliente);
            $('#id').val(result.response_data.id);
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteCategoria(id) {
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