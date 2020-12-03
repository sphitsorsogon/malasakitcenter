    <?php
//start session
session_start();

//database connection
include_once('connection.php');
$client_id = $_GET['client_id'];
$user_fullname =  $_SESSION['user_fullname'];

$sql = "SELECT * FROM tbl_client WHERE id = $client_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $client_name = $row['fullname'];
    }
}


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
      
        <h1 class="h2">Dashboard - <?php echo $user_fullname ?></h1>
        <button  class="btn btn-md btn-outline-secondary" type="button" data-toggle="collapse" data-target="#newClientCollapse" aria-expanded="false" aria-controls="newClientCollapse">
            Add new Availment
        </button>
      </div>

        <div class="collapse" id="newClientCollapse">
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                    <h1 class="h2">New Availment</h1>
                </div>
                    <form action="action.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                Admission Date:
                                    <input name="admissiondate" type="date" class="form-control" placeholder="Enter Admission Date" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                Amount:
                                    <input name="amount" type="number" min="0" step=".01" class="form-control" placeholder="Enter Amount" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                Purpose:
                                    <input name="purpose" type="text" class="form-control" placeholder="Enter Purpose">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                Remarks:
                                    <input name="remarks" type="text" class="form-control" placeholder="Enter Remarks">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-4">
                                <div class="form-group">
                                First Availment Social Service / MC:
                                    <input name="firstavailment" type="text" class="form-control" placeholder="Enter First Availment Social Service / MC">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                Date of Availment:
                                    <input name="dateofavailment" type="date" class="form-control" placeholder="Enter Date of Availment">
                                </div>
                            </div>
                            <!-- <div class="col-2">
                                <div class="form-group">
                                Status:
                                    <select class="form-control" name="status">
                                        <option value=""></option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>

                        <!-- Hidden Fill up Form -->
                        <!-- for logs -->
                        <div class="col-2">
                            <div class="form-group">
                                <input name="client_name" type="hidden" class="form-control" placeholder="Enter Admission Date" value="<?php echo $client_name ?>">
                            </div>
                        </div>
                        <!-- for logs -->
                        <div class="col-2">
                            <div class="form-group">
                                <input name="client_id" type="hidden" class="form-control" placeholder="Enter Admission Date" value="<?php echo $client_id ?>">
                            </div>
                        </div> 
                        <div class="col-2">
                            <div class="form-group">
                                <input name="user_fullname" type="hidden" class="form-control" placeholder="Enter Admission Date" value="<?php echo $user_fullname ?>">
                            </div>
                        </div>    

                        <button name="btnAddAvailment" type="submit" class="btn btn-primary">Add New Availment</button>
                        
                    </form>
            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <?php
            $client_id = $_GET['client_id'];
            
            $sql = "SELECT SUM(amount) AS total FROM listofavailment WHERE client_id = $client_id AND status != 'Complete'  GROUP BY admissiondate";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $total_rendered = $row['total'];
                }
            } else{
                $total_rendered = 0;
            }
        ?>
            <h4 class="h4"><?php 
            if(isset($client_name)){
                echo $client_name;} ?> - TOTAL: <?php 
                    if($total_rendered == 0){
                        echo "0";
                    } else{
                        echo number_format($total_rendered);
                    }
                ?></h4> 
                <h2 class="text-danger">
                    <?php
                    $client_id = $_GET['client_id'];
                    $sql = "SELECT SUM(amount) as balance FROM listofavailment WHERE client_id = $client_id && status != 'Complete' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                            $balance = $row['balance'];
                            $total =  2000 - $balance;
                            echo 'Remaining Balance: ' . number_format($total, 2);
                            }
                        }
                    ?>
                </h2>
        </div>  
    <h4>
        <?php
        $client_id = $_GET['client_id'];
        $sql = "SELECT admissiondate FROM listofavailment WHERE client_id = $client_id ORDER BY admissiondate DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            $lastadmission = $row['admissiondate'];
                echo 'Last Admission: ' . $lastadmission;
                }
            }
        ?>
    </h4>
        <div class="container-fluid mt-3">
            <div class="row">
                    <div class="col-md-12 border border-info">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Admission Date</th>
                                    <th>Amount</th>
                                    <th>Purpose</th>
                                    <th>Remarks</th>
                                    <th>Date of Availment</th>
                                    <th>First Availment Social Service / MC</th>
                                    <th>Status</th>
                                    <th>Accountable</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM view_clientinfo WHERE client_id = $client_id AND status != 'Complete'  ORDER BY id desc";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $avail_id = $row['id'];
                                        $fullname = $row['fullname'];
                                        $age = $row['age'];
                                        $gender = $row['gender'];
                                        $address = $row['address'];
                                        $birthdate = $row['birthdate'];
                                        $user = $row['user'];
                                        $admissiondate = $row['admissiondate'];
                                        $amount = $row['amount'];
                                        $remarks = $row['remarks'];
                                        $purpose = $row['purpose'];
                                        $firstavailment = $row['firstavailment'];
                                        $dateofavailemnt = $row['dateofavailment'];
                                        $status = $row['status'];

                                        echo '
                                            <tr>
                                                <td>' . $avail_id . '</td>
                                                <td>' . $admissiondate . '</td>
                                                <td>' . $amount . '</td>
                                                <td>' . $purpose . '</td>
                                                <td>' . $remarks . '</td>
                                                <td>' . $dateofavailemnt . '</td>
                                                <td>' . $firstavailment . '</td>
                                                <td>' . $status . '</td>
                                                <td>' . $user . '</td>
                                                <td align="center">
                                                    <a href="editAvailment.php?id='.$_GET['id'].'&avail_id='.$avail_id.'&client_id='.$client_id.'" class="btn btn-md btn-outline-secondary"><span data-feather="send"></span> Edit</a>
                                                </button>
                                                </td>
                                            </tr>
                                            ';

                                            // <a href="action.php?id='.$_GET['id'].'&avail_id='.$avail_id.'&deleteavailment=true" class="btn btn-md btn-outline-secondary"><span data-feather="trash"></span> Delete</a>

                                    }
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Admission Date</th>
                                    <th>Amount</th>
                                    <th>Purpose</th>
                                    <th>Remarks</th>
                                    <th>Date of Availment</th>
                                    <th>First Availment Social Service / MC</th>
                                    <th>Status</th>
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

        <script src="./assets/js/jquery-3.5.1.slim.min.js"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="./assets/js/feather.min.js"></script>
        <script src="./assets/js/Chart.min.js"></script>
        <script src="./assets/js/dashboard.js"></script>
    
        <script src="./assets/js/bootstrap.bundle.min.js"></script>

        <script src="./assets/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
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