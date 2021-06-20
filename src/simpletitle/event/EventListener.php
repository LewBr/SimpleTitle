<?php
namespace simpletitle\event;

use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

use simpletitle\Main;
use simpletitle\task\Task;

class EventListener implements Listener{
	public function __construct($plugin){
		$this->plugin = $plugin;
   	}
	
	public function PlayerJoin(PlayerJoinEvent $event){	
		$player = $event->getPlayer();
		$values = array_values($this->plugin->config->get("configurations"));
		
		$this->plugin->getServer()->getScheduler()->scheduleDelayedTask(new Task($this->plugin, $player), (int)$values[3]);
	}  
}
