<?php
session_start();
include('includes/config.php');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM tblusers WHERE Email='$email' AND Password='$password'");
    if(mysqli_num_rows($query) > 0){
        $_SESSION['login'] = $email;
        header("Location: index.php");
    } else {
        $msg = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Boat Booking System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      /* background: linear-gradient(45deg, #00bcd4, #8bc34a); */
      background-color: lightcyan;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .container {
      background-color: pink;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    h2 {
      text-align: center;
      color: #4caf50;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      font-weight: bold;
      color: #333;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 12px 20px;
      width: 100%;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #45a049;
    }

    p {
      color: #f44336;
      text-align: center;
    }

    .btn {
      display: inline-block;
      margin-top: 15px;
      text-align: center;
    }

  </style>
</head>

<body>
  <div class="container">
    <h2>Login</h2>
    <?php if(isset($msg)) echo "<p>$msg</p>"; ?>
    <form method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required class="form-control">
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
  </div>
</body>

</html>
