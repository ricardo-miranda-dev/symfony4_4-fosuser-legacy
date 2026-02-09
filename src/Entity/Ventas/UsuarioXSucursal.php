<?php

namespace App\Entity\Ventas;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Ventas\UsuarioXSucursalRepository")
 * @ORM\Table(name="sch_ven_tbl_usuario_x_sucursal")
 */
 
 class UsuarioXSucursal
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(name="id_us_x_suc", type="integer", options={"unsigned": true})
	 */
	private $idusxsuc;
	
	/**
	 * @ORM\Column(name="id_sucursal", type="integer", nullable=true)
	 */
	private $idsuc;
	
	/**
	 * @ORM\Column(name="id_usuario", type="integer", nullable=true)
	 */
	private $idus;
	
	/**
	 * @ORM\Column(name="s_default", type="integer", nullable=true)
	 */
	private $sdef;
	
	/**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $usuario;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;
	
	//Getters
	
	public function getId(): ?int
    {
        return $this->idusxsuc;
    }
	
	public function getSuc(): ?int
    {
        return $this->idsuc;
    }
	
	public function getUs(): ?int
    {
        return $this->idus;
    }
	
	public function getDef(): ?int
    {
        return $this->sdef;
    }
	
	public function getUsuario(): ?int
    {
        return $this->usuario;
    }
	
	public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }
	
	//Setters
		
	public function setSuc(?int $idsuc): self
    {
        $this->idsuc = $idsuc;
        return $this;
    }
	
	public function setUs(?int $idus): self
    {
        $this->idus = $idus;
        return $this;
    }
	
	public function setDef(?int $sdef): self
    {
        $this->sdef = $sdef;
        return $this;
    }
	
	public function setUsuario(?int $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;
        return $this;
    }
	
}