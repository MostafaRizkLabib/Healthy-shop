<?php
    $con = mysqli_connect('localhost','root','','web');
    if(! $con){
        echo "error";
    }
    if (isset($_POST['signup'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $sql = "SELECT email FROM info WHERE email ='$email'";
        
        $result = mysqli_query($con,$sql);
        
        if(mysqli_num_rows($result) != 0){
            echo "this email is already taken";
        }else{
            $sql2 = "INSERT INTO info(username,email,password) VALUES('$username','$email','$password')";
            mysqli_query($con,$sql2);
        }
    }

    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($con,$_POST['username2']);
        $password = mysqli_real_escape_string($con,$_POST['pass2']);

        $sql = "SELECT * FROM info WHERE username='$username' AND password ='$password'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)){
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];

        header('location: home.html');
        }else{
            echo '<div style="position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 300px;">';
            echo '   <p style="color: blue; text-align: center;">Wrong username or password</p>';
            echo '</div>';   
        }
    }
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width",initial-scale="1.0">
        <meta name="discribtion" content="Welcome to our exceptional platform, where we offer a wide range of health-conscious products designed specifically to meet the needs of individuals dealing with chronic conditions such as diabetes, high blood pressure, and heart diseases.
        We take pride in providing balanced nutritional options that contribute to overall health improvement and promote a healthy lifestyle.
        Key Features:
        1. Diverse Product Selection: We offer a variety of healthy foods and dietary supplements that respect the needs of individuals with chronic diseases. From fresh produce to organic products and specialized cuisines, you can find options that suit your taste and health requirements.
        2. Dedicated Section for Athletes: We understand the importance of nutrition for active individuals and sports enthusiasts. Therefore, we provide a diverse range of products tailored to the dietary needs of athletes, including proteins, vitamins, and essential minerals.
        3.Research-Based Products: Our product offerings are based on the latest scientific research in the fields of nutrition and health. We ensure the provision of high-quality products with effective ingredients to maximize health benefits.
        4.Health Information and Tips: Our platform also offers valuable articles and tips on healthy nutrition and an active lifestyle, helping you better understand your body's needs and how to care for your health.
        5.Convenient Delivery: We value your time and convenience, offering reliable and efficient delivery services. This makes it easy for you to access our health-conscious products without any hassle.
        Join us today and embark on your journey towards a healthier life.">
        <title>sign up page</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body>
        <div class="wrapper">
            <span class="bg-animate"></span>
            <span class="bg-animate2"></span>


            <div class="form-box login">
                <h2 class="animation" style="--i:0; --j:21">Login</h2>
                <form action="#" method="post">
                    <div class="input-box animation" style="--i:1; --j:22">
                        <input type="text" required name="username2">
                        <label>Username</label>
                        <i class="bx bxs-user"></i>
                    </div>
                    <div  class="input-box animation" style="--i:2; --j:23">
                        <input type="password" required name="pass2">
                        <label>Password</label>
                        <i class="bx bxs-lock-alt" ></i>
                    </div>
                    <button type="submit" class="btn animation" style="--i:3; --j:24"name="login">Login</button>
                    <div class="logreg-link animation" style="--i:4; --j:25">
                        <p>Don't have an acount?<a href="#"class="register-link">Sign up</a></p>
                    </div>
                </form>
            </div>
            <div class="info-text login">
                <h2 class="animation" style="--i:0; --j:20">Welcome back!</h2>
                <p class="animation" style="--i:1; --j:21">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
            </div>

            
            <div class="form-box register">
                <h2 class="animation" style="--i:17; --j:0">Sign Up</h2>
                <form method="post">
                    <div class="input-box animation" style="--i:18; --j:1">
                        <input type="text" required name="username">
                        <label>Username</label>
                        <i class="bx bxs-user"></i>
                    </div>
                    <div  class="input-box animation" style="--i:19; --j:2">
                        <input type="email" name="email" required>
                        <label>Email</label>
                        <i class="bx bxs-envelope" ></i>
                    </div>
                    <div  class="input-box animation" style="--i:20; --j:3">
                        <input type="password" required name="pass">
                        <label>Password</label>
                        <i class="bx bxs-lock-alt" ></i>
                    </div>
                    <button type="submit" class="btn animation" name="signup" style="--i:21; --j:4">Sign Up</button>
                    <div class="logreg-link animation" style="--i:22; --j:5">
                        <p>Already have an acount?<a href="#"class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
            <div class="info-text register">
                <h2 class="animation" style="--i:17; --j:0">Welcome back!</h2>
                <p class="animation" style="--i:18; --j:1">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
            </div>

        </div>
        <script src="script.js"></script>
</body>
</html>