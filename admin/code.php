<?php 
// session_start();
include('security.php');

if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $type = $_POST['type'];
   
    if ($password === $cpassword) {


        $query = "INSERT INTO user (username,email,password,type) VALUES('$username','$email','$password', '$type')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "User Added";
            header('location:manage_users.php');
        } else {
            $_SESSION['status'] = "User Not Added";
            header('location:manage_users.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:manage_users.php');
    }
}


if (isset($_POST['info_save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
   
    if (true) {

        $query = "INSERT INTO info (title,description) VALUES('$title','$description')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            
            $_SESSION['success'] = "News Added";
            header('location:info.php');
        } else {
            $_SESSION['status'] = "User Not Added";
            header('location:info.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:info.php');
    }
}


if (isset($_POST['loan_registerbtn'])) {
    $months = $_POST['months'];
    $interest = $_POST['interest'];
    $penality = $_POST['penality'];
    // $cpassword = $_POST['confirmpassword'];
   
    if (true) {


        $query = "INSERT INTO loan_plan (months,interset,penality) VALUES('$months','$interest','$penality')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "Loan type Added";
            header('location:loan_plan.php');
        } else {
            $_SESSION['status'] = "Loan Type Not Added";
            header('location:loan_plan.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:loan_plan.php');
    }
}



if(isset($_POST['pay'])){
    $user = $_POST['user'];
    $amount = $_POST['amount'];
      $query = "SELECT *  FROM loan_list WHERE username='$user' ";
    $query_run = mysqli_query($connction, $query);
    foreach ($query_run as $row) {
        $loan_id = $row['id'];
        $total = $row['total_to_pay'];
        $email = $row['memberid'];
    }
    
    $query = "SELECT remaning  FROM payments where email='$email' ";
    $query_run = mysqli_query($connction, $query);
    foreach ($query_run as $row) {
        $remain_from_db = $row['remaning'];
    }

    $rem = 0 + $remain_from_db; 
    if ($rem==0){
        $remaning = $total - $amount;
    }else {
        $remaning = $rem - $amount;
    }
    
    if (true) {
        $query = "INSERT INTO payments (loan_id,payee,total_to_pay,amount,remaning,email) VALUES('$loan_id','$user','$total','$amount','$remaning','$email')";
        $query_run = mysqli_query($connction, $query);  

          if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "Payment Added";
            header('location:loan_payment.php');
            if($remaning == 0){
                $query = "UPDATE loan_list SET status='Completed'WHERE id='$loan_id' ";
                $query_run = mysqli_query($connction, $query); 
            }
            else {
                echo 'hi';
            }
        } else {
            $_SESSION['status'] = "Payment Not Added";
            header('location:loan_payment.php');
        }
    }  else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:loan_payment.php');
    }

}


if (isset($_POST['add_saving'])) {

    // $email = $_SESSION['username'];
    $user = $_POST['user'];
    $query = "SELECT email  FROM user WHERE username='$user' ";
    $query_run = mysqli_query($connction, $query);
    foreach ($query_run as $row) {
        $memberid = $row['email'];
    }
    $amount = $_POST['amount'];
    // $userid = $row['id'];

$query = "SELECT totaldeposite  FROM deposit where memberid='$memberid' ";
    $query_run = mysqli_query($connction, $query);
    foreach ($query_run as $row) {
        $total_from_db = $row['totaldeposite'];
    }

    $tot = 0 + $total_from_db;
    $total_depo =$tot + $amount;
    $interest = $total_depo * 0.07;

 
    if (true) {


        $query = "INSERT INTO deposit (membe_name,interest,savingamount,totaldeposite,memberid) VALUES('$user','$interest','$amount','$total_depo', '$memberid')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "Saving Added";
            header('location:deposit.php');
        } else {
            $_SESSION['status'] = "Saving Not Added";
            header('location:deposit.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:deposit.php');
    }
}



