<?php
// Connection 
include_once('./connection.php');

// Get Date and Time
date_default_timezone_set("Asia/Manila");
$currentDate = date("Y/m/d");

$user_id = $_GET['id'];

$filename = "Report-$currentDate.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
// if (isset($_POST['btnExportData'])) {
    // $sql = "SELECT * from view_clientinfo";
    // $result = mysqli_query($conn, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //     $flag = false;
    //     while ($row = mysqli_fetch_assoc($result)) {
            // if (!$flag) {
            //     // display field/column names as first row
            //     echo implode("\t", array_keys($row)) . "\r\n";
            //     $flag = true;
            // }
            // echo implode("\t", array_values($row)) . "\r\n";
    //     }
    // } else {
    //     echo "0 results";
    // }
    // mysqli_close($conn);
// }

$sql = "SELECT * FROM tbl_client where patient_status = 'Discharged'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $flag = false;
        $total_client = mysqli_num_rows($result) ;

        while ($row = mysqli_fetch_assoc($result)) {
            $client_id = $row['id'];
            $fullname = $row['fullname'];
            $age = $row['age'];
            $gender = $row['gender'];
            $address = $row['address']; 
            $birthdate = $row['birthdate'];
            $requirements = $row['requirements'];
            $patient_status = $row['patient_status'];

            // $sql2 = "SELECT SUM(amount) as balance FROM listofavailment WHERE client_id = $client_id && status != 'Complete' ";
            //     $result2 = mysqli_query($conn, $sql2);
            //     if (mysqli_num_rows($result2) > 0) {

                    // while ($row2 = mysqli_fetch_assoc($result2)) {
                    // $balance = $row2['balance'];
                    // $total =  2000 - $balance;
                        if (!$flag) {
                            // display field/column names as first row
                            echo implode("\t", array_keys($row)) . "\r\n";
                            $flag = true;
                        }

                        echo implode("\t", array_values($row)) . "\r\n";

                        // if($patient_status = 'Discharged'){
                            // $sql5 = "UPDATE tbl_client SET 
                            // patient_status=''
                            // WHERE 
                            // id='$client_id'";
                                $sql3 = "SELECT * FROM listofavailment WHERE client_id = $client_id && status != 'Complete' ";
                                $result3 = mysqli_query($conn, $sql3);
                                if (mysqli_num_rows($result3) > 0) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        $avail_id = $row3['id'];  
                                        $sql4 = "UPDATE listofavailment SET 
                                            status='Complete'
                                            WHERE 
                                            id='$avail_id'";
                                            if ($conn->query($sql4)) {
                                            } else {
                                                echo "Error updating record: " . $conn->error;
                                            }
                                    }
                                }
        }
    }


$sql5 = "UPDATE tbl_client SET patient_status='' WHERE patient_status='Discharged'";
    if ($conn->query($sql5)) {
        // $user_id = $_GET['id'];
        // $url = "./home.php?id=$user_id";
        // $url = str_replace(PHP_EOL, '', $url);
        // header("Location: $url");
    } else {
        echo "Error updating record: " . $conn->error;
    }

// if(header_sent()){
    // header_remove();
    
//     $url = "./home.php?id=$user_id";
//     $url = str_replace(PHP_EOL, '', $url);
//     header("Location: $url");
// }