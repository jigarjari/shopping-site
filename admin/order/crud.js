$(document).ready(function(){
  loadorders();

});
function loadorders(){
    $.ajax({
        url:"order/select.php",
        method:"POST",
        success:function(r){
            $("#showdata").html(r)
        }
    })
}