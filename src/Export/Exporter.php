<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Export;

interface Exporter {

	public function export(): void;

}
