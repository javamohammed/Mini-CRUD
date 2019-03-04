<?php

if (! function_exists('Lang')) {
    function Lang() {
        if(session()->has('lang')){
             App::setLocale(session()->get('lang'));
        }else{
             App::setLocale('en');
        }
    }
}


if (! function_exists('setLang')) {
    function setLang($language) {
        session()->put('lang',$language);
        //return session()->get('lang');
    }
}
