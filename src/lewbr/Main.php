<?php

namespace lewbr;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;
use lewbr\eventos\OuvintePrincipal;

class Main extends PluginBase{
	
	public $config;
	
    public function onEnable()
    {
		
	$this->getServer()->getPluginManager()->registerEvents(new OuvintePrincipal($this), $this);
		
        @mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
        	$this->config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
        	$this->getLogger()->info(C::YELLOW."[Título] Ativado! :)");
		
    }
	
    public function onDisable()
    {
		
        $this->getLogger()->info(C::RED."[Título] Desconectado! :(");
		
    }
	
}
