<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Tests\UnitTests\Hint;

use Kodeory\Container\Hint\InstanceHint;
use Kodeory\Container\Hint\AFunctionHint;

/**
 * Description of InstanceHintTest
 *
 * @author Michal
 */
class InstanceHintTest extends BasicHinterTest
{
    
    public function setUp(): void
    {
        $this->Hinter = new InstanceHint('InstanceName');
    }
    
    public function testGetInstanceName()
    {
        $InstanceHint = new InstanceHint('InstanceName');
        $this->assertSame('InstanceName', $InstanceHint->getInstanceName());
    }
    
    public function testShare()
    {
        $InstanceHint = new InstanceHint('InstanceName');
        $this->assertFalse($InstanceHint->isShared());
        
        $SharedInstanceHint = $InstanceHint->share(true);
        $this->assertNotSame($InstanceHint, $SharedInstanceHint);
        $this->assertTrue($SharedInstanceHint->isShared());
    }
    
    public function testInstanceOf()
    {
        $InstanceHint = new InstanceHint('InstanceName');
        $this->assertNull($InstanceHint->getSuperInstance());
        
        $NamedInstance = $InstanceHint->instanceOf('SuperInstanceName');
        $this->assertNotSame($InstanceHint, $NamedInstance);
        $this->assertSame('SuperInstanceName', $NamedInstance->getSuperInstance());
    }
    
    public function testSubsitute()
    {
        $InstanceHint = new InstanceHint('InstanceName');
        $this->assertNull($InstanceHint->getSubstitutions());
        
        $WithSubsitut = $InstanceHint->substitute(['InstanceName' => 'Replacement']);
        $this->assertNotSame($InstanceHint, $WithSubsitut);
        $this->assertSame(['InstanceName' => 'Replacement'], $WithSubsitut->getSubstitutions());
    }
    
    public function testCreateIn()
    {
        $InstanceHint = new InstanceHint('InstanceName');
        $this->assertNull($InstanceHint->getInitiator());
        
        $FunctionHintMock = $this->getMockForAbstractClass(AFunctionHint::class);
        $InstanceWithCreateIn = $InstanceHint->createIn($FunctionHintMock);
        
        $this->assertNotSame($InstanceHint, $InstanceWithCreateIn);
        $this->assertSame($FunctionHintMock, $InstanceWithCreateIn->getInitiator());
    }
}
