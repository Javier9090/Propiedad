<?php

namespace Acme\PropiedadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoPropiedad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoPropiedad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=45)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Observaciones", type="string", length=255)
     */
    private $observaciones;
	
	/**
     * @ORM\OneToOne(targetEntity="Propiedad")
     */
     private $propiedad;

	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return TipoPropiedad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return TipoPropiedad
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
}
