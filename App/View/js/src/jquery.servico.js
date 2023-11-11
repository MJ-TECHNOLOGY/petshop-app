function addServico(id, descricao, valor) {
    if (descricao !== "") {
        $.ajax({
            type: "POST",
            url: "/servico/save",
            data: {
                id: id,
                descricao: descricao,
                valor: valor,
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

function getServicoById(id) {
    $.ajax({
        type: "GET",
        url: "/servico/get-by-id?id=" + id,
        dataType: 'json',
        success: function (result) {
            $('#descricao').val(result.response_data.descricao);
            $('#id').val(result.response_data.id);
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteServico(id) {
    $.ajax({
        type: "GET",
        url: "/servico/delete?id=" + id,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableServico() {   
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
  
}

$(document).ready(function () {    
    loadTableServico();

    $('.btn-edit').click(function (event) {
        getServicoById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteServico(event.target.id);

        window.location.reload(true);
    })
})