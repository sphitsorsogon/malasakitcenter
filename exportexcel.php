<?php
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
require_once('vendor/autoload.php'); 

// Connection 
include_once('./connection.php');

// Get Date and Time
date_default_timezone_set("Asia/Manila");
$currentDate = date("Y/m/d");

$user_id = $_GET['id'];

// $filename = "Report-$currentDate.xls"; // File Name
// // Download file
// header("Content-Disposition: attachment; filename=\"$filename\"");
// header("Content-Type: application/vnd.ms-excel");
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


// name 
// name of beneficiary
// age
// gender
// address 
// birthday
// date of admission
// purpose
// amount requirments


$sql = "SELECT a.*,
(SELECT GROUP_CONCAT(purpose SEPARATOR ', ') FROM listofavailment WHERE client_id = a.id GROUP BY client_id) AS purposes, 
(SELECT SUM(amount) FROM listofavailment WHERE client_id = a.id AND `status` != 'Complete' GROUP BY admissiondate) AS amount
FROM tbl_client a where patient_status = 'Discharged' LIMIT 25";
    $result = mysqli_query($conn, $sql);

    $fullname = array();
    $fullname_client = array();
    $age = array();
    $gender = array();
    $address = array(); 
    $birthdate = array(); 
    $admissiondate = array(); 
    $purpose = array(); 
    $amount = array(); 
    $requirements = array(); 

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $client_id = $row['id'];
            array_push($fullname, strval($row['fullname']));
            array_push($fullname_client, strval($row['fullname_client']));
            array_push($age, strval($row['age']));
            array_push($gender, strval($row['gender']));
            array_push($address, strval($row['address']));
            array_push($birthdate, strval($row['birthdate']));
            array_push($requirements, strval($row['requirements']));
            array_push($admissiondate, strval($row['admissiondate']));
            array_push($purposes, strval($row['purposes']));
            array_push($amount, strval($row['amount']));



        if($patient_status = 'Discharged'){
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
        $exportDate = date('d-m-Y');
        PhpExcelTemplator::saveToFile('./template.xlsx', './Reports/reports-'.$exportDate.'.xlsx', [
            '[fullname_client]' => $fullname_client,
            '[fullname]' => $fullname,
            '[age]' => $age,
            '[gender]' => $gender,
            '[address]' => $address,
            '[birthdate]' => $birthdate,
            '[requirements]' => $requirements,
            '[patient_status]' => $patient_status,
            '[purposes]' => $purposes,
            '[amount]' => $amount,
            '[admissiondate]' => $admissiondate,
        ]);
        PhpExcelTemplator::saveToFile('./template.xlsx', './backup-reports/reports-'.$exportDate.'.xlsx', [
            '[fullname_client]' => $fullname_client,
            '[fullname]' => $fullname,
            '[age]' => $age,
            '[gender]' => $gender,
            '[address]' => $address,
            '[birthdate]' => $birthdate,
            '[requirements]' => $requirements,
            '[patient_status]' => $patient_status,
            '[purposes]' => $purposes,
            '[amount]' => $amount,
            '[admissiondate]' => $admissiondate,
        ]);


        
    }

$sql5 = "UPDATE tbl_client SET patient_status='', accountable='', requirements='' WHERE patient_status='Discharged'";
    if ($conn->query($sql5)) {
        $user_id = $_GET['id'];
        $url = "./home.php?id=$user_id";
        $url = str_replace(PHP_EOL, '', $url);
        header("Location: $url");
    } else {
        echo "Error updating record: " . $conn->error;
    }

// if(header_sent()){
    // header_remove();
    
//     $url = "./home.php?id=$user_id";
//     $url = str_replace(PHP_EOL, '', $url);
//     header("Location: $url");
}