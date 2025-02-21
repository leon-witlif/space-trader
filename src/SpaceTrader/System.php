<?php

declare(strict_types=1);

namespace App\SpaceTrader;

readonly class System
{
    public function __construct(
        public string $symbol,
        public string $sectorSymbol,
        public string $type,
        public int $x,
        public int $y,
        public array $waypoints,
        public array $factions,
    ) {
    }
}
