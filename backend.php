<?php

require 'server.php';
session_start();
    
//register
function register($db)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password0 = mysqli_real_escape_string($db, $_POST['password0']);

        $fullname = mysqli_real_escape_string($db, $_POST['fullname'] ?? '');
        $username = mysqli_real_escape_string($db, $_POST['username'] ?? '');
        $email = mysqli_real_escape_string($db, $_POST['email'] ?? '');
        $uid = uniqid();

        if ($password === $password0) {
            //match
            echo ("match");
            // email and username validation
            //username check
            $userchk = "SELECT * FROM users WHERE username ='$username'";
            $userfbk = mysqli_query($db, $userchk);
            if (mysqli_num_rows($userfbk) > 0) {
                echo ("Username has been taken already");
            } else {
                //email check
                $emailchk = "SELECT * FROM users WHERE email ='$email'";
                $emailfbk = mysqli_query($db, $emailchk);
                if (mysqli_num_rows($emailfbk) > 0) {
                    echo ("Email has been taken");
                } else {
                    //saving user details now
                    $saving = "INSERT INTO users (fullname, username, email, password0, uid) VALUES ('$fullname', '$username','$email','$password0','$uid')";
                    if (mysqli_query($db, $saving)) {
                        echo ("User registered");
                        header("location: login.php");
                    } else
                        echo ("User wasnt registered");
                }
            }
        } else {
            echo ("Password doesnt match");
        }
    }
}

function logins($db){
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        $username = mysqli_real_escape_string($db, $_POST['username']?? '');
        $password0 = mysqli_real_escape_string($db, $_POST['password']?? '');

        $qury = "SELECT * FROM users WHERE username = '$username' and password0 = '$password0'";
        $answer = mysqli_query($db, $qury);
        $usr = mysqli_fetch_assoc( $answer);
        if (mysqli_num_rows($answer) >0){
            echo("Login sucess ".$usr['username']);
            $_SESSION['username'] = $usr['username'];
            $_SESSION['userid'] = $usr['uid'];
            if ($_SESSION['username']==="Admin"){
                header("location: admin.php");

            }
            else{
            header("location: main.php");
                }
        }
        else{ echo("Wrong credentials");}
    }
}

function logout($db){
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        session_destroy();
        header("location: main.php");
    }
}

//seat check
function seats($db){
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $seat = mysqli_real_escape_string($db,$_POST["seat"]?? '');
        $qury = "SELECT * FROM chairs WHERE seat ='$seat'";
        $resonds = mysqli_query($db, $qury);
        $seatnums = mysqli_fetch_assoc($resonds);
        $_SESSION['seatnum']= $seatnums['seat'];  

    }
}

   



function search($db){
    //not in use any longer
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $sdate = mysqli_real_escape_string($db, $_POST['sdate']?? '');
    $qury = "SELECT * FROM book WHERE dates ='$sdate'";
    $respond = mysqli_query($db, $qury);
    if(mysqli_num_rows($respond)>0){
        while ($result = mysqli_fetch_assoc($respond)){
            echo "<i> {$result['dates']} </i> <br>". 
            "................................... <br>" ;
            // "<i>".$result['dates']."<i>"."<i>".$result['eventitle']."<i>".  "<br>" 
        }

    }
    else{echo'<p> No record </p>';}
    
}
}

function neweve($db){
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $sid = uniqid();
        $eventitle = mysqli_real_escape_string($db, $_POST['eventitle']?? '');
        $nos = mysqli_real_escape_string($db, $_POST['nos']?? '');
        $edate = mysqli_real_escape_string($db, $_POST['edate']?? '');
        $etime = mysqli_real_escape_string($db, $_POST['etime']?? '');
        $durations = mysqli_real_escape_string($db, $_POST['durations']?? '');
        $query = "INSERT INTO events (eid, eventitle, nos, edate, etime, durations) VALUES ('$sid','$eventitle','$nos','$edate','$etime','$durations')";
        $results = mysqli_query($db, $query);
       
        if($results){
            echo'done';

        }

    }
}

function pickevent($db){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['book'])){
        $event = mysqli_real_escape_string($db, $_POST['pick']?? '');
        
        $seattaken = "SELECT * FROM bookings WHERE eventname = '$event'";
        $taken = mysqli_query($db, $seattaken);
        $num = mysqli_num_rows($taken);
        

        $query = "SELECT * FROM events WHERE eventitle = '$event'";
        $result = mysqli_query($db, $query);
        $show = mysqli_fetch_assoc($result);
        
        echo"-----------------------------------------------------------------------------------------------------------------------------------------------";
        echo"<br>";
        echo"<i name=''> EVENT : {$show['eventitle']}</i>.<i name=''> DATE : {$show['edate']}</i>.<i name=''> TIME: {$show['etime']}</i>.<i name=''> SEATS: {$show['nos']}</i>.<i>/{$num}</i>";
        echo"<br>";
        echo"-----------------------------------------------------------------------------------------------------------------------------------------------";

        $_SESSION['E']=$show['eventitle'];
        $_SESSION['D']=$show['edate'];
        $_SESSION['T']=$show['etime'];
        $_SESSION['S']=$num;
        $_SESSION['SS']=$show['nos'];


        // return array($show, $num);
        }

    }
}

function test($db,){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['change'])){
        $change = mysqli_real_escape_string($db ,$_POST['']?? '');
        // $showed = pickevent($db);
        // $show =$showed[0] ?? null;
        // $num = $showed[1] ?? null;
        $C=$_SESSION['S'];
        $CC=$_SESSION['SS'];
            // echo $_SESSION['SS'].$_SESSION['S'];
        if ($C==$CC) {echo'Unable to book because all event seats has all been taken ';}
        else{
        echo $_SESSION['E'].$_SESSION['D'].$_SESSION['T'];
        echo '<br>';
    
        $U = $_SESSION['username'];
        $E =$_SESSION['E'];
        $D=$_SESSION['D'];
        $T=$_SESSION['T'];
        $uid = uniqid();
        $Q = "INSERT INTO bookings(username , eventname , edate , etime ,uid)VALUES('$U','$E','$D','$T','$uid')";
        $QQ = mysqli_query($db, $Q);
        if($QQ) {echo'Booked';
            unset($_SESSION['E']);
            unset($_SESSION['D']);
            unset($_SESSION['T']);
            unset($_SESSION['C']);
            unset($_SESSION['CC']);
            // unset($_SESSION['T']);

        
        
        
        }
        else{echo'not booked retry';}
        

       
        // $cat = pickevent($db);
        // $a = $cat['eventitle'];
        // $b = $cat['edate'];
        // echo $a. "  ".$b;
        // echo"<h1 name=''> EVENT : {$cat['eventitle']}</h1>";
        // test($db);
    }
        }

    }
}

function del($db){
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['delete'])){
            $id = mysqli_real_escape_string($db,$_POST['id']?? '');
            $qury = "DELETE FROM bookings WHERE uid = '$id'";
            mysqli_query($db, $qury);
            echo'deleted';
            header("location: user_record.php");
        }

    }
}



?>