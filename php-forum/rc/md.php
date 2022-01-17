<?php
	if (! isset ($_md_init)) {
		
		/*require 'htmlpurifier/library/HTMLPurifier.auto.php';
		$HTMLPurifier_conf = HTMLPurifier_Config::createDefault ();
		$HTMLPurifier = new HTMLPurifier ($HTMLPurifier_conf);*/
		
		require 'parsedown/Parsedown.php';
		$Parsedown = new Parsedown ();
		$Parsedown -> setSafeMode (true);
		
		function md_fmt ($text) {
			global $Parsedown /*, $HTMLPurifier*/;
			
			return str_replace (
				array ("\n",	"\r",	'\''),
				array ('<br/>',	'', 	'\'\''),
				$Parsedown -> line ($text)
			);
		}
		
		$_md_init = true;
	}
?>
