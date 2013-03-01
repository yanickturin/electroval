<?php
//--------------------------------------------
//	Author: Fran�ois Wagner
//	Mail: francois.wagner@yahoo.fr
//	Description: 
//		La fonction sert � retourner un mois en fran�ais.
//		La fonction prend en argument un mois en anglais.
//	Date: 22.05.08
//	Version: 1
//--------------------------------------------
function monthinfrench($month){
	switch($month){
		case 'January':
			$month_french='Janvier';
			break;
		case 'February':
			$month_french='F�vrier';
			break;
		case 'March':
			$month_french='Mars';
			break;
		case 'April':
			$month_french='Avril';
			break;
		case 'May':
			$month_french='Mai';
			break;
		case 'June':
			$month_french='Juin';
			break;
		case 'July':
			$month_french='Juillet';
			break;
		case 'August':
			$month_french='Ao�t';
			break;
		case 'September':
			$month_french='Septembre';
			break;
		case 'October':
			$month_french='Octobre';
			break;
		case 'November':
			$month_french='Novembre';
			break;
		case 'December':
			$month_french='D�cembre';
			break;
	}
	return $month_french;
}