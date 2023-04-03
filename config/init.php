<?php

return [
	'container_definitions' => 'config/services.inc.php',
	'hook_subscribers'      => [
		\CleanWeb\PostExporter\Admin\ExportPage::class,
		\CleanWeb\PostExporter\Admin\ExportRequest::class
	]
];
