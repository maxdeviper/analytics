<?php

use Maxdeviper\Analytics\AnalyticsHelper;

class AnalyticsHelperTest extends PHPUnit_Framework_TestCase
 {
     
 
     /**
      * fills missing date in the data provided
      *
      * @test
      */
     public function it_fills_missing_date_provided_in_the_data()
     {
 		$data=[
			    [ 'y'=>'2015-09-18', 'a'=>28],
			    [ 'y'=>'2015-09-25', 'a'=>1 ],
			    [ 'y'=>'2015-09-30', 'a'=>1 ],
			    [ 'y'=>'2015-10-05', 'a'=>3 ]
 			];
 		$dateKey="y";
 		$actualPaddedResult=AnalyticsHelper::fillDateGaps($data,$dateKey,['a'=>0]);
 		$expectedPaddedResult=[
			    [ 'y'=>'2015-09-18', 'a'=>28],
			    [ 'y'=>'2015-09-19', 'a'=>0 ],
			    [ 'y'=>'2015-09-20', 'a'=>0 ],
			    [ 'y'=>'2015-09-21', 'a'=>0 ],
			    [ 'y'=>'2015-09-22', 'a'=>0 ],
			    [ 'y'=>'2015-09-23', 'a'=>0 ],
			    [ 'y'=>'2015-09-24', 'a'=>0 ],
			    [ 'y'=>'2015-09-25', 'a'=>1 ],
			    [ 'y'=>'2015-09-26', 'a'=>0 ],
			    [ 'y'=>'2015-09-27', 'a'=>0 ],
			    [ 'y'=>'2015-09-28', 'a'=>0 ],
			    [ 'y'=>'2015-09-29', 'a'=>0 ],
			    [ 'y'=>'2015-09-30', 'a'=>1 ],
			    [ 'y'=>'2015-10-01', 'a'=>0 ],
			    [ 'y'=>'2015-10-02', 'a'=>0 ],
			    [ 'y'=>'2015-10-03', 'a'=>0 ],
			    [ 'y'=>'2015-10-04', 'a'=>0 ],
			    [ 'y'=>'2015-10-05', 'a'=>3 ],
 			];
 			$this->assertCount(count($expectedPaddedResult), $actualPaddedResult);
 		$this->assertEquals($expectedPaddedResult, $actualPaddedResult,"The data should have its missing dates present and its data value set to zero");
     }

      /**
      * fills missing date in the duration given of the data provided
      *
      * @test
      */
     public function it_fills_missing_date_in_duration_given_of_data()
     {
 		$data=[
			    [ 'y'=>'2015-09-18', 'a'=>28],
			    [ 'y'=>'2015-09-25', 'a'=>1 ],
			    [ 'y'=>'2015-09-30', 'a'=>1 ],
			    [ 'y'=>'2015-10-05', 'a'=>3 ],
 			];
 		$dateKey="y";
 		$actualPaddedResult=AnalyticsHelper::fillDurationGaps($data,['start'=>new DateTime('2015-09-18'),'end'=>new DateTime('2015-10-08')],$dateKey,['a'=>0]);
 		$expectedPaddedResult=[
			    [ 'y'=>'2015-09-18', 'a'=>28],
			    [ 'y'=>'2015-09-19', 'a'=>0 ],
			    [ 'y'=>'2015-09-20', 'a'=>0 ],
			    [ 'y'=>'2015-09-21', 'a'=>0 ],
			    [ 'y'=>'2015-09-22', 'a'=>0 ],
			    [ 'y'=>'2015-09-23', 'a'=>0 ],
			    [ 'y'=>'2015-09-24', 'a'=>0 ],
			    [ 'y'=>'2015-09-25', 'a'=>1 ],
			    [ 'y'=>'2015-09-26', 'a'=>0 ],
			    [ 'y'=>'2015-09-27', 'a'=>0 ],
			    [ 'y'=>'2015-09-28', 'a'=>0 ],
			    [ 'y'=>'2015-09-29', 'a'=>0 ],
			    [ 'y'=>'2015-09-30', 'a'=>1 ],
			    [ 'y'=>'2015-10-01', 'a'=>0 ],
			    [ 'y'=>'2015-10-02', 'a'=>0 ],
			    [ 'y'=>'2015-10-03', 'a'=>0 ],
			    [ 'y'=>'2015-10-04', 'a'=>0 ],
			    [ 'y'=>'2015-10-05', 'a'=>3 ],
			    [ 'y'=>'2015-10-06', 'a'=>0 ],
			    [ 'y'=>'2015-10-07', 'a'=>0 ],
			    [ 'y'=>'2015-10-08', 'a'=>0 ],
 			];
 		$this->assertCount(count($expectedPaddedResult), $actualPaddedResult);
 		$this->assertEquals($expectedPaddedResult, $actualPaddedResult,"The data should have its missing dates present and its data value set to zero");
     }
     /**
      * fills missing date in the duration given of the data provided
      *
      * @test
      */
     public function it_fills_missing_Months_in_duration_given_of_data()
     {
 		$data=[
			    [ 'y'=>'2015-04', 'a'=>28],
			    [ 'y'=>'2015-09', 'a'=>1 ],
			    [ 'y'=>'2015-11', 'a'=>1 ],
			    [ 'y'=>'2015-12', 'a'=>3 ],
 			];
 		$dateKey="y";
 		$actualPaddedResult=AnalyticsHelper::fillMonthsGaps($data,[
 			'start'=>(new DateTime('2015-12'))->modify('-12 months'),
 			'end'=>new DateTime('2015-12')],
 			$dateKey,
 			['a'=>0],
 			'Y-m'
 			);
 		$expectedPaddedResult=[
			    [ 'y'=>'2015-01', 'a'=>0 ],
			    [ 'y'=>'2015-02', 'a'=>0 ],
			    [ 'y'=>'2015-03', 'a'=>0 ],
			    [ 'y'=>'2015-04', 'a'=>28],
			    [ 'y'=>'2015-05', 'a'=>0 ],
			    [ 'y'=>'2015-06', 'a'=>0 ],
			    [ 'y'=>'2015-07', 'a'=>0 ],
			    [ 'y'=>'2015-08', 'a'=>0 ],
			    [ 'y'=>'2015-09', 'a'=>1 ],
			    [ 'y'=>'2015-10', 'a'=>0 ],
			    [ 'y'=>'2015-11', 'a'=>1 ],
			    [ 'y'=>'2015-12', 'a'=>3 ],
 			];
 		$this->assertCount(count($expectedPaddedResult), $actualPaddedResult);
 		$this->assertEquals($expectedPaddedResult, $actualPaddedResult,"The data should have its missing dates present and its data value set to zero");
     }
 } 