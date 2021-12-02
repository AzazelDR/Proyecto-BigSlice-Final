<?php
//CleverCloud DB PhpmyAdmin

require 'datadb.inc';

//LocalHost PHPmyAdmin
//require 'datadbOnline.inc';


//WebHost DB
//require 'databaseOnline.inc';


$db = mysqli_connect("$host", "$user", "$password", "$database");
if(!$db){
    //die("Coneccion Fallida".mysqli_connect_error());
}
else{
}
?>