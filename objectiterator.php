<?php
/**
 * Created by PhpStorm.
 * Author: jerry
 * Last modified: 2018/6/11
 * 迭代器和迭代实例基类
 */

class ObjectIterator implements Iterator{
    private $obj;
    private $count;
    private $currentIndex;

    function __construct($obj)
    {
        $this->obj = $obj;
        $this->count = count($this->obj->data);
    }

    function rewind()
    {
        $this->currentIndex = 0;
    }

    function valid()
    {
        return $this->currentIndex < $this->count;
        // TODO: Implement valid() method.
    }

    function key()
    {
        return $this->currentIndex;
        // TODO: Implement key() method.
    }

    function current()
    {
        return $this->obj->data[$this->currentIndex];
        // TODO: Implement current() method.
    }

    function next()
    {
        $this->currentIndex++;
        // TODO: Implement next() method.
    }
}

class Objecte implements IteratorAggregate{

    public $data = array();

    function __construct($in)
    {
        $this->data = $in;
    }

    function getIterator()
    {
        return new ObjectIterator($this);
        // TODO: Implement getIterator() method.
    }
}

$myObject = new Objecte(array(2, 4, 6, 8, 10));
$myIterator = $myObject->getIterator();
for ($myIterator->rewind(); $myIterator->valid(); $myIterator->next()){
    $key = $myIterator->key();
    $value = $myIterator->current();
    echo $key. "=>" .$value. "<br/>";
}