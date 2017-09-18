<?php
/*
 *    This file is part of the module jxBuyerGroups for OXID eShop Community Edition.
 *
 *    The module jxBuyerGroups for OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by 
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The module jxBuyerGroups for OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://bitbucket.org/jobarthel/jxbuyergroups
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) 2017, Joachim Barthel
 * @author    Joachim Barthel <jobarthel@gmail.com>
 * 
 */

class jxbuyergroups_oxorder extends jxbuyergroups_oxorder_parent
{
    /**
     * 
     * @param oxBasket $oBasket
     * @param type $oUser
     * @param type $blRecalculatingOrder
     */
    public function finalizeOrder( oxBasket $oBasket, $oUser, $blRecalculatingOrder = false )
    {
        $result = parent::finalizeOrder($oBasket, $oUser, $blRecalculatingOrder);
        $this->_changeBuyerToGroups($oBasket, $oUser);
    }
    
    
    /**
     * Adds customer to the group if group assignment was found
     * 
     * @param type $oBasket
     * @param type $oUser
     */
    protected function _changedBuyerToGroups($oBasket, $oUser)
    {
        foreach ($oBasket->getContents() as $oItem) {
            $sProdId = $oItem->getProductId();
            if ($sGroupId = $this->_getAddoGroupId($sProdId)) {
                $oUser->addToGroup($sGroupId);
            }
            if ($sGroupId = $this->_getRemoveGroupId($sProdId)) {
                $oUser->removeFromGroup($sGroupId);
            }
        }
    }


    /**
     * Retrieves the id of the assigned add group
     * 
     * @param string $sArtId  UID of the article
     * 
     * @return 
     */
    protected function _getAddGroupId($sArtId) 
    {
        $oDb = oxDb::getDb( oxDB::FETCH_MODE_ASSOC );
        $sQuery = "SELECT jxgroupid FROM jxarticle2group WHERE jxartid = " . $oDb->quote($sArtId) . " AND jxaction = 'add'" ;
        
        return $oDb->getOne($sQuery);
    }


    /**
     * Retrieves the id of the assigned remove group
     * 
     * @param string $sArtId  UID of the article
     * 
     * @return 
     */
    protected function _getRemoveGroupId($sArtId) 
    {
        $oDb = oxDb::getDb( oxDB::FETCH_MODE_ASSOC );
        $sQuery = "SELECT jxgroupid FROM jxarticle2group WHERE jxartid = " . $oDb->quote($sArtId) . " AND jxaction = 'remove'" ;
        
        return $oDb->getOne($sQuery);
    }
    
}
