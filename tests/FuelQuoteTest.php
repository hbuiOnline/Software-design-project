<?php

use PHPUnit\Framework\TestCase;

class FuelQuoteTest extends TestCase
{
    public function testFuelQuoteGallonsNumbervsTextInput()
    {
        $correctGallons = '40';
        $incorrectGallons = 'Forty';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons);
        $this->assertMatchesRegularExpression("/^[0-9]*$/", $incorrectGallons); //Fail     

    }

    public function testFuelQuoteGallonsSingleDigitInput()
    {
        $correctGallons = '4';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons);
    }

    public function testFuelQuoteGallonsDoubleDigitInput()
    {
        $correctGallons = '40';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons);
    }

    public function testFuelQuoteGallonsTripleDigitInput()
    {
        $correctGallons = '400';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons);
    }

    public function testFuelQuoteGallonsFourDigitInput()
    {
        $correctGallons = '4000';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons);
    }

    public function testFuelQuoteGallonsCommasInput()
    {
        $correctGallons = '4,000';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons); //Fail
    }

    public function testFuelQuoteDecimalInput()
    {
        $correctGallons = '4000.00';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons); //Fail
    }

    public function testFuelQuoteDecimalAndCommasInput()
    {
        $correctGallons = '4,000.00';

        $this->assertMatchesRegularExpression("/^[0-9]*$/", $correctGallons); //Fail
    }
}
