<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of ArgumentHint
 *
 * @author Michal
 */
class ArgumentHint extends BasicHinter
{
    /**
     * @var mixed Argument's value 
     */
    private $Value;
    
    public function __construct($Value)
    {
        $this->Value = $Value;
    }
    
    public function getValue()
    {
        return $this->Value;
    }
}
