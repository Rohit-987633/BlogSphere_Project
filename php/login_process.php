<?php
session_start();

$host = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "Blogsphere";

$conn = new mysqli($host, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT id, password FROM login WHERE username = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();


        $hashed_input = hash("sha256", $password);

        if ($hashed_input === $hashed_password) {
            // fetch first and last name from sign_up table
            $stmt2 = $conn->prepare("SELECT firstname, lastname FROM sign_up WHERE email = ?");
            $stmt2->bind_param("s", $email);
            $stmt2->execute();
            $stmt2->bind_result($firstname, $lastname);
            $stmt2->fetch();
            $stmt2->close();

            $_SESSION['user'] = $email;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['en_user_id'] = $encrypted_id;

            // Encrypt the user ID
            $encrypted_id = base64_encode($user_id); // Simple encoding as encryption

            define('ENCRYPTION_KEY', 'A9d7k3L1p0s8Q2v5W6x3Yz1F4h9M7rTc'); // 32 characters
define('ENCRYPTION_IV', substr(hash('sha256', 'your-iv-seed'), 0, 16));
define('CIPHER_METHOD', 'AES-256-CBC');

// Sample user ID after login
$encrypted_id = base64_encode(openssl_encrypt($user_id, CIPHER_METHOD, ENCRYPTION_KEY, 0, ENCRYPTION_IV));

// $encrypted_id = encrypt_id($user_id);

            
            echo "<script>
                    localStorage.setItem('user_id', '$encrypted_id');
                    window.location = '../../src/admin/dashboard/index.php'; // Redirect to dashboard
                  </script>";
            exit();
        } else {
            $message = "Invalid email or password.";
        }
    } else {
        $message = "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
