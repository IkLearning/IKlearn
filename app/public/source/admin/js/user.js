
//Save user calling ajax
$('#saveUser').on('click',function(){
    var ma = $('#idUser').val();
    var tendangnhap = $('#tendangnhap').val();
    var matkhau = $('#matkhau').val();
    var tenhienthi = $('#tenhienthi').val();
    var diachi = $('#diachi').val();
    var dienthoai = $('#dienthoai').val();
    var email = $('#email').val();
    var bixoa = $('#bixoa').val();
    var loaitaikhoan = $('#loaitaikhoan').val();
    var id = ma == ''? null:ma;
    var dulieu = {
        "MaTaiKhoan":id,"TenDangNhap":tendangnhap,"MatKhau":matkhau,"TenHienThi":tenhienthi,"DiaChi":diachi,
        "DienThoai":dienthoai,"Email":email,"BiaXoa":bixoa,"MaLoaiTaiKhoan":loaitaikhoan
    };
    $.ajax({
        type: "POST",
        url: "http://Iklearn.me:88/admin/saveUser",
        data: {'usr':JSON.stringify(dulieu)},
        success: function(response) {
            if(response == '1'){
                alert('Lưu thất bại');
            }
            else{
                alert('Lưu thành công');
                updateRow(response);
            }
        }
    });
});


//Load user using ajax
function updateRow(data){
    if($.trim(data) == ''){
        return;
    }
    data = JSON.parse(data);
    $('tbody').html('');
    $.each(data,(index,item)=>{
        $('tbody').append(
            '<tr>'+
                '<th scope="row">'+item.MaTaiKhoan+'</th>'+
                '<td>'+item.TenDangNhap+'</td>'+
                '<td>'+item.TenHienThi+'</td>'+
                '<td>'+item.Email+'</td>'+
                '<td>'+
                    '<button onclick="editRole('+item.MaTaiKhoan+')" data-toggle="modal" data-target="#myModal" class="btn btn-info">'+
                        '<i class="fa fa-cog" aria-hidden="true"></i>'+
                        ''+item.TenLoaiTaiKhoan+''+
                    '</=button>'+
                '</td>'+
                '<td style="text-align:right">'+
                    '<button class="btn btn-info show">Xem</button>&nbsp;'+
                    '<button class="btn btn-warning edit">Sửa</button>&nbsp;'+
                    '<button class="btn btn-danger remove">Xóa</button>'+
                '</td>'+
            '</tr>'
        );
    });
}

//Change user role

function editRole(id){
    $('#idUser').val(id);
}

function saveRole(id){
    var role = $('#role').val();
    $.ajax({
        url: 'http://iklearn.me:88/admin/saveUserRole',
        type:'POST',
        data: {id,role},
        success:(response)=>{
            if(response == '1'){
                alert("Đổi quyền hạn thất bại");
            }
            else
            {
                updateRow(response);
                alert('Cập nhật thành công');
            }
        }

    });
}

$('#saveRole').on('click',function(){
    saveRole($('#idUser').val());
});

$('tbody').on('click','.show',function(){
    var row = $(this).closest("tr");
    var id = row.find("th:nth-child(1)").text();
    loadForm(id);
});

$('tbody').on('click','.edit',function(){
    var row = $(this).closest("tr");
    var id = row.find("th:nth-child(1)").text();
    loadForm(id);
});

$('tbody').on('click','.remove',function(){
    var row = $(this).closest("tr");
    var id = row.find("th:nth-child(1)").text();
    $.ajax({
        url:'http://Iklearn.me:88/admin/deleteUser',
        type: 'POST',
        data:  {id},
        success:(response)=>{
            if(response == '1')
                alert('Xóa user không thành công');
            else
            {
                updateRow(response);
                alert('Xóa thành công');
            }
        }
    });
});

function loadForm(id){
    $.ajax({
        url:'http://Iklearn.me:88/admin/showUser',
        type: 'POST',
        data:  {id},
        success:(response)=>{
            data = JSON.parse(response);
            $('#idUser').val(data.MaTaiKhoan);
            $('#tendangnhap').val(data.TenDangNhap);
            $('#tenhienthi').val(data.TenHienThi);
            $('#matkhau').val('');
            $('#diachi').val(data.DiaChi);
            $('#dienthoai').val(0+data.DienThoai);
            $('#email').val(data.Email);
            $('#loaitaikhoan').val(data.MaLoaiTaiKhoan);
            $('#bixoa').val(data.BiXoa);
            $('#userModal').modal();
        }
    });
}
