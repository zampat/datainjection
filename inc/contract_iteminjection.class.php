<?php
/*
 * @version $Id$
 LICENSE

 This file is part of the datainjection plugin.

 Datainjection plugin is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Datainjection plugin is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with datainjection. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 @package   datainjection
 @author    the datainjection plugin team
 @copyright Copyright (c) 2010-2011 Order plugin team
 @license   GPLv2+
            http://www.gnu.org/licenses/gpl.txt
 @link      https://forge.indepnet.net/projects/datainjection
 @link      http://www.glpi-project.org/
 @since     2009
 ---------------------------------------------------------------------- */

class PluginDatainjectionContract_ItemInjection extends Contract_Item
                                                implements PluginDatainjectionInjectionInterface {

   function __construct() {
      $this->table = getTableForItemType(get_parent_class($this));
   }


   function isPrimaryType() {
      return false;
   }


   function relationSide() {
      return false;
   }


   function connectedTo() {
      return array('Computer', 'Monitor', 'NetworkEquipment', 'Peripheral', 'Phone', 'Printer',
                   'Software');
   }


   function getOptions($primary_type = '') {
      global $LANG;

      $tab[100]['table']         = 'glpi_contracts';
      $tab[100]['field']         = 'name';
      $tab[100]['linkfield']     = 'name';
      $tab[100]['name']          = $LANG['common'][16];
      $tab[100]['injectable']    = true;
      $tab[100]['checktype']     = 'text';
      $tab[100]['displaytype']   = 'relation';
      $tab[100]['relationclass'] = 'Contract_Item';
      $tab[100]['storevaluein']  = 'contracts_id';

      $tab[101]['table']         = 'glpi_contracts';
      $tab[101]['field']         = 'num';
      $tab[101]['linkfield']     = 'num';
      $tab[101]['name']          = $LANG['common'][19];
      $tab[101]['injectable']    = true;
      $tab[101]['checktype']     = 'text';
      $tab[101]['displaytype']   = 'relation';
      $tab[101]['relationclass'] = 'Contract_Item';
      $tab[101]['storevaluein']  = 'contracts_id';

      return $tab;
   }


   /**
    * Standard method to add an object into glpi
 
    *
    * @param values fields to add into glpi
    * @param options options used during creation
    *
    * @return an array of IDs of newly created objects : for example array(Computer=>1, Networkport=>10)
   **/
   function addOrUpdateObject($values=array(), $options=array()) {

      $lib = new PluginDatainjectionCommonInjectionLib($this, $values, $options);
      $lib->processAddOrUpdate();
      return $lib->getInjectionResults();
   }


   function addSpecificNeededFields($primary_type, $values) {

      $fields['items_id'] = $values[$primary_type]['id'];
      $fields['itemtype'] = $primary_type;
      return $fields;
   }

}

?>