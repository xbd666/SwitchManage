<?php
/*
 * Quidway S3050操作模块
 */
namespace Cli\Service;
use \Cli\Model\TelnetModel;
class Switch_1_Service extends SwitchBaseService{

    public function __construct(TelnetModel $switch){
        parent::__construct($switch);
        $this->version_id=1;
    }

    /**
     * 重启交换机
     */
    public function reboot(){
        // TODO: Implement reboot() method.
    }

    /**
     * 获取端口概况
     * @return mixed
     */
    public function getBrief(){
        $data=$this->switch->exec('display brief interface');
        if(preg_match_all('/([EG]\d\/\d{1,2})\s+(UP|DOWN).*?(access|trunk).*?00BASE-T/',$data,$result)){
            array_shift($result);
            F('Interface_'.$this->switch->getIp(),$result[0]);
            return ['no'=>1,'res'=>$result];
        }else{
            return ['no'=>2];
        }
    }
}