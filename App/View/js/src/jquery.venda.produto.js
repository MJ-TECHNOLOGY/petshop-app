function addVendaProduto(id, data_venda, quantidade, valor_total, id_produto, id_cliente) {
    if (data_venda !== "") {
        $.ajax({
            type: "POST",
            url: "/venda_produto/save",
            data: {
                id: id,
                data_venda: data_venda,
                quantidade: quantidade,
                valor_total: valor_total,
                id_produto: id_produto,
                id_cliente: id_cliente,
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

function getVendaProdutoById(id) {
    $.ajax({
        type: "GET",
        url: "/venda_produto/get-by-id?id=" + id,
        dataType: 'json',
        success: function (result) {
            $('#data_venda').val(result.response_data.data_venda);
            $('#quantidade').val(result.response_data.quantidade);
            $('#preco').val(result.response_data.preco);
            $('#valor_total').val(result.response_data.valor_total);
            $('#id_produto').val(result.response_data.id_produto);
            $('#id_cliente').val(result.response_data.id_cliente);
            $('#id').val(result.response_data.id);
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteVendaProduto(id) {
    $.ajax({
        type: "GET",
        url: "/venda_produto/delete?id=" + id,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableVendaProduto() {   
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
  
}

$(document).ready(function () {    
    loadTableVendaProduto();

    $('.btn-edit').click(function (event) {
        getVendaProdutoById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteVendaProduto(event.target.id);

        window.location.reload(true);
    })
})

function definirPreco() {
    var selectProduto = document.getElementById("id_produto");

    var indiceProdutoSelecionado = selectProduto.selectedIndex;

    var precoSelecionado = selectProduto.options[indiceProdutoSelecionado].getAttribute("data-preco");

    document.getElementById("preco").value = precoSelecionado;
}

function calculoValorTotal() {
    var quantidade = document.getElementById("quantidade").value;
    var preco = document.getElementById("preco").value;

    var valorTotal = quantidade * preco;

    document.getElementById("valor_total").value = valorTotal;
}