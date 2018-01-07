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
                    '<button onclick="showBill('+item.MaHD+')" id="xem" class="btn btn-info">Xem</button>&nbsp;'+
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

$('#saveBillState').on('click',function(){
    updateState($('#billID').val());
});