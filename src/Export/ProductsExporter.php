<?php declare( strict_types=1 );

class ProductsExporter implements Exporter, \Psr\Log\LoggerAwareInterface {
	use \Psr\Log\LoggerAwareTrait;

	/**
	 * @var ProductsRepository
	 */
	private $repository;
	/**
	 * @var \League\Csv\Writer
	 */
	private $csv_writer;

	public function __construct(ProductsRepository $repository, \League\Csv\Writer $writer) {
		$this->repository = $repository;
		$this->csv_writer = $writer;
	}

	public function export(): void {
		$this->csv_writer->insertAll($this->repository->get_all());
		$this->logger->info('Products exported! Yay!');
	}

}