<?php
/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 7/11/2019
 * Time: 10:27 PM
 */

/**
 * Time: n^2
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum($nums, $target)
{
    $len = count($nums);
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if ($target == ($nums[$i] + $nums[$j])) {
                return [$i, $j];
            }
        }
    }

    return null;
}

/**
 * Time: n, Space: n
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum2($nums, $target)
{
    $len = count($nums);
    $map = array_flip($nums);

    for ($i = 0; $i < $len; $i++) {
        $r = $target - $nums[$i];
        if (array_key_exists($r, $map) && $map[$r] != $i) {
            return [$i, $map[$r]];
        }

    }
    return null;
}


$nums = [3, 2, 4];
$target = 6;

$start = microtime(true);
var_dump(twoSum($nums, $target), microtime(true) - $start);

$start = microtime(true);
var_dump(twoSum2($nums, $target),  microtime(true) - $start);