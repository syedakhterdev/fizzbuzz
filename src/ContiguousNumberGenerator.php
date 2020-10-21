<?php declare(strict_types=1);

class ContiguousNumberGenerator
{
    
    private $range_min;
    private $range_max;
    private $fizz_count = 0;
    private $buzz_count = 0;
    private $fizzbuzz_count = 0;
    private $integer_count = 0;
    private $lucky_count = 0;
    private $result = '';

    const LUCKY = 'lucky';
    const FIZZ = 'fizz';
    const BUZZ = 'buzz';
    const FIZZBUZZ = 'fizzbuzz';

    public function __construct(int $range_min = 1, int $range_max = 20 )
    {

        $this->range_min = $range_min;
        $this->range_max = $range_max;
    }

    public function getCount($type)
    {
        $type = $type.'_count';
        return $this->$type;
    }

    // Get the generated result
    public function getResult() : string
    {
        return $this->result;
    }

    public static function range(int $range_min,int $range_max): self
    {
        return new self($range_min,$range_max);
    }

    public function generate(): void
    {
        if($this->range_min > $this->range_max) {
            return;
        }
          for($i = $this->range_min;$i <= $this->range_max; $i++)
          {
              if($i == $this->range_max) {
                $this->result = $this->result.$this->getOutput($i);
              } else {
                $this->result = $this->result.$this->getOutput($i). " ";
              }
              
          }
        //   echo PHP_EOL;
        //     $this->generateCountReport();
    }

    // Generate report for each word
    private function generateCountReport()
    {
        echo 'fizz: '. $this->fizz_count.PHP_EOL;
        echo 'buzz: '. $this->buzz_count.PHP_EOL;
        echo 'fizzbuzz: '. $this->fizzbuzz_count.PHP_EOL;
        echo 'lucky: '. $this->lucky_count.PHP_EOL;
        echo 'integer: '. $this->integer_count.PHP_EOL;
    }

    //Get output against the given number
    public function getOutput($i): string
    {
          if ($i == 3 || $this->isDigitPresent($i, 3)) {
                $this->lucky_count++;
                return self::LUCKY;
          }
                
          if($i % 15 == 0) {
            $this->fizzbuzz_count++;
            return self::FIZZBUZZ;
          }
          else if($i % 5 == 0) {
            $this->buzz_count++;
              return self::BUZZ;
          }
          else if($i % 3 == 0) {
            $this->fizz_count++;
              return self::FIZZ;
          }
          else {
              $this->integer_count++;
              return strVal($i);
          }
    }

    //check if the given digit is present in the number
    private function isDigitPresent($x, $d) 
    { 
        
        // loop if d is  
        // present as digit 
        while ($x > 0) 
        { 
            if ($x % 10 == $d) 
                break; 
    
            $x = $x / 10; 
        } 
    
        // If loop broke 
        return ($x > 0); 
    } 
}
?>