<?php
//--------------------------------------------
//	Author: François Wagner
//	Mail: francois.wagner@yahoo.fr
//	Description: 
//		La fonction sert à retourner un mois en français.
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
			$month_french='Février';
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
			$month_french='Août';
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
			$month_french='Décembre';
			break;
	}
	return $month_french;
}