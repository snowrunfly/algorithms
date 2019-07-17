<?php
/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 7/17/2019
 * Time: 9:26 PM
 */

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s)
{
    if (!$s) return 0;

    $max = 0;

    $chars = str_split($s);
    $sub[$chars[0]] = 1;
    for ($i = 1; $i < count($chars); $i++) {
        $char = $chars[$i];
        if (array_key_exists($char, $sub)) {
            $max = max($max, count($sub));
//            var_dump($sub);

            if ($chars[$i - 1] == $char) {
                unset($sub);
            } else {
                $sub[$char] = -1; //flag
                //delete all items in front of the flag
                foreach ($sub as $key => $val) {
                    if($val == -1)
                        break;
                    array_shift($sub);
                }
                //delete flag it self
                unset($sub[$char]);
            }
        }
        $sub[$char] = 1;
    }
    var_dump($sub);
    return max($max, count($sub));

}

$str ="ckilbkd"; //' ';// 'dvdf';//'abcabdabcaaa';

//var_dump(str_split($str));
var_dump(lengthOfLongestSubstring($str));