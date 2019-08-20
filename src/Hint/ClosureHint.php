<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of ClosureHint
 *
 * @author Michal
 */
class ClosureHint extends AFunctionHint
{
    private $Closure;
    
    public function __construct(\Closure $Closure)
    {
        $this->Closure = $Closure;
    }
    
    public function getClosure(): \Closure
    {
        return $this->Closure;
    }
}
