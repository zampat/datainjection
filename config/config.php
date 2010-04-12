<?php
/*
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2008 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org/
 ----------------------------------------------------------------------

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
 ------------------------------------------------------------------------
*/

// Original Author of file: Walid Nouh
// Purpose of file:
// ----------------------------------------------------------------------

// Default location for file upload
if (!defined("PLUGIN_DATAINJECTION_UPLOAD_DIR")){
	define("PLUGIN_DATAINJECTION_UPLOAD_DIR",GLPI_PLUGIN_DOC_DIR."/datainjection/");
}

define ("CSV_TYPE",1);

define ("NOT_MAPPED",-1);
define ("ITEM_NOT_FOUND",-1);

define ("EMPTY_VALUE",'');
define ("DROPDOWN_DEFAULT_VALUE",0);
define ("COMMON_FIELDS","common");

// Check Status
define ("CHECK_OK",0);
define ("CHECK_NOTOK",1);
// Check message
define ("TYPE_CHECK_OK",1);
define ("ERROR_IMPORT_WRONG_TYPE",2);
define ("ERROR_IMPORT_FIELD_MANDATORY",3);
define ("ERROR_IMPORT_LINK_FIELD_MISSING",4);

// Injection status
define ("IMPORT_OK",0);
define ("NOT_IMPORTED",1);
define ("PARTIALY_IMPORTED",2);
// Injection Message
define ("ERROR_IMPORT_ALREADY_IMPORTED",11);
define ("ERROR_CANNOT_IMPORT",12);
define ("ERROR_CANNOT_UPDATE",13);
define ("WARNING_NOTFOUND",14);
define ("WARNING_USED",15);
define ("WARNING_NOTEMPTY",16);
define ("WARNING_ALLEMPTY",17);
define ("WARNING_SEVERAL_VALUES_FOUND",18);
define ("WARNING_ALREADY_LINKED",19);
define ("IMPORT_IMPOSSIBLE",20);

define ("INJECTION_ADD",0);
define ("INJECTION_UPDATE",1);

define ("ENCODING_ISO8859_1",0);
define ("ENCODING_UFT8",1);
define ("ENCODING_AUTO",2);

define ("MODEL_PRIVATE",1);
define ("MODEL_PUBLIC",0);

define ("DATE_TYPE_DDMMYYYY","dd-mm-yyyy");
define ("DATE_TYPE_MMDDYYYY","mm-dd-yyyy");
define ("DATE_TYPE_YYYYMMDD","yyyy-mm-dd");

define ("FLOAT_TYPE_DOT",0);
define ("FLOAT_TYPE_COMMA",1);
define ("FLOAT_TYPE_DOT_AND_COM",2);

define ("MODEL_NETPORT_LOGICAL_NUMER",0);
define ("MODEL_NETPORT_NAME",1);
define ("MODEL_NETPORT_MACADDRESS",2);
define ("MODEL_NETPORT_LOGICAL_NUMER_NAME",3);
define ("MODEL_NETPORT_LOGICAL_NUMER_MAC",4);
define ("MODEL_NETPORT_LOGICAL_NUMER_NAME_MAC",5);
?>