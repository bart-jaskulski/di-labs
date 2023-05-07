<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Export;

/**
 * General interface responsible for exporting any kind of data.
 */
interface Exporter {

	/**
	 * Output data to a file.
	 */
	public function export(): void;

}
