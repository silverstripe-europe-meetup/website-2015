<?php

/**
 * @inheritdoc
 * Class ExtendedIterator does things with the template iterator
 */
class ExtendedIterator implements TemplateIteratorProvider
{

	/**
	 * @var
	 */
	protected $iteratorPos;
	/**
	 * @var
	 */
	protected $iteratorTotalItems;

	/**
	 * @inheritdoc
	 */
	public static function get_template_iterator_variables()
	{
		return array('PosGold');
	}

	/**
	 * @inheritdoc
	 */
	public function iteratorProperties($pos, $totalItems)
	{
		$this->iteratorPos = $pos;
		$this->iteratorTotalItems = $totalItems;
	}

	/**
	 * @return int
	 */
	public function PosGold()
	{
		$platinum = Sponsor::get()->filter(array('Type' => 'Platinum'))->count();
		return ($this->iteratorPos + $platinum) % 2;
	}
}
