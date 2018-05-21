<?php

# FEED PAGE
#
# Procedurally generates the feed page, determining how to generate it
# based on the app state information provided by the AppStateCentral -object.
class dbtest{

    static function get($sql){

        $servername = 'localhost';
        $dbname = 'web_serv_cms_project_1';
        $username = 'wscp1-admin';
        $password = '';
        //connects
        $conn = new mysqli($servername, $username, $password, $dbname);

        //check connections
        //if($conn-> connect_error) {
        //    die("Connection failed: " . $conn->connect_error);
        //} else {
        //    echo '';
        //}

        //SQL STATEMENT
        $sql = "SELECT * FROM users_main";

        //SAVE RESULTS IN VAR
        $result = $conn->query($sql);

        //CLOSE CONNECTION
        $conn->close();

        return $result;
    }
}

$result = dbtest::get('SELECT * FROM users_main');


?>
<table>
    <th>Name</th><th>Annual Salary</th><th>View Profile</th>
    <?php
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["name"] . '</td><td>' . $row["annual_salary"] .
        '</td><td><a href="' . getContextRoot() .'person/' . $row["name_url_encoded"].'">' . ' ' . $row["name_url_encoded"].'</a></td>';
    }
    ?>
</table>


<p>This is the feed. <?php echo 'Client ID: ' . $app_state_central->getClientId() ?></p>

