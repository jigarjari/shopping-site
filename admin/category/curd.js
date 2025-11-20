$(document).ready(function(){
    loadcategory();

$('#category_form').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url : $('#cat_id').val() ? 'category/update.php' : 'category/insert.php',
        method:'POST',
        data: {
            id : $('#cat_id').val(),
            name : $('#name').val()
        },
        success:function(r){
            $('#message').html(r)
            loadcategory();
            $('#submit').val("Insert");
            $('#cat_id').val('');        
        }
    })
})

$(document).on('click','.deleteBtn',function(e){
     e.preventDefault();
    var $id=$(this).data('id');
    $.ajax({
        url:'category/delete.php',
        method:"POST",
        data:{
            id:$id
        },
        success:function(r){
            $('#message').html(r);
            loadcategory();
        }

    })
});

$(document).on('click','.editBtn',function(e){
    e.preventDefault();
    $('#cat_id').val($(this).data('id'));
    $('#name').val($(this).data('name'));
    $('#submit').val("Update");

});   
});
function loadcategory(){
    $.ajax({
        url:"category/select.php",
        method:"POST",
        success:function(r){
            $('#data').html(r)
        }
    });
}