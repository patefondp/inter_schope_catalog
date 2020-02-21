<?php
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '11111111');
define('DBNAME', 'Houtbooki');



function connect (){
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        mysqli_set_charset($conn, "utf8");
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      return $conn;
    }


function select ($conn){
$sql = "SELECT * FROM `product` ORDER by id DESC";
$result = mysqli_query($conn, $sql);
$a = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $a[] =$row;
    }
}else {
    echo "0 results";
}
return $a;
}


function selectMain($conn){
    if (isset($_GET['page'])){
$page = $_GET['page'];
    }else {
    $page = 1;
    };

    $notesOnPage = 2;
    $from = ($page-1)*$notesOnPage;

$sql = "SELECT * FROM `product` LIMIT $from,$notesOnPage";
$result = mysqli_query($conn, $sql);
$a = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $a[] =$row;
    }
}else {
    echo "0 results";
}
return $a;
}

function paginCount($conn){
    $sql = "SELECT * FROM `product`";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);
    return round ($result/2);
   

}


function close($conn){
    mysqli_close($conn);
}

?>