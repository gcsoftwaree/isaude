let arrayFiles = []
let fileId = 0

let posicaoAnexo = 0;

// function showFiles(valor){
//
//     console.log('lenght: '+valor.files.length)
// if(posicaoAnexo < 4){
//     $(valor).hide();
//     console.log('posicao <= 4 primeiro')
//     let posicao = ++posicaoAnexo;
//     console.log(posicaoAnexo)
//     console.log(valor.files)
//     if(posicao <= 4) {
//     console.log('posicao <= 4')
//         $("#inputFiles").append('<input class="form-control input-esconder" id="anexo_' + posicao + '" onchange="showFiles(this)" name="files[]" accept="image/jpeg , application/pdf" type="file">')
//     }
// }else if(posicaoAnexo >= 4 && document.getElementById("uploadfile").files.length > 0)   {
//     posicaoAnexo = 5;
//     $(valor).hide();
//     console.log('posicaoAnexo >= 4 && valor.files.length > 0')
//
//     $("#inputFiles").append('<input class="form-control input-esconder" id="anexo_' + posicaoAnexo + '" onchange="showFiles(this)" name="files[]" accept="image/jpeg , application/pdf" type="file" disabled>')
// }else  {
//     console.log("oiiii")
//     $("#"+valor.id).show()
//     $('#'+valor.id).val("")
// }
//     let estruturaAnexo =
//         '<li class="nav-item pe-5 lh-base" id="anexoTabela_' + valor.id + '">' +
//         '<img class="imgAnexo" src="" alt=""/>' +
//         valor.files[0].name +
//         '<button id="' + valor.id + '" type="button" onclick="anexoDelete(this)" class="btn-close"/>' +
//         '</li>'
//
//
//     $("#fileList").append(estruturaAnexo);
// }
//
// function anexoDelete(valor) {
//     $(".input-esconder").hide()
//     // $(valor).hide();
//     let id = valor.id
//     $("#anexo_" + id).remove()
//     $("#anexoTabela_" + id).remove()
//     // let novoid = ++id
//     $("#" + valor.id).show()
//     $('#' + valor.id).val("")
//     console.log('id ' + id)
//
//
//     // $("#anexo_"+id).show()
//     console.log(valor)
//     showFiles(valor)
//
// }
//
$('#submit').on('click',function() {
    addFile();

});

// function showFiles(input){
//     if(input) {
//         let estruturaAnexo =
//             '<li class="nav-item pe-5 lh-base" id="anexoTabela_' + fileId + '">' +
//             '<img class="imgAnexo" src="" alt=""/>' +
//             input.files[0].name +
//             '<button id="' + fileId + '" type="button" onclick="anexoDelete(this, input)" class="btn-close"/>' +
//             '</li>'
//         $("#fileList").append(estruturaAnexo)
//         arrayFiles.push(input)
//         $(input).hide()
//     }
//     fileId++
//
//     if(arrayFiles.length < 5){
//         $("#inputFiles").append('<input class="form-control input-esconder" id="anexo_' + fileId + '" onchange="showFiles(this)" name="files[]" accept="image/jpeg , application/pdf" type="file">')
//     }else{
//         --fileId
//         console.log('TAMO NO ELSE')
//         $(input).show()
//         $("#anexo_"+fileId).prop("disabled",true)
//         console.log('fileId: '+fileId)
//     }
//
//     // let inputFile = $('<input/>')
//     //     .attr('type', "file")
//     //     .attr('name', "files[]")
//     //     .attr('id', "someName")
//        //     .attr('value', $(input).val());
//     //
//     // $(inputFile).append('#fileForm')
//     // $(input).val("")
// }
//
// function anexoDelete(input, val){
//
//     const removeIndex = arrayFiles.map(item => item.id).indexOf(input.id);
//     arrayFiles.splice(removeIndex, 1)
//     $("#anexoTabela_"+input.id).remove()
//     $("#anexo_"+input.id).remove()
//     console.log('ID: '+input.id)
//     if(arrayFiles.length < 5){
//         showFiles('')
//     }else{
//         $("#anexo_"+fileId).prop("disabled",false);
//     }
// }

// function teste(val){
//     alert('oi')
//     val.preventDefault();
// }



function showFiles(input){
    let estruturaAnexo =
        '<li class="nav-item pe-5 lh-base" id="anexoTabela_' + fileId + '">' +
        '<img class="imgAnexo" src="" alt=""/>' +
        input.files[0].name +
        '<button id="' + fileId + '" type="button" onclick="anexoDelete(this)" class="btn-close"/>' +
        '</li>'
    $("#fileList").append(estruturaAnexo);

    arrayFiles.push(input)
    console.log(arrayFiles)
    if(arrayFiles.length >= 5){
        $("#files").prop("disabled",true);
    }else{
        $("#files").val('')
    }

    fileId++
}


function anexoDelete(input){

    const removeIndex = arrayFiles.map(item => item.id).indexOf(input.id);
    arrayFiles.splice(removeIndex, 1)
    $("#anexoTabela_"+input.id).remove()
    $("#files").prop("disabled",false);
    $('#files').val('')
}

function addFile(){
        for (let $i = 1; $i <= arrayFiles.length; $i++) {
            $("#addFile").append(arrayFiles[$i])
        }





}


