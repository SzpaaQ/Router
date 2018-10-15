<?php

/**
 * 
 * LICENCE
 * ALL RIGHTS RESERVED.
 * YOU ARE NOT ALLOWED TO COPY/EDIT/SHARE/WHATEVER.
 * IN CASE OF ANY PROBLEM CONTACT AUTHOR.
 * @author    Łukasz Szpak (szpaaaaq@gmail.com)
 * @Copyright 2018 SzpaQ
 * @license   ALL RIGHTS RESERVED
 *
 * * */

class Validate {
	// This class has been created for testing purpose of Router Class
	public function is_int($value) {
		if(is_numeric($value)) {
			return true;
		} else {
			return false;
		}
	}
	public function is_string($value) {
		if(is_string($value)) {
			return true;
		} else {
			return false;
		}
	}
	public function is_email($value) {
		if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}
}
