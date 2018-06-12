<?php
/**
 * Created by PhpStorm.
 * Author: jerry
 * Last modified: 2018/6/12
 * 用户定义异常类实例
 */

class myException extends Exception{

    function __toString()
    {
        return "<table border=\"1\">
       <tr>
       <td><strong>Exception ".$this->getCode()."
       </strong>: ".$this->getMessage()."<br />"."
       in ".$this->getFile()." on line ".$this->getLine()."
       </td>
       </tr>
       </table><br />";
    }
}

try{
    throw new myException("A terriable error has occurred", 42);
}
catch (myException $m){
    echo $m;
}