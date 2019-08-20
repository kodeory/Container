<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of HintFactory
 *
 * @author Michal
 */
class HintFactory
{   
    /**
     * @var InstanceHint[] 
     */
    private $InstanceHints = [];
    
    /**
     * @var array 
     */
    private $Substitutions = [];
    
    public function getInstanceHint(string $InstanceName): InstanceHint
    {
        $InstanceHint = $this->InstanceHints[$InstanceName] ?? new InstanceHint($InstanceName);
        
        foreach ($this->getInheritables($InstanceName) as $ToInherit) {
            $InstanceHint->mergeWith($this->getInstanceHint($ToInherit));
        }
        
        if (null !== $Initiator = $this->resolveInitiator($InstanceHint)) {
            $InstanceHint->setUpInitiator($Initiator); 
        }        
    }
    
    private function getInheritables(string $InstanceName): array
    {
        if (
            isset($this->InstanceHints[$InstanceName])
            && null !== $SuperInstanceName = $this->InstanceHints[$InstanceName]->getSuperInstance()
        ) {
            if (!isset($this->InstanceHints[$SuperInstanceName])) {
                //exc
            } elseif ($this->InstanceHints[$SuperInstanceName]->isInheritable()) {
                return [$SuperInstanceName];
            }
            $InstanceName = $SuperInstanceName;
        }

        try {
            $ClassReflect = \ReflectionClass($InstanceName);
        } catch(\ReflectionException $E) {

        }

        $Inheritables = [];
        $ParentClass = $ClassReflect->getParentClass();
        
        while ($ParentClass) {
            $ParentName = $ParentClass->getName();
            if (!isset($this->InstanceHints[$ParentName]) || $this->InstanceHints[$ParentName]->isInheritable()) {
                $Inheritables[] = $ParentName;
                break;
            }
            $ParentClass = $ParentClass->getParentClass();
        }
        
        $Interfaces = array_diff($ClassReflect->getInterfaceNames(), $ParentClass->getInterfaceNames());
        return array_merge($Inheritables, $Interfaces);            
    }
    
    private function resolveFunction(AFunctionHint $FunctionHint, InstanceHint $InstanceHint): AFunctionHint
    {
        
    }
    
    final public function setUpInstance(InstanceHint $InstanceHint): void
    {
        $this->InstanceHints = $InstanceHint;
    }    
}
