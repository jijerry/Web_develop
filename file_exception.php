<?php
/**
 * Created by PhpStorm.
 * Author: jerry
 * Last modified: 2018/6/12
 * 文件I/O相关异常
 * 异常包含：文件无法打开，无法获得写锁，文件无法写入
 */

class fileOpenException extends Exception{

    function __toString()
    {
        return "fileOpenException ". $this->getCode()
            . ": ". $this->getMessage()."<br />"." in "
            . $this->getFile(). " on line ". $this->getLine()
            . "<br />";

    }
}

class fileWriteException extends Exception{

    function __toString()
    {
        return "fileWriteException ". $this->getCode()
            . ": ". $this->getMessage()."<br />"." in "
            . $this->getFile(). " on line ". $this->getLine()
            . "<br />";
    }
}

class fileLockException extends Exception{

    function __toString()
    {
        return "fileLockException ". $this->getCode()
            . ": ". $this->getMessage()."<br />"." in "
            . $this->getFile(). " on line ". $this->getLine()
            . "<br />";
    }

}