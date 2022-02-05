<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function charlength($str, $length) {
    if (strlen($str) <= $length) {
        return $str;
    } else {
        $y = substr($str, 0, $length) . '..';
        return $y;
    }
}
