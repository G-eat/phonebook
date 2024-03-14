<?php

class Phonebooks {
    public function get() {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT users.*, GROUP_CONCAT(DISTINCT emails.email) as emails, GROUP_CONCAT(DISTINCT phones.phone) as phone_numbers, countries.name as country_name
                                FROM users
                                LEFT JOIN emails ON users.id = emails.user_id AND emails.is_public = 1
                                LEFT JOIN phones ON users.id = phones.user_id AND phones.is_public = 1
                                LEFT JOIN countries ON users.country_id = countries.id
                                WHERE users.is_public = 1
                                GROUP BY users.id;"
                            );
        $sql->execute();
        $phones = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $phones;
    }
}

?>