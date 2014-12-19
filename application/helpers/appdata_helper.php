<?php

    function App_getName(){
        return "SmartForSales";
    }

    function App_getVersion(){
        return "0.2.0";
    }

    function App_getNameAndVersion(){
        return App_getName()." v".App_getVersion(); 
    }

    function getIndex(){
        return "index.php";    
    }

?>