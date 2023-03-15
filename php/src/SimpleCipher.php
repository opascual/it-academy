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

class SimpleCipher
{
    private const A_INDEX = 97;
    private const Z_INDEX = 122;
    private const ALPHABET_CHARS = 26;

    public string $key;

    public function __construct(string $key = null)
    {
        if($key === '') {
            throw new InvalidArgumentException('Key must be a non empty string');
        }

        if(is_null($key)) {
            $key = $this->generateRandomKey();
        }

        if (!preg_match('/^[a-z]+$/', $key)) {
            throw new InvalidArgumentException('Key must be lower case alphabetic characters only');
        }

        $this->key = $key;
    }

    public function encode(string $plainText): string
    {
        $cipherText = '';
        for($i = 0; $i < strlen($plainText); $i++) {
            $charIndex = ord($plainText[$i]) + ord($this->key[$i]) - self::A_INDEX;
            if ($charIndex > self::Z_INDEX) {
                $charIndex -= self::ALPHABET_CHARS;
            }

            $cipherText .= chr($charIndex);
        }

        return $cipherText;
    }

    public function decode(string $cipherText): string
    {
        $plainText = '';
        for($i = 0; $i < strlen($cipherText); $i++) {
            $charIndex = ord($cipherText[$i]) - ord($this->key[$i]) + self::A_INDEX;
            if ($charIndex < self::A_INDEX) {
                $charIndex += self::ALPHABET_CHARS;
            }

            $plainText .= chr($charIndex);
        }

        return $plainText;
    }

    private function generateRandomKey(int $length = 100): string
    {
        $key = '';
        for ($i = 0; $i < $length; $i++)
        {
            $key .= chr(rand(self::A_INDEX, self::Z_INDEX));
        }

        return $key;
    }
}
