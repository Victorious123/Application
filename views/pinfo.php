<!-- Viktoriya Kovachyk, 5/6/2023, in this file it saves the applicants answer to
this session and posts them. -->

<?php
// The session is started
session_start();

if(isset($_SESSION['fname'])){ //checking if session is set or not
    $fname = $_SESSION['fname'];
    $phone = $_SESSION['phone'];
}else{
    $fname = []; // if session is not set, this creates an empty array
    $phone = [];
}

if(isset($_POST['fname'])){ // value goes through post method into $fname[] and $phone[]
    $fname[] = $_POST['fname'];
    $phone[] = $_POST['phone'];
}

$_SESSION['fname'] = $fname; //the information is saved
$_SESSION['phone'] = $phone;

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <?php
    $count = 0;
    foreach($fname as $key=>$value){
        $count++;
        print "<br>$count: $fname[$value], $phone[$key]";
    }
    ?>

</form>
</body>

</html>



