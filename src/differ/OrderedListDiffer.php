<?php

namespace Diff;

use Diff\ArrayComparer\OrderedArrayComparer;
use Diff\Comparer\ValueComparer;

/**
 * Differ that looks at the order of the values and the values of the arrays.
 *
 * Quantity matters: [42, 42] and [42] are different
 * Order matters: [42, 43] and [43, 42] are different
 *
 * @since 0.9
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 * @author Tobias Gritschacher < tobias.gritschacher@wikimedia.de >
 */
class OrderedListDiffer implements Differ {

	/**
	 * @since 0.9
	 *
	 * @var ListDiffer
	 */
	protected $differ = null;

	/**
	 * Constructor.
	 *
	 * @since 0.9
	 *
	 * @param ValueComparer $comparer
	 */
	public function __construct( ValueComparer $comparer ) {
		$this->differ = new ListDiffer( new OrderedArrayComparer( $comparer ) );
	}

	/**
	 * @see Differ::doDiff
	 *
	 * @since 0.9
	 *
	 * @param array $oldValues The first array
	 * @param array $newValues The second array
	 *
	 * @return DiffOp[]
	 */
	public function doDiff( array $oldValues, array $newValues ) {
		return $this->differ->doDiff( $oldValues, $newValues );
	}

}
