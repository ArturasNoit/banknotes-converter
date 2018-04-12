<?php

namespace spec;

use BanknotesConverter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BanknotesConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BanknotesConverter::class);
    }

    function it_counts_0_to_0_minimum_denomination_units()
    {
        $this->minCount(0)->shouldReturn(0);
    }

    function it_counts_1_to_1_minimum_denomination_unit()
    {
        $this->minCount(1)->shouldReturn(1);
    }

    function it_counts_5_to_1_minimum_denomination_unit()
    {
        $this->minCount(5)->shouldReturn(1);
    }

    function it_counts_6_to_2_minimum_denomination_units()
    {
        $this->minCount(6)->shouldReturn(2);
    }

    function it_counts_7_to_3_minimum_denomination_units()
    {
        $this->minCount(7)->shouldReturn(3);
    }

    function it_counts_8_to_4_minimum_denomination_units()
    {
        $this->minCount(8)->shouldReturn(4);
    }

    function it_counts_10_to_1_minimum_denomination_unit()
    {
        $this->minCount(10)->shouldReturn(1);
    }

    function it_counts_1999_to_13_minimum_denomination_units()
    {
        $this->minCount(1999)->shouldReturn(13);
    }

    function it_cant_count_negative_numbers()
    {
        $this->shouldThrow(new \InvalidArgumentException('Negative amount provided: -1'))->duringminCount(-1);
    }

    function it_can_only_accept_numeric_strings_and_integers()
    {
        $this->shouldThrow(new \InvalidArgumentException('Amount provided is not valid: STRING'))->duringminCount('STRING');
    }

    function it_cant_accept_floats_in_integer_argument()
    {
        $this->shouldThrow(new \InvalidArgumentException('Amount provided is not valid: 9.99'))->duringminCount(9.99);
    }

    function it_cant_accept_floats_in_string_argument()
    {
        $this->shouldThrow(new \InvalidArgumentException('Amount provided is not valid: 9.00'))->duringminCount('9.00');
    }

    function it_allows_whitespaces_in_string_argument()
    {
        $this->minCount(' 19  9 9 ')->shouldReturn(13);
    }
}
