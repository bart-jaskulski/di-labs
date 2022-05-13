<?php declare( strict_types=1 );

class ProductsList implements IteratorAggregate {

	/**
	 * @var ProductEntity[]
	 */
	private $products;

	public function __construct(array $products) {
		$this->products = $products;
	}

	public function getIterator(): ArrayIterator {
		return new ArrayIterator($this->products);
	}
}