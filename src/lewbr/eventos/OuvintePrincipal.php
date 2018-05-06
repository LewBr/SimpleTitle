<?php

namespace lewbr\eventos;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

use lewbr\Main;
use lewbr\tarefas\TarefaPrincipal;

class OuvintePrincipal implements Listener 
{
	
	public function __construct($plugin)
	{

        $this->plugin = $plugin;

    }
	
	public function entrar(PlayerJoinEvent $evento)
	{
		
		$jogador = $evento->getPlayer();
		$valores = array_values($this->plugin->config->get("configuracoes"));
		
		$this->plugin->getServer()->getScheduler()->scheduleDelayedTask(new TarefaPrincipal($this->plugin, $jogador), (int)$valores[3] * 20);
		
	}
    
}