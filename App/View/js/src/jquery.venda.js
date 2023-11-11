function addVenda(id, agendamento, id_cliente, id_animal, id_servico) {
    if (agendamento !== "") {
        $.ajax({
            type: "POST",
            url: "/venda/save",
            data: {
                id: id,
                agendamento: agendamento,
                id_cliente: id_cliente,
                id_animal: id_animal,
                id_servico: id_servico,
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

function getVendaById(id) {
    $.ajax({
        type: "GET",
        url: "/venda/get-by-id?id=" + id,
        dataType: 'json',
        success: function (result) {
            $('#agendamento').val(result.response_data.agendamento);
            $('#id_cliente').val(result.response_data.id_cliente);
            $('#id_animal').val(result.response_data.id_animal);
            $('#id_servico').val(result.response_data.id_servico);
            $('#id').val(result.response_data.id);
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteVenda(id) {
    $.ajax({
        type: "GET",
        url: "/venda/delete?id=" + id,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableVenda() {   
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
  
}

$(document).ready(function () {    
    loadTableVenda();

    $('.btn-edit').click(function (event) {
        getVendaById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteVenda(event.target.id);

        window.location.reload(true);
    })
})