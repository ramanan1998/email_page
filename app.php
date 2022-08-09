<?php

function connect_db(){  //connecting database
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "email_table";

    $connect = mysqli_connect($server, $username, $password, $db);

    if(!$connect){
        die("Error connecting database");
    }
    return $connect;
}

function add_favorites(){ //Adding favourite email
    if(isset($_POST["favorite-btn"])){
        $favorite_user = $_POST["favorite-btn"];
        $sql = "UPDATE email_inbox SET is_favorite = '1' WHERE id = '$favorite_user'";

        return mysqli_query(connect_db(), $sql);
    }
}
add_favorites();

function delete_email(){  //delete email from inbox or favorites
    if(isset($_POST["delete-btn"])){
        $delete_email = $_POST["delete-btn"];
        $sql = "DELETE FROM email_inbox WHERE id = '$delete_email'";

        return mysqli_query(connect_db(), $sql);
    }
}
delete_email();

function fetch_email($value){  //fetch email from the database

    $sql = "";

    if($value == "favorite"){
        $sql = "SELECT * FROM email_inbox WHERE is_favorite = '1'";
    }else{
        $sql = "SELECT * FROM email_inbox";
    }

    $res = mysqli_query(connect_db(), $sql);
    $result_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $result_array;
}

$email_list = fetch_email($_GET["mail-btn"] ?? "inbox");

function view_email($email_list){
    if(empty($email_list)){
        return "0";  
    }
    if(isset($_POST["view-email-btn"])){
        return $_POST["view-email-btn"];
    }
    return $email_list[0]["id"];
}

$view_email = view_email($email_list);




