<?php
/**
 * Created by PhpStorm.
 * User: Camron Levanger
 * Date: 2/12/14
 * Time: 2:41 PM
 */

namespace is\prototype;


/**
 * Helpful functions for file management
 *
 * Class FileManager
 * @package is\prototype
 */
class FileManager {

    /**
     * Function to return more easily readable file sizes
     *
     * @param $filesize
     * @return string
     */
    function display_filesize($filesize){

        if(is_numeric($filesize)){
            $decr = 1024; $step = 0;
            $prefix = array('Byte','KB','MB','GB','TB','PB');

            while(($filesize / $decr) > 0.9){
                $filesize = $filesize / $decr;
                $step++;
            }
            return round($filesize,2).' '.$prefix[$step];
        } else {

            return 'NaN';
        }

    }

} 
