
//Save user calling ajax
$('#saveUser').on('click',function(){
    var ma = $('#mataikhoan').val();
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
            if(response == '0'){
                alert('Lưu thành công');
                if(id==null)
                    saveRowUser(dulieu,0);
                else
                    saveRowUser(dulieu,1);
                clearUser();
            }
            else
                alert('Lưu thất bại');
        }
    });
});


//Load user using ajax
function updateRow(data){
    
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
                alert(response);
            }
        }

    });
}

$('#saveRole').on('click',function(){
    saveRole($('#idUser').val());
});
