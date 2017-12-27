//Start cart

function addCart(id){
    var location = window.location.pathname;
    var tokens = location.split('/');
    var url;
    if(tokens.length < 3)
        url = "page/addCart";
    else if(tokens.length > 3)
        url = "../addCart";
    else
        url ="addCart";
    $.ajax({
        url: url,
        method: "POST",
        data: {id},
        success: (data)=> updateCart(data)
    });
}

function removeCartItem(id){
    var location = window.location.pathname;
    var tokens = location.split('/');
    var url;
    if(tokens.length < 3)
        url = "page/reduceCartByOne";
    else if(tokens.length > 3)
        url = "../reduceCartByOne";
    else
        url ="reduceCartByOne";
    $.ajax({
        url: url,
        method: "POST",
        data: {id},
        success: (data)=> updateCart(data)
    });
}

function updateCart(data){
    $('#cartBody').html('');
    $('#cartStatus').html('&nbsp;('+ 0 +')');
    if(!$.trim(data))
    {
        $('#totalPrice>span').html(0+"");
        return;
    }
    data = JSON.parse(data);
    $('#cartStatus').html('&nbsp;('+ data.totalQty +')');
    $('#cartBody').html('');
    $.each(data.items,(index,item) => {
        $('#cartBody').append(
            '<a class="dropdown-item" onclick="removeCartItem('+item.item.MaSP+')">'+
                '<span><img width="50" src="../../../app/public/source/img/product/'+$.trim(item.item.TenSP)+'/thumbnail/'+$.trim(item.item.TenSP)+'.png" alt=""></span>'+
                '<span>&nbsp;'+ item.item.TenSP +'</span>'+
                '<span>&nbsp;'+ item.price +'</span>'+
                '<span>x'+ item.qty +'</span>'+
                '<span style="text-align:right" class="badge badge-pill badge-warning"><i class="fa fa-times" aria-hidden="true"></i></span>'+
            '</a>');
    });
    $('#totalPrice>span').html(data.totalPrice);
}

//End cart
function updateSearch(data){
    $('#searchBody').html('');
    if(!$.trim(data))
    {
        $('#resultSearch').html('<h4 class="alert alert-warning">0 kết quả</h4>')
        return;
    }
    data = JSON.parse(data);
    $('#resultSearch').html('<h4 class="alert alert-success">'+data.length+' kết quả</h4>')
    $.each(data,(index,item)=>{
        $('#searchBody').append(
            '<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project wow animated fadeInLeft"  style="background-image:url(../app/public/source/img/product/'+item.TenSP.replace(' ','')+'/cover/'+item.HinhSP+')">'+
                '<div class="project-hover" id="sp'+ item.MaSP +'">'+
                    '<h2>'+item.TenSP+'</h2>'+
                    '<h4><span>'+item.GiaSP+'<i class="fa fa-diamond" aria-hidden="true"></i></span></h4>'+
                    '<hr />'+
                    '<p>'+item.MoTa.substr(0,90)+'..</p>'+
                    '<a href="Page/Detail/'+item.MaSP+'">Chi tiết</a>'+
                    '<a href="javascript:;" onclick="addCart('+item.MaSP+')"><span class="fa fa-cart-arrow-down"></span></a>'+
                '</div>'+
            '</div>'
        );
    });
    $('#searchBody').append('<div class="clearfix"></div>');
}

function appenSearch(data){
    if(!$.trim(data))
    {
        $('#resultSearch').html('<h4 class="alert alert-warning">0 kết quả</h4>')
        return;
    }
    data = JSON.parse(data);
    $('#resultSearch').html('<h4 class="alert alert-success">'+data.length+' kết quả</h4>')
    $.each(data,(index,item)=>{
        $('#searchBody').append(
            '<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project wow animated fadeInLeft"  style="background-image:url(../app/public/source/img/product/'+item.TenSP.replace(' ','')+'/cover/'+item.HinhSP+')">'+
                '<div class="project-hover" id="sp'+ item.MaSP +'">'+
                    '<h2>'+item.TenSP+'</h2>'+
                    '<h4><span>'+item.GiaSP+'<i class="fa fa-diamond" aria-hidden="true"></i></span></h4>'+
                    '<hr />'+
                    '<p>'+item.MoTa.substr(0,90)+'..</p>'+
                    '<a href="Page/Detail/'+item.MaSP+'">Chi tiết</a>'+
                    '<a href="javascript:;" onclick="addCart('+item.MaSP+')"><span class="fa fa-cart-arrow-down"></span></a>'+
                '</div>'+
            '</div>'
        );
    });
}
//Start search
function search(){
    var filters = params();
    $.ajax({
        url: 'searchFilter',
        method: 'POST',
        data:{filter:filters},
        success:(data)=> updateSearch(data)
    });
}

$('.searchFilter').on('change',function(){
    search();
});

function params(){
    var params_object = 
    {
        prices: [],
        types: []
    };

    if($('#IP450').is(':checked'))
        params_object.prices.push('450');
    if($('#IP1350').is(':checked'))
        params_object.prices.push('1350');
    if($('#IP3150').is(':checked'))
        params_object.prices.push('3150');
    if($('#IP6300').is(':checked'))
        params_object.prices.push('6300');

    if($('#fighter').is(':checked'))
        params_object.types.push('1');
    if($('#ap').is(':checked'))
        params_object.types.push('2');
    if($('#adc').is(':checked'))
        params_object.types.push('3');
    if($('#sp').is(':checked'))
        params_object.types.push('4');
    if($('#tanker').is(':checked'))
        params_object.types.push('5');
    if($('#assassin').is(':checked'))
        params_object.types.push('6');
    return params_object;
}

//End search

//Load on more
$('#ajax-load').on('click',function(){
    var id = $('.project-hover:last').prop('id');
    loadMore(id.substr(2));
});

function loadMore(id){
    $.ajax({
        url: 'loadMore',
        data:{id},
        type: 'POST',
        beforeSend: () => $('#ajax-load').text('Loading..')
        })
        .done((data)=>{
            $('#ajax-load').text('More')
            appenSearch(data);
        });
}
