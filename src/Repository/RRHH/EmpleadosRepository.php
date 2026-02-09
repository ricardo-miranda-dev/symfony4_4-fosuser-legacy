<?php

namespace App\Repository\RRHH;

use App\Entity\RRHH\Empleados;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EmpleadosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Empleados::class);
    }

    /**
     * Listado básico de empleados activos
     * Ideal para selects simples
     */
    public function findEmpleadosActivos(): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.estado = :estado')
            ->setParameter('estado', 'A')
            ->orderBy('e.apellidos', 'ASC')
            ->addOrderBy('e.nombres', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Retorna empleados para SELECT:
     *  id => "Nombres Apellidos"
     *
     * Uso típico: value = emplID
     */
    public function findEmpleadosForSelect(): array
    {
        return $this->createQueryBuilder('e')
            ->select('e.id, e.nombres, e.apellidos')
            ->where('e.estado = :estado')
            ->setParameter('estado', 'A')
            ->orderBy('e.apellidos', 'ASC')
            ->addOrderBy('e.nombres', 'ASC')
            ->getQuery()
            ->getArrayResult();
    }

    /**
     * Caso clave:
     * JOIN con FOSUser para mostrar:
     * "username - nombres apellidos"
     *
     * ⚠️ NO forzamos relación ORM
     * Se asume que existe una tabla puente o FK lógica:
     * fos_user.id = empleado.emplID (o la que tú manejes)
     */
    public function findEmpleadosWithUsername(): array
    {
        $dql = "
            SELECT 
                e.id AS empleadoId,
                u.username AS username,
                CONCAT(u.username, ' - ', e.nombres, ' ', e.apellidos) AS label
            FROM App\Entity\RRHH\Empleados e
            JOIN App\Entity\User u WITH u.email = e.emailEmpresarial
            WHERE e.estado = 'A'
            ORDER BY e.apellidos, e.nombres
        ";

        return $this->_em->createQuery($dql)->getArrayResult();
    }

    /**
     * Versión ultra segura para legacy:
     * devuelve solo lo necesario (DTO-like)
     */
    public function findEmpleadosLite(): array
    {
        return $this->_em->createQuery(
            'SELECT 
                e.id,
                e.nombres,
                e.apellidos
             FROM App\Entity\RRHH\Empleados e
             WHERE e.estado = :estado'
        )
        ->setParameter('estado', 'A')
        ->getArrayResult();
    }
	
	public function findUxSucursalesListado(): array
	{
		$dql = "
			SELECT
				uxs.idusxsuc AS id,
				'1' AS usuario,
				s.sucursal AS suc,
				t.sucursal AS def,
				uxs.fecha AS Fecha
			FROM App\Entity\Ventas\UsuarioXSucursal uxs
			JOIN App\Entity\RRHH\Empleados e WITH e.id = uxs.idusxsuc
			JOIN App\Entity\User u WITH u.email = e.emailEmpresarial
			JOIN App\Entity\Ventas\Sucursal s WITH s.id = uxs.idsuc
			JOIN App\Entity\Ventas\Sucursal t WITH t.id = uxs.sdef
			ORDER BY s.sucursal, e.apellidos
		";
		$dql = "
		select 
		uxs.idusxsuc as idgeneral,
		s.sucursal as sucursal,
		CONCAT(u.username, ' - ', UPPER(SUBSTRING(e.nombres,1, LOCATE(' ', e.nombres))), ' ', UPPER(SUBSTRING(e.apellidos,1, LOCATE(' ', e.apellidos)))) AS usuario, 
		t.sucursal as Def,
		uxs.fecha as Fecha
		from App\Entity\Ventas\UsuarioXSucursal uxs
		join App\Entity\RRHH\Empleados e WITH e.id=uxs.idus
		join App\Entity\User u WITH u.email=e.emailEmpresarial
		join App\Entity\Ventas\Sucursal s WITH s.id=uxs.idsuc
		join App\Entity\Ventas\Sucursal t WITH t.id=uxs.sdef
		";
		return $this->_em->createQuery($dql)->getArrayResult();
	}
}
