<?php

namespace Maxdeviper\Analytics;
use DateTime;
use DatePeriod;
use DateInterval;

class AnalyticsHelper
{
    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        // constructor body
    }

    /**
     * Add missing Dates in data provided
     *
     * @param array $data array containing data
     * @param string $dateKey the array key to retrieve the dates in data
     *
     * @return array Returns the the array data with missing dates with values
     */
    public static function fillDateGaps($data,$dateKey,$defaults)
    {
        $result=[];
        $endDate=(new DateTime(end($data)[$dateKey]));
        $startDate=new DateTime(reset($data)[$dateKey]);
        $duration=[
            'start'=>$startDate,
            'end'=>$endDate,
        ];
        return static::fillDurationGaps($data,$duration,$dateKey,$defaults);
    }
    /**
     * Add missing Dates in data provided
     *
     * @param array $data array containing data
     * @param string $dateKey the array key to retrieve the dates in data
     *
     * @return array Returns the the array data with missing dates with values
     */
    public static function fillMonthsGaps($data,$duration,$dateKey,$defaults,$dateFormat='M')
    {
        $result=[];
        $endDate=$duration['end'];
        $startDate=$duration['start']->add(new DateInterval('P1M'));
        $duration=[
            'start'=>$startDate,
            'end'=>$endDate,
        ];
        return static::fillDurationGaps($data,$duration,$dateKey,$defaults,$dateFormat,'P1M');
    }

     /**
     * Add missing dates within a date range
     *
     * @param array $data array containing data.
     * @param array $range an array keys "start" and "end" with values
     *                     start date and end date respectively.
     * @param string $dateKey the array key to retrieve the dates in data.
     * @param array $defaults data to be included with added dates.
     *
     * @return array Returns the the array data with missing dates with values.
     */
    public static function fillDurationGaps($data,$range,$dateKey,$defaults,$dateFormat='Y-m-d',$interval='P1D')
    {
        $result=[];
        $interval=new DateInterval($interval);
        $endDate=$range['end']->add($interval);
        $currentData=reset($data);
        $startDate=$range['start'];
        $period=new DatePeriod($startDate,$interval,$endDate);
        foreach ($period as $key=>$date) {
        // while (list($key,$date)=each($period)) {

            // foreach($data as $value){
            //     if(new DateTime($value[$dateKey])==$date){
            //         $result[]=$value;
            //         break;
            //     }
            //     $newData[$dateKey]=$date->format('Y-m-d');
            //     $result[]=array_merge($newData,$defaults);
            //     break;
            // }
            $dataTime=new DateTime($currentData[$dateKey]);
            if(current($data)&&$dataTime->format($dateFormat)==$date->format($dateFormat)){
                    $result[]=$currentData;
                    $currentData=next($data);
                    continue;
                }
            $newData[$dateKey]=$date->format($dateFormat);
            $result[]=array_merge($newData,$defaults);         
        }
        return $result;
    }
}
