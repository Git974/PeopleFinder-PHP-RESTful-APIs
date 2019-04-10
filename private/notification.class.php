<?php

class Notification extends Model{

  private $subject;
  private $message;
  private $sentDate;

  public function set_subject($subject){
    $this->subject = $subject;
  }

  public function get_subject($subject){
    return $this->subject;
  }

  public function set_message($message){
    $this->message = $message;
  }

  public function get_message($message){
    return $this->message;
  }

  public function set_sentDate($sentDate){
    $this->sentDate = $sentDate;
  }

  public function get_sentDate($sentDate){
    return $this->sentDate;
  }

}
