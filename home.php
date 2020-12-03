<?php
//start session
session_start();

//database connection
include_once('connection.php');

if (isset($_SESSION['loggedin'])) {
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./assets/css/bootstrap.min2.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="home.php?id=<?php echo $_GET['id'] ?>">SPH Malasakit Center</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

<div class="container-fluid">
  <div class="row">
  <?php include 'sidebar.php';?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard - <?php echo $_SESSION['user_fullname'] ?></h1>
        <button class="btn btn-md btn-outline-secondary" type="button" data-toggle="collapse" data-target="#newClientCollapse" aria-expanded="false" aria-controls="newClientCollapse">
            Add new Patient
        </button>
      </div>
      

        <div class="collapse" id="newClientCollapse">
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                    <h1 class="h2">New Patient</h1>
                </div>
                    <form action="action.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="row">
                        <input name="accountable" type="hidden" class="form-control" value="<?php echo $_SESSION['user_fullname'] ?>">
                            <div class="col-4">
                                <div class="form-group">
                                    <input name="fullname" type="text" class="form-control" placeholder="Enter Fullname">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input name="fullname_client" type="text" class="form-control" placeholder="Enter Client Name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <input name="age" type="text" class="form-control" placeholder="Enter age">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="form-control" name="gender">
                                        <option value=""></option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input name="birthdate" type="date" class="form-control" placeholder="Enter Birthdate">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <input name="requirements" type="text" class="form-control" placeholder="Enter Requirements" value="VALID ID, MEDICAL CERTIFICATE, CERTIFICATE OF INDIGENCY">
                                </div>
                            </div>
                        </div>
                        <button name="btnAddClient" type="submit" class="btn btn-primary">Add New Patient</button>
                    </form>
            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2 text-danger">
            <?php
                $sql = "SELECT * FROM budget";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $balance = $row['amount'];

                          echo 'Remaining Balance: ' . number_format($balance, 2);
                        }
                      }
            ?>
            </h1>
            <h2>
                <?php 
                    $sql = "SELECT * FROM tbl_client WHERE patient_status ='Discharged'";
                    $result = mysqli_query($conn, $sql);
                    $total_discharged = mysqli_num_rows($result) ;
                    echo 'Ready to Liquidate Counter: ' . $total_discharged; 
                        
                ?>
            </h2>
        </div>  
        <!-- <button class="btn btn-md btn-outline-secondary" id="btnTable" onclick="myFunction()">Show Client</button> -->
        <input class="btn btn-md btn-outline-secondary" type="button" id="btnTable"  onclick="myFunction()">
            <div class="container-fluid mt-3" id="myDIV">
                <div class="row">
                        <div class="col-md-12 border border-info">
                            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Patient Name</th>
                                        <th>Client Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Birthdate</th>
                                        <th>Requirements</th>
                                        <th>Liquidation Status</th>
                                        <th>Patient Status</th>
                                        <th>First Availment</th>
                                        <th>Accountable</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql = "SELECT * FROM tbl_client ORDER BY id desc";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {

                                        $total_client = mysqli_num_rows($result) ;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $fullname = $row['fullname'];
                                            $age = $row['age'];
                                            $gender = $row['gender'];
                                            $address = $row['address']; 
                                            $birthdate = $row['birthdate'];
                                            $requirements = $row['requirements'];
                                            $patient_status = $row['patient_status'];
                                            $beneficiary_name = $row['fullname_client'];
                                            $accountable = $row['accountable'];
                                            $last_availment = $row['last_availment'];

                                            $sql2 = "SELECT SUM(amount) as balance FROM listofavailment WHERE client_id = $id && status != 'Complete' ";
                                                $result2 = mysqli_query($conn, $sql2);
                                                if (mysqli_num_rows($result2) > 0) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    $balance = $row2['balance'];
                                                    $total =  2000 - $balance;
                                                    }
                                                }
                                            // $sql2 = "SELECT COUNT(client_id) as transaction_count FROM listofavailment WHERE client_id = $id && `status` != 'Complete'";
                                            // $result2 = mysqli_query($conn, $sql2);
                                            // if (mysqli_num_rows($result2) > 0) {
                                            //     while ($row2 = mysqli_fetch_assoc($result2)) {
                                            //       $count = $row2['transaction_count'];
                                            //     }
                                            //   }

                                            echo '
                                                <tr>
                                                    <td>' . $id . '</td>
                                                    <td>' . $fullname . '</td>
                                                    <td>' . $beneficiary_name . '</td>
                                                    <td>' . $age . '</td>
                                                    <td>' . $gender . '</td>
                                                    <td>' . $address . '</td>
                                                    <td>' . $birthdate . '</td>
                                                    <td>' . $requirements . '</td>
                                                    <td>';
                                                    if($total <= 0){
                                                        echo 'Ready to Liquidate';
                                                    } else {
                                                        echo 'Active';
                                                    }
                                                    echo' 
                                                    </td>
                                                    <td>' . $patient_status . '</td>
                                                    <td>' . $last_availment . '</td>
                                                    <td>' . $accountable . '</td>
                                                ';

                                            if($accountable!=''){
                                                echo '
                                                        <td align="center">
                                                        <a href="addAvailment.php?id='.$_GET['id'].'&client_id='.$id.'" class="btn btn-md btn-outline-secondary"><span data-feather="eye"></span> View</a>
                                                        <a href="editClient.php?id='.$_GET['id'].'&client_id='.$id.'" class="btn btn-md btn-outline-secondary"><span data-feather="send"></span> Edit</a>
                                                    </td>
                                                </tr>
                                                ';
                                            } else {
                                                echo '
                                                        <td align="center">
                                                        <a href="accountable.php?id='.$_GET['id'].'&client_id='.$id.'" class="btn btn-md btn-outline-secondary"><span data-feather="user"></span> Accountable</a>
                                                    </td>
                                                </tr>
                                                ';
                                            }
                                                
                                                // Delete Client
                                                // <a href="action.php?id='.$_GET['id'].'&client_id='.$id.'&delete=true" class="btn btn-md btn-outline-secondary"><span data-feather="trash"></span> Delete</a>

                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Patient Name</th>
                                        <th>Client Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Birthdate</th>
                                        <th>Requirements</th>
                                        <th>Liquidation Status</th>
                                        <th>Patient Status</th>
                                        <th>First Availment</th>
                                        <th>Accountable</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>                           
            </div>



            <div class="container-fluid mt-3" id="myDIV2">
                <div class="row">
                        <div class="col-md-12 border border-info">
                            <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Patient Name</th>
                                        <th>Client Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Birthdate</th>
                                        <th>Requirements</th>
                                        <th>Liquidation Status</th>
                                        <th>Patient Status</th>
                                        <th>First Availment</th>
                                        <th>Accountable</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $current_user = $_SESSION['user_fullname'];
                                $sql = "SELECT * FROM tbl_client WHERE accountable='$current_user' ORDER BY id desc";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {

                                        $total_client = mysqli_num_rows($result) ;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $fullname = $row['fullname'];
                                            $age = $row['age'];
                                            $gender = $row['gender'];
                                            $address = $row['address']; 
                                            $birthdate = $row['birthdate'];
                                            $requirements = $row['requirements'];
                                            $patient_status = $row['patient_status'];
                                            $beneficiary_name = $row['fullname_client'];
                                            $last_availment = $row['last_availment'];
                                            $accountable = $row['accountable'];

                                            $sql2 = "SELECT SUM(amount) as balance FROM listofavailment WHERE client_id = $id && status != 'Complete' ";
                                                $result2 = mysqli_query($conn, $sql2);
                                                if (mysqli_num_rows($result2) > 0) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    $balance = $row2['balance'];
                                                    $total =  2000 - $balance;
                                                    }
                                                }
                                     

                                                echo '
                                                <tr>
                                                    <td>' . $id . '</td>
                                                    <td>' . $fullname . '</td>
                                                    <td>' . $beneficiary_name . '</td>
                                                    <td>' . $age . '</td>
                                                    <td>' . $gender . '</td>
                                                    <td>' . $address . '</td>
                                                    <td>' . $birthdate . '</td>
                                                    <td>' . $requirements . '</td>
                                                    <td>';
                                                    if($total <= 0){
                                                        echo 'Ready to Liquidate';
                                                    } else {
                                                        echo 'Active';
                                                    }
                                                    echo' 
                                                    </td>
                                                    <td>' . $patient_status . '</td>
                                                    <td>' . $last_availment . '</td>
                                                    <td>' . $accountable . '</td>
                                                ';

                                            if($accountable!=''){
                                                echo '
                                                        <td align="center">
                                                        <a href="addAvailment.php?id='.$_GET['id'].'&client_id='.$id.'" class="btn btn-md btn-outline-secondary"><span data-feather="eye"></span> View</a>
                                                        <a href="editClient.php?id='.$_GET['id'].'&client_id='.$id.'" class="btn btn-md btn-outline-secondary"><span data-feather="send"></span> Edit</a>
                                                    </td>
                                                </tr>
                                                ';
                                            } else {
                                                echo '
                                                        <td align="center">
                                                        <a href="accountable.php?id='.$_GET['id'].'&client_id='.$id.'" class="btn btn-md btn-outline-secondary"><span data-feather="user"></span> Accountable</a>
                                                    </td>
                                                </tr>
                                                ';
                                            }
                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Patient Name</th>
                                        <th>Client Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Birthdate</th>
                                        <th>Requirements</th>
                                        <th>Liquidation Status</th>
                                        <th>Patient Status</th>
                                        <th>First Availment</th>
                                        <th>Accountable</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>                           
            </div>



    </main>
  </div>
