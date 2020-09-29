<?php
class person {
    var $age;
    function output() {
        echo $this->age;
    }
    function setAge($age) {
        $this->age = $age;
    }
}
?>