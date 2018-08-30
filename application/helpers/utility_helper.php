<?php

function asset_url(){
   return base_url().'assets/';
}

function css_url(){
   return base_url().'assets/css';
}

function print_f($data){
    print_r("<pre>");
    print_r($data);
    print_r("</pre>");
    return true;
}
