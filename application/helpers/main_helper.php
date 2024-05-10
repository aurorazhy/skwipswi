<?php

const APP_NAME = 'Zadde Auto Mobil';

function assets($url)
{
	return base_url('assets/' . $url);
}

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('user')) {
		return false;
	}
	return true;
}
