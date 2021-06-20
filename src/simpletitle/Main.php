<?php
namespace simpletitle;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use simpletitle\event\EventListener;

class Main extends PluginBase{
	
    public $config;
    private static $instance;
	
    public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
	self::$instance = $this;
        @mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
        	$this->config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
        	$this->getLogger()->info("[SimpleTitle] Enabled.");	
    }

    public static function getInstance(): Main {
        return self::$instance;
    }
	
    public function onDisable(){
        $this->getLogger()->info("[SimpleTitle] Disabled.");
    }
}
