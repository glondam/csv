<?php

namespace CsvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * csv
 *
 * @ORM\Table(name="csv")
 * @ORM\Entity(repositoryClass="CsvBundle\Repository\csvRepository")
 */
class csv
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="date01", type="string", length=255)
     */
    private $date01;

    /**
     * @var string
     *
     * @ORM\Column(name="date02", type="string", length=255)
     */
    private $date02;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;

    /**
     * @var string
     *
     * @ORM\Column(name="debit", type="string", length=255)
     */
    private $debit;

    /**
     * @var string
     *
     * @ORM\Column(name="credit", type="string", length=255)
     */
    private $credit;

    /**
     * @var string
     *
     * @ORM\Column(name="index01", type="string", length=255)
     */
    private $index01;

    /**
     * @var string
     *
     * @ORM\Column(name="index02", type="string", length=255)
     */
    private $index02;

    /**
     * @var string
     *
     * @ORM\Column(name="index03", type="string", length=255)
     */
    private $index03;

    /**
     * @ORM\ManyToOne(targetEntity="CsvBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id")
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date01
     *
     * @param string $date01
     *
     * @return csv
     */
    public function setDate01($date01)
    {
        $this->date01 = $date01;

        return $this;
    }

    /**
     * Get date01
     *
     * @return string
     */
    public function getDate01()
    {
        return $this->date01;
    }

    /**
     * Set date02
     *
     * @param string $date02
     *
     * @return csv
     */
    public function setDate02($date02)
    {
        $this->date02 = $date02;

        return $this;
    }

    /**
     * Get date02
     *
     * @return string
     */
    public function getDate02()
    {
        return $this->date02;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     *
     * @return csv
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set debit
     *
     * @param string $debit
     *
     * @return csv
     */
    public function setDebit($debit)
    {
        $this->debit = $debit;

        return $this;
    }

    /**
     * Get debit
     *
     * @return string
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * Set credit
     *
     * @param string $credit
     *
     * @return csv
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return string
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set index01
     *
     * @param string $index01
     *
     * @return csv
     */
    public function setIndex01($index01)
    {
        $this->index01 = $index01;

        return $this;
    }

    /**
     * Get index01
     *
     * @return string
     */
    public function getIndex01()
    {
        return $this->index01;
    }

    /**
     * Set index02
     *
     * @param string $index02
     *
     * @return csv
     */
    public function setIndex02($index02)
    {
        $this->index02 = $index02;

        return $this;
    }

    /**
     * Get index02
     *
     * @return string
     */
    public function getIndex02()
    {
        return $this->index02;
    }

    /**
     * Set index03
     *
     * @param string $index03
     *
     * @return csv
     */
    public function setIndex03($index03)
    {
        $this->index03 = $index03;

        return $this;
    }

    /**
     * Get index03
     *
     * @return string
     */
    public function getIndex03()
    {
        return $this->index03;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }



}

