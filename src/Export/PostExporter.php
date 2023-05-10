<?php declare( strict_types=1 );

namespace CleanWeb\PostExporter\Export;

use Psr\Log\{LoggerAwareInterface, LoggerAwareTrait};
use League\Csv\Writer;

/**
 * Write our posts to CSV file.
 */
class PostExporter implements Exporter, LoggerAwareInterface {
	// FIXME: what means "aware"? Can we predict content of this trait
	// without reading through the source? Do we depend on any magically
	// applied class properties?
	use LoggerAwareTrait;

	private Writer $csvWriter;

	public function __construct() {
		// FIXME: do we really require a Writer created ONLY from \SplTempFileObject?
		$this->csvWriter = Writer::createFromFileObject( new \SplTempFileObject() );
	}

	public function export(): void {
		// FIXME: potential null pointer exception. Object comes from
		// a setter which may not be called at all.
		$this->logger->debug( 'Exporting posts...' );

		// FIXME: query is hardcoded. How can we parametrize export?
		$query = new \WP_Query();

		$this->csvWriter->insertAll(
			\array_map(
				static fn ( $post ) => \get_object_vars( $post ),
				$query->get_posts()
			)
		);

		// FIXME: nullsafe operator? Maybe, but apart from being a feature
		// available only in PHP 8, we cannot determine if our message
		// actually gets logged.
		$this->logger?->info( 'Posts exported! Yay!' );
		$this->csvWriter->output( 'posts.csv' );
	}

}
