<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Export;

use Psr\Log\{LoggerAwareInterface, LoggerAwareTrait};
use League\Csv\Writer;

/**
 * Write our posts to CSV file.
 */
class PostExporter implements Exporter, LoggerAwareInterface {
	// TODO
	use LoggerAwareTrait;

	/** @var \League\Csv\Writer */
	private $csvWriter;

	public function __construct() {
		$this->csvWriter = Writer::createFromFileObject( new \SplTempFileObject() );
	}

	public function export(): void {
		$this->logger->debug( 'Exporting posts...' );
		// TODO
		$query = new \WP_Query();
		$this->csv_writer->insertAll( $query->get_posts() );
		$this->logger->info( 'Posts exported! Yay!' ); // TODO: null pointer exception?
	}

}
