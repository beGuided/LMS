<?php

class School_level extends Db_object {

    protected static $db_table = "class";
    protected static $db_table_field = array('first_name','last_name','email','password','user_role',);
    public $id;
    public $first_name;
    public $last_name;
    public $password;
    public $email;


    public static function verify_user($last_name, $password){
        global $database;
        $last_name = $database->escape_string($last_name);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " .self::$db_table." WHERE ";
        $sql .= "last_name = '$last_name'";
        $sql .= " AND password = '$password'";
       // $sql .= "LIMIT 1";

        $the_result_array = self:: find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    






} //END OF USER CLASS

