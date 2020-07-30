namespace ZioCraft\TagShop;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use jojoe77777\FormAPI\Form;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase implements Listener {
    
    public function onEnable(){
        $this->getLogger()->info("Plugin sudah aktif!");
        $this->saveResource("config.yml");
		$this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
        switch($cmd->getName()){
            case "tags":
                if($sender instanceof Player){
                    $this->Menu($sender);
                } else {
                    $sender->sendMessage("Kamu bisa melakukan command dalam game!");
                }
            break;
        }
        return true;
    }
    
    public function Menu($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:
                    $this->TagShop($sender);
                break;
                case 1:
                    $this->Tag($sender);
                break;
            }
        });
        $form->setTitle("§l§bTag§eShop§dUI");
        $form->setContent("§eHai§f, " . $sender->getName() . "\n§eUangmu §f: " . $this->eco->myMoney($sender) . "\n§b* §dPilih salah satu di bawah ini!");
        $form->addButton("§l§bTag§eShop\n§fClick to open!");
        $form->addButton("§l§bTag §dKamu!\n§fClick to open!");
        $form->sendToPlayer($sender);
        return $form;
    }
    
    public function TagShop($sender){
        $formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $formapi->createCustomForm(function(Player $sender, $data){
			$result = $data[0];
			if($result === null){
				return true;
			}
			if($result == 0){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-1.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.satu.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-1.name"));
			    }
			}
			if($result == 1){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-2.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.dua.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-2.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-2.name"));
			    }
			}
			if($result == 2){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-3.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.tiga.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-3.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-3.name"));
			    }
			}
			if($result == 3){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-4.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.empat.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-4.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-4.name"));
			    }
			}
			if($result == 4){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-5.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.lima.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-5.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-5.name"));
			    }
			}
			if($result == 5){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-6.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.enam.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-6.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-6.name"));
			    }
			}
			if($result == 6){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-7.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.tujuh.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-7.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-7.name"));
			    }
			}
			if($result == 7){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-8.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.delapan.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-8.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli §f: ". $this->cfg->getNested("tag.tag-8.name"));
			    }
			}
			if($result == 8){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-9.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.sembilan.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-9.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli  §f: ". $this->cfg->getNested("tag.tag-9.name"));
			    }
			}
			if($result == 9){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-10.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.sepuluh.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-10.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli  §f: ". $this->cfg->getNested("tag.tag-10.name"));
			    }
			}
			if($result == 10){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-11.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.sebelas.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-11.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli  §f: ". $this->cfg->getNested("tag.tag-11.name"));
			    }
			}
			if($result == 11){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-12.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.duabelas.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-12.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli  §f: ". $this->cfg->getNested("tag.tag-12.name"));
			    }
			}
			if($result == 12){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-13.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.tigabelas.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-13.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli  §f: ". $this->cfg->getNested("tag.tag-13.name"));
			    }
			}
			if($result == 13){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-14.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.empatbelas.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-14.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli  §f: ". $this->cfg->getNested("tag.tag-14.name"));
			    }
			}
			if($result == 14){
			    $money = $this->eco->myMoney($sender);
			    $price = $this->cfg->getNested("tag.tag-15.price");
			    if($money >= $price){
			        $sender->addAttachment($this, "tag.limabelas.perm", true);
			        $this->eco->reduceMoney($sender, $price);
			        $sender->sendMessage("§aKamu berhasil membeli §f: ". $this->cfg->getNested("tag.tag-15.name"));
			    } else {
			        $sender->sendMessage("§cUangmu Tidak Cukup Untuk Membeli  §f: ". $this->cfg->getNested("tag.tag-15.name"));
			    }
			}
		});
		$form->setTitle("§l§aBeli §bTag");
		$player = $sender->getName();
		$money = $this->eco->myMoney($sender);
		$form->addDropdown("§eHalo§f, §b{$player}, \n§eUangmu §f: §a{$money}\n§d* §1Pilih salah satu tag!", [$this->cfg->getNested("tag.tag-1.name")." §b".$this->cfg->getNested("tag.tag-1.price"), $this->cfg->getNested("tag.tag-2.name")." §b".$this->cfg->getNested("tag.tag-2.price"), $this->cfg->getNested("tag.tag-3.name")." §b".$this->cfg->getNested("tag.tag-3.price"), $this->cfg->getNested("tag.tag-4.name")." §b".$this->cfg->getNested("tag.tag-4.price"), $this->cfg->getNested("tag.tag-5.name")." §b".$this->cfg->getNested("tag.tag-5.price"), $this->cfg->getNested("tag.tag-6.name")." §b".$this->cfg->getNested("tag.tag-6.price"), $this->cfg->getNested("tag.tag-7.name")." §b".$this->cfg->getNested("tag.tag-7.price"), $this->cfg->getNested("tag.tag-8.name")." §b".$this->cfg->getNested("tag.tag-8.price"), $this->cfg->getNested("tag.tag-9.name")." §b".$this->cfg->getNested("tag.tag-9.price"), $this->cfg->getNested("tag.tag-10.name")." §b".$this->cfg->getNested("tag.tag-10.price"), $this->cfg->getNested("tag.tag-11.name")." §b".$this->cfg->getNested("tag.tag-11.price"), $this->cfg->getNested("tag.tag-12.name")." §b".$this->cfg->getNested("tag.tag-12.price"), $this->cfg->getNested("tag.tag-13.name")." §b".$this->cfg->getNested("tag.tag-13.price"), $this->cfg->getNested("tag.tag-14.name")." §b".$this->cfg->getNested("tag.tag-14.price"), $this->cfg->getNested("tag.tag-15.name")." §b".$this->cfg->getNested("tag.tag-15.price")]);
        $form->sendToPlayer($sender);
        return $form;
    }
    
    public function Tag($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:
                    if($sender->hasPermission("tag.satu.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-1.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 1:
                    if($sender->hasPermission("tag.dua.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-2.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 2:
                    if($sender->hasPermission("tag.tiga.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-3.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 3:
                    if($sender->hasPermission("tag.empat.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-4.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 4:
                    if($sender->hasPermission("tag.lima.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-5.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 5:
                    if($sender->hasPermission("tag.enam.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-6.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 6:
                    if($sender->hasPermission("tag.tujuh.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-7.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 7:
                    if($sender->hasPermission("tag.delapan.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-8.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 8:
                    if($sender->hasPermission("tag.sembilan.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-9.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 9:
                    if($sender->hasPermission("tag.sepuluh.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-10.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 10:
                    if($sender->hasPermission("tag.sebelas.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-11.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 11:
                    if($sender->hasPermission("tag.duabelas.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-12.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 12:
                    if($sender->hasPermission("tag.tigabelas.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-13.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 13:
                    if($sender->hasPermission("tag.empatbelas.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-14.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
                case 14:
                    if($sender->hasPermission("tag.limabelas.perm")){
                        $sender->setDisplayName($this->cfg->getNested("tag.tag-15.name") . " §l§b" . $sender->getName());
                    } else {
                        $this->Belom($sender);
                    }
                break;
            }
        });
        $form->setTitle("§l§aYour §bTag!");
        $form->setContent("Pilih Salah Satu Tag Yang Susah Kamu Beli!");
        $form->addButton($this->cfg->getNested("tag.tag-1.name"));
        $form->addButton($this->cfg->getNested("tag.tag-2.name"));
        $form->addButton($this->cfg->getNested("tag.tag-3.name"));
        $form->addButton($this->cfg->getNested("tag.tag-4.name"));
        $form->addButton($this->cfg->getNested("tag.tag-5.name"));
        $form->addButton($this->cfg->getNested("tag.tag-6.name"));
        $form->addButton($this->cfg->getNested("tag.tag-7.name"));
        $form->addButton($this->cfg->getNested("tag.tag-8.name"));
        $form->addButton($this->cfg->getNested("tag.tag-9.name"));
        $form->addButton($this->cfg->getNested("tag.tag-10.name"));
        $form->addButton($this->cfg->getNested("tag.tag-11.name"));
        $form->addButton($this->cfg->getNested("tag.tag-12.name"));
        $form->addButton($this->cfg->getNested("tag.tag-13.name"));
        $form->addButton($this->cfg->getNested("tag.tag-14.name"));
        $form->addButton($this->cfg->getNested("tag.tag-15.name"));
        $form->sendToPlayer($sender);
        return $form;
    }
    
    public function Belom($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:
                    $this->TagShop($sender);
                break;
                case 1:
                    $this->Tag($sender);
                break;
            }
        });
        $form->setTitle("§l§aTag§bShop§eUI");
        $form->setContent("Kamu belum membeli tag ini, silahkan membeli tag ini terlebih dah ulu, agar kamu bisa memakainya!");
        $form->addButton("§bBeli! ");
        $form->addButton("§cTidak! ");
        $form->sendToPlayer($sender);
        return $form;
    }
}
