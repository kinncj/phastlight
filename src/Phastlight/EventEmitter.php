<?php
namespace Phastlight;

class EventEmitter extends \Phastlight\Object
{
  private $eventListeners;

  public function __construct()
  {
    $this->eventListeners = array();
  } 

  public function addListener($event, $listener) 
  {
    if(!isset($this->eventListeners[$even])){
      $this->eventListeners[$event] = array();
    }  
  } 
 

  /**
   * add a listener to the end of the listeners array for the specified event
   */
  public function on($event, $listener)
  {
    if(!isset($this->eventListeners[$even])){
      $this->eventListeners[$event] = array();
    }  
    $this->eventListeners[$event][] = $listener;
  }

  public function removeListener($event, $listener)
  {
    // TO DO...
  }

  public function removeAllListeners($event)
  {
    if(!isset($this->eventListeners[$even])){
      unset($this->eventListeners[$event]);
    }
  }

  public function getListeners($event)
  {
    $listeners = array();
    if(!isset($this->eventListeners[$event])){
      $listeners = $this->eventListeners[$event];
    }
    return $listeners;
  }

  public function emit($event/*,$arg1,$arg2...*/)
  {
    if(isset($this->eventListeners[$event])){
      $listener_count = count($this->eventListeners);
      $args = func_get_args();
      array_shift($args); //skip $event
      for($k = 0; $k < $listener_count; $k++){
        call_user_func_array($this->eventListeners[$k], $args);
      }
    }
  }
} 
