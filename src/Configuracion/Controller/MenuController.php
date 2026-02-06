<?php

namespace App\Configuracion\Controller;

use App\Service\funciones;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController
{
	private $funciones;

    public function __construct(Funciones $funciones)
    {
        $this->funciones = $funciones;
    }
	
    /**
     * @Route("/menu", name="menu_list")
     */
    public function redirectAction()
    {
        //print_r($this->get('security.token_storage')->getToken());
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
		//$menu=' ';
        $menu= $this->dimeMenuPrincipal();
        return $this->render('Configuracion/menu/menu.html.twig',array('menu'=>$menu));
    }
	

    public function revisarparametros($us){
        $funciones = new funciones(); 
        $us = $funciones->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
        $jarvisConex = $funciones->abrirconexion('xtreme',$us[1]);
        //echo "PASO";


        
       
    }

    public function bloqueausuario($us){
        $funciones = new funciones();
        $us = $funciones->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
        $jarvisConex = $funciones->abrirconexion('xtreme',$us[1]);

       
    }


    public function dimeMenuSecundario($id){
        $funciones = new funciones();
        $us = $funciones->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
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

    public function dimePermisos(){
        $us = $this->get('security.token_storage')->getToken()->getUser();
        $funciones = new funciones();
        $permisos = array();
        //$BD=$funciones->dimeBDDataFact($us[1]);
        
        if ($us!='anon.') {
            $this->revisarparametros($us->getID());
            $this->bloqueausuario($us->getID());
            $sql = "SELECT distinct p.id_subnivel FROM sch_securelogin_tbdata_usuarios_permisos up
                join sch_securelogin_tbdata_members m on up.id_usuario=m.id
                join sch_securelogin_tbdata_subprocesos sp on up.id_subprocesos=sp.id_subprocesos
                join sch_securelogin_tbdata_procesos p on p.id_procesos=sp.id_procesos
                join sch_securelogin_tbdata_subnivel sn on sn.id_subnivel=p.id_subnivel
                where m.username='".trim($us)."' and m.expired=0 and sp.estado_subprocesos=1;";
            $us = $funciones->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
            $jarvisConex = $funciones->abrirconexion('xtreme',$us[1]);
            $sth_menu = $funciones->consultaBD1($sql,$jarvisConex);
            if ($sth_menu->num_rows>0){
                while ($result_menu = $sth_menu->fetch_object()){
                    $permisos[$result_menu->id_subnivel]=$result_menu->id_subnivel;
                }
            }
            $jarvisConex->close();
        }

        return $permisos;


    }

    public function dimePermisosSecundarios(){
        $us = $this->get('security.token_storage')->getToken()->getUser();
//     
        $funciones = new funciones(); $permisos = array();
        if ($us!='anon.') {
            $sql = "SELECT distinct sp.id_subprocesos,sp.id_procesos  FROM sch_securelogin_tbdata_usuarios_permisos up
                join sch_securelogin_tbdata_members m on up.id_usuario=m.id
                join sch_securelogin_tbdata_subprocesos sp on up.id_subprocesos=sp.id_subprocesos
                join sch_securelogin_tbdata_procesos p on p.id_procesos=sp.id_procesos
                where m.username='".trim($us)."' and m.expired=0 and sp.estado_subprocesos=1;";
            $us = $funciones->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
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



    public function dimeMenuPrincipal(){
        $funciones = new funciones();
        $us = $funciones->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
        $jarvisConex = $funciones->abrirconexion('xtreme',$us[1]);
        $sth_menu = $funciones->consultaBD1("SELECT n.id_nivel,sn.id_subnivel,sn.link_subnivel,sn.icono_subnivel,sn.nombre_subnivel from sch_securelogin_tbdata_niveles n join sch_securelogin_tbdata_subnivel sn on n.id_nivel=sn.id_nivel where n.estado_nivel=1 and sn.estado_subnivel order by  n.orden_nivel ASC,sn.orden_subnivel ASC ",$jarvisConex);
        $jarvisConex->close();
        $menu=''; //style="filter: grayscale(90%);
        $permisos = $this->dimePermisos();
        if ($sth_menu->num_rows>0){
            $row=0;$ban=0;
            $style ='style="filter: grayscale(90%);"';
            $style ='style=""';
            //$ruta = $this->get('templating.helper.assets')->getUrl('/bundles/app/images/');
			$ruta = 'assets/images/';
            // Descomentar Menu
            while ($result_menu = $sth_menu->fetch_object()){
                if ($result_menu->id_nivel!=$row) {
                    if ($row>0){
                        $menu .= '</div>';
                    }
                    $row=$result_menu->id_nivel;
                    $menu .= '<div class="row" >';
                }
                if (strlen ($result_menu->nombre_subnivel )<=4){
                    $nombre = utf8_encode(strtoupper($result_menu->nombre_subnivel));
                }else{
                    $nombre = utf8_encode(($result_menu->nombre_subnivel));
                }
                $style ='style="filter: grayscale(90%);"';
                $link='#!';
                if (isset($permisos[$result_menu->id_subnivel])){
                    $link = trim($result_menu->link_subnivel);
                    $style='';
                }
                //$ruta = $this->get('templating.helper.assets')->getUrl('/bundles/app/images/');
				$ruta = 'assets/images/';
//                $menu .= ' <div class="text-center col-lg-1 col-md-1 col-sm-1 col-xs-12 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
//                                <a href="'.$link.'">
//                                    <img class="iconostop" src="'.$ruta.trim($result_menu->icono_subnivel).'" alt='.$nombre.' '.$style.'  />
//                                    <br>'.$nombre.'
//                                </a>
//                            </div>';
                $menu .= '  <div class="text-center col-md-4 col-sm-6">
                                <a href="'.$link.'">
                                    <img class="iconostopXT" src="'.$ruta.trim($result_menu->icono_subnivel).'" alt='.$nombre.' '.$style.'  />
                                    <br><h2>'.$nombre.'</h2>
                                </a>
                             </div>';
            }
            /*
            $menu .= ' <div class="text-center col-lg-1 col-md-1 col-sm-1 col-xs-12 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
                                <a href="GEVentas/buscaPedidosWAPP">
                                    <img class="iconostop" src="'.$ruta.'nuevopedido.png'.'" alt=Web App Pedidos '.$style.'  />
                                    <br>Web App Pedidos
                                </a>
                            </div>';
            
             */
        }else{
            $menu ='<h2>NO HAY MENU CONFIGURADO</h2>';
        }

        return $menu;

    }
}
