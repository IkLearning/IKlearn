//Start signup
$('#signUp').on('click',function(){
    if(check())
        save(check());
});

function find(ten){
    var flag = false;
    $.ajax({
        type:"POST",
        url:"http://banchamp.me/auth/find",
        async: false, 
        data:{'tendangnhap':ten},
        success: function(response) {
            if(response == '0')
                flag = true;
        }
    });
    return flag;
}

function save(dulieu){
    $.ajax({
        type:"POST",
        url:"http://banchamp.me/auth/save",
        data:{usr:dulieu},
        success: (response)=> {
            if(response == '0'){
                alert('Đăng ký thành công');
                $('#signUpModal').modal('toggle');
            }
            else
                alert('Đăng ký thất bại');
        }
    });
}

function check(){
    var tendangnhap = $('#tendangnhap').val();
    var matkhau = $('#matkhau').val();
    var nhaplaimatkhau = $('#nhaplaimatkhau').val();
    var tenhienthi = $('#tenhienthi').val();
    var diachi = $('#diachi').val();
    var dienthoai = $('#dienthoai').val();
    var email = $('#email').val();

    if(tendangnhap == '' || tendangnhap.length < 5){
        dangerAlert('Tên đăng nhập phải dài hơn 5 kí tự');
        return false;
    }
    if(find(tendangnhap) == true){
        dangerAlert('Tên đăng nhập đã tồn tại');
        return false;
    }

    if(matkhau == '' || matkhau.length < 5){
        dangerAlert('Mật khẩu phải dài hơn 5 kí tự');
        return false;
    }
    if(matkhau != nhaplaimatkhau){
        dangerAlert('Mật khẩu không trùng khớp');
        return false;
    }

    if(tenhienthi =='' || diachi == '' || dienthoai == '' || email == ''){
        dangerAlert('Vui lòng nhập đủ thông tin');
        return false;
    }

    $('#message').html('');

    var data = {
        "TenDangNhap":tendangnhap, "MatKhau":matkhau,"TenHienThi":tenhienthi,"DiaChi":diachi,
        "DienThoai":dienthoai,"Email":email,"BiXoa":0,"MaLoaiTaiKhoan":3
    };
    return JSON.stringify(data);
}

function dangerAlert(message){
    $('#message').html('<span class="text-danger">'+ message +'</span>');
    $('#message').show();
    $('#message').hide(2000);
}

function successAlert(message){
    $('#message').html('<span class="text-success">'+ message +'</span>');
    $('#message').show();
    $('#message').hide(2000);
}

function warningAlert(message){
    $('#message').html('<span class="text-wanring">'+ message +'</span>');
    $('#message').show();
    $('#message').hide(2000);
}

//End Signup


//Start Login
$('#login').on('click',function(){
    var username = $('#login-username').val();
    var password = $('#login-password').val();
    if($.trim(username).length > 0 && $.trim(password).length > 0)
    {
        $('#error').prop('hidden',true);
        $.ajax({
            url:'http://banchamp.me/auth/submitLogin',
            method:"POST",
            data:{username,password},
            cache:false,
            beforeSend:() => $('#login').val('Đang kết nối...'),
            success:(response) => {
                if(response == '0'){
                    window.location.replace("http://banchamp.me/admin");
                }
                else{
                    loginError();
                    $('#login').val('Đăng Nhập');
                }
            } 

        });
    }
    else{
        loginError();
        return false;
    }
});

function loginError(){
    var options = {
        distance:'30',
        direction:'left',
        time:'2'
    }
    $('#loginBox').effect('shake',options,800);
    $('#login').val('Đăng Nhập');
    $('#error').prop('hidden',false);
}