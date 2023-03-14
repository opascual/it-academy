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

class Tournament
{
    private const HEADER = 'Team                           | MP |  W |  D |  L |  P';
    private const TEAM1_NAME = 0;
    private const TEAM2_NAME = 1;
    private const MATCH_RESULT = 2;
    private const MATCHES_PLAYED = 'MP';
    private const WIN = 'W';
    private const DRAW = 'D';
    private const LOSS = 'L';
    private const POINTS = 'P';
    private const POINTS_WIN = 3;
    private const POINTS_DRAW = 1;

    private array $teamStatsTable;

    public function tally(string $scores): string
    {
        if($scores === '') {
            return self::HEADER;
        }

        $resultsMatches = $this->stringToArray($scores);
        foreach($resultsMatches as $resultMatch) {
            $this->addTeamGamePlayed($resultMatch[self::TEAM1_NAME]);
            $this->addTeamGamePlayed($resultMatch[self::TEAM2_NAME]);
            $this->applyGameResult($resultMatch[self::TEAM1_NAME], $resultMatch[self::TEAM2_NAME], $resultMatch[self::MATCH_RESULT]);
        }

        return $this->printStatsTable();
    }

    private function getTeamStats(string $teamName): array
    {
        return $this->teamStatsTable[$teamName] ?? [
            self::MATCHES_PLAYED => 0,
            self::WIN => 0,
            self::DRAW => 0,
            self::LOSS => 0,
            self::POINTS => 0,
        ];
    }

    private function addTeamGamePlayed(string $teamName): void
    {
        $teamStats = $this->getTeamStats($teamName);
        ++$teamStats[self::MATCHES_PLAYED];

        $this->teamStatsTable[$teamName] = $teamStats;
    }

    private function applyGameResult(string $team1, string $team2, string $matchResult): void
    {
        switch ($matchResult) {
            case 'win':
                ++$this->teamStatsTable[$team1][self::WIN];
                ++$this->teamStatsTable[$team2][self::LOSS];
                $this->teamStatsTable[$team1][self::POINTS] += self::POINTS_WIN;
                break;
            case 'draw':
                ++$this->teamStatsTable[$team1][self::DRAW];
                ++$this->teamStatsTable[$team2][self::DRAW];
                $this->teamStatsTable[$team1][self::POINTS] += self::POINTS_DRAW;
                $this->teamStatsTable[$team2][self::POINTS] += self::POINTS_DRAW;
                break;
            case 'loss':
                ++$this->teamStatsTable[$team1][self::LOSS];
                ++$this->teamStatsTable[$team2][self::WIN];
                $this->teamStatsTable[$team2][self::POINTS] += self::POINTS_WIN;
                break;
        }
    }

    private function stringToArray($scoresString, $delimiter = ';', $lineBreak = "\n"): array
    {
        $rows = str_getcsv($scoresString, $lineBreak);
        foreach ($rows as $row) {
            $scoresArray[] = str_getcsv($row, $delimiter);
        }

        return $scoresArray;
    }

    private function printStatsTable(): string
    {
        $tableFullStats = self::HEADER . PHP_EOL;

        // Sort Teams alphabetically
        uksort($this->teamStatsTable, function ($team1, $team2) {
            return strcmp($team1, $team2);
        });

        // Sort Teams by points
        uasort($this->teamStatsTable, function ($team1, $team2) {
            return $team2[self::POINTS] <=> $team1[self::POINTS];
        });

        foreach($this->teamStatsTable as $team => $stats) {
            $tableFullStats .= str_pad($team, 30);
            foreach ($stats as $value) {
                $tableFullStats .= ' | ' . str_pad((string)$value, 2, ' ', STR_PAD_LEFT);
            }
            $tableFullStats .= PHP_EOL;
        }

        return trim($tableFullStats);
    }
}

/**
 * Test Tournament class
 * 
 * $inputMatches = "Allegoric Alaskans;Blithering Badgers;win\nDevastating Donkeys;Courageous Californians;draw\nDevastating Donkeys;Allegoric Alaskans;win\nCourageous Californians;Blithering Badgers;loss\nBlithering Badgers;Devastating Donkeys;loss\nAllegoric Alaskans;Courageous Californians;win";
 * 
 * $tournament = new Tournament; 
 * $tournament->tally($inputMatches);
 */
