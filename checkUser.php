<?php
session_start();
include_once 'DAO/AdminDAO.php';

if (isset($_POST["postcheck"])) {
    foreach (AdminDAO::getAll() as $user) {
        if ($_POST["gerbuikersnaam"] == $user->getGebruikersnaam()) {
            if ($_POST["passwoord"] == $user->getPasswoord()) {
                $_SESSION["loggedin"] = true;
                header('Location:admin.php');
            }
        }
    }
    if (!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] == false) {
        header('Location:login.php?incorrect=true');
    }
}
