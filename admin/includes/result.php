<?php


class Result extends Db_object
{
    protected static $db_table = "result";
    protected static $db_table_field = array('filename','student_id', 'std_class_id','teacher_id','file' );
    public $id;
    public $filename;
    public $student_id;
    public $std_class_id;
    public $teacher_id;
    public $file;
    

    public $tmp_path;
    public $upload_directory = "file/result";
    public $errors = array();

    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE in form",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partial uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
    );

    //This is passing $_FILES[''] as an argument
    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no uploaded file here!";
            return false;
        } elseif ($file['error'] != 0) {

            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;

        } else {
            $this->file = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            // $this->type = $file['type'];
            // $this->size = $file['size'];

        }

    }

    public function picture_path()
    {

        return $this->upload_directory . "/" . $this->file;
    }


    public function save(){
        if ($this->id) {
            $this->update();
        } else {
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->file) || empty($this->tmp_path)) {
                $this->errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->file;
            // $target_path = "admin/files/{$this->file}";
            if (file_exists($target_path)) {
                $this->errors[] = "the file {$this->file} already exist";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->errors[] = "the file directory probably does not have permission";
                return false;
            }

        }

    }

    public function delete_photo(){
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        } else {
            return "false";
        }

    }
    public static function result_by_author($teacher_id){
        global $database;
        $teacher_id = $database->escape_string($teacher_id);
        
        $sql = "SELECT * FROM " .self::$db_table." WHERE ";
        $sql .= "teacher_id = '$teacher_id'";
        $sql .= " ORDER BY teacher_id ASC";
        return self::find_by_query($sql);
     
    }
    public static function result_by_std_id($student_id){
        global $database;
        $student_id = $database->escape_string($student_id);
        
        $sql = "SELECT * FROM " .self::$db_table." WHERE ";
        $sql .= "student_id = '$student_id'";
        $sql .= " ORDER BY student_id ASC";
        return self::find_by_query($sql);
     
    }



}
