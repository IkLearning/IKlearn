
function save(){
    var id = $('#id').val() != ''?$('#id').val():null;
    var lsp = $('#ten').val();
    var dulieu = {
        'MaLoaiSP':id,'TenLoaiSP':lsp
    };
    $.ajax({
        url:'http://Iklearn.me:88/admin/saveProductType',
        type:'POST',
        data: {lsp:JSON.stringify(dulieu)},
        success: (response) =>{
            if(response == '1')
                alert('Thêm thất bại');
            else{
                updateRow(response);
                clear();
            }
                
        }
    });
}

function remove(id){
    $.ajax({
        url: 'http://iklearn.me:88/admin/deleteProductType',
        type: 'POST',
        data: {id},
        success: (response)=>{
            if(response == '1')
            {
                alert('Xóa thất bại');
            }
            else{
                updateRow(response);
            }
        }
    });
}

$('#saveProductType').on('click',function(){
    save();
});

function updateRow(data){
    if($.trim(data) == ''){
        return;
    }
    data = JSON.parse(data);
    $('tbody').html('');
    $.each(data,(index,item) => {
        $('tbody').append(
            '<tr>'+
                '<th scope="row">'+item.MaLoaiSP+'</th>'+
                '<td>'+item.TenLoaiSP+'</td>'+
                '<td style="text-align:right">'+
                    '<button onclick="load('+item.MaLoaiSP+','+(item.TenLoaiSP).toString()+')" class="btn btn-warning">Sửa</button>&nbsp;&nbsp;'+
                    '<button onclick="remove('+item.MaLoaiSP+')" class="btn btn-danger">Xóa</button>'+
                '</td>'+
            '</tr>'
        );
    });
}

function load(id,ten){
    $('#ten').val(ten);
    $('#id').val(id);
    $('#myModal').modal();
}

function clear(){
    $('#ten').val('');
    $('#id').val('');
    $('#myModal').modal();
}