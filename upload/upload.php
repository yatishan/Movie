<?php
class Upload{
    public $file;
    public $formats=['image/png','image/jpeg'];
    public function __construct($file)
    {
        $this->file=$file;
        // $this->format=$format;
    }
    public function isValidformat(){
        return in_array($this->file['type'],$this->formats);
    }
    public function uploadNow(){
        $result=move_uploaded_file($this->file["tmp_name"],
        "../../upload/".$this->file["name"]);
        return $result;
    }
}