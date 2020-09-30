<?php 

namespace BallAir\Mineeral;

use BallAir\Mineeral\Event\EventListener;

use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onEnable()
    {
        @mkdir($this->getDataFolder());
        
        $this->getServer->getPluginManager->registerEvents(new EventListener($this), $this);


        if(!file_exists($this->getDataFolder() . "settings.yml")){
        $this->saveResource('settings.yml');
        }
    }
}
