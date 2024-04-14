<?php

declare(strict_types=1);

namespace AndreasHGK\Core\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;

class SpectatorCommand extends Executor{

    public function __construct(){
        parent::__construct("spectator", "change your gamemode to spectator", "/spectator", "nightfall.command.spectator");
        $this->addParameterMap(0);
        $this->addSingleParameter(0, 0, " ", " ", " ", false, true);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if(!$sender instanceof Player){
            $sender->sendMessage("§c§l> §r§7Sender needs to be a player.");
            return true;
        }

        $sender->setGamemode(GameMode::SPECTATOR());
        $sender->sendMessage("§b§l> §r§7Your gamemode has been set to spectator.");
        return true;
    }
}