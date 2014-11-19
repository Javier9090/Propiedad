<?php

namespace Acme\PropiedadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Propiedad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Propiedad
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
     * @ORM\Column(name="Calle", type="string", length=45)
     */
    private $calle;

    /**
     * @var integer
     *
     * @ORM\Column(name="Numero", type="integer")
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="Piso", type="integer")
     */
    private $piso;

    /**
     * @var string
     *
     * @ORM\Column(name="Departamento", type="string", length=45)
     */
    private $departamento;

    /**
     * @var string
     *
     * @ORM\Column(name="Estado", type="string", length=45)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="Precio", type="integer")
     */
    private $precio;

    /**
     * @var integer
     *
     * @ORM\Column(name="CantidadAmbientes", type="integer")
     */
    private $cantidadAmbientes;

    /**
     * @var integer
     *
     * @ORM\Column(name="CantidadBanios", type="integer")
     */
    private $cantidadBanios;

    /**
     * @var string
     *
     * @ORM\Column(name="Observaciones", type="string", length=255)
     */
    private $observaciones;

    	
    /**
    * @ORM\ManyToOne(targetEntity="Zona", inversedBy="propiedades")
    */
    protected $zona;

     /**
     * @ORM\OneToOne(targetEntity="TipoPropiedad", inversedBy="propiedad")
     */
    private $tipoPropiedad;  


     
    /**
     * @ORM\ManyToMany(targetEntity="Caracteristicas");
     * @ORM\JoinTable(name="caracteristicas_propiedades",
     *      joinColumns={@ORM\JoinColumn(name="propiedad_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="caracteristicas_id", referencedColumnName="id")}
     *      )
     */
    private $Caracteristicas;


    public function __construct(){

    $this->Caracteristicas = new \Doctrine\Common\Collections\ArrayCollection();

    }  

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
     * Set calle
     *
     * @param string $calle
     * @return Propiedad
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Propiedad
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set piso
     *
     * @param integer $piso
     * @return Propiedad
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Get piso
     *
     * @return integer 
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     * @return Propiedad
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Propiedad
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     * @return Propiedad
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set cantidadAmbientes
     *
     * @param integer $cantidadAmbientes
     * @return Propiedad
     */
    public function setCantidadAmbientes($cantidadAmbientes)
    {
        $this->cantidadAmbientes = $cantidadAmbientes;

        return $this;
    }

    /**
     * Get cantidadAmbientes
     *
     * @return integer 
     */
    public function getCantidadAmbientes()
    {
        return $this->cantidadAmbientes;
    }

    /**
     * Set cantidadBanios
     *
     * @param integer $cantidadBanios
     * @return Propiedad
     */
    public function setCantidadBanios($cantidadBanios)
    {
        $this->cantidadBanios = $cantidadBanios;

        return $this;
    }

    /**
     * Get cantidadBanios
     *
     * @return integer 
     */
    public function getCantidadBanios()
    {
        return $this->cantidadBanios;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Propiedad
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
