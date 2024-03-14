<?php
session_start();

class User {
    public function login() {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Login successful, redirect to home page
            unset($_SESSION['error']);
            $_SESSION['log_in'] = $user['id'];
            header("Location: /phonebook/client/main.php");
            exit();
        } else {
            // Login failed, redirect back to login page with error message
            $_SESSION['error'] = "Invalid email or password";
            header("Location: /phonebook/client/main.php");
            exit();
        }
    }

    public function logout() {
        session_destroy();

        header("Location: /phonebook/client/main.php");
        exit();
    }

    public function myContacts() {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        $user_id = $_SESSION['log_in'];
        $sql = $pdo->prepare("SELECT users.*, countries.id as country_id
                                FROM users
                                LEFT JOIN countries ON users.country_id = countries.id
                                WHERE users.id = :user_id"
                            );
        $sql->bindParam(':user_id', $user_id);
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function myEmails() {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        $user_id = $_SESSION['log_in'];
        $sql = $pdo->prepare("SELECT * FROM emails WHERE user_id = :user_id");
        $sql->bindParam(':user_id', $user_id);
        $sql->execute();
        $user = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    public function myPhones() {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        $user_id = $_SESSION['log_in'];
        $sql = $pdo->prepare("SELECT * FROM phones WHERE user_id = :user_id");
        $sql->bindParam(':user_id', $user_id);
        $sql->execute();
        $user = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    public function update() {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        $this->updateUser($pdo);
        $this->updateEmails($pdo);
        $this->updatePhones($pdo);

        header("Location: /phonebook/client/main.php");
    }

    private function updateUser($pdo) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $zip = $_POST['zip'];
        $address = $_POST['address'];
        $country_id = isset($_POST['countryId']) ? $_POST['countryId'] : 1;
        $is_public = isset($_POST['is_public']) ?? 0;
        $user_id = $_SESSION['log_in'];
        $sql = $pdo->prepare("UPDATE users SET name=:name, surname= :surname, address= :address, zip= :zip ,country_id= :country_id ,is_public= :is_public WHERE id = :id");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':surname', $surname);
        $sql->bindParam(':zip', $zip);
        $sql->bindParam(':address', $address);
        $sql->bindParam(':country_id', $country_id);
        $sql->bindParam(':is_public', $is_public);
        $sql->bindParam(':id', $user_id);
        $sql->execute();
    }

    private function updateEmails($pdo) {
        $rows = [];
        $emails = $_POST['email'];
        $newEmails = $_POST['new_email'];
        $user_id = $_SESSION['log_in'];

        foreach ($emails as $index => $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
                exit();
            }

            $is_public = isset($_POST['email_is_public_'. $index]) ? 1 : 0;
            $rows[] = [$email, $is_public, $user_id];
        }
        // new emails
        foreach ($newEmails as $index => $new_email) {
            if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
                exit();
            }

            $is_public = isset($_POST['new_email_is_public_'. $index]) ? 1 : 0;
            $rows[] = [$new_email, $is_public, $user_id];
        }
        // faster and dont do too much query
        $sql = $pdo->prepare("DELETE FROM emails WHERE user_id = :user_id");
        $sql->bindParam(':user_id', $user_id);
        $sql->execute();

         // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO emails (email, is_public, user_id) VALUES (?, ?, ?)");
        
        // Insert each row
        foreach ($rows as $row) {
            $stmt->execute($row);
        }
    }

    private function updatePhones($pdo) {
        $rows = [];
        $phones = $_POST['number'];
        $newPhones = $_POST['new_number'];
        $user_id = $_SESSION['log_in'];

        foreach ($phones as $index => $phone) {
            $is_public = isset($_POST['number_is_public_'. $index]) ? 1 : 0;
            $rows[] = [$phone, $is_public, $user_id];
        }
        // new phones
        foreach ($newPhones as $index => $phone) {
            $is_public = isset($_POST['new_number_is_public_'. $index]) ? 1 : 0;
            $rows[] = [$phone, $is_public, $user_id];
        }
        // faster and dont do too much query
        $sql = $pdo->prepare("DELETE FROM phones WHERE user_id = :user_id");
        $sql->bindParam(':user_id', $user_id);
        $sql->execute();

         // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO phones (phone, is_public, user_id) VALUES (?, ?, ?)");
        
        // Insert each row
        foreach ($rows as $row) {
            $stmt->execute($row);
        }
    }
}

// Instantiate the class
$user = new User();

// Check the action parameter and call the appropriate method
$action = isset($_GET['function']) ? $_GET['function'] : '';
if (method_exists($user, $action)) {
    echo $user->$action();
}

?>