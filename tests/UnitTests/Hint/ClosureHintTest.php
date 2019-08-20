<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Tests\UnitTests\Hint;

use Kodeory\Container\Hint\ClosureHint;

/**
 * Description of ClosureHintTest
 *
 * @author Michal
 */
class ClosureHintTest extends AFunctionHintTest
{
    public function setUp(): void
    {
        $this->Hinter = new ClosureHint(function() {});
        $this->setUpArgumentMock();
    }
    
    public function testConstructorAndGetter(): void
    {
        $Closure = function($Param) {};
        $ClosureHint = new ClosureHint($Closure);
        $this->assertSame($Closure, $ClosureHint->getClosure());
    }
}
