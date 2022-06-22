<?php 

class Mobil {
    // function __construct() {
    //     $this->name = 'Honda';
    //     $this->url = 'http://www.honda.com/';
    // }
    function Mobil() {
        $this->name = 'BMW';
    }
}

$mobilBaru = new Mobil();

echo $mobilBaru->name; 
echo '<br>';
echo $mobilBaru->url;

?>