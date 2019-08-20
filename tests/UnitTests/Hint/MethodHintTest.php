<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Tests\UnitTests\Hint;

use Kodeory\Container\Hint\MethodHint;

/**
 * Description of MethodHintTest
 *
 * @author Michal
 */
class MethodHintTest extends AFunctionHintTest
{
    public function setUp(): void
    {
        $this->Hinter = new MethodHint('ClassName', 'MethodName');
        $this->setUpArgumentMock();
    }
    
    public function testGetClassName()
    {
        $MethodHint = new MethodHint('ClassName', 'MethodName');
        $this->assertSame('ClassName', $MethodHint->getClassName());
    }
    
    public function testGetMethodName()
    {
        $MethodHint = new MethodHint('ClassName', 'MethodName');
        $this->assertSame('MethodName', $MethodHint->getMethodName());        
    }
}
