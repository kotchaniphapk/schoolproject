<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student</title>
   
</head>
<body> <!--view-->
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-10 py-8 mt-6  border rounded-md text-left bg-slate-100 shadow-lg">
            <h1 class=" text-2xl font-bold">UPDATE DATA</h1>
            <form action="">
            <div class="flex flex-wrap mt-4">
                    <div class="flex items-center mr-4">
                        <input id="mr-radio" type="radio" value="" name="colored-radio" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="mr-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mr.</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input id="mrs-radio" type="radio" value="" name="colored-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mrs.</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input checked id="purple-radio" type="radio" value="" name="colored-radio" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Miss.</label>
                    </div>
            </div>
                <div class="mt-4">
                    <label class="block">FULLNAME:<label>
                        <input type="text" name="Fname" id="fullname" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    <div class="mt-4">
                        <label class="block">LASTNAME:<label>
                        <input type="text" name="Lname" id="lastname" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                        <div class="mt-4">
                            <label class="block">NICKNAME:<label>
                            <input type="text" name="Nname" id="nickname" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        
                        <div class="mt-4">
                            <label class="block">HEIGHT:<label>
                            <input type="text" name="Hheight" id="heighT" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>

                        <div class="mt-4">
                            
                            <button type= "button" onclick="saveData()" class="mr-2 m-2 px-4 py-2 items-center hover:text-gray-700  rounded-md hover:bg-gradient-to-r text-white  font-semibold shadow-lg bg-gradient-to-r from-yellow-400 to-red-600">  SAVE  </button> 
                        </div>


            </from>
            </div>
    </div>
        </div>

}
?>

</body>
</html>
<script>
    var pathArray = document.location.pathname.split("/");
    var userId = pathArray[pathArray.length - 1];
//getdata show update
 $(document).ready(function() {
        console.log( "ready!" );
        

        $.ajax({
            type: 'POST',                                      
            url: "../../schooltest/student_controller.php/get_value", 
            dataType: 'json',     
            data: {
                action: 'get_value',
                st_Id: userId,
            },
                success: function(data) {
                    console.log(data);

                    $("input#fullname").val(data[0].st_firstname);
                    $("input#lastname").val(data[0].st_lastname);
                    $("input#nickname").val(data[0].st_nickname);
                    $("input#heighT").val(data[0].st_height);
                }
            });
        });
    
    // function getData() {     //insert data from view 

    //         var name =$('input[name=Fname]').val();        // input  Fullname
    //         var surname =$('input[name=Lname]').val();      //input  surname 
    //         var nickname=$('input[name=Nname]').val();
    //         var height  =$('input[name=Hheight]').val();
    //         console.log( name + " " + surname);
    // }
    
////savedata
    function saveData(){     //insert data from view 
        var name = $('input[name=Fname]').val();        // input  Fullname
        var surname = $('input[name=Lname]').val();      //input  surname 
        var nickname = $('input[name=Nname]').val();
        var height = $('input[name=Hheight]').val();
        console.log( name + " " + surname);
    
    
        $.ajax({
            type: 'POST',                                      //post data on database
            url: "../../schooltest/student_controller.php/save_value",       //url  file  controller.php
            dataType: 'json',
            data: {
                action: 'save_value',
                name_ui: name,
                surname_ui: surname,
                nickname_ui: nickname,
                height_ui: height,
                st_Id: userId
            },
            success:function(data) {
                console.log('save success');
        
                    $("input#fullname").val(data[0].st_firstname);
                    $("input#lastname").val(data[0].st_lastname);
                    $("input#nickname").val(data[0].st_nickname);
                    $("input#heighT").val(data[0].st_height);
                }
            
        });

    }







</script>