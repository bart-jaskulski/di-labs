<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Export;

use PostExporterVendor\Psr\Log\LoggerInterface;
use PostExporterVendor\League\Csv\Writer;

/**
 * Write our posts to CSV file.
 */
class PostExporter implements Exporter {

	public function __construct(
		private readonly Writer $csvWriter,
		private readonly LoggerInterface $logger
	) {
	}

	public function export( Query $query ): void {
		$this->logger->debug( 'Exporting posts...' );

		$this->csvWriter->insertAll(
			\array_map(
				static fn ( $post ) => \get_object_vars( $post ),
				$query->get_all()
			)
		);

		$this->logger->info( 'Posts exported! Yay!' );
		$this->csvWriter->output( 'posts.csv' );
	}

}
