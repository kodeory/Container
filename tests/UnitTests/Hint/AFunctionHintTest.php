<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Tests\UnitTests\Hint;

use Kodeory\Container\Hint\AFunctionHint;
use Kodeory\Container\Hint\ArgumentHint;
use Kodeory\Container\Tests\UnitTests\Hint\BasicHinterTest;
/**
 * Description of AFunctionHintTest
 *
 * @author Michal
 */
class AFunctionHintTest extends BasicHinterTest
{

    private $ArgumentHintMock;
    
    public function setUp(): void
    {
        $this->Hinter = $this->getMockForAbstractClass(AFunctionHint::class);   
        $this->setUpArgumentMock();
    }
    
    public function setUpArgumentMock(): void
    {
        $this->ArgumentHintMock = $this->getMockBuilder(ArgumentHint::class)
                                       ->disableOriginalConstructor()
                                       ->getMock();        
    }

    public function testSetUpParameter(): void
    {
        $this->assertNull($this->Hinter->getParameterArgument('ParameterName'));
        
        $FunctionHint = $this->Hinter->setUpParameter('ParameterName', $this->ArgumentHintMock);
        $this->assertNotSame($this->Hinter, $FunctionHint);
        $this->assertSame($this->ArgumentHintMock, $FunctionHint->getParameterArgument('ParameterName'));
    }

    public function testSetUpType(): void
    {
        $this->assertNull($this->Hinter->getTypeArgument('string'));
        
        $FunctionHintWithType = $this->Hinter->setUpType('string', $this->ArgumentHintMock);        
        $this->assertNotSame($this->Hinter, $FunctionHintWithType);        
        $this->assertSame($this->ArgumentHintMock, $FunctionHintWithType->getTypeArgument('string'));  
    }

    public function testSetUpArgument(): void
    {
        $FunctionHintWArguments = $this->Hinter->setUpArgument($this->ArgumentHintMock)->setUpArgument($this->ArgumentHintMock);
        
        $Generator = $FunctionHintWArguments->getArgumentsGenerator();
        $this->assertInstanceOf(\Generator::class, $Generator);
        $this->assertSame($this->ArgumentHintMock, $Generator->current());
        
        $Generator->next();
        $this->assertSame($this->ArgumentHintMock, $Generator->current());        
    }
}