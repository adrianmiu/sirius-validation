<?php
namespace Sirius\Validation;

class RuleCollectionTest extends \PHPUnit_Framework_TestCase {
    
    function setUp() {
        $this->collection = new RuleCollection();
    }
    
    function testAddAndRemove() {
        $this->collection->add(new Rule\Required);
        $this->assertEquals(1, count($this->collection));

        $this->collection->remove(new Rule\Required);
        $this->assertEquals(0, count($this->collection));
    }

    function testIterator() {
        $this->collection->add(new Rule\Email);
        $this->collection->add(new Rule\Required);
        
        $rules = array();
        foreach ($this->collection as $k => $rule) {
            $rules[] = $rule;
        }
        $this->assertTrue($rules[0] instanceof Rule\Required);
        $this->assertTrue($rules[1] instanceof Rule\Email);
    }
}