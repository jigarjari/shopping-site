$(document).ready(function () {
    loadcategory();
    loadProduct();
    $(document).on('click','#btncoupon',function(){
        $.ajax({
            url:"bill.php",
            method:"POST",
            data:{
                userid:$('#userid').val(),
                code:$('#coupon').val()
            },
            success:function(r){
                $('#bill').html(r)
            }
        })
    })
    $(document).on('click','#placeorder',function(){
        //alert($('#totalamt').val() + " " + $('#userid').val() + " " + $('#currdate').val())
        $.ajax({
            url:"order.php",
            method:"POST",
            data:{
                userid:$('#userid').val(),
                total:$('#totalamt').val(),
                currdate:$('#currdate').val()
            },
            success:function(r){
                alert(r)
            }
        })
    })
    $(document).on('click','#order',function(){
        $.ajax({
            url:"bill.php",
            method:"POST",
            data:{
                userid:$('#userid').val()
            },
            success:function(r){
                alert('Scroll to see the bill')
                $('#bill').html(r)
            }
        })
    })
   $(document).on('click','#cart',function(){
        loadcart()        
   })
   $(document).on('click','#orders',function(){
        $.ajax({
            url:"placedOrders.php",
            method:"post",
            data:{
                userid:$('#userid').val()
            },
            success:function(r){
                $('.content').html(r)
                 $('#bill').html(' ')
            }
        })        
   })
   $(document).on('click','.move',function(){
        $.ajax({
        url: "loadcatproduct.php",
        method: "POST",
        data:{
            id:$(this).data('id')
        },
        success: function (r) {
            $('.content').html(r);
            $('#bill').html(' ')
        }
        })    
   })
   $(document).on('click','.atc',function(){ 
    var p_id = $(this).data('id');
    $.ajax({
            url:"cart/addtocart.php",
            method:"POST",
            data:{
                userid:$('#userid').val(),
                pid:p_id,
                qty:$("#qty_"+p_id).val()
            },
            success:function(r){
                alert(r);
            }
        })
   })
   $(document).on('click','.changeqty',function(){ 
    $.ajax({
            url:"cart/updatecart.php",
            method:"POST",
            data:{
                cid:$(this).data('id'),
                qty:$("#qty_"+$(this).data('pid')).val()
            },
            success:function(r){
                alert(r);
            }
        })
   })
   $(document).on('click','.rfc',function(){ 
    $.ajax({
            url:"cart/removefromcart.php",
            method:"POST",
            data:{
                cid:$(this).data('id')
            },
            success:function(r){
                alert(r);
            }
        })
        loadcart()
   })
   $(document).on('click','#home',function(){
        loadProduct();
        $('#bill').html(' ')
   })  
}); 
function loadcategory() {
    $.ajax({
        url: "addcat.php",
        method: "POST",
        success: function (r) {
            $('.cate').html(r);
        }
    })
}
function loadProduct() {
    $.ajax({
        url: "addproduct.php",
        method:"POST",
        success:function(r){
            $('.content').html(r)
        }
    })
}
function loadcart(){
    $.ajax({
            url:"cart.php",
            method:"post",
            data:{
                userid:$('#userid').val()
            },
            success:function(r){
                $('.content').html(r)
            }
        })
}