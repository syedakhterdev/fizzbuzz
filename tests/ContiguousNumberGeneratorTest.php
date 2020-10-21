<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ContiguousNumberGeneratorTest extends TestCase
{
    //Expect multiple of 5 to output Buzz
    public function testExpect5OutputBuzz(): void
    {
        $obj = new ContiguousNumberGenerator();
        $this->assertEquals(
            'buzz',
            $obj->getOutput(5)
        );
    }

    // Expect any number containing 3 to output Lucky
    public function testExpect3ToOutputLucky(): void
    {
        $obj = new ContiguousNumberGenerator();
        $this->assertEquals(
            'lucky',
            $obj->getOutput(3)
        );
    }

    // Expect multiple of 15 to output FizzBuzz
    public function testExpect15ToOutputFizzBuzz(): void
    {
        $obj = new ContiguousNumberGenerator();
        $this->assertEquals(
            'fizzbuzz',
            $obj->getOutput(15)
        );
    }

    // Expect any number containing 3 not to output fizz
    public function testExpect13ToNotOutputFizz(): void
    {
        $obj = new ContiguousNumberGenerator();
        $this->assertEquals(
            'fizz',
            $obj->getOutput(3)
        );
    }


    // Expect multiple of 3 to output Fizz except the
    // number containing 3
    public function testExpect6ToOutputFizzBuzz(): void
    {
        $obj = new ContiguousNumberGenerator();
        $this->assertEquals(
            'fizz',
            $obj->getOutput(3)
        );
    }

    // for the given range i can get the expected count for the given type
    // Type can be fizz,buzz,fizzbuzz,integer,lucky
    public function testExpectCorrectCount($min = 1,$max = 20,$exp_count = '2',$type = 'lucky'): void
    {
        $obj = new ContiguousNumberGenerator($min,$max);
        $obj->generate();
        $this->assertEquals(
            $exp_count,
            $obj->getCount($type)
        );
    }

    // for the given range i can get the expected result against the given result
    public function testExpectCorrectResult($min = 1,$max = 5,$exp_result = '1 2 lucky 4 buzz'): void
    {
        $obj = new ContiguousNumberGenerator($min,$max);
        $obj->generate();
        $this->assertEquals(
            $exp_result,
            $obj->getResult()
        );
    }
}