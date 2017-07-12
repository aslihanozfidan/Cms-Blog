<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kategori
 *
 * @ORM\Table(name="kategori")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KategoriRepository")
 */
class Kategori
{

     /**
     * Many Kategori have Many Yazilar.
     * @ORM\ManyToMany(targetEntity="Yazilar", mappedBy="kategoriler")
     */
    private $yazilar;

    public function __construct() {
        $this->yazilar = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @ORM\Column(name="aciklama", type="string", length=255)
     */
    private $aciklama;


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
     * @return Kategori
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
     * Set aciklama
     *
     * @param string $aciklama
     *
     * @return Kategori
     */
    public function setAciklama($aciklama)
    {
        $this->aciklama = $aciklama;

        return $this;
    }

    /**
     * Get aciklama
     *
     * @return string
     */
    public function getAciklama()
    {
        return $this->aciklama;
    }

    /**
     * Add yazilar
     *
     * @param \AppBundle\Entity\Yazilar $yazilar
     *
     * @return Kategori
     */
    public function addYazilar(\AppBundle\Entity\Yazilar $yazilar)
    {
        $this->yazilar[] = $yazilar;

        return $this;
    }

    /**
     * Remove yazilar
     *
     * @param \AppBundle\Entity\Yazilar $yazilar
     */
    public function removeYazilar(\AppBundle\Entity\Yazilar $yazilar)
    {
        $this->yazilar->removeElement($yazilar);
    }

    /**
     * Get yazilar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getYazilar()
    {
        return $this->yazilar;
    }
}
