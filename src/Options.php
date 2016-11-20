<?php

namespace Halfpastfour\PHPChartJS;
use Halfpastfour\PHPChartJS\Options\Hover;
use Halfpastfour\PHPChartJS\Options\Scales;

/**
 * Class Options
 * @package Halfpastfour\PHPChartJS
 */
class Options implements ChartOwnedInterface, ArraySerializable, \JsonSerializable
{
	use ChartOwned;

	/**
	 * @var Hover
	 */
	private $hover;

	/**
	 * @var Scales
	 */
	private $scales;

	/**
	 * @return Hover
	 */
	public function hover()
	{
		if( is_null( $this->hover ) ) {
			$this->hover	= new Hover();
		}

		return $this->hover;
	}

	/**
	 * @return Scales
	 */
	public function scales()
	{
		if( is_null( $this->scales ) ) {
			$this->scales	= new Scales();
		}

		return $this->scales;
	}

	/**
	 * @return array
	 */
	public function getArrayCopy()
	{
		$data	= array();

		if( !is_null( $this->hover ) ) $data['hover'] = $this->hover()->getArrayCopy();
		if( !is_null( $this->scales ) ) $data['scales'] = $this->scales()->getArrayCopy();

		return $data;
	}

	/**
	 * @return string
	 */
	public function jsonSerialize()
	{
		return json_encode( $this->getArrayCopy() );
	}
}