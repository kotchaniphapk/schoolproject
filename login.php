
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>   
</head>
<body>
<div  class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class=" p-8 bg-slate-100 shadow-lg">
    <form method="post" action="#" onSubmit="return false">
      <h1 class=" text-2xl font-bold">Sign in to your account</h1>
      <div>
        <!-- <span class="text-gray-600 text-sm">
          Don't have an account?
        </span> -->
        <!-- <span class="text-gray-700 text-sm font-semibold">
          Sign up
        </span> -->
      </div>
      <div class="mb-4 mt-6">
        <label
          class="block text-gray-700 text-sm font-semibold mb-2">
          Student Id
        </label>
        <input
          class="text-sm appearance-none rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline h-10"
          name="studentid"
          type="number"
          placeholder="Your Student Id"
        />
      </div>
      <div class="mb-6 mt-6">
        <label
          class="block text-gray-700 text-sm font-semibold mb-2"
          htmlFor="password"
        >
          Password
        </label>
        <input
          class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline h-10"
          name="Password"
          type="password"
          placeholder="Your password"
        />
        <a
          class="inline-block align-baseline text-sm text-gray-600 hover:text-gray-800"
          href="/forgot"
        >
          Forgot Password?
        </a>
      </div>
      <div class="flex w-full mt-8">
        <a
          class="w-full bg-gradient-to-r from-pink-400 to-blue-600 hover:text-gray-700 text-white text-sm py-2 px-4 font-semibold rounded focus:outline-none focus:shadow-outline h-10"
          type="button"  onclick="login()"
        >
          Sign in
        </a>
      </div>
    </form>
  </div>
</div>
<body>

</html>
<script>
    
        function login() {    
            var studentId = $('input[name=studentid]').val();        
            var password = $('input[name=Password]').val();      
            console.log( studentId + " " + password );
           
            $.ajax({
                type: 'POST',                                      //post data on database
                url:  '../schooltest/student_controller.php/login_value',       //url  file  controller.php
                dataType: 'json',
                data: {
                    action: 'login_value',
                    studentid_ui: studentId,
                    password_ui:  password,
                  
                },
                
              
            });
              
           }
</script>