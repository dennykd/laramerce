function deleteModalHandler(index) {
    $("#deleteItem").attr("action", $("#delete_route_" + index).val());
    $("#delete_route_input").val($("#delete_route_" + index).val());
}
function logoPreview(){
    let inputImg=document.getElementById("img_upload");
    let imgPreview=document.getElementById("img_preview");   

    let imgReader=new FileReader();
    imgReader.readAsDataURL(inputImg.files[0]);
    console.log(inputImg.files[0]);
    imgReader.onload=function(e){
        imgPreview.setAttribute("src",e.target.result);
    }
}

