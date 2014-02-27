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
	function numberSorter($start,$end,$multiples){
		for($i = $start; $i <= $end; $i++) {
			$results = array();
			
			foreach ($multiples as $multiple) {
				//store TRUE or FALSE as value for key, which is $multiple
				$results[$multiple] = $this->checkMultiple($i,$multiple);
			}
			
			print_r($results);
			
			if($results[$multiples[0]] && $results[$multiples[1]]) {
				echo 'SeatSwap'. "</br>";
			}elseif($results[$multiples[1]]){
				echo 'Swap'. "</br>";
			}elseif($results[$multiples[0]]){
				echo 'Seat'. "</br>";
			}else{
				echo $i. "</br>";
			};
		}
	}
	
	//returns T or F if $number is a multiple of $multiple
	function checkMultiple($number,$multiple){
		$result = fmod($number,$multiple);
		if($result == 0){
			return TRUE;
		}
		return FALSE;
	}
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
    $this->content .= $this->numberSorter(1,100,array(3,5));
    }
}

?>
