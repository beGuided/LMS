<?php

class Teacher extends Db_object {

    protected static $db_table = "teacher";
    protected static $db_table_field = array('first_name','last_name','email','password','image','class_id','user_role','image');
    public $id;
    public $first_name;
    public $last_name;
    public $password;
    public $email;
    public $class_id;
    public $user_role = "teacher";

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



    public static function verify_user($email, $password){
        global $database;
        $email = $database->escape_string($email);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " .self::$db_table." WHERE ";
        $sql .= "email = '$email'";
        $sql .= " AND password = '$password'";
       // $sql .= "LIMIT 1";

        $the_result_array = self:: find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }





} //END OF USER CLASS

