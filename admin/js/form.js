$_DOMAIN = 'http://localhost/bac/admin/';
 
// Đăng nhập
$('#formSignin button').on('click', function() {
    $this = $('#formSignin button');
    $this.html('Đang tải ...');
 
    // Gán các giá trị trong các biến
    $user_signin = $('#formSignin #user_signin').val();
    $pass_signin = $('#formSignin #pass_signin').val();
 
    // Nếu các giá trị rỗng
    if ($user_signin == '' || $pass_signin == '')
    {
        $('#formSignin .alert').removeClass('hidden');
        $('#formSignin .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Đăng nhập');
    }
    // Ngược lại
    else
    {
        $.ajax({
            url : $_DOMAIN + 'signin.php',
            type : 'POST',
            data : {
                user_signin : $user_signin,
                pass_signin : $pass_signin
            }, success : function(data) {
                $('#formSignin .alert').removeClass('hidden');
                $('#formSignin .alert').html(data);
                $this.html('Đăng nhập');
            }, error : function() {
                $('#formSignin .alert').removeClass('hidden');
                $('#formSignin .alert').html('Không thể đăng nhập vào lúc này, hãy thử lại sau.');
                $this.html('Đăng nhập');
            }
        });
    }
});
// Tải chuyên mục cha ở chức năng chỉnh sửa chuyên mục
$('#formEditCate input[type="radio"]').on('click', function() {
    $id_edit_cate = $('#formEditCate').attr('data-id');
    if ($('#formEditCate .type-edit-cate-1:checked').prop("checked") == true) 
    {
        $('.parent-edit-cate').addClass('hidden');
        $('.parent-edit-cate select').html('');
    }
    else if ($('#formEditCate .type-edit-cate-2:checked').prop("checked") == true) 
    {
        $type_edit_cate = $('#formEditCate .type-edit-cate-2').val();
 
        $.ajax({
            type : 'POST',
            url : $_DOMAIN + 'categories.php',
            data : {
                action : 'load_edit_parent_cate',
                type_edit_cate : $type_edit_cate,
                id_edit_cate : $id_edit_cate
            }, success : function(data) {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate select').html(data);
            }, error : function() {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate').html('Đã có lỗi xảy ra, hãy thử lại sau.');
            }
        });
    } 
    else if ($('#formEditCate .type-edit-cate-3:checked').prop("checked") == true) 
    {
        $type_edit_cate = $('#formEditCate .type-edit-cate-3').val();
        $.ajax({
            type : 'POST',
            url : $_DOMAIN + 'categories.php',
            data : {
                action : 'load_edit_parent_cate',
                type_edit_cate : $type_edit_cate,
                id_edit_cate : $id_edit_cate
            }, success : function(data) {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate select').html(data);
            }, error : function() {
                $('.parent-edit-cate').removeClass('hidden');
                $('.parent-edit-cate').html('Đã có lỗi xảy ra, hãy thử lại sau.');
            }
        });
    }
});
// Chỉnh sửa chuyên mục
$('#formEditCate button').on('click', function() {
    $this = $('#formEditCate button');
    $this.html('Đang tải ...');
 
    // Gán các giá trị trong các biến
    $label_edit_cate = $('#formEditCate #label_edit_cate').val();
    $url_edit_cate = $('#formEditCate #url_edit_cate').val();
    $type_edit_cate = $('#formEditCate input[name="type_edit_cate"]:radio:checked').val();
    $parent_edit_cate = $('#formEditCate #parent_edit_cate').val();
    $sort_edit_cate = $('#formEditCate #sort_edit_cate').val();
    $id_edit_cate = $('#formEditCate').attr('data-id');
 
    // Nếu các giá trị rỗng
    if ($label_edit_cate == '' || $url_edit_cate == '' || $type_edit_cate == '' || $sort_edit_cate == '')
    {
        $('#formEditCate .alert').removeClass('hidden');
        $('#formEditCate .alert').html('Vui lòng điền đầy đủ thông tin.');
        $this.html('Lưu thay đổi');
    }
    // Ngược lại
    else
    {
        $.ajax({
            url : $_DOMAIN + 'categories.php',
            type : 'POST',
            data : {
                label_edit_cate : $label_edit_cate,
                url_edit_cate : $url_edit_cate,
                type_edit_cate : $type_edit_cate,
                parent_edit_cate : $parent_edit_cate,
                sort_edit_cate : $sort_edit_cate,
                id_edit_cate : $id_edit_cate,
                action : 'edit_cate'
            }, success : function(data) {
                $('#formEditCate .alert').removeClass('hidden');
                $('#formEditCate .alert').html(data);
                $this.html('Lưu thay đổi');
            }, error : function() {
                $('#formEditCate .alert').removeClass('hidden');
                $('#formEditCate .alert').html('Không thể chỉnh sửa chuyên mục vào lúc này, hãy thử lại sau.');
                $this.html('Lưu thay đổi');
            }
        });
    }
});