</div>
<p class="mt-5 mb-3 text-muted text-center">&copy; <a href="https://www.facebook.com/kennethlimsolomon/">Kenneth Solomon</a></p>
        <script src="./assets/js/jquery-3.5.1.slim.min.js"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="./assets/js/feather.min.js"></script>
        <script src="./assets/js/Chart.min.js"></script>
        <script src="./assets/js/dashboard.js"></script>
    
        <script src="./assets/js/bootstrap.bundle.min.js"></script>

        <script src="./assets/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">

                function myFunction() {
                    var x = document.getElementById("myDIV");
                    var x2 = document.getElementById("myDIV2");
                    var btnlabel = document.getElementById("btnTable");
                    if (x.style.display === "none") {
                        x2.style.display = "none";
                        x.style.display = "block";
                        btnlabel.value = "Show Client";
                    } else {
                        x2.style.display = "block";
                        x.style.display = "none";
                        btnlabel.value = "Show All";
                    }
                }
            $(document).ready(function() {
                var btnlabel = document.getElementById("btnTable").value = "Show Client";

                $('#example').DataTable( {
                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            var select = $('<select class="form-control"><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );
                
                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }
                } );
                $('#example2').DataTable( {
                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            var select = $('<select class="form-control"><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );
                
                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }
                } );
            
                
            
            } );

            
        </script>
    </body>
</html>
<?php
} else {
    $url = "./index.php";
    $url = str_replace(PHP_EOL, '', $url);
    header("Location: $url");
}
mysqli_close($conn);
?>