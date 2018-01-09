function updateBills(data){
    if($.trim(data)== '')
        return;
    data = JSON.parse(data);
    $('tbody').html('');
    $.each(data,(index,item) => {
        $('tbody').append(
            '<tr>'+
                '<th scope="row">'+item.MaHD+'</th>'+
                '<td>'+item.NgayLap+'</td>'+
                '<td>'+item.TongTien+'</td>'+
                '<td>'+item.MaTK+'</td>'+
                '<td>'+
                    '<button  onclick=editState("'+item.MaHD+'") data-toggle="modal" data-target="#myModal" class="updateBill btn btn-info">'+
                        '<i class="fa fa-cog" aria-hidden="true"></i>'+item.TenTinhTrang+
                    '</button>'+
                '</td>'+
                '<td style="text-align:center">'+
                    '<button  class="btn btn-info show">Xem</button>&nbsp;'+
                '</td>'+
            '</tr>'
        );
    });
    alert('Cập nhật thành công');
}

function updateState(id){
    var tinhtrang = $('#tinhtrang').val();
    $.ajax({
        url:'http://Iklearn.me:88/admin/updateBillState',
        type:'POST',
        data: {id,tinhtrang},
        success: (response)=>{
            updateBills(response);
        }
    });
}

function editState(id){
    $('#billID').val(id);
}

$('tbody').on('click','.show',function(){
    var row = $(this).closest("tr");
    var id = row.find("th:nth-child(1)").text();
    $('#detalModalLabel').html('Thông Tin Đơn Hàng ' +id);
    $.ajax({
        url:'http://Iklearn.me:88/admin/showBill',
        type:'POST',
        data: {id},
        success: (response)=>{
            loadBillDetail(response);
        }
    });
});

function loadBillDetail(data){
    $('#detailBody').html('');
    if($.trim(data)=='')
        return;
    data = JSON.parse(data);
    $.each(data,(index,item)=>{
        $('#detailBody').append(
            '<tr>'+
                '<th scope="row">'+item.MaCTHD+'</th>'+
                '<td style="text-align:center">'+item.SoLuong+'</td>'+
                '<td style="text-align:center">'+item.GiaBan+'</td>'+
                '<td style="text-align:center">'+item.MaHD+'</td>'+
                '<td style="text-align:center">'+item.MaSP+'</td>'+
            '</tr>'
        );
    });
    $('#detailModal').modal();
}

$('#saveBillState').on('click',function(){
    updateState($('#billID').val());
});