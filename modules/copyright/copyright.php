<?
define ('CONSTANTA','2017');

if (date('Y') == CONSTANTA) {
	echo CONSTANTA;
} else {
	echo CONSTANTA.' - '.date('Y');
}
?>