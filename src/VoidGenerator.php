<?php

declare(strict_types=1);

namespace NeiroNetwork\VoidGenerator;

use pocketmine\block\Block;
use pocketmine\data\bedrock\BiomeIds;
use pocketmine\world\ChunkManager;
use pocketmine\world\format\Chunk;
use pocketmine\world\format\SubChunk;
use pocketmine\world\format\PalettedBlockArray;
use pocketmine\world\generator\Generator;

class VoidGenerator extends Generator{

	private Chunk $chunk;

	public function __construct(int $seed, string $preset){
		parent::__construct($seed, $preset);

		$this->chunk = new Chunk([], false);
		foreach($this->chunk->getSubChunks() as $y => $subChunk){
			/** @link https://github.com/nhanaz-pm-pl/OnlyOneBiome/blob/master/src/Main.php */
			$this->chunk->setSubChunk($y, new SubChunk(Block::EMPTY_STATE_ID, [], new PalettedBlockArray(BiomeIds::PLAINS)));
		}
	}

	public function generateChunk(ChunkManager $world, int $chunkX, int $chunkZ) : void{
		$world->setChunk($chunkX, $chunkZ, clone $this->chunk);
	}

	public function populateChunk(ChunkManager $world, int $chunkX, int $chunkZ) : void{
	}
}
