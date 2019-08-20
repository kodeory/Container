<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Tests\UnitTests\Hint;

use PHPUnit\Framework\TestCase;
use Kodeory\Container\Hint\FunctionHint;

/**
 * Description of FunctionHintTest
 *
 * @author Michal
 */
class FunctionHintTest extends AFunctionHintTest
{
    
    public function setUp(): void
    {
        $this->Hinter = new FunctionHint('FunctionName');
        $this->setUpArgumentMock();
    }
    
    public function testConstructorAndGetter(): void
    {
        $FunctionHint = new FunctionHint('FunctionName');
        $this->assertSame('FunctionName', $FunctionHint->getFunctionName());
    }    
    
}
