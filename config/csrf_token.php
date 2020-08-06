<?php

function generate_new_token(){
    $_SESSION['csrf_token'] = bin2hex(random_bytes(64));//bikin kumpulan byte yang panjangnya 64 dan dibikin jadi hex
    //die($_SESSION['csrf_token']);
}

if(!isset($_SESSION['csrf_token'])){
   generate_new_token(); 
}

?>