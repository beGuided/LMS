<?php

class Student extends Db_object {

    protected static $db_table = "student";
    protected static $db_table_field = array('first_name','last_name','email','password','std_class_id','std_parent_id','user_role','image');
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $std_class_id;
    public $std_parent_id;
    public $user_role="student";

    public $image;
    public $tmp_path;
    public $errors = array();
    public $upload_directory = "images";
    public $images_placeholder = "http://placehold.it/400*400&text=image";


    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
           echo  "There was no uploaded file here!";

        } else {
            $this->image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
//            $this->type = $file['type'];
//            $this->size = $file['size'];

        }

    }

    public function upload_photo(){

            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->image) || empty($this->tmp_path)) {
                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->image;
            // $target_path = "admin/images/{$this->image}";
            if (file_exists($target_path)) {
                $this->errors[] = "the file {$this->image} already exist";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
                    unset($this->tmp_path);
                    return true;

            } else {
                $this->errors[] = "the file directory probably does not have permission";
                return false;
            }


    }

    public function image_path_and_placeholder(){

        return empty($this->image)? $this->images_placeholder : $this->upload_directory.DS.$this->image;
    }


    
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

 
    public static function student_by_class_id($class_id){
        global $database;
        $class_id = $database->escape_string($class_id);
        
        $sql = "SELECT * FROM " .self::$db_table." WHERE ";
        $sql .= "std_class_id = '$class_id'";
        $sql .= " ORDER BY std_class_id ASC";
        return self::find_by_query($sql);
     
    } 
    
    public static function student_by_parent_id($parent_id){
        global $database;
        $parent_id = $database->escape_string($parent_id);
        
        $sql = "SELECT * FROM " .self::$db_table." WHERE ";
        $sql .= "std_parent_id = '$parent_id'";
        $sql .= " ORDER BY std_parent_id ASC";
        return self::find_by_query($sql);
     
    } 
    

} //END OF USER CLASS

