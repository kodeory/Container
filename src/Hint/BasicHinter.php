<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Hint;

/**
 * Description of BasicHint
 *
 * @author Michal
 */
abstract class BasicHinter
{
    /**
     * @var array Array of substitutions (Key is instance which should be substitued, value is substitution)
     */
    private $Substitutions = [];
    
    /**
     * @var string[] Array of instances which should be shared 
     */
    private $SharedInstances = [];
    
    /**
     * Sets up instances which should be substitued
     * 
     * @param array $Substitutions
     * @return \Kodeory\Container\Hint\BasicHinter
     */    
    public function substitute(array $Substitutions): BasicHinter
    {
        $HinterWithSubst = clone $this;
        $HinterWithSubst->Substitutions = array_merge($this->Substitutions, $Substitutions);
        return $HinterWithSubst;
    }
    
    /**
     * Returns array of substitutions or null if no substitutions where defined
     * 
     * @return array|null
     */
    public function getSubstitutions(): ?array
    {
        return empty($this->Substitutions) ? null : $this->Substitutions;
    }    
    
    /**
     * Sets up instances which should be shared
     * 
     * @param array $SharedInstances
     * @return \Kodeory\Container\Hint\BasicHinter
     */
    public function shareInstances(array $SharedInstances): BasicHinter
    {
        $HinterWSharedI = clone $this;
        $HinterWSharedI->SharedInstances = array_merge($this->SharedInstances, $SharedInstances);
        return $HinterWSharedI;
    }
    
    public function getSharedInstances(): ?array
    {
        return empty($this->SharedInstances) ? null : $this->SharedInstances;
    }
}
