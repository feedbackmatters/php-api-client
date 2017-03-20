<?php

namespace FeedbackMatters\Api\Models;

use DateTime;

class Statistics
{
  /**
   * @var int
   */
  protected $opened;

  /**
   * @var int
   */
  protected $filled;

  /**
   * @var int
   */
  protected $request;

  /**
   * @var int
   */
  protected $promoters;

  /**
   * @var int
   */
  protected $passives;

  /**
   * @var int
   */
  protected $detractors;

  /**
   * @var string
   */
  protected $date;

  /**
   * @var int
   */
  protected $nps;

  /**
   * Statistics constructor.
   *
   * @param int    $opened
   * @param int    $filled
   * @param int    $request
   * @param int    $promoters
   * @param int    $passives
   * @param int    $detractors
   * @param string $date
   * @param int    $nps
   */
  public function __construct(
    $opened,
    $filled,
    $request,
    $promoters,
    $passives,
    $detractors,
    $date,
    $nps
  ) {
    $this->opened     = $opened;
    $this->filled     = $filled;
    $this->request    = $request;
    $this->promoters  = $promoters;
    $this->passives   = $passives;
    $this->detractors = $detractors;
    $this->date       = $date;
    $this->nps        = $nps;
  }

  /**
   * @return int
   */
  public function getOpened()
  {
    return $this->opened;
  }

  /**
   * @return int
   */
  public function getFilled()
  {
    return $this->filled;
  }

  /**
   * @return int
   */
  public function getRequest()
  {
    return $this->request;
  }

  /**
   * @return int
   */
  public function getPromoters()
  {
    return $this->promoters;
  }

  /**
   * @return int
   */
  public function getPassives()
  {
    return $this->passives;
  }

  /**
   * @return int
   */
  public function getDetractors()
  {
    return $this->detractors;
  }

  /**
   * @return string
   */
  public function getDate()
  {
    return new DateTime($this->date);
  }

  /**
   * @return int
   */
  public function getNps()
  {
    return $this->nps;
  }
}
