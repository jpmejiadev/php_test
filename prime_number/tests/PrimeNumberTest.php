<?php
use PHPUnit\Framework\TestCase;
class PrimeNumberTest extends TestCase{
    public function testGetMultiple(): void
    {
        $primeNumber = new PrimeNumber();
        $this->assertEquals(
            [1,2],
            $primeNumber->getMultiple(2)
        );
        $this->assertEquals(
            [1,2,3,6,7,14,21,42],
            $primeNumber->getMultiple(42)
        );
        $this->assertEquals(
            [1,97],
            $primeNumber->getMultiple(97)
        );
    }

    public function testIsEqualsOutput() {
        $primeNumber = new PrimeNumber();
        $list = $primeNumber->getListMultiple(2, 100);
        $outputList = $primeNumber->toListString($list);
        foreach(file(getcwd() . DIRECTORY_SEPARATOR . "output.txt") as $key => $line) {
            $this->assertEquals(
                trim($line),
                $outputList[$key]
            );
        }
    }
}
