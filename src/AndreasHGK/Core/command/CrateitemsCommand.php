<?php

declare(strict_types=1);

namespace AndreasHGK\Core\command;

use AndreasHGK\Core\ui\CratesForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class CrateitemsCommand extends Executor{

    public function __construct(){
        parent::__construct("crateitems", "check what items you can find in crates", "/crateitems", "nightfall.command.crateitems", ["viewcrate"]);
        $this->addParameterMap(0);
        $this->addSingleParameter(0, 0, " ", " ", " ", false, true);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if(!$sender instanceof Player){
            $sender->sendMessage("§c§l> §r§7Sender needs to be a player.");
            return true;
        }

        CratesForm::sendTo($sender);
        return true;
    }
}