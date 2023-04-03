<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Export;

use Psr\Log\{LoggerAwareInterface, LoggerAwareTrait, LoggerInterface};
use League\Csv\Writer;

/**
 * Write our posts to CSV file.
 */
class PostExporter implements Exporter {

	/** @var \League\Csv\Writer */
	private $csvWriter;

	/** @var LoggerInterface */
	private $logger;

	public function __construct( Writer $csvWriter, LoggerInterface $logger ) {
		$this->csvWriter = $csvWriter;
		$this->logger    = $logger;
	}

	public function export(): void {
		$this->logger->debug( 'Exporting posts...' );
		// TODO
		$query = new \WP_Query();
		$this->csvWriter->insertAll( $query->get_posts() );
		$this->logger->info( 'Posts exported! Yay!' );
	}

}
