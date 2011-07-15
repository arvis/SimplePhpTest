<?php
require_once 'basictest.php';

class SimpleClass{

	public function funct_one(){
		//print "this is testOne method<br>";
		return 1;
		
	}
	public function funct_two(){
		//print "this is testTwo method<br>";
		return 2;
	}

	public function othertestTwo(){
		print "this is not a test othertestTwo<br>";
	}

}

class TestSimpleClass{

	private $testClass; 
	function __construct() {
		$this->testClass= new SimpleClass();
	}


	public function test_funct_one(){
		$tst_var=$this->testClass->funct_one();
		return $tst_var==1;
		
		//print "this is testOne method<br>";
	}
	
	public function test_one_fail(){
		$tst_var=$this->testClass->funct_one();
		return $tst_var==5;
	}
	
	
	public function testTwo(){
		$tst_var=$this->testClass->funct_two();
		return $tst_var==5;
		//print "this is testTwo method<br>";
	}

	public function othertestTwo(){
		print "this is not a test othertestTwo<br>";
	}

}

//TODO: better testing of testing tools

$tst1=new TestSimpleClass();
$testing=new BasicTest();
$testing->addClass($tst1);
$testing->runTests();


