<?php

declare(strict_types=1);

namespace CleanWeb\PostExporter\Export;

use PostExporterVendor\League\Csv\Writer;

/**
 * WIP class for exporting products
 */
class ProductExporter implements Exporter {
		public function __construct(
			private readonly Writer $writer,
		) {
		}

		public function export( Query $query ): void {
			$this->csvWriter->insertAll(
					\array_map(
							static fn ($product) => \get_object_vars($product),
							$query->get_all()
					)
			);

			$this->csvWriter->output('products.csv');
		}
}
