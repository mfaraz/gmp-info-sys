<?php
$doesNotRequireLogin = array();
$permissions = array();
$doesNotRequireLogin['admin']['index'] = true;
$doesNotRequireLogin['admin']['logout'] = true;
$doesNotRequireLogin['unauthorized']['index'] = true;
$doesNotRequireLogin['admin']['admin_area'] = true;
$doesNotRequireLogin['admin']['home'] = true;
/*--------------------------------------------------- start admin permissions----------------------------**/
/****************hotel module******************************/
$permissions['admin']['hotel']['hotellist'] = true;
$permissions['admin']['hotel']['index'] = true;
$permissions['admin']['hotel']['addhotel'] = true;
$permissions['admin']['hotel']['edithotel'] = true;
$permissions['admin']['hotel']['updatehotel'] = true;
$permissions['admin']['hotel']['delhotel'] = true;
$permissions['admin']['hotel']['getcity'] = true;
$permissions['admin']['hotelcontent']['index'] = true;
$permissions['admin']['hotelcontent']['savehotelcontent'] = true;
$permissions['admin']['hotelcontent']['savehotelimages'] = true;
$permissions['admin']['hotelroomtype']['index'] = true;
$permissions['admin']['hotelroomtype']['addroomtype'] = true;
$permissions['admin']['hotelroomtype']['roomtypelist'] = true;
$permissions['admin']['hotelroomtype']['roomtypeedit'] = true;
$permissions['admin']['hotelroomtype']['doeditroomtype'] = true;
$permissions['admin']['hotelroomtype']['roomtypedelete'] = true;


/****************facility module******************************/
$permissions['admin']['facility']['faciltylist'] = true;
$permissions['admin']['facility']['index'] = true;
$permissions['admin']['facility']['addfac'] = true;
$permissions['admin']['facility']['faciltyedit'] = true;
$permissions['admin']['facility']['doeditfacility'] = true;
$permissions['admin']['facility']['facilitydelete'] = true;

/****************Accomodation module******************************/
$permissions['admin']['accomodation']['accomodationlist'] = true;
$permissions['admin']['accomodation']['addaccomodation'] = true;
$permissions['admin']['accomodation']['doaddaccomodation'] = true;
$permissions['admin']['accomodation']['accomodationedit'] = true;
$permissions['admin']['accomodation']['doeditacomdation'] = true;
$permissions['admin']['accomodation']['accomodationdelete'] = true;

/****************Meal plan module******************************/
$permissions['admin']['mealplan']['index'] = true;
$permissions['admin']['mealplan']['addmealplan'] = true;
$permissions['admin']['mealplan']['doaddmealplan'] = true;
$permissions['admin']['mealplan']['mealplanedit'] = true;
$permissions['admin']['mealplan']['doeditmealplan'] = true;
$permissions['admin']['mealplan']['mealplandelete'] = true;

/*--------------------------------------------------- end admin permissions----------------------------**/

/*--------------------------------------------------- start Super-superadmin permissions----------------------------**/
/****************hotel module******************************/
$permissions['superadmin']['hotel']['hotellist'] = true;
$permissions['superadmin']['hotel']['index'] = true;
$permissions['superadmin']['hotel']['addhotel'] = true;
$permissions['superadmin']['hotel']['edithotel'] = true;
$permissions['superadmin']['hotel']['updatehotel'] = true;
$permissions['superadmin']['hotel']['delhotel'] = true;
$permissions['superadmin']['hotel']['getcity'] = true;
$permissions['superadmin']['hotelcontent']['index'] = true;
$permissions['superadmin']['hotelcontent']['savehotelcontent'] = true;
$permissions['superadmin']['hotelcontent']['savehotelimages'] = true;
$permissions['superadmin']['hotelroomtype']['index'] = true;
$permissions['superadmin']['hotelroomtype']['addroomtype'] = true;
$permissions['superadmin']['hotelroomtype']['roomtypelist'] = true;
$permissions['superadmin']['hotelroomtype']['roomtypeedit'] = true;
$permissions['superadmin']['hotelroomtype']['doeditroomtype'] = true;
$permissions['superadmin']['hotelroomtype']['roomtypedelete'] = true;
$permissions['superadmin']['hotelcontent']['deletehotelimage'] = true;


/****************facility module******************************/
$permissions['superadmin']['facility']['faciltylist'] = true;
$permissions['superadmin']['facility']['index'] = true;
$permissions['superadmin']['facility']['addfac'] = true;
//$permissions['superadmin']['facility']['facilityedit'] = true;
$permissions['superadmin']['facility']['faciltyedit'] = true;
$permissions['superadmin']['facility']['doeditfacility'] = true;
$permissions['superadmin']['facility']['facilitydelete'] = true;


/****************Accomodation module******************************/
$permissions['superadmin']['accomodation']['accomodationlist'] = true;
$permissions['superadmin']['accomodation']['addaccomodation'] = true;
$permissions['superadmin']['accomodation']['doaddaccomodation'] = true;
$permissions['superadmin']['accomodation']['accomodationedit'] = true;
$permissions['superadmin']['accomodation']['doeditacomdation'] = true;
$permissions['superadmin']['accomodation']['accomodationdelete'] = true;

/****************Meal plan module******************************/
$permissions['superadmin']['mealplan']['index'] = true;
$permissions['superadmin']['mealplan']['addmealplan'] = true;
$permissions['superadmin']['mealplan']['doaddmealplan'] = true;
$permissions['superadmin']['mealplan']['mealplanedit'] = true;
$permissions['superadmin']['mealplan']['doeditmealplan'] = true;
$permissions['superadmin']['mealplan']['mealplandelete'] = true;

/*--------------------------------------------------- end Super-superadmin permissions----------------------------**/

?>
