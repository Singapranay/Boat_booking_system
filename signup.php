<?php
include('includes/config.php');
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "INSERT INTO tblusers(Name, Email, Password) VALUES('$name', '$email', '$password')");       
    if($query){
        header("Location: login.php");
    } else {
        $msg = "Error occurred. Try again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup - Boat Booking System</title>
  <!-- Add Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      /* background-color: #f3f4f6; */
      background-color: lightblue;

    }
    .container {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 50px auto;
    }
    .btn-primary {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2 class="text-center text-3xl font-semibold mb-6 text-blue-500">Signup</h2>
    <?php if(isset($msg)) echo "<p class='text-red-500 text-center'>$msg</p>"; ?>
    <form method="POST">
      <div class="form-group mb-4">
        <label for="name" class="block text-lg text-gray-700">Name</label>
        <input type="text" name="name" id="name" required class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg">
      </div>
      <div class="form-group mb-4">
        <label for="email" class="block text-lg text-gray-700">Email</label>
        <input type="email" name="email" id="email" required class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg">
      </div>
      <div class="form-group mb-6">
        <label for="password" class="block text-lg text-gray-700">Password</label>
        <input type="password" name="password" id="password" required class="form-control w-full p-3 mt-2 border border-gray-300 rounded-lg">
      </div>
      <button type="submit" name="signup" class="btn-primary w-full p-3 text-center">Signup</button>
    </form>
  </div>
</body>

</html>
