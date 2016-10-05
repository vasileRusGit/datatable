<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/sweetalert.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    </head>
    <body onload="viewData()">
        <div class="container">
            <p></p> 
            <button class="btn btn-primary" data-toggle="modal" data-target='#addData'>Insert Data</button>

            <!-- Modal -->
            <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for='name'>Full Name</label>
                                    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for='email'>Email</label>
                                    <input type="text" class="form-control" id="email" name='email' placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <label for='phone'>Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name='phone' placeholder="Enter phone number">
                                </div>
                                <div class="form-group">
                                    <label for='adress'>Address</label>
                                    <input type="text" class="form-control" id="address" name='address' placeholder="Enter address">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" onclick='saveData()' class="btn btn-primary">Save</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id='result'>
            <p></p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="40">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th width="40" height="10">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/index.js"></script>


</body>
</html>