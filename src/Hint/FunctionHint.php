<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of FunctionHint
 *
 * @author Michal
 */
class FunctionHint extends AFunctionHint
{
    /**
     * @var string Name of Function/Method  
     */
    private $FunctionName;
    
    /**
     * @param string $FunctionName Name of function
     */
    public function __construct(string $FunctionName)
    {
        $this->FunctionName = $FunctionName;
    }
    
    /**
     * Returns name of Function
     * 
     * @return string
     */    
    public function getFunctionName(): string
    {
        return $this->FunctionName;
    }
}
