<?php
namespace simpletitle\task;

use pocketmine\utils\Config;
use pocketmine\scheduler\Task;
use pocketmine\Player;

use simpletitle\Main;

class TaskFile extends Task{
	public function __construct(Main $plugin, Player $player){
		parent::__construct($plugin, $player);
		$this->plugin = Main::getInstance();
		$this->player = Server::getInstance()->getPlayer($player);
	}
	
	public function onRun(int $CurrentTick){
		$player_variable = $this->player;
		$plugin = $this->plugin;
		$values = array_values($plugin->config->get("configurations"));
		
        	$title_0 = $values[1];
        	$title_0 = str_replace("{player}", $player_variable->getName(), $title_0);
		$title_0 = str_replace($values[0], "§", $title_0);
		
        	$titulo_1 = $values[2];
        	$titulo_1 = str_replace("{player}", $player_variable->getName(), $title_1);
		$titulo_1 = str_replace($values[0], "§", $title_1);
        
        	$player_variable->addTitle($title_0, $title_1);
	}
}
