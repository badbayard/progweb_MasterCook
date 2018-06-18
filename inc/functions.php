<?php 
	function convertirDate ($date,$format) { /* prend en argument une date dans un format quelconque et un format de date */
		return date($format,strtotime($date));
	}
?>