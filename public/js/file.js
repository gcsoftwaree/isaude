let fileId = 0
let cont = 0

function showFiles(input){
    let estruturaAnexo =
        '<li class="nav-item pe-5 lh-base" id="anexoTabela_' + fileId + '">' +
        '<img class="imgAnexo" src="" alt=""/>' +
        input.files[0].name +
        '<button id="' + fileId + '" type="button" onclick="anexoDelete(this)" class="btn-close"/>' +
        '</li>'
    $("#fileList").append(estruturaAnexo);

    fileId++

    if(fileId < 5){
        cont++
        if(cont < 5) {
            $(input).hide()
            $("#inputFiles").append('<input class="form-control input-esconder" id="anexo_' + fileId + '" onchange="showFiles(this)" name="files[]" accept="image/jpeg , application/pdf" type="file">')
        }
    }else{
        $(input).prop("readonly",true)
    }
}


function anexoDelete(input){
    --fileId

    $("#anexoTabela_"+input.id).remove()
    $(".input-esconder").hide()
    $('#anexo_'+input.id).val('')
    $("#anexo_"+input.id).show()
    $("#anexo_"+input.id).prop("readonly",false);
}
