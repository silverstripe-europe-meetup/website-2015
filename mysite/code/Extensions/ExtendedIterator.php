<?php

/**
 * Class ExtendedIterator does things with the template iterator
 * @inheritdoc
 */
class ExtendedIterator implements TemplateIteratorProvider
{

	protected $iteratorPos;
	protected $iteratorTotalItems;

	public static function get_template_iterator_variables()
	{
		return array('PosGold');
	}

	public function iteratorProperties($pos, $totalItems)
	{
		$this->iteratorPos = $pos;
		$this->iteratorTotalItems = $totalItems;
	}

	public function PosGold()
	{
		$platinum = Sponsor::get()->filter(array('Type' => 'Platinum'))->count();
		return ($this->iteratorPos + $platinum) % 2;
	}
}
