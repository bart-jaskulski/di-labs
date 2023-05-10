<?php

declare(strict_types=1);

namespace CleanWeb\PostExporter\Export;

use League\Csv\Writer;

/**
 * WIP class for exporting products
 */
class ProductExporter implements Exporter {
		public function __construct(
			// FIXME: Passing array of products violates statelessness of this
			// object. It binds us with only one set of products exported, and
			// those must be decided upfront.
			private readonly array $products,
			private ?Writer $writer = null,
		) {
			$this->writer ??= Writer::createFromFileObject(new \SplTempFileObject());
		}

		public function export(): void {
			$this->csvWriter->insertAll(
					\array_map(
							static fn ($product) => \get_object_vars($product),
							$this->products
					)
			);

			$this->csvWriter->output('products.csv');
		}
}
