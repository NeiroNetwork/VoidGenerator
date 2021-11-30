<?php

declare(strict_types=1);

namespace NeiroNetwork\VoidGenerator;

use pocketmine\plugin\PluginBase;
use pocketmine\world\generator\GeneratorManager;

class Main extends PluginBase{

	protected function onLoad() : void{
		GeneratorManager::getInstance()->addGenerator(VoidGenerator::class, "void", fn() => null);
	}
}