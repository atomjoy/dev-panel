<?php

namespace App\Notifications\Messages;

class NotifyMessage
{
	protected array $links = [];
	protected string $content = '';

	function setContent($msg)
	{
		return $this->content = $msg;
	}

	function setLink($href, $text, $class = 'notify__link')
	{
		if (!empty($href) && !empty($text)) {
			$this->links[] = [
				'href' => $href,
				'text' => $text,
				'class' => $class,
			];
		}
	}

	function getContent()
	{
		return $this->content;
	}

	function getLinks()
	{
		return $this->links;
	}
}
