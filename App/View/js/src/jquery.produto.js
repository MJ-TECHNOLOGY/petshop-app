function addProduto(id, descricao, marca, preco, peso, codigo, data_validade, id_categoria) {
    if (agendamento !== "") {
        $.ajax({
            type: "POST",
            url: "/produto/save",
            data: {
                id: id,
                descricao: descricao,
                marca: marca,
                preco: preco,
                peso: peso,
                codigo: codigo,
                data_validade: data_validade,
                id_categoria: id_categoria,
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

function getProdutoById(id) {
    $.ajax({
        type: "GET",
        url: "/produto/get-by-id?id=" + id,
        dataType: 'json',
        success: function (result) {
            $('#descricao').val(result.response_data.descricao);
            $('#marca').val(result.response_data.marca);
            $('#preco').val(result.response_data.preco);
            $('#peso').val(result.response_data.peso);
            $('#codigo').val(result.response_data.codigo);
            $('#data_validade').val(result.response_data.data_validade);
            $('#id_categoria').val(result.response_data.id_categoria);
            $('#id').val(result.response_data.id);
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteProduto(id) {
    $.ajax({
        type: "GET",
        url: "/produto/delete?id=" + id,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableProduto() {   
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
  
}

$(document).ready(function () {    
    loadTableProduto();

    $('.btn-edit').click(function (event) {
        getProdutoById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteProduto(event.target.id);

        window.location.reload(true);
    })
})