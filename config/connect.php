<?php

    // insert countries and 3 users
    require_once 'seeder.php';

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $check_sql = "SELECT COUNT(*) as count FROM countries";
        // Execute the check query
        $stmt = $pdo->prepare($check_sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // If the count is 0, then insert data
        if ($result['count'] == 0) {
            // Call the function to insert data
            insertCountriesData($pdo);
            insertUsersData($pdo);
        }
    } catch (PDOException $e) {
        exit('Database Error' . $e->getMessage());
    }

 ?>