<?php 

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of AFunctionHint
 *
 * @author Michal
 */
abstract class AFunctionHint extends BasicHinter
{    
    /**
     * @var mixed[] Arguments for specific Parameter
     */
    private $ParameterArguments = [];
    
    /**
     * @var mixed[] Arguments for specific types
     */
    private $TypeArguments = [];
    
    /**
     * @var mixed[]
     */
    private $Arguments = [];
    
    /**
     * Sets up Argument for specific parameter  
     * 
     * @param string $ParameterName Name of Parameter to setUp hint for
     * @param \Kodeory\Container\Hint\ArgumentHint $Argument Argument which should be used for this parameter
     * @return \Kodeory\Container\Hint\FunctionHint Returns FunctionHint with added Argument
     */
    public function setUpParameter(string $ParameterName, ArgumentHint $Argument): AFunctionHint
    {
        $ClonedFunctionHint = clone $this;
        $ClonedFunctionHint->ParameterArguments[$ParameterName] = $Argument;
        return $ClonedFunctionHint;
    }
    
    /**
     * Returns ArgumentHint for specific parameter or null if it is not set up
     * 
     * @param string $ParameterName
     * @return \Kodeory\Container\Hint\ArgumentHint|null 
     */
    public function getParameterArgument(string $ParameterName): ?ArgumentHint
    {
        return $this->ParameterArguments[$ParameterName] ?? null;
    }
    
    /**
     * Sets up Argument for specific type - string, int, array, bool, etc.
     * 
     * @param string $TypeName Name of Type to set up argument for
     * @param \Kodeory\Container\Hint\ArgumentHint $Argument Argument which should be used for specific type
     * @return \Kodeory\Container\Hint\FunctionHint Returns FunctionHint with added Argument
     */
    public function setUpType(string $TypeName, ArgumentHint $Argument): AFunctionHint
    {
        $ClonedFunctionHint = clone $this;
        $ClonedFunctionHint->TypeArguments[$TypeName] = $Argument;
        return $ClonedFunctionHint;
    }
    
    /**
     * Returns Argument for specific type or null if it is not set up
     * 
     * @param string $Type
     * @return \Kodeory\Container\Hint\ArgumentHint|null
     */
    public function getTypeArgument(string $Type): ?ArgumentHint
    {
        return $this->TypeArguments[$Type] ?? null;
    }
    
    /**
     * Add Argument which will be used in function call
     * 
     * @param \Kodeory\Container\Hint\ArgumentHint $Argument ArgumentHint which should be added
     * @return \Kodeory\Container\Hint\FunctionHint Returns FunctionHint with added Argument
     */
    public function setUpArgument(ArgumentHint $Argument): AFunctionHint
    {
        $ClonedFunctionHint = clone $this;
        $ClonedFunctionHint->Arguments[] = $Argument;
        return $ClonedFunctionHint;        
    }
    
    /**
     * Returns \Generator of defined ArgumentHint(s)
     * 
     * @return \Generator|\Kodeory\Container\Hint\ArgumentHint
     */
    public function getArgumentsGenerator(): \Generator
    {
        yield from $this->Arguments;
    }
}
