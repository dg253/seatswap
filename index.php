<?php

/*
SeatSwap PHP Code
Author: David Garcia
Date: Wed, February 26,2014
Note: Print 1-100, multiples of 3 print "Seat", multiples of 5 print "Swap", multiples of 3&5 print "SeatSwap"
*/

$program = new program();

class program
{
    function __construct()
    {
        $page = 'homepage';
        $arg  = NULL;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        }
        if (isset($_REQUEST['arg'])) {
            $arg = $_REQUEST['arg'];
        }
    
        $page = new $page($arg);
    }

    function __destruct()
    {
    }
}

abstract class page {
    public $content;

    function menu()
    {
        //menu for the homepage to display
        $menu = '<a href="./index.php?page=homepage">Home</a> </br>';
        $menu .= '<a href="./index.php?page=code">SeatSwap Code</a></br>';
        return $menu;
    }
    
    function __construct($arg = NULL)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->get();
        } else {
            $this->post();
        }
    }

    function get()
    {
    }

    function post()
    {
    }

    function __destruct()
    {   
        echo $this->content;
    }
    
	//perform function
	function numberSorter($start,$end,$multiple){
	for($i = $start; $i <= $end; $i++){
		if(!$this->checkMultiple($i,$multiple)){
			echo 'seat'. "</br>";
		}else{
			echo $i. "</br>";
		}
	}
	}
	
	//return multiples of 3
	function checkMultiple($number,$multiple){
		$result = fmod($number,$multiple);
		return $result;
	}
	
	//returns muliples of 5
	
	//return multiples of 3&5
}

class homepage extends page {
    function get()
    {
    $this->content .= $this->menu();
    }
}

class code extends page {
    function get()
    {
    $this->content .= $this->menu();
    $this->content .= $this->numberSorter(1,100,3);
    }
}

?>
