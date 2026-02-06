<?php
// src/Configuracion/Services/MenuService.php
namespace App\Configuracion\Services;

use App\Service\funciones;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class MenuService
{
	private TokenStorageInterface $tokenStorage;
	private $funciones;

    public function __construct(TokenStorageInterface $tokenStorage,Funciones $funciones)
    {
        $this->tokenStorage = $tokenStorage;
		$this->funciones = $funciones;
    }
	
	
    public function dimeMenuSecundario(int $id)
    {
        $funciones = new funciones();
        $token = $this->tokenStorage->getToken();
        $user  = $token ? $token->getUser() : null;

        $us = $funciones->datosEmpleado($user);
        $jarvisConex = $funciones->abrirconexion('xtreme',$us[1]);
        $sth_menu = $funciones->consultaBD1("SELECT p.id_procesos,p.nombre_procesos,sp.nombre_subprocesos,sp.id_subprocesos,"
                . "sp.link_subprocesos,sp.icono_subprocesos "
                . "FROM sch_securelogin_tbdata_procesos p "
                . "join sch_securelogin_tbdata_subprocesos sp on p.id_procesos=sp.id_procesos  "
                . "where p.id_subnivel=".trim($id)." and p.estado_procesos=1 and sp.estado_subprocesos=1  "
                . "order by p.orden_procesos ASC,sp.orden_subprocesos ASC;",$jarvisConex);
        $jarvisConex->close();
        $menu=''; $vetados = array(164=>164,165=>165);
        $permisos = $this->dimePermisosSecundarios();
        if ($sth_menu->num_rows>0){
            $row=0;$ban=0;
            while ($result_menu = $sth_menu->fetch_object()){
                if (isset($permisos[$result_menu->id_procesos])) {
                    if ($result_menu->id_procesos != $row) {
                        if ($row > 0) {
                            $menu .= '</div>
                                </div>
                            </div>
                        </div>';
                        }
                        if (strlen($result_menu->nombre_procesos) <= 4) {
                            $nombre_p = utf8_encode(strtoupper($result_menu->nombre_procesos));
                        } else {
                            $nombre_p = utf8_encode(ucwords(strtolower($result_menu->nombre_procesos)));
                        }
                        $row = $result_menu->id_procesos;
                        $menu .= '<div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">' . $nombre_p . '</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div style="text-align:center">
                                            <div class="row" >';
                    }
                    //$ruta = $this->get('templating.helper.assets')->getUrl('/bundles/app/images/');
					$ruta = 'assets/images/';
                    if (isset($vetados[$result_menu->id_subprocesos])){
                        $nombre_sp = $result_menu->nombre_subprocesos;
                    }else{
                        if (strlen($result_menu->nombre_subprocesos) <= 4) {
                            $nombre_sp = utf8_encode(strtoupper($result_menu->nombre_subprocesos));
                        } else {
                            $nombre_sp = utf8_encode((($result_menu->nombre_subprocesos)));
                        }
                    }
                    if (isset($permisos[$result_menu->id_procesos][$result_menu->id_subprocesos])) {
                        if ($result_menu->icono_subprocesos != 'link') {
                            $menu .= '<div class="col-xs-12 col-md-3" >
                                        <a href="' . trim($result_menu->link_subprocesos) . '">
                                            <img class="iconostopXT" src="' . $ruta . trim($result_menu->icono_subprocesos) . '" alt="Example" " />
                                        </a>
                                         <br><h3>' . $nombre_sp . '</h3>
                                   </div>';
                        } else {
                            $menu .= '<a href="' . trim($result_menu->link_subprocesos) . '" class="btn btn-default" role="button">' . $nombre_sp . '</a>';
                        }
                    }
                }

            }
            
        }else{
            $menu ='<h2>NO HAY MENU CONFIGURADO</h2>';
        }
        return $menu;
    }
	
	public function dimePermisosSecundarios(){
		$funciones = new funciones();
        $token = $this->tokenStorage->getToken();
        $user  = $token ? $token->getUser() : null;

        $us = $funciones->datosEmpleado($user);
//     
         $permisos = array();
        if ($us!='anon.') {
            $sql = "SELECT distinct sp.id_subprocesos,sp.id_procesos  FROM sch_securelogin_tbdata_usuarios_permisos up
                join sch_securelogin_tbdata_members m on up.id_usuario=m.id
                join sch_securelogin_tbdata_subprocesos sp on up.id_subprocesos=sp.id_subprocesos
                join sch_securelogin_tbdata_procesos p on p.id_procesos=sp.id_procesos
                where m.username='".trim($user)."' and m.expired=0 and sp.estado_subprocesos=1;";
            //$us = $funciones->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
            $jarvisConex = $funciones->abrirconexion('xtreme',$us[1]);
            $sth_menu = $funciones->consultaBD1($sql,$jarvisConex);
            if ($sth_menu->num_rows>0){
                while ($result_menu = $sth_menu->fetch_object()){
                    $permisos[$result_menu->id_procesos][$result_menu->id_subprocesos]=$result_menu->id_subprocesos;
                }
            }
            $jarvisConex->close();
        }

        return $permisos;


    }
}
