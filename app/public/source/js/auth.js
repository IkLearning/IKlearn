//Start signup
$(document).ready(function(){
    refreshCaptcha(1);
});

$('#signUp').on('click',function(){
    if(check())
        save(check());
});

$('#reload').on('click',function(){
    var id = Math.random();
    refreshCaptcha(id);
});

function refreshCaptcha(id){
    $.ajax({
        url:'http://banchamp.me/page/newCaptcha',
        success:(response)=>{
            $('#captchaImage').prop('src','http://banchamp.me/page/newCaptcha?id=' + response);
        }
    });
}

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

    if(tenhienthi =='' || diachi == '' || dienthoai == '' || email == '' || captcha == ''){
        dangerAlert('Vui lòng nhập đủ thông tin');
        return false;
    }

    if(!checkCaptcha()){
        dangerAlert('Mã captcha không đúng');
        return false;
    }
    

    $('#message').html('');

    var data = {
        "TenDangNhap":tendangnhap, "MatKhau":matkhau,"TenHienThi":tenhienthi,"DiaChi":diachi,
        "DienThoai":dienthoai,"Email":email,"BiXoa":0,"MaLoaiTaiKhoan":3
    };
    return JSON.stringify(data);
}

function checkCaptcha(){
    var flag = true;
    var captcha = $('#captcha').val();
    $.ajax({
        url: 'http://banchamp.me/page/validateCaptcha',
        type:'POST',
        data: {captcha},
        async:false,
        success: (response)=>{
            if(response == '1')
                flag = false;
        }
    });
    return flag;
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

function passwordStrength(password) {

	var msg = ['', 'weak', 'weak', 'good', 'very good', 'excellent'];

	var desc = ['0%', '20%', '40%', '60%', '80%', '100%'];
	
	var descClass = ['', 'bg-danger', 'bg-danger', 'bg-warning', 'bg-success', 'bg-success'];

	var score = 0;

	// if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	// if password has both lower and uppercase characters give 1 point	
	if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score++;

	// if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	// if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	// if password bigger than 12 give another 1 point
	if (password.length > 10) score++;
	
	// Display indicator graphic
	$(".jak_pstrength").removeClass(descClass[score-1]).addClass(descClass[score]).css( "width", desc[score] );

	// Display indicator text
	$(".jak_pstrength").text(msg[score]);
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