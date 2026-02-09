<?php

namespace App\Entity\RRHH;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RRHH\EmpleadosRepository")
 * @ORM\Table(
 *     name="sch_rrh_tbl_empleados",
 *     indexes={
 *         @ORM\Index(name="IDXEMPL001", columns={"emplAPELLIDOS","emplNOMBRES"}),
 *         @ORM\Index(name="IDXEMPL002", columns={"emplTIPO_CEDULA","emplCEDULA"})
 *     }
 * )
 */
class Empleados
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="emplID", type="integer", options={"unsigned": true})
     */
    private $id;

    /** @ORM\Column(name="emplNOMBRES", type="string", length=100) */
    private $nombres;

    /** @ORM\Column(name="emplAPELLIDOS", type="string", length=100) */
    private $apellidos;

    /** @ORM\Column(name="emplTIPO_CEDULA", type="string", length=1) */
    private $tipoCedula;

    /** @ORM\Column(name="emplCEDULA", type="string", length=20) */
    private $cedula;

    /** @ORM\Column(name="emplDIRECCION_CALLEP", type="string", length=100) */
    private $direccionCalleP;

    /** @ORM\Column(name="emplDIRECCION_CALLES", type="string", length=100) */
    private $direccionCalleS;

    /** @ORM\Column(name="emplDIRECCION_NUMERO", type="string", length=10) */
    private $direccionNumero;

    /** @ORM\Column(name="emplTELEFONO_CASA", type="string", length=20) */
    private $telefonoCasa;

    /** @ORM\Column(name="emplTELEFONO_CELULAR", type="string", length=20) */
    private $telefonoCelular;

    /** @ORM\Column(name="emplGENERO", type="string", length=1) */
    private $genero;

    /** @ORM\Column(name="emplID_EDUCACION", type="smallint", options={"unsigned": true}) */
    private $idEducacion;

    /** @ORM\Column(name="emplFECHA_NACIMIENTO", type="date") */
    private $fechaNacimiento;

    /** @ORM\Column(name="emplESTADO_CIVIL", type="string", length=1) */
    private $estadoCivil;

    /** @ORM\Column(name="emplID_CIUDADNACE", type="smallint", options={"unsigned": true}) */
    private $idCiudadNace;

    /** @ORM\Column(name="emplID_REGIMEN", type="smallint", options={"unsigned": true}) */
    private $idRegimen;

    /** @ORM\Column(name="orgID", type="smallint", options={"unsigned": true}) */
    private $orgId;

    /** @ORM\Column(name="emplID_CIUDADLABORA", type="smallint", options={"unsigned": true}) */
    private $idCiudadLabora;

    /** @ORM\Column(name="emplID_CARGOEMPRESA", type="smallint", options={"unsigned": true}) */
    private $idCargoEmpresa;

    /** @ORM\Column(name="emplID_CLASETRABAJADOR", type="smallint", options={"unsigned": true}) */
    private $idClaseTrabajador;

    /** @ORM\Column(name="emplCUENTA_BANCARIA", type="string", length=45) */
    private $cuentaBancaria;

    /** @ORM\Column(name="emplTIPO_CUENTA", type="string", length=1) */
    private $tipoCuenta;

    /** @ORM\Column(name="emplEMPRESA_IESS", type="string", length=1) */
    private $empresaIess;

    /** @ORM\Column(name="emplEMPRESA_RENTA", type="string", length=1) */
    private $empresaRenta;

    /** @ORM\Column(name="emplBENEFICIOS_SOCIALES", type="string", length=1) */
    private $beneficiosSociales;

    /** @ORM\Column(name="emplTERCERA_EDAD", type="string", length=1) */
    private $terceraEdad;

    /** @ORM\Column(name="emplFRESERVA_ROL", type="string", length=1) */
    private $fReservaRol;

    /** @ORM\Column(name="emplCONADIS", type="string", length=1) */
    private $conadis;

    /** @ORM\Column(name="emplFRESERVA_INICIAL", type="string", length=1) */
    private $fReservaInicial;

    /** @ORM\Column(name="emplFOTOGRAFIA", type="blob", nullable=true) */
    private $fotografia;

    /** @ORM\Column(name="emplSUELDO", type="float") */
    private $sueldo;

    /** @ORM\Column(name="emplQUINCENA", type="float") */
    private $quincena;

    /** @ORM\Column(name="emplID_TIPOCONTRATO", type="smallint", options={"unsigned": true}) */
    private $idTipoContrato;

    /** @ORM\Column(name="emplTIPO_ROL", type="string", length=1) */
    private $tipoRol;

    /** @ORM\Column(name="emplESTADO", type="string", length=1) */
    private $estado;

    /** @ORM\Column(name="emplTIPO_SANGRE", type="string", length=10) */
    private $tipoSangre;

    /** @ORM\Column(name="emplEMAIL_EMPRESARIAL", type="string", length=100) */
    private $emailEmpresarial;

    /** @ORM\Column(name="emplEMAIL_PERSONAL", type="string", length=100) */
    private $emailPersonal;

    /** @ORM\Column(name="emplNOVEDADES", type="string", length=10000) */
    private $novedades;

    /** @ORM\Column(name="emplBANCO", type="smallint", options={"unsigned": true}) */
    private $banco;

    /** @ORM\Column(name="cecosID", type="integer", nullable=true, options={"unsigned": true}) */
    private $cecosId;

    /** @ORM\Column(name="emplLIBRETAMILITAR", type="string", length=20) */
    private $libretaMilitar;

    /** @ORM\Column(name="emplSRI", type="string", length=3) */
    private $sri;

    /** @ORM\Column(name="emplPORCENTAJE_DISCAPACIDAD", type="decimal", precision=6, scale=0) */
    private $porcentajeDiscapacidad;

    /** @ORM\Column(name="emplDIAS_DECIMOCUARTO", type="decimal", precision=3, scale=0, nullable=true) */
    private $diasDecimoCuarto;

    /** @ORM\Column(name="emplACUMULABS", type="string", length=10, nullable=true) */
    private $acumulaBs;

    /* =======================
       GETTERS & SETTERS
       ======================= */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;
        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getNombreCompleto(): string
    {
        return trim($this->nombres . ' ' . $this->apellidos);
    }

    // 👉 El resto de getters y setters siguen exactamente el mismo patrón
}
