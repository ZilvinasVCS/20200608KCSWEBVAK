<?php
	echo "<ul class='pagination'>";

	$totalPages = ceil($totalItemsRows / $itemsPerPage); // expected value 4 pages
		// if first page than don't show any "first" row and show from zero.
	$visiblePageRange = 2;
	$initialNumber = $page - $visiblePageRange; // rodysim nuo 1
	$limitationPageNumber = ($page + $visiblePageRange); // rodysim iki 5 puslapio
	

	if ($page > 1) {
		$firstLi = "<li class='page-item'><a href='{$mainPageUrl}' class='page-link'>";
		$firstLi .= "First page";
		$firstLi .= "</a></li>";	
		echo $firstLi;
	}

	for ($x = $initialNumber; $x <= $limitationPageNumber; $x++) {
		
		if ($x > 0 && $x <= $totalPages) {
			
			($x == $page) ? $classNameForActivePage = 'active' : $classNameForActivePage = '';
			
			echo "<li class='page-item {$classNameForActivePage}'><a href='{$mainPageUrl}?page={$x}' class='page-link'>{$x}</a></li>";
		}
		
	}

	if ($page < $totalPages) {
		$firstLi = "<li class='page-item'><a href='{$mainPageUrl}?page={$totalPages}' class='page-link'>";
		$firstLi .= "Last page";
		$firstLi .= "</a></li>";	
		echo $firstLi;
	}
	
	echo "</ul>";
