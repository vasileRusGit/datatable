<?php
error_reporting(-1);
//Open connection and Select database.
$databaseConnection = new PDO('mysql:host=localhost;dbname=mytodo;charset=utf8', 'root', '');

$page = isset($_GET['p']) ? $_GET['p'] : '';

if ($page == 'add') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = $databaseConnection->prepare("INSERT INTO datatable(name, email , phone, address, deleted) VALUES('$name', '$email', '$phone', '$address', '0')");
    $query->execute();
    header('Location: index.php');
    
} else if ($page == 'edit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = $databaseConnection->prepare("UPDATE datatable SET name='$name', email='$email' , phone='$phone', address='$address' WHERE id='$id'");
    $query->execute();

    header('location: index.php');
} else if ($page == 'del') {
    $id = $_GET['id'];
    $query = $databaseConnection->prepare("UPDATE datatable SET deleted=1 WHERE id='$id'");
    $query->execute();
    header('Location: index.php');
} else {
    $query = $databaseConnection->prepare("select * from datatable WHERE deleted=0");
    $query->execute();
    while ($row = $query->fetch()) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td>
                <button class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $row['id'] ?>">Edit</button>
                <button onclick="deleteData(<?php echo $row['id'] ?>)" class="btn btn-danger">Delete</button>

                <!-- Modal -->
                <div class="modal fade" id="edit-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $row['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" role="document">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="editLabel-<?php echo $row['id'] ?>">Edit Data</h4>
                            </div>
                            <form method='post' action='index.php'>
                                <div class="modal-body">
                                    <input type="hidden" id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
                                    <div class="form-group">
                                        <label for='name'>Full Name</label>
                                        <input type="text" class="form-control" id="name-<?php echo $row['id'] ?>" name='name' value="<?php echo $row['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for='email'>Email</label>
                                        <input type="text" class="form-control" id="email-<?php echo $row['id'] ?>" name='email' value="<?php echo $row['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for='phone'>Phone Number</label>
                                        <input type="text" class="form-control" id="phone-<?php echo $row['id'] ?>" name='phone' value="<?php echo $row['phone'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for='address'>Address</label>
                                        <input type="text" class="form-control" id="address-<?php echo $row['id'] ?>" name='address' value="<?php echo $row['address'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <p></p> 
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="updateData(<?php echo $row['id'] ?>)" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        <?php
    }
}
?>