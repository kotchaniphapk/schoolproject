<?php    //connet database mySQL
 $servername ="localhost";
 $username="root";
 $password="";
 $db="school";
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $page = end($link_array);
  // echo $page;

 $conn = new mysqli($servername,$username,$password,$db); 
if($conn->connect_error) {
  die("connection failed:".$conn->connection_error);
}


// pull input from view  and Variable Declaration

switch ($page){
        case 'insert_value':
          $name =$_POST['name_ui'];    
          $surname =$_POST['surname_ui'];
          $nickname=$_POST['nickname_ui'];
          $height=$_POST['heigh]t_ui'];
          $currentDateTime = date("Y-m-d H:i:s");
          $currentTimestamp = time();
          
          $sql="INSERT INTO `student`(`st_Id`, `st_titleId`, `st_firstname`, `st_lastname`, `st_nickname`, `st_create_time`, `st_update_time`, `st_height`) VALUES (null,'1','$name','$surname','$nickname','$currentDateTime','$currentDateTime','$height')";
          $result = mysqli_query($conn, $sql);
          var_dump(mysqli_error($conn));
          break;

        case 'get_value': 
          getTableData($_POST['st_Id']);
          break;

        case 'save_value': 
          saveupdate($_POST['st_Id']);
          break;


          case 'delete_value': 
            deleteData($_POST['st_Id']);
            break;

            case 'login_value': 
              login();
              break;
  

        default:
          echo 'I get here';
        break;
        
}

//switch case
// //table update

  function getTableData($id) {
    $servername ="localhost";
    $username="root";
    $password="";
    $db="school";
    
    $conn = new mysqli($servername,$username,$password,$db); 
    if($conn->connect_error) {
    die("connection failed:".$conn->connection_error);
    } 

    $sql = "SELECT `st_firstname`,'',`st_lastname` ,`st_height` ,`st_nickname` ,`st_Id` FROM `student` WHERE `st_Id` = $id";
    $result = mysqli_query($conn, $sql);
    $school_fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn);

    echo json_encode($school_fetch);
  }

//print_r($school_fetch);
// part MYSQL   
// var_dump(mysqli_error($conn));
// while($item=mysqli_fetch_array($result)) {
// var_dump($item);
// }

///save value
function saveupdate ($id) {
  $servername ="localhost";
  $username="root";
  $password="";
  $db="school";

  $conn = new mysqli($servername,$username,$password,$db); 
  if($conn->connect_error) {
    die("connection failed:".$conn->connection_error);
  }

  $name =$_POST['name_ui'];    
  $surname =$_POST['surname_ui'];
  $nickname=$_POST['nickname_ui'];
  $height=$_POST['height_ui'];

  $currentDateTime = date("Y-m-d H:i:s");
  $currentTimestamp = time();

  $sqlUpdate="UPDATE `student` SET `st_firstname`='$name', `st_lastname`='$surname', `st_nickname`='$nickname', `st_height`='$height' WHERE `st_Id`=$id";
  
  $resultUpdate = mysqli_query($conn, $sqlUpdate);
  // var_dump(mysqli_error($conn));

  $sql = "SELECT `st_firstname`,'',`st_lastname` ,`st_height` ,`st_nickname` ,`st_Id` FROM `student` WHERE `st_Id` = $id";
  $result = mysqli_query($conn, $sql);
  $school_fetch= mysqli_fetch_all($result, MYSQLI_ASSOC);

  $data['school']=$school_fetch;
  $data['message']='success';
  echo json_encode($data);
  print_r($school_fetch);
}


//deletedata

function deleteData($id) {
  $servername ="localhost";
  $username="root";
  $password="";
  $db="school";
  $conn = new mysqli($servername,$username,$password,$db); 
  if($conn->connect_error) {
  die("connection failed:".$conn->connection_error);
  } 

  $sql = "DELETE FROM `student`  WHERE `st_Id` = $id ";
  $result = mysqli_query($conn, $sql);

}

function login() {
  
  $servername ="localhost";
  $username="root";
  $password="";
  $db="school";
  $conn = new mysqli($servername,$username,$password,$db); 
  if($conn->connect_error) {
  die("connection failed:".$conn->connection_error);
  } 
   

   $studentId =$_POST['studentid_ui'];    
   $password =$_POST['password_ui'];
    echo "<pre>";
    print_r($studentId);
    echo "</pre>";
    echo "<pre>";
    print_r($password);
    echo "</pre>";


   $strSQL = "SELECT * FROM `login`  JOIN student ON student.st_Id = login.st_studentId WHERE login.student_id = '$studentId' and login.student_pass = '$password' ";
   $objQuery = mysqli_query($conn,$strSQL);
   var_dump(mysqli_error($conn));
   $objResult = mysqli_fetch_array($objQuery);
  
  
  
   if(!$objResult)
   {
     echo "Username and Password Incorrect!";
     exit();
   }
 
     else
     {
   
       //*** Session
       $_SESSION["studentId"] = $objResult["student_id"];
       $_SESSION["password"] = $objResult["student_pass"];

       session_write_close();      
     
   } 
  }






 ?>