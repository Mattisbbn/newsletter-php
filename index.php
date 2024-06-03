<?php
include_once("controllers/connectToDatabase.php");
include_once("partials/header.php");

if (isset($_GET['admin'])) {
    include_once("view/admin.php");
} else if (isset($_GET["unsubscribe"])) {
    include_once("view/unsubscribe.php");
}
 else if (isset($_GET["admin"])) {
    include_once("view/admin.php");
} else {
    include_once("view/homepage.php");
}


include_once("partials/footer.php")
?>
