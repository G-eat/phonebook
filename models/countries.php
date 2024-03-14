<?php
class Country {
    public function getCountries() {
        $pdo = new PDO('mysql:host=localhost;dbname=phonebook','root','');

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("SELECT * FROM countries;");
        $sql->execute();
        $countries = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $countries;
    }
}

?>