<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>   
 * @copyright   (C) Alpha-Sys 2008-2015
 * @module      asy_b2b
 * @version     10.02.2015  1.0
 */

class asy_b2b__oxconfig extends asy_b2b__oxconfig_parent {

    /**
     * Returns config parameter value if such parameter exists.
     * Manipulates config param blShowNetPrice if user is a dealer
     *
     * @param string $sName config parameter name
     *
     * @return mixed
     */
    public function getConfigParam($sName)
    {
        $ret = parent::getConfigParam($sName);
        
        //if b2b config param
        if($sName == "blShowNetPrice"){
            if($this->showNetPrice()){
                return true;
            }
        }
        return $ret;
    }
    
    /**
     * Checks if user is in dealer group
     * 
     * @return boolean
     */
    public function showNetPrice(){
        $oUser = $this->getUser();
        // user is a dealer
        if($oUser && $oUser->inGroup('oxiddealer')){
            return true;
        }
    }
}
