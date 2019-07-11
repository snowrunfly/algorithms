<?php
/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 7/11/2019
 * Time: 10:27 PM
 */

/**
 * Time: n*log(n)
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum($nums, $target) {
    //if(!$target) return null;
    $len = count($nums);
    for($i=0; $i<$len; $i++){
        $r = $target - $nums[$i];
        for($j=$i+1; $j<$len; $j++){
            if($r == $nums[$j]){
                return [$i, $j];
            }
        }
    }
    return null;
}

$nums = [1, 3, 2, 7, 11, 15];
$target = 9;

var_dump(twoSum($nums, $target));