<?php
namespace lewbr\tarefas;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\scheduler\PluginTask;
use pocketmine\Player;

use lewbr\Main;

class TarefaPrincipal extends PluginTask
{
	public function __construct(Main $plugin, Player $jogador)
	{
		parent::__construct($plugin, $jogador);
		$this->plugin = $plugin;
		$this->jogador = $jogador;
	}
	
	public function onRun(int $CurrentTick)
	{
        
		$variavel_jogador = $this->jogador;
		$plugin = $this->plugin;
		$valores = array_values($plugin->config->get("configuracoes"));
		
        $titulo = $valores[1];
        $titulo = str_replace("{jogador}", $variavel_jogador->getName(), $titulo);
		$titulo = str_replace($valores[0], "§", $titulo);
		
        $titulo_2 = $valores[2];
        $titulo_2 = str_replace("{jogador}", $variavel_jogador->getName(), $titulo_2);
		$titulo_2 = str_replace($valores[0], "§", $titulo_2);
        
        $variavel_jogador->addTitle($titulo, $titulo_2);
	}
}