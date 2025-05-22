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

    $stmt = $conn->prepare("SELECT id, password FROM superadmin WHERE username = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        $hashed_input = hash("sha256", $password);

        if ($hashed_input === $hashed_password) {
            // Encrypt the user ID
            define('ENCRYPTION_KEY', 'A9d7k3L1p0s8Q2v5W6x3Yz1F4h9M7rTc');
            define('ENCRYPTION_IV', substr(hash('sha256', 'your-iv-seed'), 0, 16));
            define('CIPHER_METHOD', 'AES-256-CBC');

            $encrypted_id = base64_encode(openssl_encrypt($user_id, CIPHER_METHOD, ENCRYPTION_KEY, 0, ENCRYPTION_IV));
            session_unset();
            // Successful login — now redirect
            echo "<script>
                    localStorage.setItem('super_user_id', '$encrypted_id');
                    window.location.href = '/BlogSphere_Project/src/admin/dashboard/index.php';
                  </script>";
            exit(); // Ensure script stops
        } else {
            $message = "Invalid email or password.";
        }
    } else {
        $message = "Invalid email or password.";
    }

    $stmt->close();
}
$conn->close();
?>
