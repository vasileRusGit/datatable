function saveData() {
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();

    $.ajax({
        type: "POST",
        url: "server.php?p=add",
        data: "name=" + name + "&email=" + email + "&phone=" + phone + "&address=" + address,
        success: function (data) {
            viewData();
        }
    });
}

function viewData() {
    $.ajax({
        type: 'GET',
        url: 'server.php',
        success: function (data) {
            $('tbody').html(data);
        }
    });
}

function updateData(str) {
    var id = str;
    var name = $('#name' + str).val();
    var email = $('#email' + str).val();
    var phone = $('#phone' + str).val();
    var address = $('#address' + str).val();

    $.ajax({
        type: 'post',
        url: 'server.php?p=edit',
        data: "name=" + name + "&email=" + email + "&phone=" + phone + "&address=" + address + "&id=" + id,
        success: function () {
            viewData();
        }
    });
}

function deleteData(str){
    var id = str;
    
    $.ajax({
        type: 'get',
        url: 'server.php?p=del',
        data: 'id='+id,
        success: function(){
            viewdata();
        }
    });
}