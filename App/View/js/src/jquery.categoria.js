function addCategoria(id, descricao) {
    if (descricao !== "") {
        $.ajax({
            type: "POST",
            url: "/categoria/save",
            data: {
                id: id,
                descricao: descricao
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

function getCategoriaById(id) {
    $.ajax({
        type: "GET",
        url: "/categoria/get-by-id?id=" + id,
        dataType: 'json',
        success: function (result) {
            $('#txtDescricao').val(result.response_data.nome_animal);
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
        url: "/categoria/delete?id=" + id,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableCategoria() {   
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
  
}

$(document).ready(function () {    
    loadTableCategoria();

    $('.btn-edit').click(function (event) {
        getCategoriaById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteCategoria(event.target.id);

        window.location.reload(true);
    })
})