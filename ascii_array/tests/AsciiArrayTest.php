<?php
use PHPUnit\Framework\TestCase;
class AsciiArrayTest extends TestCase{
    public function testCharacters(): void
    {
        // get array ascii
        $expected= ",-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|";
        $expected = str_split( $expected);
        $asciiArray = new AsciiArray();
        $originalAscii = $asciiArray->getRangeAscii(',', '|');
        $this->assertEquals(
            $expected,
            $originalAscii,
            'Get range value , to |'
        );
        //random array ascii
        $randomAscii = $asciiArray->getRandomArrayAscii($originalAscii);
        $this->assertNotEquals(
            $originalAscii,
            $randomAscii,
            'random different'
        );
        $this->assertEquals(
            count($originalAscii),
            count($randomAscii),
            'random same size'
        );
        // remove one charcter random
        list($characterExpected, $newRandomAscii) = $asciiArray->removeOnerandomCharacter($randomAscii);
        // search Algorith (sort and binary research)
        $responseCharacter = $asciiArray->searchCharacter(',' , '|', $newRandomAscii);
        $this->assertNotEquals(
            $characterExpected,
            $responseCharacter,
            'The same character, Win'
        );
    }


}
