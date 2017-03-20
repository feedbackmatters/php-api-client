<?php

namespace FeedbackMatters\Api\Models;

use DateTime;

class Feedback
{
  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $emailaddress;

  /**
   * @var string
   */
  protected $feedback;

  /**
   * @var int
   */
  protected $score;

  /**
   * @var DateTime
   */
  protected $created_at;

  /**
   * Feedback constructor.
   *
   * @param string $name
   * @param string $emailaddress
   * @param string $feedback
   * @param int    $score
   * @param string $created_at
   */
  public function __construct($name, $emailaddress, $feedback, $score, $created_at)
  {
    $this->name         = $name;
    $this->emailaddress = $emailaddress;
    $this->feedback     = $feedback;
    $this->score        = $score;
    $this->created_at   = $created_at;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getEmailaddress()
  {
    return $this->emailaddress;
  }

  /**
   * @return string
   */
  public function getFeedback()
  {
    return $this->feedback;
  }

  /**
   * @return int
   */
  public function getScore()
  {
    return $this->score;
  }

  /**
   * @return DateTime
   */
  public function getCreatedAt()
  {
    return new DateTime($this->created_at);
  }
}