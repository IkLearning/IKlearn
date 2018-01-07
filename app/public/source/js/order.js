function removeOrderedItem(id){
    $.ajax({
        url: 'http://Iklearn.me:88/page/reduceCartByOne',
        method: "POST",
        data: {id},
        success: (data)=> {
            updateCart(data);
            updateOdered(data);
        }
    });
}

function updateOdered(data){
    $('#ordered-item').html('');
    if(!$.trim(data))
    {
        $('#ordered-item').append('<h4 id="ordered-price">Tổng tiền: '+0+'</h4>')
        $('#ordered-item').append('<button class="btn btn-outline-info" id="checkout" disabled>Đặt hàng</button>');
        return;
    }
    data = JSON.parse(data);
    $('#ordered-item').append('<div class="row"></div>');
    $.each(data.items,(index,item) => {
        $('#ordered-item .row').append(
            '<div class="col-md-4">'+
                '<div class="ordered-cart thumbnail">'+
                    '<a class="x-cart" onclick="removeOrderedItem('+item.item.MaSP +')" href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>'+
                    '<a href="http://Iklearn.me:88/page/detail/'+item.item.MaSP+'" target="_blank">'+
                        '<img src="source/img/product/'+$.trim(item.item.TenSP)+'/cover/'+item.item.HinhSP+'" alt="Lights" height="100" style="width:100%">'+
                        '<div class="caption">'+
                            '<p class="text-animate">Giá: '+item.item.GiaSP+' x'+item.qty +'</p>'+
                        '</div>'+
                    '</a>'+
                '</div>'+
            '</div>');
    });
    $('#ordered-item').append('<h4 id="ordered-price">Tổng tiền: '+data.totalPrice+'</h4>')
    $('#ordered-item').append('<input id="checkout" type="submit" value="Đặt hàng" class="btn btn-outline-info">');
}

function checkout(){
    $.ajax({
        url:'http://Iklearn.me:88/page/checkout',
        beforeSend: () => $('#checkout').val('Loading..'),
        success: (response)=>{
            if(response == '0')
            {
                $('.container .row').html('<h1 class="alert alert-success">Đặt hàng thành công </h1>');
            }
            else{
                alert('Đặt hàng không thành công!Vui lòng thử lại sau');
                $('#checkout').val('Đặt hàng');
            }
        }
    });
    updateCart(data=null);
}

$('#ordered-item').on('click','#checkout',function(){
    checkout();

});