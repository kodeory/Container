<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Tests\UnitTests\Hint;

use PHPUnit\Framework\TestCase;
use Kodeory\Container\Hint\BasicHinter;

/**
 * Description of BasicHinterTest
 *
 * @author Michal
 */
class BasicHinterTest extends TestCase
{
    protected $Hinter;
    
    public function setUp(): void
    {
        $this->Hinter = $this->getMockForAbstractClass(BasicHinter::class);
    }
    
    public function testSubstituteAndGetSubstitutions()
    {
        $this->assertNull($this->Hinter->getSubstitutions());
        
        $Substitutions = [
            'InstanceName' => 'SubstName',
            'InstanceName2' => 'SubstName2',
            'InstanceName3' => 'SubstName3',
            'InstanceName4' => 'SubstName4'
        ];
        $HinterWSubst = $this->Hinter->substitute($Substitutions);
        $this->assertNotSame($this->Hinter, $HinterWSubst);
        $this->assertSame($Substitutions, $HinterWSubst->getSubstitutions());
        
        $HinterWAddSubst = $HinterWSubst->substitute(['InstanceName2' => 'SubstName5']);
        $this->assertSame('SubstName5', $HinterWAddSubst->getSubstitutions()['InstanceName2']);
    }
    
    public function testShareInstancesAndGetSharedInst()
    {
        $this->assertNull($this->Hinter->getSharedInstances());
        
        $SharedInstances = [
            'InstanceName',
            'InstanceName2'
        ];
        
        $HinterWSharedI = $this->Hinter->shareInstances($SharedInstances);
        $this->assertNotSame($this->Hinter, $HinterWSharedI);
        $this->assertSame($SharedInstances, $HinterWSharedI->getSharedInstances());
        
        $HinterWAddSharedI = $HinterWSharedI->shareInstances(['InstanceName3']);
        $this->assertContains('InstanceName3', $HinterWAddSharedI->getSharedInstances());
    }
}
