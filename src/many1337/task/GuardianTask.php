<?php

namespace many1337\task;

use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use many1337\Main;

class GuardianTask extends Task {
	
	private $player;
	private $plugin;
	
	public function __construct(Main $plugin, Player $player){
        $this->plugin = $plugin;
	$this->player = $player;
	}
	
	public function onRun(int $currentTick){
		$pk = new LevelEventPacket();
		$pk->evid = LevelEventPacket::EVENT_SOUND_TOTEM;
		$pk->data = 0;
		$pk->position = $this->player->asVector3();
		$this->player->dataPacket($pk);
	}
}
