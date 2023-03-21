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

class RobotSimulator
{
    const DIRECTION_NORTH = 'north';
    const DIRECTION_EAST = 'east';
    const DIRECTION_SOUTH = 'south';
    const DIRECTION_WEST = 'west';

    public array $position;
    public string $direction;

    public function __construct(array $position, string $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    public function turnRight(): self
    {
        switch($this->direction) {
            case self::DIRECTION_NORTH:
                $this->direction = self::DIRECTION_EAST;
                break;
            case self::DIRECTION_EAST:
                $this->direction = self::DIRECTION_SOUTH;
                break;
            case self::DIRECTION_SOUTH:
                $this->direction = self::DIRECTION_WEST;
                break;
            case self::DIRECTION_WEST:
                $this->direction = self::DIRECTION_NORTH;
                break;
            default : 
                throw new InvalidArgumentException("Wrong position given");
        }

        return $this;
    }

    public function turnLeft(): self
    {
        switch($this->direction) {
            case self::DIRECTION_NORTH:
                $this->direction = self::DIRECTION_WEST;
                break;
            case self::DIRECTION_EAST:
                $this->direction = self::DIRECTION_NORTH;
                break;
            case self::DIRECTION_SOUTH:
                $this->direction = self::DIRECTION_EAST;
                break;
            case self::DIRECTION_WEST:
                $this->direction = self::DIRECTION_SOUTH;
                break;
            default : 
                throw new InvalidArgumentException("Wrong position given");
        }

        return $this;
    }

    public function advance(): self
    {
        switch($this->direction) {
            case self::DIRECTION_NORTH:
                $this->position[1] += 1;
                break;
            case self::DIRECTION_EAST:
                $this->position[0] += 1;
                break;
            case self::DIRECTION_SOUTH:
                $this->position[1] -= 1;
                break;
            case self::DIRECTION_WEST:
                $this->position[0] -= 1;
                break;
            default : 
                throw new InvalidArgumentException("Wrong position given");
        }

        return $this;
    }

    public function instructions(string $instructions): void
    {
        $array_instructions = str_split($instructions);
        foreach($array_instructions as $instruction)
        {
            if($instruction === 'A') {
                $this->advance();
            } else if($instruction === 'R') {
                $this->turnRight();
            } else if($instruction === 'L') {
                $this->turnLeft();
            } else {
                throw new InvalidArgumentException("bad instruction given");
            }
        }
    }
}
