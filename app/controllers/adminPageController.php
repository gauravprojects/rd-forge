<?php

class AdminPageController extends BaseController {

	/* ---------------------------- FUNCTION USED ---------------------------------------------
		FUNCTIONS 							DESCRIPTION							RETURNED VALUE

		index()					used to show admin panel page					blade- admin blade
		show_reports()			show reports									blade- show_report blade
																									*/

	public function index()
	{

		// returns home page for admin pannel
		return View::make('adminPanel.admin');
	}

	public function show_reports()
	{

		//returns the home page where all the reports are being shown
		// home page for all retuns
		return View::make('adminPanel.reportsHome');
	}

}