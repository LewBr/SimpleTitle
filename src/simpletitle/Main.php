<?php
namespace simpletitle;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use simpletitle\event\EventListener;

class Main extends PluginBase{
	
    public $config;
	
    public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        @mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
        	$this->config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
        	$this->getLogger()->info("[SimpleTitle] Enabled.");	
    }
	
    public function onDisable(){
        $this->getLogger()->info("[SimpleTitle] Disabled.");
    }
}
