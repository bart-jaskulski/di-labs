<?php declare( strict_types=1 );

class ProductsExporter implements Exporter, \Psr\Log\LoggerAwareInterface {
	use \Psr\Log\LoggerAwareTrait;

	/**
	 * @var ProductsList
	 */
	private $products;
	/**
	 * @var \League\Csv\Writer
	 */
	private $csv_writer;

	public function __construct() {
		$this->products = (new ProductsRepository())->get_all();
		$this->csv_writer = \League\Csv\Writer::createFromFileObject(new SplTempFileObject());
	}

	public function export(): void {
		$this->csv_writer->insertAll($this->products);
		$this->logger->info('Products exported! Yay!'); // null pointer exception?
	}

}