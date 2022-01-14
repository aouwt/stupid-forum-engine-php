<?php
	if (! isset ($_md_init)) {
		
		require 'parsedown/Parsedown.php';
		$Parsedown = new Parsedown ();
		$Parsedown -> setSafeMode (true);
		
		function md_fmt ($text) {
			global $Parsedown;
			
			return sanitize_str ($Parsedown -> line ($text));
		}
		
		$_md_init = true;
	}
?>