if (isset($_POST['application'])) {
    $memid = $_SESSION['username'];

    $query = "SELECT username  FROM user WHERE email='$memid' ";
    $query_run = mysqli_query($connction, $query);
    foreach ($query_run as $row) { 
        $name = $row['username'];
    }
   
    $loan_type = $_POST['loan_type'];
    $payment_mode = $_POST['payment_mode'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];
    $purpose = $_POST['purpose'];
    $status = $_POST['request'];
    
    // correct loan calculayion
    for ($i=1; $i <= $duration; $i++) { 
        $int = $amount;
        $total = $int * pow(1.08, $i);
   
    }
   
    if (true) {
        $query = "INSERT INTO loan_list (username,loan_type,mode_of_payment,loan_amount,duration,total_to_pay,purpose,status,memberid) VALUES('$name','$loan_type','$payment_mode', '$amount', '$duration', '$total', '$purpose','$status','$memid')";
        $query_run = mysqli_query($connction, $query);
        if ($query_run) {
            //echo "Saved";
            $_SESSION['success'] = "Loan  Application Sent";
            header('location:request_loan.php');
        } else {
            $_SESSION['status'] = "Loan Application Not Sent";
            header('location:request_loan.php');
        }
    } else {
        $_SESSION['status'] = "Password Does Not Match";
        header('location:request_loan.php');
    }
}

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
}

// if (isset($_POST['status_edit_btn'])) {
//     $id = $_POST['edit_id'];

//     $query = "SELECT * FROM loan_list WHERE id='$id' ";
//     $query_run = mysqli_query($connction, $query);
// }

if (isset($_POST['loan_edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM loan_type WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];


    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('location:register.php');
    } else {
        $_SESSION['status'] = "Your Data is Not Updated";
        header('location:register.php');
    }
}

if (isset($_POST['user_updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $type = $_POST['edit_type'];


    $query = "UPDATE user SET username='$username', email='$email', password='$password', type='$type' WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('location:user_home.php');
    } else {
        $_SESSION['status'] = "Your Data is Not Updated";
        header('location:user_home.php');
    }
}

if (isset($_POST['loan_updatebtn'])) {
    $id = $_POST['edit_id'];
    $months = $_POST['edit_months'];
    $interest = $_POST['edit_interest'];
    $penality = $_POST['edit_penality'];


    $query = "UPDATE loan_plan SET months='$months', interset='$interest', penality='$penality' WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Updated";
        header('location:loan_plan.php');
    } else {
        $_SESSION['status'] = "Your Data is Not Updated";
        header('location:loan_plan.php');
    }
}


if (isset($_POST['loan_status_btn'])){
$id = $_POST['edit_id'];
$status = $_POST['loan_status'];
$query = "UPDATE loan_list set status='$status' where id='$id' "; 
$query_run = mysqli_query($connction, $query);

 if ($query_run) {
        $_SESSION['success'] = "Status is Updated";
        header('location:loan_list.php');
    } else {
        $_SESSION['status'] = "Status is Not Updated";
        header('location:loan_list.php');
    }
    
}


// ##########################################

// if(isset($_POST['loan_status_btn'])){
//     $memid = $_SESSION['username'];
//     $query = "SELECT loan_amount from loan_list where memberid='$memid' "; 
//     $query_run = mysqli_query($connction, $query);
//     foreach ($query_run as $row) {
//         $loan_amount = $row['loan_amount'];
//         $loan_status = $row['status'];
//     }

//     $id = $_POST['edit_id'];
//     // $status = $_POST['loan_status']; 
//     $status = loan_status; 
  
//     if($status ="Approved"){

//          $query = "SELECT totaldeposite from deposite where id='$id' ";   
//         $query_run = mysqli_query($connction, $query);
//         foreach ($query_run as $row) {
//         $depo_add = $row['totaldeposite'];
//     }

//     $total = $total_depo + $depo_add;

//         $query = "UPDATE deposite set totaldeposite='$total' where memberid='$memid'";   
//         $query_run = mysqli_query($connction, $query);
    
//   }
  
// }

// ###############################################

if (isset($_POST['deletebtn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM user WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is DELETED";
        header('location:manage_users.php');
    } else {
        $_SESSION['status'] = "Your Data is  Not DELETED";
        header('location:manage_users.php');
    }
}

if (isset($_POST['loan_deletebtn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM loan_plan WHERE id='$id' ";
    $query_run = mysqli_query($connction, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your Data is DELETED";
        header('location:loan_plan.php');
    } else {
        $_SESSION['status'] = "Your Data is  Not DELETED";
        header('location:loan_plan.php');
    }
}



if (isset($_POST['login_btn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM user WHERE  email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($connction, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if ($usertypes['type'] == "admin") {
        $_SESSION['username'] = $email_login;
        header('location: index.php');
    } elseif ($usertypes['type'] == "user") {
        $_SESSION['username'] = $email_login;
        header('location: user_home.php');
    } else {
        $_SESSION['status'] = 'Email id / Password is Invalid';
        header('location: login.php');
    }
}


if (isset($_POST['logout_btn'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('Location:login.php');
    }




?>