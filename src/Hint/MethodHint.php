<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of MethodHint
 *
 * @author Michal
 */
class MethodHint extends AFunctionHint
{
    /**
     * @var string Name of method 
     */
    private $MethodName;
    
    /**
     * @var string Name of class/instance 
     */
    private $ClassName;
    
    /**
     * 
     * @param string $ClassName
     * @param string $MethodName
     */
    public function __construct(string $ClassName, string $MethodName)
    {
        $this->ClassName = $ClassName;
        $this->MethodName = $MethodName;
    }
    
    public function getClassName(): string
    {
        return $this->ClassName;
    }
    
    public function getMethodName(): string
    {
        return $this->MethodName;
    }
}
