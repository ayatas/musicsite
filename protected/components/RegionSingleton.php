<?php 
 
class RegionSingleton extends CApplicationComponent
{
    private $count;
	private $next;
	private $prev;
	private $result;
	
	public function setModel($model){
		$this->count = count($model);
	}
	
	public function getResult($next, $prev){
		$this->next = $next;
		$this->prev = $prev;
		return json_encode($this);
	}
}
