<?php

require_once 'Person.php';
require_once 'StorePersons.php';

$storePersons = new StorePersons();


$name = $_POST['name'] ?? 'Type name';
$surname = $_POST['surname'] ?? 'Type surname';
$personalCode = $_POST['personalcode'] ?? 'Type person code';
$address = $_POST['address'] ?? 'Type address';
$searchForPerson = $_POST['searchperson'] ?? '';

?>

<html>
<style>
    label {
        text-align: center;
        color: white;
        font-size: x-large;
    }
    p {
        text-align: center;
        color: #555555;
        font-size: x-large;
    }
    body {
        background-image: url("https://www.hdnicewallpapers.com/Walls/Big/Others/Amzing_Seashell_Background_Photo.jpg");

    }
</style>
<body>
<form action="index.php" method="post">
    <pre>
        <label class="r" for="name">Name</label>
        <input type="text" name="name" id='name'>

        <label for="surname">Surname</label>
        <input type="text" name="surname" id='surname'>

        <label for="personalcode">Personal code</label>
        <input type="text" name="personalcode" id='personalcode'>

        <label for="address">Address</label>
        <input type="text" name="address" id='address'>
        <button type="submit">Submit</button>

  </pre>
</form>
<hr>
<center>
<form action="index.php" method="post">
    <label for="searchperson">Search person</label>
    <input type="text" name="searchperson" id='searcherson'>
    <button type="submit">Search</button>
<p><?php
        switch ($searchForPerson) {
            case (isset($name) && isset($surname) && isset($personalCode) && isset($address) && !isset($searchForPerson)):
                $person = new Person($name, $surname, $personalCode, $address);
                $storePersons->savePerson($person);
                break;
            case (isset($searchForPerson) || !isset($name) || !isset($surname) || !isset($personalCode) || !isset($address)):
                $person = ($storePersons->getByCode($searchForPerson));
                echo 'Person name:  ' . $person->getName();
                echo ' , surname:  ' . $person->getSurname();
                echo ' , personal code:  ' . $person->getPersonalCode();
                echo ' , address:  ' . $person->getAddress();

                break;
        }

        ?>
    </p>
</form>
</center>
</body>
</html>


