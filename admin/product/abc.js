$(document).ready(function(){
     loadProduct();
     loadcat();
     $('#form_product').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url:$('#id').val()? "product/update.php" :"product/insert.php",
            method:"post",
            data:formData,
            contentType: false, 
            processData: false,
            success:function(r){
                $('#msg').html(r)
                loadProduct()
            }
        })
     })
    $(document).on('click','.editBtn',function(){
        $('#id').val($(this).data('id'))
        $('#valueselect').val($(this).data('category_id'))
        $('#pname').val($(this).data('name'))
        $('#desc').val($(this).data('description'))
        $('#price').val($(this).data('price'))
        $('#imgProduct').val($(this).data('image'))    
    })
     $(document).on('click','.delBtn',function(){
        $.ajax({
            url:"product/delete.php",
            method:"POST",
            data:{
                id:$(this).data('id')
            },
            success:function(r){
                $('#msg').html(r)
                loadProduct()
            }
        })
     })
 })
 function fileupload(){
    $.ajax({
        url:'product/upload.php',
        method:"post",
        data:{
            
        }
    })
 }
function loadcat(){
    $.ajax({
        url:'product/loadcat.php',
        method:'post',
        success:function(r){
            $('#valueselect').html(r)
        }
    })
}
function loadProduct(){
    $.ajax({
        url:"product/select.php",
        method:"POST",
        success:function(r){
            $('#showdata').html(r)
        }
    })
}