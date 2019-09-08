<?php

namespace AppBundle\Model\Scorenco;


class Equipe
{
    private $teamId;
    private $clubId;
    private $teamSlug;
    private $clubSlug;
    private $name;
    private $score;
    private $result;

    /**
     * @return mixed
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * @param mixed $teamId
     * @return Equipe
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClubId()
    {
        return $this->clubId;
    }

    /**
     * @param mixed $clubId
     * @return Equipe
     */
    public function setClubId($clubId)
    {
        $this->clubId = $clubId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeamSlug()
    {
        return $this->teamSlug;
    }

    /**
     * @param mixed $teamSlug
     * @return Equipe
     */
    public function setTeamSlug($teamSlug)
    {
        $this->teamSlug = $teamSlug;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClubSlug()
    {
        return $this->clubSlug;
    }

    /**
     * @param mixed $clubSlug
     * @return Equipe
     */
    public function setClubSlug($clubSlug)
    {
        $this->clubSlug = $clubSlug;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Equipe
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     * @return Equipe
     */
    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     * @return Equipe
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }
}