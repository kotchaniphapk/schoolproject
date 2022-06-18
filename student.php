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
            <h1 class=" text-2xl font-bold">STUDENT SIGNUP</h1>
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
                            <button type= "button" onclick="insertData()" class="mr-2 m-2 px-4 py-2 items-center hover:text-gray-700  rounded-md hover:bg-gradient-to-r text-white  font-semibold shadow-lg bg-gradient-to-r from-pink-400 to-blue-600">INSERT DATA</button>
                            
                       <!--<button type= "button" onclick="getData()" class="mr-2 m-2 px-4 py-2 items-center hover:text-gray-700  rounded-md hover:bg-gradient-to-r text-white  font-semibold shadow-lg bg-gradient-to-r from-yellow-400 to-red-600">GET DATA</button> -->
                        </div>

                      
                        </div>
            </from>
            </div>
    </div>
        </div>
<!--<p1>FULLNAME:<p1>
    <input type="text" name="Fname">
    <br> 
    <p1>LASTNAME:<p1>
    <input type="text" name="Lname" id="name">
    <button type="button" onclick="getData()">ajax</button> -->
</body>
</html>

<script>
    
        function insertData() {    
            var name = $('input[name=Fname]').val();        // input  Fullname
            var surname = $('input[name=Lname]').val();      //input  surname 
            var nickname = $('input[name=Nname]').val();
            var height = $('input[name=Hheight]').val();
            console.log( name + " " + surname);       
            $.ajax({
                type: 'POST',                                      //post data on database
                url:  '../schooltest/student_controller.php/insert_value',       //url  file  controller.php
                dataType: 'json',
                data: {
                    // action: 'insert_value',
                    name_ui: name,
                    surname_ui: surname,
                    nickname_ui: nickname,
                    height_ui: height,     
                },
                success:function(data) {
                    console.log('Insert success');
                }
                
            });
              
           }
</script>
