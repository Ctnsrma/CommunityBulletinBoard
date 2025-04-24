<?php
$success = 0;
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $username = mysqli_real_escape_string($con, $_POST['Username']);
    $password = mysqli_real_escape_string($con, $_POST['Password']);

    // Check if the email already exists in the database
    $sql = "SELECT * FROM `registration` WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1; // Email already exists
        } else {
            // Insert the new user data (email, username, password)
            $sql = "INSERT INTO `registration` (email, username, password) VALUES ('$email', '$username', '$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $success = 1;
                echo "<script>
                alert('Sign Up Successful');
                window.location.href='login.php';
                </script>";
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-[#F28383] via-[#9D6CD2] to-[#481EDC] h-screen">

<?php
    if ($user) {
        echo "<script>
            alert('User already exists');
            window.location.href='login.php';
        </script>";
    }
?>

<main class="flex items-center justify-center h-screen">
    <div class="max-w-[960px] bg-[#00000050] grid grid-cols-1 md:grid-cols-2 items-center p-5 gap-10 rounded-2xl">
        <div class="hidden md:block">
            <img src="https://static.vecteezy.com/vite/assets/photo-masthead-375-BoK_p8LG.webp" alt="Signup Image" class="rounded-2xl">
        </div>

        <div class="max-w-80 grid gap-5">
            <h1 class="text-5xl font-bold text-white">Sign Up</h1>
            <p class="text-[#FFFFFFB3] text-2xl">Create an account to visit our website</p>

            <form id="signform" action="sign.php" method="post" class="space-y-6 text-white">
                <div class="relative">
                    <div class="absolute top-1 left-1 bg-white-medium rounded-full p-2 flex items-center justify-center text-blue-300">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <input type="email" placeholder="Enter your email" required 
                        class="w-80 py-2 px-12 rounded-full focus:bg-[#00000050] focus:outline-none focus:ring-1 focus:ring-blue-600 focus:drop-shadow-lg bg-[#FFFFFF30]" 
                        name="Email" autocomplete="off">
                </div>

                <div class="relative">
                    <div class="absolute top-1 left-1 bg-white-medium rounded-full p-2 flex items-center justify-center text-blue-300">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <input type="text" placeholder="Enter your username" required 
                        class="w-80 py-2 px-12 rounded-full focus:bg-[#00000050] focus:outline-none focus:ring-1 focus:ring-blue-600 focus:drop-shadow-lg bg-[#FFFFFF30]" 
                        name="Username" autocomplete="off">
                </div>

                <div class="relative">
                    <div class="absolute top-1 left-1 bg-white-medium rounded-full p-2 flex items-center justify-center text-blue-300">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="password" placeholder="Enter the password" required pattern="\d{6}" id="password"
                        class="w-80 py-2 px-12 rounded-full focus:bg-[#00000050] focus:ring-1 focus:outline-none focus:ring-blue-600 focus:drop-shadow-lg bg-[#FFFFFF40]" 
                        name="Password" title="Password must be exactly 6 digits">
                </div>

                <button type="submit" class="bg-gradient-to-r from-blue-400 to-cyan-200 w-80 rounded-full font-semibold py-2">
                    Sign Up
                </button>
            </form>

            <div class="text-[#FFFFFFB3] border-t border-[#FFFFFF40] pt-4 space-y-4 text-sm">
                <p>Already have an account? <a class="text-blue-300 cursor-pointer font-semibold hover:text-blue-400" href="login.php">Log In</a></p>
            </div>
        </div>
    </div>
</main>

<script>
document.getElementById("signform").addEventListener("submit", function(e) {
    const password = document.getElementById("password").value;
    const regex = /^\d{6}$/;
    if (!regex.test(password)) {
        alert("Password must be atleast 6 digits.");
        e.preventDefault();
    }
});
</script>

</body>
</html>
