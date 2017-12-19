//Start cart

function addCart(id){
    var location = window.location.pathname;
    var url;
    if(location=='/page' || location == '/')
        url = 'page/addCart';
    else
        url = '../addCart';
    $.ajax({
        url: url,
        method: "POST",
        data: {id},
        success: (data)=>{
            data = JSON.parse(data);
            $('#cartStatus').html('&nbsp;('+ data.totalQty +')');
            $('#cartBody').html('');
            console.log(data);
            $.each(data.items,(index,item) => {
                $('#cartBody').append(
                '<a class="dropdown-item">'+
                    '<span><img width="50" src="../../../app/public/source/img/product/'+$.trim(item.item.TenSP)+'/thumbnail/'+$.trim(item.item.TenSP)+'.png" alt=""></span>'+
                    '<span>&nbsp;'+ item.item.TenSP +'</span>'+
                    '<span>&nbsp;'+ item.price +'</span>'+
                    '<span>x'+ item.qty +'</span>'+
                    '<span style="text-align:right" class="badge badge-pill badge-warning"><i class="fa fa-times" aria-hidden="true"></i></span>'+
                '</a>');
            });
            $('#totalPrice>span').html(data.totalPrice);
        }
    });
}



//End cart