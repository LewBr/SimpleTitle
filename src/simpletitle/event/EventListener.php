<?php
namespace simpletitle\event;

use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

use simpletitle\Main;
use simpletitle\task\TaskFile;

class EventListener implements Listener{
	
	public Main $plugin;
	
	public function __construct(Main $plugin){
		$this->plugin = $plugin;
   	}
	
	public function PlayerJoin(PlayerJoinEvent $event){	
		$player = $event->getPlayer();
		$values = array_values($this->plugin->config->get("configurations"));
		
		$this->plugin->getScheduler()->scheduleDelayedTask(new TaskFile($this->plugin, $player), (int)$values[3]);
	}  
}
