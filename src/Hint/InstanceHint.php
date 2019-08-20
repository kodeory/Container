<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of InstanceHint
 *
 * @author Michal
 */
class InstanceHint extends BasicHinter
{
    /**
     * @var string Name of Instance 
     */
    private $InstanceName;
    
    /**
     * @var bool Defines if instance should be shared or not
     */
    private $Shared;
    
    /**
     * @var string Name of SuperInstance 
     */
    private $SuperInstance;
    
    /**
     * @var AFunctionHint Hint for function where this instance should be initiated 
     */
    private $Initiator;
    
    public function __construct(string $InstanceName)
    {
        $this->InstanceName = $InstanceName;
    }
    
    public function getInstanceName(): string
    {
        return $this->InstanceName;
    }
    
    public function share(bool $Share): InstanceHint
    {
        $SharedInstance = clone $this;
        $SharedInstance->Shared = $Share;
        return $SharedInstance;
    }
    
    public function isShared(): bool
    {
        return $this->Shared ?? false;
    }
    
    public function instanceOf(string $InstanceName): InstanceHint
    {
        $InstanceWithInstanceOf = clone $this;
        $InstanceWithInstanceOf->SuperInstance = $InstanceName;
        return $InstanceWithInstanceOf;
    }
    
    public function getSuperInstance(): ?string
    {
        return $this->SuperInstance;
    }
    
    public function createIn(AFunctionHint $FunctionHint): InstanceHint
    {
        $InstanceWithCreateIn = clone $this;
        $InstanceWithCreateIn->Initiator = $FunctionHint;
        return $InstanceWithCreateIn;
    }
    
    public function getInitiator(): ?AFunctionHint
    {
        return $this->Initiator;
    }
}
