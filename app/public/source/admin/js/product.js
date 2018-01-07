
//Load edit formProduct
function editProduct(id){
    loadProduct(id);
}

//Show product item by ID
function showProduct(id){
    loadProduct(id);
    $('#saveProduct').prop('disabled',true);
}


//Load product data using ajax
function loadProduct(id){
    $.ajax({
        type: "POST",
        url: "http://Iklearn.me:88/admin/showProduct",
        data: {id: id},
        success: function(response) {
            var data = JSON.parse(response);
            $('#ma').val(data['MaSP']);
            $('#ngaynhap').val(data['NgayNhap']);
            $('#ten').val(data['TenSP']);
            $('#gia').val(data['GiaSP']);
            $('#loai').val(data['MaLoaiSP']);
            $('#hang').val(data['MaHangSX']);
            $('#soluongton').val(data['SoLuongTon']);
            $('#soluongban').val(data['SoLuongBan']);
            tinymce.get("mota").setContent(data['MoTa'] + " ");
            $('#bixoa').val(data['BiXoa']);
            $('#featureImage').after('<img src="'+'../../app/public/source/img/product/'+ data['TenSP'] +'/cover/'+data['HinhSP'] + '" width="150">');
            $('#productModal').modal();
        }
    });
}

function deleteProduct(id){
    $.ajax({
        url:'http://Iklearn.me:88/admin/deleteProduct',
        type:'POST',
        data:{id},
        success:(response)=>{
            if(response === '0')
                alert('Xóa thành công');
            else
                alert('Xóa Thất bại');
        }
    });
}


//Clear formProduct when model closing
$('#productModal').on('hide.bs.modal',function(){
    clearProduct();
});


//Call API save ProductItem
$('#saveProduct').on('click',function(){
    var ma = $('#ma').val();
    var ten = $('#ten').val();
    var gia = $('#gia').val();
    var loai = $('#loai').val();
    var ngaynhap = $('#ngaynhap').val();
    var hang = $('#hang').val();
    var slt = $('#soluongton').val();
    var slb = $('#soluongban').val();
    var mota = tinymce.get("mota").getContent();
    var bixoa = $('#bixoa').val();
    var hinh = $('#featureImage')[0].files[0].name;
    var id = ma == ''? null:ma;
    var dulieu = {
                    "MaSP":id,"TenSP":ten,"GiaSP":gia,"MaLoaiSP":loai,"MaHangSX":hang,
                    "SoLuongTon":slt,"SoLuongBan":slb,"BiXoa":bixoa,"NgayNhap":ngaynhap,
                    "HinhSP":hinh,"SoLuotXem":0,"MoTa":mota
                };
    $.ajax({
        type: "POST",
        url: "http://Iklearn.me:88/admin/saveProduct",
        data: {'sp':JSON.stringify(dulieu)},
        success: function(response) {
            if(response == '0'){
                alert('Lưu thành công');
                if(id==null)
                    saveRowProduct(dulieu,0);
                else
                    saveRowProduct(dulieu,1);
                clearProduct();
            }
            else
                alert(response);
        }
    });
});

//Clear formProduct
var clearProduct = function(){
    $('#ma').val('');
    $('#ngaynhap').val('');
    $('#ten').val('');
    $('#gia').val('');
    $('#soluongton').val('');
    $('#soluongban').val('');
    tinymce.get("mota").setContent('');
    $('#featureImage').val('');
    $('#previewImage>img').remove();
    $('#saveProduct').prop('disabled',false);
}


//Save row product after call API success
function saveRowProduct(data,status){
    var lastRowID = $('table tbody tr:last').prop('id').substr(2);
    var id = status == 0?parseInt(lastRowID)+1:data.MaSP;
    var content =
    '<tr id="sp'+id+'">'+
        '<th scope="row">'+id+'</th>'+
        '<td>'+data.TenSP+'</td>'+
        '<td>'+data.GiaSP+'</td>'+
        '<td>'+data.HinhSP+'</td>'+
        '<td>'+data.MoTa.substr(0, 90)+'..</td>'+
        '<td style="text-align:right">'+
            '<button onclick="showProduct('+id+')" id="xem" class="btn btn-info">Xem</button>&nbsp;&nbsp'+
            '<button onclick="editProduct('+id+')" id="sua" class="btn btn-warning">Sửa</button>&nbsp;&nbsp'+
            '<button onclick="deleteProduct('+id+')"id="xoa" class="btn btn-danger">Xóa</button>'+
        '</td>'+
    '</tr>';
    if(status == 0)
        $('tbody').append(content);
    else
        $('#sp'+data.MaSP).replaceWith(content);
}


$("#featureImage").on('change',function () {
    filePreview(this);
});


//Preview image before save
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#featureImage + img').remove();
            $('#featureImage').after('<img src="'+e.target.result+'" width="150">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}