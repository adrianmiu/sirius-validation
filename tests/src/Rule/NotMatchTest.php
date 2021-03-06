<?php

namespace Sirius\Validation\Rule;

use Sirius\Validation\DataWrapper\ArrayWrapper;
use Sirius\Validation\Rule\NotMatch as Rule;

class NotMatchTest extends \PHPUnit\Framework\TestCase
{

    protected function setUp(): void
    {
        $this->rule = new Rule();
        $this->rule->setContext(
            new ArrayWrapper(
                array(
                    'password' => 'secret'
                )
            )
        );
    }

    function testValidationWithItemPresent()
    {
        $this->rule->setOption(Rule::OPTION_ITEM, 'password');
        $this->assertFalse($this->rule->validate('secret'));
        $this->assertTrue($this->rule->validate('abc'));
    }

    function testValidationWithoutItemPresent()
    {
        $this->assertFalse($this->rule->validate('abc'));
        $this->assertFalse($this->rule->validate(null));
    }

}
