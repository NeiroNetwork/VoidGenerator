<?php

declare(strict_types=1);

namespace NeiroNetwork\VoidGenerator;

use pocketmine\data\bedrock\BiomeIds;
use pocketmine\world\ChunkManager;
use pocketmine\world\format\BiomeArray;
use pocketmine\world\format\Chunk;
use pocketmine\world\generator\Generator;

class VoidGenerator extends Generator{

	private Chunk $chunk;

	public function __construct(int $seed, string $preset){
		parent::__construct($seed, $preset);

		// fixme: バイオームが従来の PLAINS ではなく OCEAN になってる
		$this->chunk = new Chunk([], false);
	}

	public function generateChunk(ChunkManager $world, int $chunkX, int $chunkZ) : void{
		$world->setChunk($chunkX, $chunkZ, clone $this->chunk);
	}

	public function populateChunk(ChunkManager $world, int $chunkX, int $chunkZ) : void{
	}
}
