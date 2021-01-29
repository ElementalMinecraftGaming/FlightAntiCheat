<?php

namespace ElementalMinecraftGaming\smallanticheat;

use pocketmine\player\Player;
use pocketmine\entity\Human;
use pocketmine\network\mcpe\protocol\AnvilDamagePacket;
use pocketmine\entity\Entity;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerMoveEvent;
use ElementalMinecraftGaming\smallanticheat\checkInterval;
use pocketmine\event\Listener;
use pocketmine\world\{World,Position,ChunkManager,ChunkLoader};
use pocketmine\world\generator\noise\Noise;
use pocketmine\block\Block;
use pocketmine\Server;

class Main extends PluginBase implements Listener {

    public $pg;

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function movingPlayer(PlayerMoveEvent $event) {
        $player = $event->getPlayer();
        $world = $player->getWorld()->getFolderName();
        $p = $player->getName();
        if (($player->getInAirTicks() > 30) >= 2000) {
            if (!$player->isFlying()) {
                if (!$player->isSurvival() == false) {
                    if (!$player->getAllowFlight() == true){
                    $player->kick("Flight hacks");
                    }
                }
            }
        }
    }

}
