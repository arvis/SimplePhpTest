<?php
/**
class for performing simple 


*/



class BasicTest{

	private $testClasses=array();
	private $test_results=array();
	private $tests_passed=0;
	private $tests_failed=0;
	
	function __construct() {
	}
	
	
	private function getMethods(){
	
	}

	/**
	goes through all test classes and executes all test methods
	to go through the test method has to start with test
	*/
	private function execAllMethods(){
		foreach ($this->testClasses as $test_class) {
			$methods=get_class_methods($test_class);
			//$methods=$test_class->get_class_methods();
			
			$ret_val;
			foreach ($methods as $method_name) {
				// if method name does not begin with test, ignore it
				
				if (substr($method_name, 0, 4)!="test") continue;
				$ret_val=$test_class->$method_name();
				
				echo "ret val is $ret_val <br>";
				if ($ret_val===true){ 
					$this->tests_passed++;
				}
				else {
					$this->tests_failed++;
					$ret_val=false;
				}
				
				$this->test_results[$method_name]=$ret_val;
			}
		}
	}

	
	//TODO: implement before and after class 
	
	/**
	adds class to test classes list
	@param $className class object
	*/
	
	public function addClass($className){
	//TODO: has to implement check thas checks if it is string or class object 
		
		array_push($this->testClasses,$className);
	
		return true;
	}
	
	/**
	generates test report header
	*/
	private function createResultsHeader(){
		if ($this->tests_failed==0){
			echo "Tests compleded successfully <br>";
		}
		else{
			echo "Tests compleded with ".$this->tests_failed." errors <br>";
		}
		echo "-------------------- <br>";
		
	}
	
	/**
	generates test report footer
	*/
	private function createResultsFooter(){
		echo "-------------------- <br>";
		echo "Tests passed: ".$this->tests_passed;
		echo " failed: ".$this->tests_failed." <br>";
	}
	
	
	/**
	runs all unit tests
	
	*/
	public function runTests(){
		$this->execAllMethods();
		
		//prints out all results
		//print_r($test_results);
		// TODO: make as table to look better
		//TODO: create class headers and stuff
		
		$this->createResultsHeader();
		
		foreach ($this->test_results as $function_name => $result) {
			if ($result){
				$result="SUCCESS";
				echo "+++ $function_name - $result<br />\n";
			}	
			else{
				$result="FAILURE";
				echo "--- $function_name - $result<br />\n";
			}	
		}
		$this->createResultsFooter();
		
	}




}
