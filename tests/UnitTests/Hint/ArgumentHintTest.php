<?php

declare(strict_types=1);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kodeory\Container\Tests\UnitTests\Hint;

use Kodeory\Container\Hint\ArgumentHint;
/**
 * Description of ArgumentHintTest
 *
 * @author Michal
 */
class ArgumentHintTest extends BasicHinterTest
{
    public function setUp(): void
    {
        $this->Hinter = new ArgumentHint('Value');
    }
    
    /**
     * @dataProvider valueProvider
     * @param type $Value
     */
    public function testConstructAndGetValue($Value)
    {
        $ArgumentHint = new ArgumentHint($Value);
        
        $this->assertSame($Value, $ArgumentHint->getValue());
    }
    
    public function valueProvider(): array
    {
        return [
            ['string'],
            [1],
            [1.5],
            [array()]
        ];
    }
}
