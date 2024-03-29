<?php
/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */
declare(strict_types=1);
class ReverseStringTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once './php/src/ReverseString.php';
    }

    public function testEmptyString(): void
    {
        $this->assertEquals("", reverseString(""));
    }

    public function testWord(): void
    {
        $this->assertEquals("tobor", reverseString("robot"));
    }

    public function testCapitalizedWord(): void
    {
        $this->assertEquals("nemaR", reverseString("Ramen"));
    }

    public function testSentenceWithPunctuation(): void
    {
        $this->assertEquals("!yrgnuh m'I", reverseString("I'm hungry!"));
    }

    public function testPalindrome(): void
    {
        $this->assertEquals("racecar", reverseString("racecar"));
    }

    public function testEvenSizedWord(): void
    {
        $this->assertEquals("reward", reverseString("drawer"));
    }
}