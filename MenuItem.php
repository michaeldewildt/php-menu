<?php
class MenuItem
{
	private $name;
	private $url;
	private $isPost;
	private $level;
	private $items;

	public function __construct($itemName, $itemLevel, $itemUrl = '#', $isPost = false)
	{
		$this->name = $itemName;
		$this->level = $itemLevel;
		$this->url = $itemUrl;
		$this->isPost = $isPost;
		$this->items = array();
	}

	public function addItem(MenuItem $menuItem)
	{
		$this->items[] = $menuItem;
	}

	public function serialize()
	{
		$html = "";

		if ($this->level == 0)
			$html = "<ul class=\"menu\">\n";

		if (!empty($this->items))
			$html .= "<li class=\"{$this->getClass()} menu-arrow\">";
		else
			$html .= "<li class=\"{$this->getClass()}\">";

		$html .= "<a href=\"$this->url\">$this->name";

		if (!empty($this->items))
		{
			$html .= "</a>\n<ul class=\"{$this->getClass()}-block\">\n";

			foreach ($this->items as $menuItem)
				$html .= $menuItem->serialize();

			$html .= "</ul>\n";
		}
		else
		{
			$html .= "</a>";
		}

		$html .= "</li>\n";

		if ($this->level == 0)
			$html .= "</ul>\n";

		return $html;
	}

	private function getClass()
	{
		switch ($this->level)
		{
			case 0:
				$class = "level-zero";
				break;
			case 1:
				$class = "level-one";
				break;
			case 2:
				$class = "level-two";
				break;
		}
		return $class;
	}
}
