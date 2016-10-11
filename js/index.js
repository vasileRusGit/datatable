
function saveData() {

    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();

    if (name == '') {
        swal({
            title: "You need to enter a name!",
            type: "info",
        });
        return;
    }

    $.ajax({
        type: "POST",
        url: "server.php?p=add",
        data: "name=" + name + "&email=" + email + "&phone=" + phone + "&address=" + address,
        success: function () {
            $('#addData').find("input").val('');
            $('#addData').trigger('reset').modal('hide');
            swal({
                title: "Success!",
                text: name + " was added to database!",
                type: "success",
                timer: 2000,
                showConfirmButton: false
            });
            viewData();
        }
    });
}


function updateData(str) {
    var id = str;
    var name = $('#name-' + str).val();
    var email = $('#email-' + str).val();
    var phone = $('#phone-' + str).val();
    var address = $('#address-' + str).val();

    if (name == '') {
        swal({
            title: "You need to enter a name!",
            type: "info"
        });
        return;
    }

    $.ajax({
        type: 'post',
        url: 'server.php?p=edit',
        data: "name=" + name + "&email=" + email + "&phone=" + phone + "&address=" + address + "&id=" + id,
        success: function () {
            $('.modal-backdrop').fadeOut();
            $('#addData').modal('hide');
            swal({
                title: "Success!",
                text: name + " was updated to database!",
                type: "success",
                timer: 2000,
                showConfirmButton: false
            });
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


function deleteData(str) {
    var id = str;

    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        reverseButtons: 'True'
    }).then(function () {
        $.ajax({
            type: 'get',
            url: 'server.php?p=del',
            data: 'id=' + id,
            success: function () {
                swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        );
                viewData();
            }
        });

    })


}