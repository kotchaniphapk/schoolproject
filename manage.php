<?php
   $servername ="localhost";
   $username="root";
   $password="";
   $db="school";
   $link = $_SERVER['PHP_SELF'];
   $link_array = explode('/',$link);
   $page = end($link_array);

   $conn = new mysqli($servername,$username,$password,$db); 
 if($conn->connect_error) {
    die("connection failed:".$conn->connection_error);
 }


 $sql = "SELECT `st_firstname`,'',`st_lastname` ,`st_height` ,`st_nickname` ,`st_Id` FROM `student`  ";
 
 $result = mysqli_query($conn, $sql);
   
 $school_fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);

 mysqli_free_result($result);
 mysqli_close($conn);

 //print_r($school_fetch);
 



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>manage</title>   
</head>
<thead>
    <div class="flex flex-col mt-4 lg:mt-8">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <table class="min-w-full lg:divide-gray-200 lg:divide-y">
                            <thead class="hidden lg:table-header-group">
                                <tr>
                                <th class="py-3.5 px-4 text-left hidden xl:table-cell text-xs uppercase tracking-widest font-medium text-gray-500">Student ID</th>
                                    <th class="py-3.5 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-widest">Firstname</th>

                                    <th class="py-3.5 px-4 text-left text-xs uppercase tracking-widest font-medium text-gray-500">Lastname</th>

                                    <th class="py-3.5 px-4 text-left text-xs uppercase tracking-widest font-medium text-gray-500">Nickname</th>

                                    <th class="py-3.5 px-4 text-left hidden xl:table-cell text-xs uppercase tracking-widest font-medium text-gray-500">Hight</th>
                                </tr>
                    </div>           
                </div>               
</thead>
<tbody>
    
 
         <?php foreach($school_fetch as $data_school){  ?>


            <td class="px-4 py-4 text-sm font-bold text-gray-900 align-top lg:align-middle whitespace-nowrap"><?php echo htmlspecialchars($data_school['st_Id']); ?></td>
            <td class="px-4 py-4 text-sm font-bold text-gray-900 align-top lg:align-middle whitespace-nowrap"><?php echo htmlspecialchars($data_school['st_firstname']); ?></td>
            <td class="px-4 py-4 text-sm font-bold text-gray-900 align-top lg:align-middle whitespace-nowrap"><?php echo htmlspecialchars($data_school['st_lastname']); ?></td>
            <td class="px-4 py-4 text-sm font-bold text-gray-900 align-top lg:align-middle whitespace-nowrap"><?php echo htmlspecialchars($data_school['st_nickname']); ?></td>
            <td class="px-4 py-4 text-sm font-bold text-gray-900 align-top lg:align-middle whitespace-nowrap" ><?php echo htmlspecialchars($data_school['st_height']); ?></td>                            
             
            <td>
                <div class="flex items-center pt-3 space-x-4">
                    <a
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none hover:text-white hover:border-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="../schooltest/update.php/<?php echo htmlspecialchars($data_school['st_Id']); ?>"
                    >
                        Edit Details
                    </a>
                </div>
            </td>
            
           <td>
                <div class="flex items-center pt-3 space-x-4">
                    <button
                            type="button"  onclick="DeleteData(<?php echo htmlspecialchars($data_school['st_Id']); ?>)"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        
                            >
                            Remove
                    </button>
                </div>
            </td>
     </tr>
    
     
<?php } ?>
</tbody> 
    
    <a type= "button"  class="mr-2 m-2 px-4 py-2 items-center hover:text-gray-700  rounded-md hover:bg-gradient-to-r text-white  font-semibold shadow-lg bg-gradient-to-r from-yellow-400 to-red-600 "   href="../schooltest/student.php" >CREATE</a>
  
</html>

<script>
    
    
    function DeleteData(ID)  {     //insert data from view 
            console.log(" someting", ID);
         
        $.ajax({
            type: 'POST',                                      //post data on database
            url: "../schooltest/student_controller.php/delete_value" ,       //url  file  controller.php
            dataType: 'json',
            data: {
                action: 'delete_value',
                st_Id: ID,
            },
            success:function($data) {
                location.href("https://www.google.com/");
                }
            
        });

    }

      
   
        
       

    



</script>






                       
                               
 





