function removeOrderedItem(id){
    $.ajax({
        url: 'http://banchamp.me/page/reduceCartByOne',
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
        $('#checkout').prop('disabled',true);
        return;
    }
    data = JSON.parse(data);
    $('#ordered-item').append('<div class="row"></div>');
    $.each(data.items,(index,item) => {
        $('#ordered-item .row').append(
            '<div class="col-md-4">'+
                '<div class="ordered-cart thumbnail">'+
                    '<a class="x-cart" onclick="removeOrderedItem('+item.item.MaSP +')" href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>'+
                    '<a href="http://banchamp.me/page/detail/'+item.item.MaSP+'" target="_blank">'+
                        '<img src="source/img/product/'+$.trim(item.item.TenSP)+'/cover/'+item.item.HinhSP+'" alt="Lights" height="100" style="width:100%">'+
                        '<div class="caption">'+
                            '<p class="text-animate">Giá: '+item.item.GiaSP+' x'+item.qty +'</p>'+
                        '</div>'+
                    '</a>'+
                '</div>'+
            '</div>');
    });
    $('#checkout').prop('disabled',false);
    $('#ordered-item').append('<h4 id="ordered-price">Tổng tiền: '+data.totalPrice+'</h4>')
}