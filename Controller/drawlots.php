<?php

namespace Controller;

use Controller\IDrawLots;

class DrawLots implements IDrawLots
{
	private $allPerson;
	private $allPersonCount = 0;
	private $giftArray = array(
		'1.',
		'2.',
		'3.',
		'4.',
		'5.',
		'6.',
		'7.',
		'8.',
		'9.',
		'10.',
		'11.',
		'12.',
		'13.',
		'14.',
		'15.',
		'16.',
		'17.',
		'18.',
		'19.',
		'20.',
		'21.',
		'22.',
		'23.',
		'24.',
		'25.',
	);
	
	public function __construct()
	{
		$this->allPerson = file('member.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$this->allPersonCount = count($this->allPerson);
	}
	
	public function action()
	{
		
		// usleep(2500000);
		
		$rand = $this->getRand();
		$_SESSION['exclude'][] = $rand;
				
		$_SESSION['nowDraw'] = $this->allPerson[$rand];
		
		echo $this->allPerson[$rand];
	}
	
	public function present()
	{
		include_once('view/action.html');
	}
	
	public function clearSession()
	{
		unset($_SESSION['gift_winner']);
		unset($_SESSION['exclude']);
	}
	
	public function getRand()
	{
		$rand = mt_rand(0, $this->allPersonCount - 1);
		if (empty($_SESSION['exclude']) || !in_array($rand, $_SESSION['exclude'])) {
			return $rand;
		}
		
		return getRand();
	}
	
	public function giftWinner()
	{
		
		$giftNumber = isset($_POST['giftNumber']) ? $_POST['giftNumber'] : '';
		
		$_SESSION['gift_winner'][$giftNumber-1] = $_SESSION['nowDraw'];
	}
	
	public function checkGiftNumber()
	{
		$input_check = isset($_POST['input_check']) ? $_POST['input_check'] : '';
		
		echo !empty($_SESSION['gift_winner'][$input_check-1]) ? false : true; 
	}
}