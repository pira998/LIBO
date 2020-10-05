<?php

class Students {

    private static $students = array();


    public function getInstance($StudentArray){
        while ($m = mysqli_fetch_array($StudentArray)) {
            if(!array_key_exists($m["id"], self::$students)) {
                self::$students[$m["id"]] = new Student($m);
                echo "hi";
            }
            echo "hhh";
            return self::$students[$m["id"]];

        }
    }



}
?>

