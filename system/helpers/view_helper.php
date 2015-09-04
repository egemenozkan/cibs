<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('main_view'))
{

	function main_view($view, $vars = array(), $return = FALSE)
	{
		$load = new CI_Loader();
		$load->view("includes/header");
		$load->view($view,$vars,$return);
		$load->view("includes/footer");
	}
}
