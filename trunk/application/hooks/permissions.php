<?php
$doesNotRequireLogin = array();
$permissions = array();
$doesNotRequireLogin['admin']['index'] = true;
$doesNotRequireLogin['admin']['home'] = true;
$doesNotRequireLogin['admin']['logout'] = true;
$doesNotRequireLogin['admin']['admin_area'] = true;
$doesNotRequireLogin['unauthorized']['index'] = true;

/*--------------------------------------------------- start admin permissions----------------------------**/
/****************hotel module******************************/
$permissions['admin']['admin']['getbranches'] = true;
$permissions['admin']['admin']['getorgdetails'] = true;

$permissions['admin']['zone']['index'] = true;
$permissions['admin']['zone']['addzone'] = true;
$permissions['admin']['zone']['doaddzone'] = true;
$permissions['admin']['zone']['editzone'] = true;
$permissions['admin']['zone']['doeditzone'] = true;
$permissions['admin']['zone']['deletezone'] = true;

$permissions['admin']['branch']['index'] = true;
$permissions['admin']['branch']['addbranch'] = true;
$permissions['admin']['branch']['doaddbranch'] = true;
$permissions['admin']['branch']['editbranch'] = true;
$permissions['admin']['branch']['getzonesbydivs'] = true;
$permissions['admin']['branch']['getbranchbyzone'] = true;
$permissions['admin']['branch']['getorgbybranch'] = true;

$permissions['admin']['organization']['index'] = true;
$permissions['admin']['organization']['addorganization'] = true;
$permissions['admin']['organization']['doaddorganization'] = true;
$permissions['admin']['organization']['addmember'] = true;
$permissions['admin']['organization']['doaddmember'] = true;
$permissions['admin']['organization']['addreligiousorg'] = true;
$permissions['admin']['organization']['doaddreligiousorg'] = true;
$permissions['admin']['organization']['addbranchorg'] = true;
$permissions['admin']['organization']['doaddbranchorg'] = true;

/****************Language module******************************/
$permissions['admin']['language']['index'] = true;
$permissions['admin']['language']['editlabel'] = true;
$permissions['admin']['language']['updatelabel'] = true;
/*--------------------------------------------------- end admin permissions----------------------------**/

/*--------------------------------------------------- start Super-superadmin permissions----------------------------**/
/****************hotel module******************************/
$permissions['superadmin']['admin']['getbranches'] = true;
$permissions['superadmin']['admin']['getorgdetails'] = true;

$permissions['superadmin']['zone']['index'] = true;
$permissions['superadmin']['zone']['addzone'] = true;
$permissions['superadmin']['zone']['doaddzone'] = true;
$permissions['superadmin']['zone']['editzone'] = true;
$permissions['superadmin']['zone']['doeditzone'] = true;
$permissions['superadmin']['zone']['deletezone'] = true;

$permissions['superadmin']['branch']['index'] = true;
$permissions['superadmin']['branch']['addbranch'] = true;
$permissions['superadmin']['branch']['doaddbranch'] = true;
$permissions['superadmin']['branch']['editbranch'] = true;
$permissions['superadmin']['branch']['getzonesbydivs'] = true;
$permissions['superadmin']['branch']['getbranchbyzone'] = true;
$permissions['superadmin']['branch']['getorgbybranch'] = true;

$permissions['superadmin']['organization']['index'] = true;
$permissions['superadmin']['organization']['addorganization'] = true;
$permissions['superadmin']['organization']['doaddorganization'] = true;
$permissions['superadmin']['organization']['addmember'] = true;
$permissions['superadmin']['organization']['doaddmember'] = true;
$permissions['superadmin']['organization']['addreligiousorg'] = true;
$permissions['superadmin']['organization']['doaddreligiousorg'] = true;
$permissions['superadmin']['organization']['addbranchorg'] = true;
$permissions['superadmin']['organization']['doaddbranchorg'] = true;

/****************Language module******************************/
$permissions['superadmin']['language']['index'] = true;
$permissions['superadmin']['language']['editlabel'] = true;
$permissions['superadmin']['language']['updatelabel'] = true;
/*--------------------------------------------------- end Super-superadmin permissions----------------------------**/

?>
