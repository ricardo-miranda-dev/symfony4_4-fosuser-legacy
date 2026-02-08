<?php

namespace App\Entity\Ventas;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Ventas\SucursalRepository")
 * @ORM\Table(name="sch_ven_tbl_sucursales")
 */
class Sucursal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="ID", type="integer", options={"unsigned": true})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $emisor;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $ruc;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $matriz;

    /**
     * @ORM\Column(name="Sucursal", type="string", length=200, nullable=true)
     */
    private $sucursal;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(name="lleva_cont", type="string", length=10, nullable=true)
     */
    private $llevaCont;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $estado;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $usuario;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;

    /* =============================
     * GETTERS
     * ============================= */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmisor(): ?string
    {
        return $this->emisor;
    }

    public function getRuc(): ?string
    {
        return $this->ruc;
    }

    public function getMatriz(): ?string
    {
        return $this->matriz;
    }

    public function getSucursal(): ?string
    {
        return $this->sucursal;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function getLlevaCont(): ?string
    {
        return $this->llevaCont;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function getUsuario(): ?int
    {
        return $this->usuario;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    /* =============================
     * SETTERS
     * ============================= */

    public function setEmisor(?string $emisor): self
    {
        $this->emisor = $emisor;
        return $this;
    }

    public function setRuc(?string $ruc): self
    {
        $this->ruc = $ruc;
        return $this;
    }

    public function setMatriz(?string $matriz): self
    {
        $this->matriz = $matriz;
        return $this;
    }

    public function setSucursal(?string $sucursal): self
    {
        $this->sucursal = $sucursal;
        return $this;
    }

    public function setCorreo(?string $correo): self
    {
        $this->correo = $correo;
        return $this;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function setLlevaCont(?string $llevaCont): self
    {
        $this->llevaCont = $llevaCont;
        return $this;
    }

    public function setEstado(?int $estado): self
    {
        $this->estado = $estado;
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
