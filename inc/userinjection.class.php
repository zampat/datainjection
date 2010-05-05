<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2010 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: Remi Collet
// Purpose of file:
// ----------------------------------------------------------------------

if (!defined('GLPI_ROOT')){
   die("Sorry. You can't access directly to this file");
}

/// Location class
class PluginDatainjectionUserInjection extends User
   implements PluginDatainjectionInjectionInterface {

   function isPrimaryType() {
      return true;
   }

   function connectedTo() {
      return array();
   }

   function getOptions() {
      return parent::getSearchOptions();
   }

   function showAdditionalInformation($info = array()) {

   }

   /**
    * Standard method to add an object into glpi
    * WILL BE INTEGRATED INTO THE CORE IN 0.80
    * @param values fields to add into glpi
    * @param options options used during creation
    * @return an array of IDs of newly created objects : for example array(Computer=>1, Networkport=>10)
    */
   function addObject($values=array(), $options=array()) {
      global $LANG;

      $itemtype = 'User';
      $injectionResults = array();
      //TODO : check values

      //If no values are present for the Computer type, exit method
      if (!isset($values[$itemtype])) {
         $injectionResults = array($itemtype,-1);
      }
      else {
         $item = new Computer;
         $newID = $item->add($values);
         if ($newID) {
            $injectionResults = array($itemtype,$newID);
         }
         else {
            $injectionResults = array($itemtype,-1);
         }
      }

      if ($injectionResults[$itemtype] > 0) {
         //Injected the other types
         foreach ($values as $itemtype => $fields) {
            if ($itemtype != $itemtype) {

            }
         }
      }
      return $injectionResults;
   }


   /**
    * Standard method to update an object into glpi
    * WILL BE INTEGRATED INTO THE CORE IN 0.80
    * @param fields fields to add into glpi
    * @param options options used during creation
    * @return an array of IDs of updated objects : for example array(Computer=>1, Networkport=>10)
    */
   function updateObject($values=array(), $options=array()) {

   }


   /**
    * Standard method to delete an object into glpi
    * WILL BE INTEGRATED INTO THE CORE IN 0.80
    * @param fields fields to add into glpi
    * @param options options used during creation
    */
   function deleteObject($values=array(), $options=array()) {
   }

   function checkType($field_name, $data, $mandatory) {
      switch($field_name) {
         case 'auth_method':
            $auths = array(Auth::AUTH_CAS, Auth::AUTH_DB_GLPI, Auth::AUTH_EXTERNAL,
                                   Auth::AUTH_LDAP, Auth::AUTH_MAIL, Auth::AUTH_X509);
            return (in_array($data,$auths)?PluginDatainjectionCommonInjectionLib::SUCCESS
                                             :PluginDatainjectionCommonInjectionLib::TYPE_MISMATCH);
          default:
            return PluginDatainjectionCommonInjectionLib::SUCCESS;
      }
   }
}

?>