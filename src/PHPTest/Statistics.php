<?php
namespace PHPTest;

class Statistics
{
	private $_stats = array(
        'asserts'   => 0,
        'methods'   => 0,
        'passed'    => 0,
        'fails'     => 0
    );

	public function get()
	{
		return $this->_stats;
	}
}