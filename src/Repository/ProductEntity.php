<?php declare( strict_types=1 );

class ProductEntity {

	/**
	 * @var int
	 */
	public $id;
	/**
	 * @var string
	 */
	public $title;
	/**
	 * @var float
	 */
	public $price;

	public function __construct(array $product_args) {
		$this->id = (int) $product_args['id'];
		$this->title = $product_args['title'];
		$this->price = (float) $product_args['price'];
	}
}