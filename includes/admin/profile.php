<?php

	function fplugin_contact_method($methods){
	
		$methods['twitter'] = __("Twitter", "fplugin");
		$methods['facebook'] = __("Facebook", "fplugin");
		$methods['linkedin'] = __("Linkedin", "fplugin");
		return $methods;
	}
	
	add_filter("user_contactmethods", "fplugin_contact_method");