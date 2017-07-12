<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yazilar
 *
 * @ORM\Table(name="yazilar")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\YazilarRepository")
 */
class Yazilar
{


    /**
     * Many Yazilar have Many Kategori.
     * @ORM\ManyToMany(targetEntity="Kategori", inversedBy="Yazilar")
     * @ORM\JoinTable(name="KategoriYazi")
     */
    private $kategoriler;

    public function __construct() {
        $this->kategoriler = new \Doctrine\Common\Collections\ArrayCollection();
    }
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
     * @ORM\Column(name="baslik", type="string", length=255)
     */
    private $baslik;

    /**
     * @var string
     *
     * @ORM\Column(name="icerik", type="text")
     */
    private $icerik;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="text")
     */
    private $slogan;

    /**
     * @var string
     *
     * @ORM\Column(name="ana_resim", type="string", length=255 , nullable=true)
     */
    private $anaResim;


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
     * Set baslik
     *
     * @param string $baslik
     *
     * @return Yazilar
     */
    public function setBaslik($baslik)
    {
        $this->baslik = $baslik;

        return $this;
    }

    /**
     * Get baslik
     *
     * @return string
     */
    public function getBaslik()
    {
        return $this->baslik;
    }

    /**
     * Set icerik
     *
     * @param string $icerik
     *
     * @return Yazilar
     */
    public function setIcerik($icerik)
    {
        $this->icerik = $icerik;

        return $this;
    }

    /**
     * Get icerik
     *
     * @return string
     */
    public function getIcerik()
    {
        return $this->icerik;
    }

    /**
     * Set slogan
     *
     * @param string $slogan
     *
     * @return Yazilar
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set anaResim
     *
     * @param string $anaResim
     *
     * @return Yazilar
     */
    public function setAnaResim($anaResim)
    {
        $this->anaResim = $anaResim;

        return $this;
    }

    /**
     * Get anaResim
     *
     * @return string
     */
    public function getAnaResim()
    {
        return $this->anaResim;
    }

    /**
     * Add kategoriler
     *
     * @param \AppBundle\Entity\Kategori $kategoriler
     *
     * @return Yazilar
     */
    public function addKategoriler(\AppBundle\Entity\Kategori $kategoriler)
    {
        $this->kategoriler[] = $kategoriler;

        return $this;
    }

    /**
     * Remove kategoriler
     *
     * @param \AppBundle\Entity\Kategori $kategoriler
     */
    public function removeKategoriler(\AppBundle\Entity\Kategori $kategoriler)
    {
        $this->kategoriler->removeElement($kategoriler);
    }

    /**
     * Get kategoriler
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKategoriler()
    {
        return $this->kategoriler;
    }
}
