<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\command\defaults;

use pocketmine\command\CommandSender;
use pocketmine\lang\TranslationContainer;
use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;
use pocketmine\network\mcpe\protocol\ProtocolInfo;
use pocketmine\network\mcpe\protocol\types\CommandParameter;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;
use function count;
use function implode;
use function stripos;
use function strtolower;

class VersionCommand extends VanillaCommand{

	public function __construct(string $name){
		parent::__construct($name, "%pocketmine.command.version.description", "%pocketmine.command.version.usage", [
			"ver", "about", "pocketgold"
		], [
			[
				new CommandParameter("plugin", AvailableCommandsPacket::ARG_TYPE_STRING)
			]
		]);
		$this->setPermission("pocketmine.command.version");
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		if(!$this->testPermission($sender)){
			return true;
		}

		if(count($args) === 0){
			$sender->sendMessage("This server is running on PocketGold-MP (based on PocketMine-MP) API: 3.10.2 Discord Support: https://discord.gg/pa6qcwH VERSION: 1.14.x");
		}
	}
}
