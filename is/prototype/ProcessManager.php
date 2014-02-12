<?php
/**
 * Created by PhpStorm.
 * User: Camron Levanger
 * Date: 2/12/14
 * Time: 1:43 PM
 */

namespace is\prototype;


/**
 * A helper class to manage execution of external binaries (or our audio editing capabilities
 *
 * Class ProcessManager
 * @package is\prototype
 */
class ProcessManager {

    /**
     * @var
     */
    private $pid;
    /**
     * @var bool
     */
    private $command;

    /**
     * @param bool $cl
     */
    public function __construct($cl=false){
        if ($cl != false){
            $this->command = $cl;
            $this->runCommand();
        }
    }

    /**
     *
     */
    private function runCommand(){
        $command = 'nohup '.$this->command.' > /dev/null 2>&1 & echo $!';
        exec($command ,$op);
        $this->pid = (int)$op[0];
    }

    /**
     * @param $pid
     */
    public function setPid($pid){
        $this->pid = $pid;
    }

    /**
     * @return mixed
     */
    public function getPid(){
        return $this->pid;
    }

    /**
     * You can call this function to get the status of the command.
     * Returns true if the process is still running, false if finished.
     *
     * @return bool
     */
    public function status(){
        $command = 'ps -p '.$this->pid;
        exec($command,$op);
        if (!isset($op[1]))return false;
        else return true;
    }

    /**
     * Command is auto started when you create it.
     * Only call this if you have previously stopped the process.
     *
     * @return bool
     */
    public function start(){
        if ($this->command != '')$this->runCommand();
        else return true;
    }

    /**
     * A function to kill the process you created.
     *
     * @return bool
     */
    public function stop(){
        $command = 'kill '.$this->pid;
        exec($command);
        if ($this->status() == false)return true;
        else return false;
    }

} 
