<?php
  
namespace BallAir\Mineeral\Event;

use pocketmine\event\Listener;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\utils\Config;

class EventListener implements Listener
{

    public $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
        $this->ball = new Config(Main::getInstance()->getDataFolder() . "settings.yml", Config::YAML);
    }

    public function ItemHeld(PlayerItemHeldEvent $event)
{
        $p = $event->getPlayer();
        $item_id = $event->getItem();
        if($this->ball->get("Plugin") == "true"){
        if($item_id->getId() == $this->ball->get("ID"){

            $eff = new EffectInstance(Effect::getEffect(24, 100 * 99999, 
$this->ball->get("Power"), false);
            
            $p->addEffect($eff);
      } else {
       $p->removeEffect(24);
}
    } elseif($this->ball->get("Plugin") == "false"){      
Server::getInstance->getLogger->info("Le plugin est désactivé depuis la config.");
   }
}

public function onDamage(EntityDamageEvent $event){

  $player = $event->getPlayer();
               if($player->getInventory()->getItemInHand()->getId() === $this->ball->get("ID")){

if ($event->getCause() === EntityDamageEvent::CAUSE_FALL){
  $event->setCancelled();
           }
       }
   } 
}
