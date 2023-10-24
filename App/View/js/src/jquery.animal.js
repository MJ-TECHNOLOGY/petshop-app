function addAnimal(id, nome_animal, raca, idade, sexo, cor, observacao) {
    if (nome_animal !== "") {
        $.ajax({
            type: "POST",
            url: "/animal/save",
            data: {
                id: id,
                nome_animal: nome_animal,
                raca: raca,
                idade: idade,
                sexo: sexo,
                cor: cor,
                observacao: observacao
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

function getAnimalById(id) {
    $.ajax({
        type: "GET",
        url: "/animal/get-by-id?id=" + id,
        dataType: 'json',
        success: function (result) {
            $('#txtNomeAnimal').val(result.response_data.nome_animal);
            $('#txtRaca').val(result.response_data.raca);
            $('#txtIdade').val(result.response_data.idade);
            $('#txtSexo').val(result.response_data.sexo);
            $('#txtCor').val(result.response_data.cor);
            $('#txtObservacao').val(result.response_data.observacao);
            $('#id').val(result.response_data.id);
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteAnimal(id) {
    $.ajax({
        type: "GET",
        url: "/animal/delete?id=" + id,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableAnimal() {   
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
  
}

$(document).ready(function () {    
    loadTableAnimal();

    $('.btn-edit').click(function (event) {
        getAnimalById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteAnimal(event.target.id);

        window.location.reload(true);
    })
})