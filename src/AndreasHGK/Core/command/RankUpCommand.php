<?php

declare(strict_types=1);

namespace AndreasHGK\Core\command;

use AndreasHGK\Core\user\UserManager;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class RankUpCommand extends Executor{

    public function __construct(){
        parent::__construct("rankup", "rank up to another mine", "/rankup", "nightfall.command.rankup", ["ru", "upgrade"]);
        $this->addParameterMap(0);
        $this->addSingleParameter(0, 0, " ", " ", " ", false, true);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if(!$sender instanceof Player) {
            return false;
        }

        UserManager::getInstance()->getOnline($sender)->tryRankUp();
        return true;
    }
}