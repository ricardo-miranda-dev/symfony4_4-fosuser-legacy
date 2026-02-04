<?php


namespace App\Service;


use AppBundle\Clases\jira;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \DateTime;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Process\InputStream;
use Dompdf\Dompdf;
use Dompdf\Options;
use BG\BarcodeBundle\Util\Base1DBarcode as barCode;
use BG\BarcodeBundle\Util\Base2DBarcode as matrixCode;




class funciones extends AbstractController
{
    
    

    public function consultaBD($sql, $dbname,$usuario)
    {
        $aux = 0;
 

        if ($dbname == 'fsql007') {
             $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        } else if ($dbname == 'jarvis') {
              $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        } else if ($dbname == 'cclabora_jarvisonline') {
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';

        }else if ($dbname == 'xtreme') {
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';

        } 
        
       // if ($usuario==41 ) {
       //     $dbname = 'datafact_symfony3_1_10';
       //     $dbhost = '178.63.7.242';
       //     $dbuser = 'datafact_symfony3_1_10';
       //    $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
       // }
        if ($usuario==411) { 
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }
        if ($usuario==42||$usuario==43) { 
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }
        if ($usuario==44||$usuario==45||$usuario==41) { 
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }
        //print_r($dbhost."/". $dbuser."/". $dbpass."/". $dbname."/".$usuario."\n");
        if ($aux != 1) {

            $mysqli = new \mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if (mysqli_connect_errno()) {
                $mysqli->query($sql);
                mysqli_close($mysqli);
                printf("Fallo la conexion: %s\n", mysqli_connect_error());
                exit();
            } else {
                $query = $mysqli->query($sql);
                if (!$query) {
                    $query = "Fallo CALL: (" . $mysqli->error . ") " . $mysqli->error;
                    mysqli_close($mysqli);
                    return $query;
                } else {
                    mysqli_close($mysqli);
                    return $query;
                }
            }

        }
    }


    public function abrirconexion($dbname,$usuario)
    {
        //$us = $this->datosEmpleado($this->get('security.token_storage')->getToken()->getUser());
        if ($dbname == 'fsql007') {
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        } else if ($dbname == 'jarvis') {
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        } else if ($dbname == 'fsql020') {
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        } else if ($dbname == 'cclabora_jarvisonline') {
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }else if ($dbname == 'xtreme') {
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }
        if ($usuario==411) { 
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }
        if ($usuario==42||$usuario==43) { 
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }
        if ($usuario==44||$usuario==45||$usuario==41) { 
            $dbname = 'datafact_symfony3_1_10';
            $dbhost = '178.63.7.242';
            $dbuser = 'datafact_symfony3_1_10';
            $dbpass = '1q2w3e4r5t*5ymf0ny3_1_10';
        }
        //print_r($dbhost."/". $dbuser."/". $dbpass."/". $dbname."/".$usuario."\n");
        
        $mysqli = new \mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if (mysqli_connect_errno()) {
            die('Error de conexión: ' . $mysqli->connect_error);
        } else {
            return $mysqli;
        }
    }

    public function consultaBD1($sql, $mysqli)
    {
        //print_r($sql);
        $query = $mysqli->query($sql);
        if (!$query) {
            $query = "Fall� CALL: (" . $mysqli->error . ") " . $mysqli->error;
        }
        return $query;
    }

    public function fs_mes($toMES, $toTIPO)
    {
        switch ($toTIPO) {
            case 1:
                switch ($toMES) {
                    case  1:
                        RETURN 'Enero';
                    case  2:
                        RETURN 'Febrero';
                    case 3:
                        RETURN 'Marzo';
                    case 4:
                        RETURN 'Abril';
                    case 5:
                        RETURN 'Mayo';
                    case 6:
                        RETURN 'Junio';
                    case 7:
                        RETURN 'Julio';
                    case 8:
                        RETURN 'Agosto';
                    case 9:
                        RETURN 'Septiembre';
                    case 10:
                        RETURN 'Octubre';
                    case 11:
                        RETURN 'Noviembre';
                    case 12:
                        RETURN 'Diciembre';
                }
            case 2:
                switch ($toMES) {
                    case 2:
                        RETURN 'Lunes';
                    case 3:
                        RETURN 'Martes';
                    case 4:
                        RETURN 'Mi�rcoles';
                    case 5:
                        RETURN 'Jueves';
                    case 6:
                        RETURN 'Viernes';
                    case 7:
                        RETURN 'S�bado';
                    case 1:
                        RETURN 'Domingo';
                }
            case 3:
                switch ($toMES) {
                    case 1:
                        return "ENE";
                    case 2:
                        return "FEB";
                    case 3:
                        return "MAR";
                    case 4:
                        return "ABR";
                    case 5:
                        return "MAY";
                    case 6:
                        return "JUN";
                    case 7:
                        return "JUL";
                    case 8:
                        return "AGO";
                    case 9:
                        return "SEP";
                    case 10:
                        return "OCT";
                    case 11:
                        return "NOV";
                    case 12:
                        return "DIC";
                }
        }
    }

    public function drop_temp_table($em, $temp_table)
    {
        $sql = "drop table cclabora_jarvis.$temp_table";
        $this->consultaBD($sql, 'jarvis',1);
        //$em->getConnection()->prepare($sql)->execute();
    }

    public function truncate_temp_table($em, $temp_table)
    {
        $sql = "truncate table cclabora_jarvis.$temp_table";
        $this->consultaBD($sql, 'jarvis',1);
        //$em->getConnection()->prepare($sql)->execute();
    }

    public function dimeBodega($idBodega)
    {
        if ($idBodega == 16) {
            $idBodega = 14;
        }

        if ($idBodega == 13) {
            $idBodega = 11;
        }
        if ($idBodega == 17) {
            $idBodega = 15;
        }

        $datoBodega = $this->consultaBD("select * from cclabora_fsql007.almacenes where almacenID='" . TRIM($idBodega) . "' limit 1", 'jarvis')->fetch_object();
        $resultado[0] = 0;
        $resultado[1] = "No Registrado";
        if (is_object($datoBodega)) {
            $resultado[0] = $datoBodega->almacenCODIGO;
            $resultado[1] = $datoBodega->almacenDESCRIPCION;

        }
        return $resultado;

    }

    public function dimeBarcode($cod)
    {
        $c = $cod;
        $c = str_replace("(", "", $c);
        $c = str_replace(")", "", $c);

        return trim($c);
    }

    public function clasiPreguntas($i, $sele)
    {

        // $clasi = array('1'=>'Gestion ATC','2'=>'Entregas','3'=>'Productos','4'=>'General');
        $select = '';

        $sth = $this->consultaBD('SELECT * FROM cclabora_jarvis.sch_sales_tbdata_crm_tipo_quest', 'jarvis');

        if ($sth->num_rows > 0) {
            $select = '<select class="form-control" id="clasi_pre_' . $i . '" name="clasi_pre_' . $i . '" "><option id="0" value="0">Seleccione</option>';
            while ($result = $sth->fetch_object()) {
                $selecionado = '';
                if ($sele == $result->id_crm_quest) {
                    $selecionado = "selected";
                }
                $select .= '<option ' . $selecionado . ' id="' . $result->id_crm_quest . '" value="' . $result->id_crm_quest . '">' . strtoupper($result->descripcion_crm_quest) . '</option>';

            }
            $select .= '</select>';

        }

        return $select;

    }

    public function maximoMultiplo($aux1, $le)
    {
        if ((($aux1) < 0) or ($le < 0)) {
            $QC = 0;
        } else {
            if (fmod($aux1, $le) == 0) {
                $QC = $aux1;
            } else {
                if ($aux1 < $le) {
                    $QC = $le;
                } else {
                    if ($le > 0) {
                        $dif = fmod($aux1, $le);
                        $QC = ($aux1 - $dif) + $le;
                    } else {
                        $QC = 0;
                    }
                }
            }
        }
        return $QC;
    }

    public function generaOC($prodID, $provID, $path, $path2, $cantLE, $tipo)
    {
        $dia = (int)date("N");
        $resultado = array();
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        $dias = $this->dimeDias2();
        $user = "Maria Veronica Jimenez";
        $rutaArchivo = '';
        $idDoc = '';
        $fecha = "Quito DM, " . $dias[$dia] . "," . date("d") . " de " . $meses[$mes] . " de " . date("Y");
        $datosProv = $this->consultaBD("select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . trim($provID) . "'", 'jarvis')->fetch_object();

        if (is_object($datosProv)) {
            if (!empty($datosProv->provEMAIL)) {
                $configJira = array('username' => "jarvis", 'password' => "jarvis", 'host' => "http://servercc3:8080");
                $jira = new jira($configJira);
                $datosMP = $this->consultaBD("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID where p.prodID='" . trim($prodID) . "' limit 1", 'jarvis')->fetch_object();
                $ban = 0;
                if ($tipo == 2) {
                    $le = $cantLE;
                    $ban = 1;
                } else {
                    $le = $cantLE * $datosMP->le;
                    $ban = 2;
                }
                $userJira = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_jirauser where id='1' ", 'jarvis')->fetch_object();
                if (is_object($datosMP)) {
                    if ($datosProv->status == "NACIONAL") {
                        //orden de compra
                        $tablemp = "<tr><td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td><td></td><td></td></tr>";
                        $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_purchaseorder (estatus,fecha) values ('A','" . date("Y-m-d") . "') ", "jarvis");
                        $datosOC = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_purchaseorder order by orderid DESC limit 1', 'jarvis')->fetch_object();
                        if (is_object($datosOC)) {

                            $html = file_get_contents($path);
                            $html = str_replace("{NoOrden}", $datosOC->orderid, $html);
                            $html = str_replace("{FECHA}", $fecha, $html);
                            $html = str_replace("{Proveedor}", $datosProv->provRSOCIAL, $html);
                            $html = str_replace("{provContacto}", $datosProv->provCONTACTO, $html);
                            $html = str_replace("{TABLAMP}", $tablemp, $html);
                            $html = str_replace("{cpd}", $datosProv->cpd, $html);
                            $html = str_replace("{COMPRAS}", $user, $html);
                            $dompdf = new Dompdf();
                            $dompdf->loadHtml($html);
                            $dompdf->setPaper('A4', 'portrait');
                            $dompdf->render();
                            $pdf = $dompdf->output();
                            file_put_contents($path2 . $datosOC->orderid . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                            $resultado[1] = trim($path2) . $datosOC->orderid . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                            $nombreArchivo = urlencode($datosOC->orderid . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20));
                            $nombreArchivo = str_replace('+', '%20', $nombreArchivo);
                            if ($ban == 1) {
                                $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/nva_recepcion/" . $nombreArchivo . ".pdf";
                            } else {
                                $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/" . $nombreArchivo . ".pdf";
                            }
                            $titulo = "OC " . $datosOC->orderid . "; " . $this->limpiar_texto2($datosProv->provRSOCIAL) . "; " . $this->limpiar_texto2($datosMP->prodDESCRIPCION);
                            $resultado[0] = $datosOC->orderid;
                            $descripcion = "Por favor revisar la nueva RFQ disponible en: " . $linkPDF;
                            $issue = $jira->create_jira_ticketOC("OC", $titulo, $descripcion, $userJira->descripcion);
                            if (is_object($issue)) {
                                $resultado[2] = $issue->key;
                                $jira->update_jira_fields_OC($issue->key, $this->limpiar_texto2($datosProv->provRSOCIAL), $this->limpiar_texto($datosProv->provCONTACTO), $datosProv->provEMAIL);
                                $rfqID = bin2hex(openssl_random_pseudo_bytes(3));
                                $observaciones = '';
                                $cost = $this->get_cost_from_id($prodID);
                                $total = $le * $cost;
                                $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_rfq (rfqID,ticket,origFECHA,provCONTACTO,condiciones,codigoPROVEEDOR,prodID,prodCODIGO,prodDESCRIPCION,cant,observaciones,orderid,price,total,estado_rfq) values ('" . $rfqID . "','" . $issue->key . "','" . date("Y-m-d H:i:s") . "','" . $datosProv->provCONTACTO . "','" . $datosProv->cpd . "','" . $datosProv->provID . "','" . $prodID . "','" . $datosMP->prodCODIGO . "','" . $datosMP->prodDESCRIPCION . "','" . $le . "','" . $observaciones . "','" . $datosOC->orderid . "'," . $cost . "," . $total . ",'1') ", 'jarvis');
                                $resultado[0] = $datosOC->orderid;
                                $this->transitoFiresoft($prodID, $datosOC->orderid, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                            }

                        }
                    } else {
                        //cotizacion
                        $tablemp = "<tr><td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td></tr>";
                        $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_cotizaciones  (fecha,estatus) values ('" . date("Y-m-d") . "','A') ", "jarvis");
                        $datosCOT = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_cotizaciones order by cotID DESC limit 1', 'jarvis')->fetch_object();
                        if (is_object($datosCOT)) {
                            $html = file_get_contents($path);
                            $html = str_replace("{NoOrden}", $datosCOT->cotID, $html);
                            $html = str_replace("{FECHA}", $fecha, $html);
                            $html = str_replace("{Proveedor}", $datosProv->provRSOCIAL, $html);
                            $html = str_replace("{provContacto}", $datosProv->provCONTACTO, $html);
                            $html = str_replace("{TABLAMP}", $tablemp, $html);
                            $html = str_replace("{cpd}", $datosProv->cpd, $html);
                            $html = str_replace("{COMPRAS}", $user, $html);
                            $dompdf = new Dompdf();
                            $dompdf->loadHtml($html);
                            $dompdf->setPaper('A4', 'portrait');
                            $dompdf->render();
                            $pdf = $dompdf->output();
                            file_put_contents($path2 . $datosCOT->cotID . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                            $nombreArchivo = urlencode($datosCOT->cotID . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20));
                            $nombreArchivo = str_replace('+', '%20', $nombreArchivo);
                            if ($ban == 1) {
                                $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/nva_recepcion/" . $nombreArchivo . ".pdf";
                            } else {
                                $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/cotizaciones/" . $nombreArchivo . ".pdf";
                            }

                            $resultado[1] = trim($path2) . $datosCOT->cotID . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                            $titulo = "IT " . $datosCOT->cotID . "; " . $this->limpiar_texto2($datosProv->provRSOCIAL) . "; " . $datosMP->prodDESCRIPCION;
                            $descripcion = "Por favor revisar la nueva RFQ disponible en: " . $linkPDF;
                            $issue = $jira->create_jira_ticketOC("OC", $titulo, $descripcion, $userJira->descripcion);
                            if (is_object($issue)) {
                                $resultado[2] = $issue->key;
                                $jira->update_jira_fields_OC($issue->key, $this->limpiar_texto2($datosProv->provRSOCIAL), $this->limpiar_texto($datosProv->provCONTACTO), $datosProv->provEMAIL);
                                $rfqID = bin2hex(openssl_random_pseudo_bytes(3));
                                $observaciones = '';
                                $cost = $this->get_cost_from_id($prodID);
                                $total = $le * $cost;
                                $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_rfq (rfqID,ticket,origFECHA,provCONTACTO,condiciones,codigoPROVEEDOR,prodID,prodCODIGO,prodDESCRIPCION,cant,observaciones,orderid,price,total) values ('" . $rfqID . "','" . $issue->key . "','" . date("Y-m-d H:i:s") . "','" . $datosProv->provCONTACTO . "','" . $datosProv->cpd . "','" . $datosProv->provID . "','" . $prodID . "','" . $datosMP->prodCODIGO . "','" . $datosMP->prodDESCRIPCION . "','" . $le . "','" . $observaciones . "','" . $datosCOT->cotID . "'," . $cost . "," . $total . ") ", 'jarvis');
                                // $this->transitoFiresoft($prodID,$datosCOT->cotID,$this->limpiar_texto($datosProv->provRSOCIAL),1);
                                $resultado[0] = $datosCOT->cotID;
                            }

                        }


                    }

                }
            } else {
                $resultado[0] = -1;
            }

            return $resultado;

        }


    }

    public function enviarMailProveedorPDF($IdProv, $ruta, $idioma, $obj, $us)
    {
        $funciones = new funciones();
        $resultado = 0;
        $jarvisConex = $funciones->abrirconexion('jarvis');
        $datosProv = $funciones->consultaBD1("SELECT * from cclabora_jarvis.sch_mrp_tbdata_prov pv where provID='" . trim($IdProv) . "'", $jarvisConex)->fetch_object();
        if (is_object($datosProv)) {
            if (trim($datosProv->provEMAIL) != trim('-')) {
                $mail = str_replace("=", "", $datosProv->provEMAIL) . ";ordenescompra@cclabs.com.ec;controlsop@cclabs.com.ec";
                $nombreProv = $funciones->limpiar_texto2($datosProv->provRSOCIAL);

                if ($idioma == "ES") {
                    $rutahtml = ":default:mailerRfqOCES.html.twig";
                } else {
                    $rutahtml = ':default:mailerRfqOCEN.html.twig';
                }

                $porciones = explode(";", $mail);
                $count = count($porciones);
                for ($i = 0; $i < $count; $i++) {
                    if (trim($porciones[$i]) != "") {
                        $message = \Swift_Message::newInstance()
                            ->setSubject($datosProv->provCONTACTO . " RFQ/OP")
                            ->setFrom("operaciones@cclabs.com.ec")
                            ->setContentType("text/html")
                            ->setTo(trim($porciones[$i]))
                            //->setTo(trim("programador@cclabs.com.ec"))
                            ->setBody(
                                $obj->renderView(
                                    $rutahtml,
                                    array(
                                        'prov' => $nombreProv,
                                        'user' => $us[0]
                                    )
                                ),
                                'text/html'
                            );

                        $message->attach(\Swift_Attachment::fromPath($ruta));
                        $this->get('mailer')->send($message);
                    }
                }
                $jarvisConex->close();
                $resultado = 1;

            }
        }
        return $resultado;
    }


    public function EnviarPdfRfqOC($idprov, $dir, $us, $tipo, $obj)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        if ($tipo == 1) {
            $datosOC = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where codigoPROVEEDOR='" . trim($idprov) . "' AND (estado_rfq = 14 or estado_rfq = 15)", $jarvisConex)->fetch_object();
        } elseif ($tipo == 2) {
            /*print_r("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where prodCODIGO='" . trim($idprov) . "' AND (estado_rfq = 14 or estado_rfq = 15)");*/
            $datosOC = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where rfq.prodCODIGO='" . trim($idprov) . "' AND (estado_rfq = 14 or estado_rfq = 15)", $jarvisConex)->fetch_object();

        }
        $path = '';
        $path2 = '';
        $link = '';
        if (is_object($datosOC)) {
            $tablemp = '';
            if ($tipo == 1) {
                $datosOCs = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where codigoPROVEEDOR='" . trim($idprov) . "' and  (estado_rfq = 14 or estado_rfq = 15)", $jarvisConex);
                while ($result = $datosOCs->fetch_object()) {
                    //print_r($result);
                    $sqlincoterm = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_incoterm where id = $result->incoterm";
                    $sthincoterm = $this->consultaBD1($sqlincoterm, $jarvisConex);
                    $resultincoterm = $sthincoterm->fetch_object();
                    $bio = '';
                    $criterios = '';

                    $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($result->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
                    if (is_object($biblio)) {
                        $bio = utf8_decode($biblio->bibliografia);
                    }

                    $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($result->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
                    if (is_object($crit)) {
                        $criterios = utf8_decode($crit->criterio_em);
                    }
                    if ($result->estado_rfq > 14) {
                        $NS = $this->dimeNSDespachadaN($result->provID, $result->prodID);
                        $diaactual = date('Y-m-d');
                        $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                        $nuevafecha = date('Y-m-d', $nuevafecha);
                        if ($result->idioma == 'ES') {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Orden de Compra</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        } else {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Purchase Order</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        }
                    } elseif ($result->estado_rfq == 14) {
                        $NS = $this->dimeNSCOTIZACIONN($result->provID, $result->prodID);
                        $diaactual = date('Y-m-d');
                        $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                        $nuevafecha = date('Y-m-d', $nuevafecha);
                        if ($result->idioma == 'ES') {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Cotización de Materiales</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        } else {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Request for Quotation</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        }
                    }
                }
                $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes/';
                if ($datosOC->idioma == 'ES') {
                    $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCES.html';
                } else {
                    $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCEN.html';
                }

                $NS = $this->dimeNSDespachada($datosOC->provID, $datosOC->prodID);
                $diaactual = date('Y-m-d');
                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                $nuevafecha = date('Y-m-d', $nuevafecha);
                $fecha = explode(" ", $datosOC->FECHA);
                $empl = $us[0];
                $sqlUS = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_historiarfq where id_rfqoc = $datosOC->orderid order by ID asc limit 1";
                $sthUS = $this->consultaBD1($sqlUS, $jarvisConex);
                if ($sthUS->num_rows > 0) {
                    $resultUS = $sthUS->fetch_object();
                    if (isset($resultUS->id_empleado)) {
                        $datosEmpleado = $this->dimeEmpleado($resultUS->id_empleado);
                        $nombre = explode(" ", $datosEmpleado->emplNOMBRES);
                        $apellido = explode(" ", $datosEmpleado->emplAPELLIDOS);
                        $empl = $nombre[0] . ' ' . $apellido[0];
                    }
                }

                $Nro_order = str_replace($datosOC->provID, "", $datosOC->orderid);
                $html = file_get_contents($path);
                $html = str_replace("{OC}", $Nro_order, $html);
                $html = str_replace("{fecha}", $fecha[0], $html);
                $html = str_replace("{proveedor}", $datosOC->provRSOCIAL, $html);
                $html = str_replace("{contacto}", $datosOC->provCONTACTO, $html);
                $html = str_replace("{TABLAMP}", $tablemp, $html);
                $html = str_replace("{cpd}", $datosOC->cpd, $html);
                $html = str_replace("{user}", $empl, $html);
                $html = str_replace("{fmaxe}", $nuevafecha, $html);
                $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                $html = str_replace("{ruc}", '1891720188001', $html);
                $html = str_replace("{Pais}", 'Ecuador', $html);
                $html = str_replace("{ciudad}", 'Ambato', $html);
                $html = str_replace("{correo}", 'operaciones@cclabs.com.ec', $html);
                $html = str_replace("{telefono}", '+593-032434377', $html);
                $html = str_replace("{telefono1}", '+593-22806167/+593-99911760', $html);
                $html = str_replace("{subtotal}", ' - ', $html);
                $html = str_replace("{iva}", ' - ', $html);
                $html = str_replace("{envio}", ' - ', $html);
                $html = str_replace("{otros}", ' - ', $html);
                $html = str_replace("{total}", ' - ', $html);
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $pdf = $dompdf->output();
                file_put_contents($path2 . "orden" . substr($datosOC->orderid, 0, 5) . $datosOC->provID . ".pdf", $pdf);
                $jarvisConex->close();
                $suggest[0] = $datosOC->provID;
                $suggest[1] = $path2 . "orden" . substr($datosOC->orderid, 0, 5) . $datosOC->provID . ".pdf";
                $suggest[2] = $datosOC->idioma;

                return $suggest;
            } elseif ($tipo == 2) {
                $datosOCs = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where rfq.prodCODIGO='" . trim($idprov) . "' AND (estado_rfq = 14 or estado_rfq = 15)", $jarvisConex);
                while ($result = $datosOCs->fetch_object()) {
                    //print_r($result);
                    $tablemp = '';
                    $sqlincoterm = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_incoterm where id = $result->incoterm";
                    $sthincoterm = $this->consultaBD1($sqlincoterm, $jarvisConex);
                    $resultincoterm = $sthincoterm->fetch_object();
                    $bio = '';
                    $criterios = '';

                    $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($result->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
                    if (is_object($biblio)) {
                        $bio = utf8_decode($biblio->bibliografia);
                    }

                    $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($result->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
                    if (is_object($crit)) {
                        $criterios = utf8_decode($crit->criterio_em);
                    }
                    if ($result->estado_rfq > 14) {
                        $NS = $this->dimeNSDespachadaN($result->provID, $result->prodID);
                        $diaactual = date('Y-m-d');
                        $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                        $nuevafecha = date('Y-m-d', $nuevafecha);
                        if ($result->idioma == 'ES') {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Orden de Compra</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        } else {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Purchase Order</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        }
                    } elseif ($result->estado_rfq == 14) {
                        $NS = $this->dimeNSCOTIZACIONN($result->provID, $result->prodID);
                        $diaactual = date('Y-m-d');
                        $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                        $nuevafecha = date('Y-m-d', $nuevafecha);
                        if ($result->idioma == 'ES') {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Cotización de Materiales</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        } else {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Request for Quotation</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        }
                    }
                    $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes/';
                    if ($datosOC->idioma == 'ES') {
                        $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCES.html';
                    } else {
                        $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCEN.html';
                    }

                    $NS = $this->dimeNSDespachada($datosOC->provID, $datosOC->prodID);
                    $diaactual = date('Y-m-d');
                    $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                    $nuevafecha = date('Y-m-d', $nuevafecha);
                    $fecha = explode(" ", $datosOC->FECHA);
                    $empl = $us[0];
                    $sqlUS = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_historiarfq where id_rfqoc = $datosOC->orderid order by ID asc limit 1";
                    $sthUS = $this->consultaBD1($sqlUS, $jarvisConex);
                    if ($sthUS->num_rows > 0) {
                        $resultUS = $sthUS->fetch_object();
                        if (isset($resultUS->id_empleado)) {
                            $datosEmpleado = $this->dimeEmpleado($resultUS->id_empleado);
                            $nombre = explode(" ", $datosEmpleado->emplNOMBRES);
                            $apellido = explode(" ", $datosEmpleado->emplAPELLIDOS);
                            $empl = $nombre[0] . ' ' . $apellido[0];
                        }
                    }

                    $Nro_order = str_replace($datosOC->provID, "", $datosOC->orderid);
                    $html = file_get_contents($path);
                    $html = str_replace("{OC}", $Nro_order, $html);
                    $html = str_replace("{fecha}", $fecha[0], $html);
                    $html = str_replace("{proveedor}", $datosOC->provRSOCIAL, $html);
                    $html = str_replace("{contacto}", $datosOC->provCONTACTO, $html);
                    $html = str_replace("{TABLAMP}", $tablemp, $html);
                    $html = str_replace("{cpd}", $datosOC->cpd, $html);
                    $html = str_replace("{user}", $empl, $html);
                    $html = str_replace("{fmaxe}", $nuevafecha, $html);
                    $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                    $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                    $html = str_replace("{ruc}", '1891720188001', $html);
                    $html = str_replace("{Pais}", 'Ecuador', $html);
                    $html = str_replace("{ciudad}", 'Ambato', $html);
                    $html = str_replace("{correo}", 'operaciones@cclabs.com.ec', $html);
                    $html = str_replace("{telefono}", '+593-032434377', $html);
                    $html = str_replace("{telefono1}", '+593-22806167/+593-99911760', $html);
                    $html = str_replace("{subtotal}", ' - ', $html);
                    $html = str_replace("{iva}", ' - ', $html);
                    $html = str_replace("{envio}", ' - ', $html);
                    $html = str_replace("{otros}", ' - ', $html);
                    $html = str_replace("{total}", ' - ', $html);
                    $dompdf = new Dompdf();
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('A4', 'portrait');
                    $dompdf->render();
                    $pdf = $dompdf->output();
                    file_put_contents($path2 . "orden" . substr($datosOC->orderid, 0, 5) . $datosOC->provID . ".pdf", $pdf);
                    $jarvisConex->close();
                    $suggest[0] = $datosOC->provID;
                    $suggest[1] = $path2 . "orden" . substr($datosOC->orderid, 0, 5) . $datosOC->provID . ".pdf";
                    $suggest[2] = $datosOC->idioma;
                    $resultado = $this->enviarMailProveedorPDF($suggest[0], $suggest[1], $suggest[2], $obj, $us);
                    return $resultado;
                }

            }

        }

    }

    public function PdfRfqOC_OLD($id_rfqoc, $dir, $us)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosOC = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where ID='" . trim($id_rfqoc) . "'", $jarvisConex)->fetch_object();
        $path = '';
        $path2 = '';
        $link = '';
        if (is_object($datosOC)) {


            $newDate = date("m", strtotime($datosOC->FECHA));
            $tablemp = '';
            $datosOCs = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where codigoPROVEEDOR='" . trim($datosOC->codigoPROVEEDOR) . "' and MONTH(FECHA) = $newDate and fuente = " . $datosOC->fuente, $jarvisConex);
            while ($result = $datosOCs->fetch_object()) {
                //print_r($result);
                $sqlincoterm = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_incoterm where id = $result->incoterm";
                $sthincoterm = $this->consultaBD1($sqlincoterm, $jarvisConex);
                $resultincoterm = $sthincoterm->fetch_object();
                $bio = '';
                $criterios = '';

                $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($result->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
                if (is_object($biblio)) {
                    $bio = utf8_decode($biblio->bibliografia);
                }

                $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($result->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
                if (is_object($crit)) {
                    $criterios = utf8_decode($crit->criterio_em);
                }
                if ($result->estado_rfq > 14) {
                    $NS = $this->dimeNSDespachadaN($result->provID, $result->prodID);
                    $diaactual = date('Y-m-d');
                    $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                    $nuevafecha = date('Y-m-d', $nuevafecha);
                    if ($result->idioma == 'ES') {
                        $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Orden de Compra</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                    } else {
                        $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Purchase Order</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                    }
                } elseif ($result->estado_rfq == 14) {
                    $NS = $this->dimeNSCOTIZACIONN($result->provID, $result->prodID);
                    $diaactual = date('Y-m-d');
                    $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                    $nuevafecha = date('Y-m-d', $nuevafecha);
                    if ($result->idioma == 'ES') {
                        $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Cotización de Materiales</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                    } else {
                        $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Request for Quotation</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                    }
                }
            }
            $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes/';
            $link = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/";
            if ($datosOC->idioma == 'ES') {
                $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCES.html';
            } else {
                $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCEN.html';
            }

            $NS = $this->dimeNSDespachada($datosOC->provID, $datosOC->prodID);
            $diaactual = date('Y-m-d');
            $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
            $nuevafecha = date('Y-m-d', $nuevafecha);
            $fecha = explode(" ", $datosOC->FECHA);
            $empl = $us[0];
            $sqlUS = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_historiarfq where id_rfqoc = $datosOC->orderid order by ID asc limit 1";
            $sthUS = $this->consultaBD1($sqlUS, $jarvisConex);
            if ($sthUS->num_rows > 0) {
                $resultUS = $sthUS->fetch_object();
                if (isset($resultUS->id_empleado)) {
                    $datosEmpleado = $this->dimeEmpleado($resultUS->id_empleado);
                    $nombre = explode(" ", $datosEmpleado->emplNOMBRES);
                    $apellido = explode(" ", $datosEmpleado->emplAPELLIDOS);
                    $empl = $nombre[0] . ' ' . $apellido[0];
                }
            }

            $Nro_order = str_replace($datosOC->provID, "", $datosOC->orderid);
            $html = file_get_contents($path);
            $html = str_replace("{OC}", $Nro_order, $html);
            $html = str_replace("{fecha}", $fecha[0], $html);
            $html = str_replace("{proveedor}", $datosOC->provRSOCIAL, $html);
            $html = str_replace("{contacto}", $datosOC->provCONTACTO, $html);
            $html = str_replace("{TABLAMP}", $tablemp, $html);
            $html = str_replace("{cpd}", $datosOC->cpd, $html);
            $html = str_replace("{user}", $empl, $html);
            $html = str_replace("{fmaxe}", $nuevafecha, $html);
            $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
            $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
            $html = str_replace("{ruc}", '1891720188001', $html);
            $html = str_replace("{Pais}", 'Ecuador', $html);
            $html = str_replace("{ciudad}", 'Ambato', $html);
            $html = str_replace("{correo}", 'operaciones@cclabs.com.ec', $html);
            $html = str_replace("{telefono}", '+593-032434377', $html);
            $html = str_replace("{telefono1}", '+593-22806167/+593-99911760', $html);
            $html = str_replace("{subtotal}", ' - ', $html);
            $html = str_replace("{iva}", ' - ', $html);
            $html = str_replace("{envio}", ' - ', $html);
            $html = str_replace("{otros}", ' - ', $html);
            $html = str_replace("{total}", ' - ', $html);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdf = $dompdf->output();
            file_put_contents($path2 . "orden" . substr($datosOC->orderid, 0, 5) . $datosOC->provID . ".pdf", $pdf);
            $jarvisConex->close();

            return $link . "orden" . substr($datosOC->orderid, 0, 5) . $datosOC->provID . ".pdf";
        }
    }

    public function PdfRfqOC($id_rfqoc, $dir, $us)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosOC = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where ID='" . trim($id_rfqoc) . "'", $jarvisConex)->fetch_object();
        $path = '';
        $path2 = '';
        $link = '';
        if (is_object($datosOC)) {


            $newDate = date("m", strtotime($datosOC->FECHA));
            $tablemp = '';
            $newDateY = date("Y", strtotime($datosOC->FECHA));
            $datosOCs = $this->consultaBD1("SELECT *,rfq.tipo FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR  
                                       join cclabora_jarvis.rel_em_prov rel on pv.provID = rel.provID and rel.prodID = pr.prodID  
                                       where codigoPROVEEDOR='" . trim($datosOC->codigoPROVEEDOR) . "' and MONTH(FECHA) = $newDate and YEAR(FECHA) = $newDateY", $jarvisConex);
            while ($result = $datosOCs->fetch_object()) {
                //print_r($result);
                $sqlincoterm = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_incoterm where id = $result->incoterm";
                $sthincoterm = $this->consultaBD1($sqlincoterm, $jarvisConex);
                $resultincoterm = $sthincoterm->fetch_object();
                $bio = '';
                $criterios = '';

                $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($result->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
                if (is_object($biblio)) {
                    $bio = utf8_decode($biblio->bibliografia);
                }

                $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($result->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
                if (is_object($crit)) {
                    $criterios = utf8_decode($crit->criterio_em);
                }

                $hist = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_historiarfq where id_rfqoc=" . trim($result->orderid) . " order by ID desc", $jarvisConex)->fetch_object();
                if (is_object($hist)) {
                    $histest = utf8_decode($hist->estado);
                }

                if ($result->estado_rfq == 15 or $result->estado_rfq == 14) {
                    if ($histest == 15) {
                        $NS = $this->dimeNSDespachadaN($result->provID, $result->prodID);
                        $diaactual = date('Y-m-d');
                        $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                        $nuevafecha = date('Y-m-d', $nuevafecha);
                        if ($result->idioma == 'ES') {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Orden de Compra</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        } else {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Purchase Order</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        }
                    } elseif ($histest == 14) {
                        $NS = $this->dimeNSCOTIZACIONN($result->provID, $result->prodID);
                        $diaactual = date('Y-m-d');
                        $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                        $nuevafecha = date('Y-m-d', $nuevafecha);
                        if ($result->idioma == 'ES') {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Cotización de Materiales</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        } else {
                            //<td class='letra' style='text-align: right;'>$criterios</td>
                            $tablemp .= "<tr><td class='letra'>" . $result->orderid . "</td><td class='letra'>" . $result->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>" . $result->cant . "</td><td class='letra' style='text-align: right;'>$result->prodUMEDIDA</td><td class='letra'>" . $resultincoterm->descripcion . "</td><td class='letra' style='text-align: right;'>Request for Quotation</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                        }
                    }
                }
            }
            $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes/';
            $link = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/";
            if ($datosOC->idioma == 'ES') {
                $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCES.html';
            } else {
                $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCEN.html';
            }

            $NS = $this->dimeNSDespachada($datosOC->provID, $datosOC->prodID);
            $diaactual = date('Y-m-d');
            $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
            $nuevafecha = date('Y-m-d', $nuevafecha);
            $fecha = explode(" ", $datosOC->FECHA);
            $empl = $us[0];
            $sqlUS = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_historiarfq where id_rfqoc = $datosOC->orderid order by ID asc limit 1";
            $sthUS = $this->consultaBD1($sqlUS, $jarvisConex);
            if ($sthUS->num_rows > 0) {
                $resultUS = $sthUS->fetch_object();
                if (isset($resultUS->id_empleado)) {
                    $datosEmpleado = $this->dimeEmpleado($resultUS->id_empleado);
                    $nombre = explode(" ", $datosEmpleado->emplNOMBRES);
                    $apellido = explode(" ", $datosEmpleado->emplAPELLIDOS);
                    $empl = $nombre[0] . ' ' . $apellido[0];
                }
            }

            $Nro_order = str_replace($datosOC->provID, "", $datosOC->orderid);
            $html = file_get_contents($path);
            $html = str_replace("{OC}", $Nro_order, $html);
            $html = str_replace("{fecha}", $fecha[0], $html);
            $html = str_replace("{proveedor}", $datosOC->provRSOCIAL, $html);
            $html = str_replace("{contacto}", $datosOC->provCONTACTO, $html);
            $html = str_replace("{TABLAMP}", $tablemp, $html);
            $html = str_replace("{cpd}", $datosOC->cpd, $html);
            $html = str_replace("{user}", $empl, $html);
            $html = str_replace("{fmaxe}", $nuevafecha, $html);
            $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
            $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
            $html = str_replace("{ruc}", '1891720188001', $html);
            $html = str_replace("{Pais}", 'Ecuador', $html);
            $html = str_replace("{ciudad}", 'Ambato', $html);
            $html = str_replace("{correo}", 'operaciones@cclabs.com.ec', $html);
            $html = str_replace("{telefono}", '+593-032434377', $html);
            $html = str_replace("{telefono1}", '+593-22806167/+593-99911760', $html);
            $html = str_replace("{subtotal}", ' - ', $html);
            $html = str_replace("{iva}", ' - ', $html);
            $html = str_replace("{envio}", ' - ', $html);
            $html = str_replace("{otros}", ' - ', $html);
            $html = str_replace("{total}", ' - ', $html);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdf = $dompdf->output();
            file_put_contents($path2 . "orden.pdf", $pdf);
            $jarvisConex->close();

            return $link . "orden.pdf";
        }
    }

    public function salidaTransitoFiresoft($id_rfq)
    {
        $result_rfq = '';
        $jarvisConex = $this->abrirconexion('jarvis');
        $meses = $this->dimeMeses();
        $mes = (int)date('m');
        $datosRFQ = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc  rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos p on p.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_em em on em.prodID=p.prodID
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pr on pr.provID=rfq.codigoPROVEEDOR
                                       join cclabora_jarvis.sch_admin_tbdata_estados es on es.estadoID=rfq.estado_rfq
                                       where ID=" . $id_rfq . " limit 1;  ", $jarvisConex)->fetch_object();
        $ban = 0;
        if (is_object($datosRFQ)) {
            $precio = 0;
            $bodega_cuanrentena = '14';
            $concepto_s = "Salida por Transferencia  OC#" . $datosRFQ->orderid . ", " . strtoupper($meses[$mes]) . ", " . $datosRFQ->provRSOCIAL . ", " . $datosRFQ->prodDESCRIPCION;
            $tpdiID = 'SOT';
            $tipo = 'S';
            $docinvNUMERO = 0;
            $sth_val = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc where versionID=" . trim($datosRFQ->versionID) . " and prodCODIGO='" . trim($datosRFQ->prodCODIGO) . "' and estado_rfq != 14 and (estado_rfq<19 or estado_rfq=64) ", $jarvisConex);
            //print_r($sth_val->num_rows);
            if ($sth_val->num_rows == 0) {
                $sth_stock = $this->consultaBD1("SELECT stocksCANTIDAD FROM cclabora_fsql007.stocks where almacenID = 14 and prodID = $datosRFQ->prodID", $jarvisConex)->fetch_object();
                if ($sth_stock->stocksCANTIDAD >= $datosRFQ->cant) {
                    $sth_hisrfq = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_historiarfq where id_rfqoc = " . $datosRFQ->orderid . " and estado = 15", $jarvisConex);
                    if ($sth_hisrfq->num_rows > 0) {
                        $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuanrentena . '" and tpdiID="' . $tpdiID . '"', 'jarvis');
                        $result_asi = '';
                        if ($sth_asi->num_rows > 0) {
                            $result_asi = $sth_asi->fetch_object();
                            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                            $almsecID = $result_asi->almsecID;
                            $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $almsecID . '"', 'jarvis');
                        } else {
                            if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuanrentena . '","' . $tpdiID . '")', 'jarvis')) {
                                $result_asi = $this->consultaBD('select almsecID,almseCNUMERO from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                                $docinvNUMERO = $result_asi->almseCNUMERO;
                                $almsecID = $result_asi->almsecID;
                            }
                        }

                        if (is_object($result_asi)) {
                            $userF = $this->auditoriaFiresoft($concepto_s . ' -S', '163', 'I', 42);
                            if ($userF[0] == 0) {
                                $userF[0] = 42;
                            }
                            if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                                $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                                }

                                if (is_object($datosRFQ)) {
                                    $stocksID = 0;
                                    $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . trim($datosRFQ->prodID) . '" and almacenID="' . $bodega_cuanrentena . '"', 'jarvis');
                                    if ($verificaStock->num_rows > 0) {
                                        $result_stock = $verificaStock->fetch_object();
                                        $stocksID = $result_stock->stocksID;
                                    } else {
                                        $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_cuanrentena . '","' . trim($datosRFQ->prodID) . '","' . trim($datosRFQ->cant) . '","' . $precio . '")', 'jarvis');
                                        $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                                        $stocksID = $stocksID_r->stocksID;
                                    }
                                    if ($stocksID != 0) {
                                        if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . trim($datosRFQ->cant) . '","0","' . $tipo . '","' . $datosRFQ->presentacionID . '","' . $datosRFQ->cant . '")', 'jarvis')) {
                                            $ban = 1;
                                            $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                                        }
                                    }

                                }

                            }
                        }
                    }
                }
            }
        } else {
            $ban = 2;
        }

        $jarvisConex->close();
        return $ban;

    }

    public function PdfRfqOCAdj($id_rfqoc, $dir)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosOC = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=rfq.prodCODIGO
                                       join cclabora_jarvis.sch_mrp_tbdata_prov pv on pv.provID=rfq.codigoPROVEEDOR 
                                       join cclabora_jarvis.rel_em_prov rel on pr.prodID = rel.prodID and rel.provID = rfq.codigoPROVEEDOR
                                       where ID='" . trim($id_rfqoc) . "'", $jarvisConex)->fetch_object();
        $path = '';
        $path2 = '';
        $link = '';
        if (is_object($datosOC)) {
            $sqlincoterm = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_incoterm where id = " . $datosOC->incoterm;
            $sthincoterm = $this->consultaBD1($sqlincoterm, $jarvisConex);
            $resultincoterm = $sthincoterm->fetch_object();

            $bio = '';
            $criterios = '';

            $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($datosOC->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
            if (is_object($biblio)) {
                $bio = '<br><br>
                       <b>Bibliografia a Cumplir</b> ' . $biblio->bibliografia;
            }

            $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($datosOC->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
            if (is_object($crit)) {
                $criterios = '<br><br>
                       <b>Criterios de Aceptacion</b> ' . $crit->criterio_em;
            }

            if ($datosOC->estado_rfq == 14) {
                $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\cotizaciones/';
                $NS = $this->dimeNSCOTIZACIONN($datosOC->provID, $datosOC->prodID);
                $diaactual = date('Y-m-d');
                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                $nuevafecha = date('Y-m-d', $nuevafecha);
                if ($datosOC->idioma == 'ES') {
                    $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\cotizaciones\COTES.html';
                    $tablemp = "<tr><td class='letra'>" . $datosOC->orderid . "</td><td class='letra'>" . $datosOC->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $datosOC->cant . "</td><td class='letra' style='text-align: right;'>$datosOC->prodUMEDIDA</td><td class='letra'>$resultincoterm->descripcion</td><td class='letra' style='text-align: right;'>Cotización de Materiales</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";

                } else {
                    $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\cotizaciones\COTEN.html';
                    $tablemp = "<tr><td class='letra'>" . $datosOC->orderid . "</td><td class='letra'>" . $datosOC->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $datosOC->cant . "</td><td class='letra' style='text-align: right;'>$datosOC->prodUMEDIDA</td><td class='letra'>$resultincoterm->descripcion</td><td class='letra' style='text-align: right;'>Request for Quotation</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";

                }
                $link = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/cotizaciones/";
            } else if ($datosOC->estado_rfq > 14) {
                $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes/';
                $NS = $this->dimeNSDespachadaN($datosOC->provID, $datosOC->prodID);
                $diaactual = date('Y-m-d');
                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                $nuevafecha = date('Y-m-d', $nuevafecha);
                if ($datosOC->idioma == 'ES') {
                    $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCES.html';
                    $link = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/";
                    $tablemp = "<tr><td class='letra'>" . $datosOC->orderid . "</td><td class='letra'>" . $datosOC->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $datosOC->cant . "</td><td class='letra' style='text-align: right;'>$datosOC->prodUMEDIDA</td><td class='letra'>$resultincoterm->descripcion</td><td class='letra' style='text-align: right;'>Orden de Compra</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                } else {
                    $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\ordenes\rfqOCEN.html';
                    $link = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/";
                    $tablemp = "<tr><td class='letra'>" . $datosOC->orderid . "</td><td class='letra'>" . $datosOC->prodDESCRIPCION . "</td><td class='letra' style='text-align: right;'>$bio</td><td class='letra' style='text-align: right;'>$criterios</td><td class='letra' style='text-align: right;'>" . $datosOC->cant . "</td><td class='letra' style='text-align: right;'>$datosOC->prodUMEDIDA</td><td class='letra'>$resultincoterm->descripcion</td><td class='letra' style='text-align: right;'>Purchase Order</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";

                }
            }


            $NS = $this->dimeNSDespachada($datosOC->provID, $datosOC->prodID);
            $diaactual = date('Y-m-d');
            $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
            $nuevafecha = date('Y-m-d', $nuevafecha);
            $fecha = explode(" ", $datosOC->FECHA);
            $empl = 'CARLOS COBO';
            if (isset($datosOC->id_empleado)) {
                $datosEmpleado = $this->dimeEmpleado($datosOC->id_empleado);
                $nombre = explode(" ", $datosEmpleado->emplNOMBRES);
                $apellido = explode(" ", $datosEmpleado->emplAPELLIDOS);
                $empl = $nombre[0] . ' ' . $apellido[0];
            }


            $html = file_get_contents($path);
            $html = str_replace("{OC}", $datosOC->orderid, $html);
            $html = str_replace("{fecha}", $fecha[0], $html);
            $html = str_replace("{proveedor}", $datosOC->provRSOCIAL, $html);
            $html = str_replace("{contacto}", $datosOC->provCONTACTO, $html);
            $html = str_replace("{TABLAMP}", $tablemp, $html);
            $html = str_replace("{cpd}", $datosOC->cpd, $html);
            $html = str_replace("{user}", $empl, $html);
            $html = str_replace("{fmaxe}", $nuevafecha, $html);
            $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
            $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
            $html = str_replace("{ruc}", '1891720188001', $html);
            $html = str_replace("{ciudad}", 'Ambato', $html);
            $html = str_replace("{Pais}", 'Ecuador', $html);
            $html = str_replace("{correo}", 'operaciones@cclabs.com.ec', $html);
            $html = str_replace("{telefono}", '+593-032434377', $html);
            $html = str_replace("{telefono1}", '+593-22806167/+593-99911760', $html);
            $html = str_replace("{subtotal}", ' - ', $html);
            $html = str_replace("{iva}", ' - ', $html);
            $html = str_replace("{envio}", ' - ', $html);
            $html = str_replace("{otros}", ' - ', $html);
            $html = str_replace("{total}", ' - ', $html);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdf = $dompdf->output();
            file_put_contents($path2 . $datosOC->ID . ".pdf", $pdf);
            //file_put_contents($path2."orden.pdf", $pdf);

            //header('Content-type: application/pdf');
            //header('Content-Disposition: attachment; filename="OC-'.$datosOC->orderid.".pdf".'"');
            //readfile($path2.$datosOC->ID.".pdf");
            //   unlink($path2.$datosOC->ID.".pdf");
            $jarvisConex->close();
            return $path2 . $datosOC->ID . ".pdf";
        }


    }

    public function PdfticketsRec($id_oc, $dir, $tipo)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sql = '';
        $nombrepdf = '';
        if ($tipo == 1) {
            $sql = 'select oc.*,loc.id_barcode,loc.lote_oc,loc.peso_lotes,loc.estado_reg_lotes,loc.peso_t_lotes,loc.codigo_pro_lote,loc.potencia_lotes from cclabora_jarvis.sch_mrp_tbdata_ordenes_compra oc join cclabora_jarvis.sch_mrp_tbdata_lotes_oc loc on oc.id_oc=loc.id_oc where  oc.id_oc="' . $id_oc . '" ';
            $nombrepdf = 'todos_tickets';
        } else {
            $sql = 'select oc.*,loc.id_barcode,loc.lote_oc,loc.peso_lotes,loc.estado_reg_lotes,loc.peso_t_lotes,loc.codigo_pro_lote,loc.potencia_lotes from cclabora_jarvis.sch_mrp_tbdata_ordenes_compra oc join cclabora_jarvis.sch_mrp_tbdata_lotes_oc loc on oc.id_oc=loc.id_oc where  loc.id_lotes_oc="' . $id_oc . '" ';
            $nombrepdf = 'ticket';
        }

        $sth_lote = $this->consultaBD1($sql, $jarvisConex);
        if ($sth_lote->num_rows > 0) {
            $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\lotes\ticketLote.html.twig';
            $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\lotes\ ';
            $i = 1;
            $todosPDf = '';
            $unlink = array();
            $conservacion = 'N/A';
            while ($result = $sth_lote->fetch_object()) {
                $setec = 'NO';
                $DatosProducto = $this->dimeProductoByCodigo($result->id_producto);
                if (is_object($DatosProducto)) {
                    $producto = $DatosProducto->prodID;
                    $conser = $this->dimeConservacion($DatosProducto->prodID);
                    if (is_object($conser)) {
                        if (trim($conser->descripcion_conservacion) != 0) {
                            $conservacion = trim($conser->descripcion_conservacion);
                        }
                    }
                    if (strlen($DatosProducto->prodDESCRIPCION) <= 24) {
                        $titulo = $DatosProducto->prodDESCRIPCION;
                    } else if (strlen($DatosProducto->prodDESCRIPCION) > 24 && strlen($DatosProducto->prodDESCRIPCION) <= 36) {
                        $titulo = $DatosProducto->prodDESCRIPCION;
                    } else {
                        $titulo = substr($DatosProducto->prodDESCRIPCION, 0, 36);

                    }
                    $em = $this->dimeEM($DatosProducto->prodID);
                    if (is_object($em)) {
                        if ($em->seted == 1) {
                            $setec = 'SI';
                        }
                    }


                }
                $titulo = substr($DatosProducto->prodDESCRIPCION, 0, 20);
                $cbar = $result->id_barcode;
                $cbar = str_replace("(", "", $cbar);
                $cbar = str_replace(")", "", $cbar);
                $charset = 'C128';
                $myBarcode = new barCode();
                $myBarcode->savePath = trim($path2);
                $myBarcode->getBarcodePNGPath($cbar, $charset, 2, 45);
                $barcode = $charset . '_' . $cbar . ".png";
                $link = trim($path2) . $barcode;
                $unlink[] = $link;
                $result_proveedor = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . $result->id_proveedor . "' limit 1", $jarvisConex)->fetch_object();
                $proveedor = '';
                if (is_object($result_proveedor)) {
                    if (strlen($result_proveedor->provRSOCIAL) > 25) {
                        $proveedor = substr($result_proveedor->provRSOCIAL, 0, 25);
                    } else {
                        $proveedor = $result_proveedor->provRSOCIAL;
                    }
                }
                //$proveedor='';
                if ($result->id_empleado != 0) {
                    $datosEmpleado = $this->dimeEmpleado($result->id_empleado);
                    $auxN = explode(" ", $datosEmpleado->emplNOMBRES);
                    $auxA = explode(" ", $datosEmpleado->emplAPELLIDOS);
                    $nombre = $auxN[0] . " " . $auxA[0];
                } else {
                    $nombre = 'No registrado';
                }

                $fecha = explode(" ", $result->fecha_recepcion_oc);
                $header = "D E T E N I D O";
                $bulto = $i . ' de ' . $sth_lote->num_rows;
                $neto = ($result->peso_lotes - $result->peso_t_lotes);
                $html[$i] = file_get_contents($path);
                $html[$i] = str_replace("{titulo}", $header, $html[$i]);
                $html[$i] = str_replace("{titulo}", $header, $html[$i]);
                $html[$i] = str_replace("{nombreProd}", $titulo, $html[$i]);
                $html[$i] = str_replace("{codigoProd}", $result->codigo_pro_lote, $html[$i]);
                $html[$i] = str_replace("{conservacion}", $conservacion, $html[$i]);
                $html[$i] = str_replace("{bruto}", $result->peso_lotes, $html[$i]);
                $html[$i] = str_replace("{tara}", $result->peso_t_lotes, $html[$i]);
                $html[$i] = str_replace("{nro_oc}", $result->nro_oc, $html[$i]);
                $html[$i] = str_replace("{neto}", $neto, $html[$i]);
                $html[$i] = str_replace("{setec}", $setec, $html[$i]);
                $html[$i] = str_replace("{bulto}", $bulto, $html[$i]);
                $html[$i] = str_replace("{fecha}", $fecha[0], $html[$i]);
                $html[$i] = str_replace("{proveedor}", $proveedor, $html[$i]);
                $html[$i] = str_replace("{empleado}", $nombre, $html[$i]);
                $html[$i] = str_replace("{lote}", $result->lote_oc, $html[$i]);
                $html[$i] = str_replace("{cod}", $barcode, $html[$i]);
                $html[$i] = str_replace("{barcode}", $result->id_barcode, $html[$i]);
                $html[$i] = str_replace("{link}", $link, $html[$i]);
                $html[$i] = str_replace("{propietario}", $this->dimePropietario($result->codigo_pro_lote), $html[$i]);
                $i++;
            }
            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
            for ($x = 1; $x < $i; $x++) {
                $pagina .= $html[$x];
            }
            $pagina .= "</body></html>";
            $paper_size = array(0, 0, 950, 600); // TAMA�O IMPRESORA TICKETS NO MODIFICAR
            $options = new Options();
            $options->set('enable_html5_parser', true);
            $dompdf = new Dompdf($options);
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();

            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
            $todosPDf = $nombrepdf . ".pdf";
            foreach ($unlink as $key => $valor) {
                unlink($valor);
            }
            $jarvisConex->close();
            return "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/lotes/" . $todosPDf;
        } else {
            $jarvisConex->close();
            return 0;
        }

    }

    public function PdfticketsAna($id_oc, $dir, $tipo)
    {
        set_time_limit(2000);
        $jarvisConex = $this->abrirconexion('jarvis');
        $unlink = array();
        if ($tipo == 1) {
            $sql = 'select oc.fecha_recepcion_oc,oc.fecha_transicion,oc.nro_oc,oc.id_proveedor,oc.cant_oc,oc.cant_r,oc.nro_bultos,oc.fecha_oc,oc.id_empleado as receptor,loc.id_barcode,loc.analisis_oc,loc.lote_oc,loc.f_reanlisis_lotes,loc.f_manofactura_lotes,loc.caducidad_lotes,loc.peso_lotes,loc.estado_reg_lotes,loc.peso_t_lotes,loc.codigo_pro_lote,loc.potencia_lotes,loc.id_empleado as analista from cclabora_jarvis.sch_mrp_tbdata_ordenes_compra oc join cclabora_jarvis.sch_mrp_tbdata_lotes_oc loc on oc.id_oc=loc.id_oc where  oc.id_oc="' . $id_oc . '" ';
            $nombrepdf = 'todos_tickets';
        } else {
            $sql = 'select oc.fecha_recepcion_oc,oc.fecha_transicion,oc.nro_oc,oc.id_proveedor,oc.cant_oc,oc.cant_r,oc.nro_bultos,oc.fecha_oc,oc.id_empleado as receptor,loc.id_barcode,loc.analisis_oc,loc.lote_oc,loc.f_reanlisis_lotes,loc.f_manofactura_lotes,loc.caducidad_lotes,loc.peso_lotes,loc.estado_reg_lotes,loc.peso_t_lotes,loc.codigo_pro_lote,loc.potencia_lotes,loc.id_empleado as analista from cclabora_jarvis.sch_mrp_tbdata_ordenes_compra oc join cclabora_jarvis.sch_mrp_tbdata_lotes_oc loc on oc.id_oc=loc.id_oc where  loc.id_lotes_oc="' . $id_oc . '" ';
            $nombrepdf = 'ticket';
        }
        $sth_lote = $this->consultaBD1($sql, $jarvisConex);
        if ($sth_lote->num_rows > 0) {
            $path = $dir . '/../' . 'src\UserBundle\GACalidadBundle\Resources\public\docs\lotes\ticketAnalisis.html.twig';
            $path2 = $dir . '/../' . 'src\UserBundle\GACalidadBundle\Resources\public\docs\lotes\ ';
            $i = 1;
            $conservacion = 'N/A';
            $unidad = "";
            while ($result = $sth_lote->fetch_object()) {
                $setec = 'NO';
                $datosProd = $this->dimeProductoByCodigo($result->codigo_pro_lote);
                if (is_object($datosProd)) {
                    $unidad = $datosProd->prodUMEDIDA;
                    if (strlen($datosProd->prodDESCRIPCION) <= 24) {
                        $titulo = $datosProd->prodDESCRIPCION;
                    } else if (strlen($datosProd->prodDESCRIPCION) > 24 && strlen($datosProd->prodDESCRIPCION) <= 36) {
                        $titulo = $datosProd->prodDESCRIPCION;
                    } else {
                        $titulo = substr($datosProd->prodDESCRIPCION, 0, 36);

                    }
                    $conser = $this->dimeConservacion($datosProd->prodID);

                    if (is_object($conser)) {
                        $conservacion = $conser->descripcion_conservacion;
                    }
                    $em = $this->dimeEM($datosProd->prodID);
                    if (is_object($em)) {
                        if ($em->seted == 1) {
                            $setec = 'SI';
                        }
                    }


                }
                $titulo = substr($datosProd->prodDESCRIPCION, 0, 20);
                if ($result->potencia_lotes == '0') {
                    $potencia = "N/A";
                } else {
                    $potencia = $result->potencia_lotes;
                }
                $user = $this->dimeEmpleado($result->analista);
                $auxNU = explode(" ", $user->emplNOMBRES);
                $auxAU = explode(" ", $user->emplAPELLIDOS);
                $usuario = $auxNU[0] . " " . $auxAU[0];
                $cbar = $result->id_barcode;
                $cbar = str_replace("(", "", $cbar);
                $cbar = str_replace(")", "", $cbar);
                $charset = 'C128';
                $myBarcode = new barCode();
                $myBarcode->savePath = trim($path2);
                $myBarcode->getBarcodePNGPath($cbar, $charset, 2, 45);
                $barcode = $charset . '_' . $cbar . ".png";
                $link = trim($path2) . $barcode;
                $unlink[] = $link;

                $datosProveedor = $this->dimeProveedor($result->id_proveedor);
                $proveedor = '';
                $link = trim($path2) . $barcode;
                $fecha_ingreso = explode(" ", $result->fecha_recepcion_oc);
                if ($result->receptor != 0) {
                    $datosEmpleado = $this->dimeEmpleado($result->receptor);
                    $auxN = explode(" ", $datosEmpleado->emplNOMBRES);
                    $auxA = explode(" ", $datosEmpleado->emplAPELLIDOS);
                    $nombre = $auxN[0] . " " . $auxA[0];
                } else {
                    $nombre = 'No registrado';
                }

                if (is_object($datosProveedor)) {
                    if (strlen($datosProveedor->provRSOCIAL) > 25) {
                        $proveedor = substr($datosProveedor->provRSOCIAL, 0, 25);
                    } else {
                        $proveedor = $datosProveedor->provRSOCIAL;
                    }
                }
                if ($result->estado_reg_lotes > 7) {
                    $datoEstado = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_estados where estadoID='" . trim($result->estado_reg_lotes) . "' limit 1", $jarvisConex)->fetch_object();
                    if (is_object($datoEstado)) {
                        $header = $datoEstado->description;
                    }
                } else {
                    $header = $this->dimeConfig('estado_' . $result->estado_reg_lotes, 'jarvisconfig');
                }
                $fecha_r = explode(" ", $result->fecha_transicion);
                $bulto = $i . ' de ' . $sth_lote->num_rows;
                $neto = ($result->peso_lotes - $result->peso_t_lotes);
                $neto .= " " . $unidad;
                $html[$i] = file_get_contents($path);
                $html[$i] = str_replace("{titulo}", $header, $html[$i]);
                $html[$i] = str_replace("{nombreProd}", $titulo, $html[$i]);
                $html[$i] = str_replace("{codigoProd}", $result->codigo_pro_lote, $html[$i]);
                $html[$i] = str_replace("{analisis}", $result->analisis_oc, $html[$i]);
                $html[$i] = str_replace("{potencia}", $potencia, $html[$i]);
                $html[$i] = str_replace("{vencimiento}", $result->caducidad_lotes, $html[$i]);
                $html[$i] = str_replace("{reanalisis}", $result->f_reanlisis_lotes, $html[$i]);
                $html[$i] = str_replace("{conservacion}", $conservacion, $html[$i]);
                $html[$i] = str_replace("{setec}", $setec, $html[$i]);
                $html[$i] = str_replace("{fecha_ingreso}", $fecha_ingreso[0], $html[$i]);
                $html[$i] = str_replace("{bruto}", $result->peso_lotes . " " . $unidad, $html[$i]);
                $html[$i] = str_replace("{tara}", $result->peso_t_lotes . " " . $unidad, $html[$i]);
                $html[$i] = str_replace("{nro_oc}", $result->nro_oc, $html[$i]);
                $html[$i] = str_replace("{neto}", $neto, $html[$i]);
                $html[$i] = str_replace("{bulto}", $bulto, $html[$i]);
                $html[$i] = str_replace("{proveedor}", $proveedor, $html[$i]);
                $html[$i] = str_replace("{lote}", $result->lote_oc, $html[$i]);
                $html[$i] = str_replace("{manofactura}", $result->f_manofactura_lotes, $html[$i]);
                $html[$i] = str_replace("{propietario}", $this->dimePropietario($result->codigo_pro_lote), $html[$i]);
                $html[$i] = str_replace("{fecha}", $fecha_r[0], $html[$i]);
                $html[$i] = str_replace("{proveedor}", $proveedor, $html[$i]);
                $html[$i] = str_replace("{empleado}", $nombre, $html[$i]);
                $html[$i] = str_replace("{lote}", $result->lote_oc, $html[$i]);
                $html[$i] = str_replace("{cod}", $barcode, $html[$i]);
                $html[$i] = str_replace("{link}", $link, $html[$i]);
                $html[$i] = str_replace("{usuario}", $usuario, $html[$i]);
                $html[$i] = str_replace("{barcode}", $result->id_barcode, $html[$i]);
                $i++;
            }
            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                     .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
            for ($x = 1; $x < $i; $x++) {
                $pagina .= $html[$x];
            }
            $pagina .= "</body></html>";
            $paper_size = array(0, 0, 950, 600); // TAMA�O IMPRESORA TICKETS NO MODIFICAR
            $options = new Options();
            $options->set('enable_html5_parser', true);
            $dompdf = new Dompdf($options);
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();

            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
            $todosPDf = $nombrepdf . ".pdf";
            foreach ($unlink as $key => $valor) {
                unlink($valor);
            }
            $jarvisConex->close();
            return "http://servercc1/Jarvis/src/UserBundle/GACalidadBundle/Resources/public/docs/lotes/" . $todosPDf;
        } else {
            $jarvisConex->close();
            return 0;
        }

    }

    public function PdfticketsLiq($id_liq, $dir)
    {
        $funciones = new funciones();
        $javisConex = $funciones->abrirconexion('jarvis');
        $sth_lot = $funciones->consultaBD1('select op.estado_liqop,bop.id_bultos_op,bop.nro_op_butlo,bop.fecha_caducidad_op,bop.qty_lote_op,bop.lote_op,bop.observacion_loteop,bop.id_barcode,op.id_producto,op.id_empleado,op.fecha_registro_liqop,op.nro_op,op.q_producida,op.fecha_op from cclabora_jarvis.sch_prod_tbdata_liquidacion_op op join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on op.id_liqop=bop.id_liqop where op.id_liqop="' . trim($id_liq) . '" ', $javisConex);
        $links_un = array();
        $grupo = array();
        if ($sth_lot->num_rows > 0) {
            $path = $dir . '/../' . 'src\UserBundle\ProduccionBundle\Resources\public\docs\lostespa\ticketLotePA.html.twig';
            $path2 = $dir . '/../' . 'src\UserBundle\ProduccionBundle\Resources\public\docs\lostespa\ ';
            $i = 1;
            $todosPDf = '';
            while ($result_lot = $sth_lot->fetch_object()) {


                $bulto = $i . ' de ' . $sth_lot->num_rows;
                $producto = $funciones->dimeProductoByCodigo($result_lot->id_producto);
                $nombreProducto = substr($producto->prodDESCRIPCION, 0, 46);
                $lote = $result_lot->observacion_loteop;
                if (strlen($nombreProducto) > 24) {
                    $caracter = round(strlen($nombreProducto) / 2, 0);
                    $prod1 = substr($nombreProducto, 0, -$caracter);
                    $prod2 = substr($nombreProducto, $caracter);
                    $complemento = '';
                } else {
                    $prod1 = $nombreProducto;
                    $prod2 = '';
                    $complemento = '<tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                     <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>

                                    ';
                }


                $fecha = explode(" ", $result_lot->fecha_registro_liqop);
                if ($result_lot->id_empleado != 0) {
                    $datosEmpleado = $funciones->dimeEmpleado($result_lot->id_empleado);
                    $auxN = explode(" ", $datosEmpleado->emplNOMBRES);
                    $auxA = explode(" ", $datosEmpleado->emplAPELLIDOS);
                    $nombre = $auxN[0] . " " . $auxA[0];
                } else {
                    $nombre = 'No registrado';
                }

                $cbar = $result_lot->id_barcode;
                $cbar = str_replace("(", "", $cbar);
                $cbar = str_replace(")", "", $cbar);
                $charset = 'C128';
                $myBarcode = new barCode();
                $myBarcode->savePath = trim($path2);
                $myBarcode->getBarcodePNGPath($cbar, $charset, 2, 45);
                $barcode = $charset . '_' . $cbar . ".png";
                $link = trim($path2) . $barcode;
                $header = '';
                if ($result_lot->estado_liqop <= 1) {
                    $header = "D E T E N I D O";
                } else {
                    $estado = $this->dimeEstado($result_lot->estado_liqop);
                    if (is_object($estado)) {
                        $header = $estado->description;
                    }


                }

                $html[$i] = file_get_contents($path);
                $html[$i] = str_replace("{nombreProd1}", $prod1, $html[$i]);
                $html[$i] = str_replace("{nombreProd2}", $prod2, $html[$i]);
                $html[$i] = str_replace("{codigoProd}", $result_lot->id_producto, $html[$i]);
                $html[$i] = str_replace("{qty}", $result_lot->qty_lote_op, $html[$i]);
                $html[$i] = str_replace("{qtyle}", $result_lot->q_producida, $html[$i]);
                $html[$i] = str_replace("{op}", $result_lot->nro_op, $html[$i]);
                $html[$i] = str_replace("{fechaC}", $result_lot->fecha_caducidad_op, $html[$i]);
                $html[$i] = str_replace("{fechaI}", $result_lot->fecha_op, $html[$i]);
                $html[$i] = str_replace("{bulto}", $bulto, $html[$i]);
                $html[$i] = str_replace("{empleado}", $nombre, $html[$i]);
                $html[$i] = str_replace("{lote}", $result_lot->lote_op, $html[$i]);
                $html[$i] = str_replace("{cod}", $barcode, $html[$i]);
                $html[$i] = str_replace("{barcode}", $result_lot->id_barcode, $html[$i]);
                $html[$i] = str_replace("{link}", $link, $html[$i]);
                $html[$i] = str_replace("{complemento}", $complemento, $html[$i]);
                $html[$i] = str_replace("{titulo}", $header, $html[$i]);
                $html[$i] = str_replace("{propietario}", $funciones->dimePropietario($producto->prodCODIGO), $html[$i]);


                $links_un[$i] = $link;

                $i++;
            }

            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
            for ($x = 1; $x < $i; $x++) {
                $pagina .= $html[$x];
            }
            $pagina .= "</body></html>";
            $paper_size = array(0, 0, 950, 600); // TAMA? IMPRESORA TICKETS NO MODIFICAR
            $dompdf = new Dompdf();
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();
            $nombrepdf = 'lotepa';
            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
            $todosPDf = $nombrepdf . ".pdf";
            foreach ($links_un as $key => $valor) {
                unlink($links_un[$key]);
            }
            $javisConex->close();
            return "http://servercc1/Jarvis/src/UserBundle/ProduccionBundle/Resources/public/docs/lostespa/" . $todosPDf;

        } else {
            $javisConex->close();
            return 0;
        }

    }

    /**NUEVO CODIGO**/
    public function guiaMadre($id, $dir)
    {

        set_time_limit(5000);
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_des = $this->consultaBD1('select * from cclabora_jarvis.sch_mrp_tbdata_despacho_pedido where  id_despacho_ped="' . trim($id) . '" ', $jarvisConex);
        $html = array();

        if ($sth_des->num_rows > 0) {
            $result_des = $sth_des->fetch_object();
            $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\guiaMadre.html.twig';
            //$path2 = $dir. '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\ ';
            $path2 = $dir . '/../' . 'web\bundles\userbundlelogistica\docs\despacho\ ';
            //$path2 = $dir. '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\ ';
            $i = 1;
            $todosPDf = array();
            $barcode = '';
            $datosCliente = $this->dimeCliente($result_des->clieID);

            if ($result_des->guia_despcaho != 0 and $result_des->guia_despcaho != '') {
                $guia = $result_des->guia_despcaho;

                $barcode = $this->generaCodigoBarraServientrega($guia, $dir);
                //print_r($barcode);
                $path2 = $dir . '/../' . 'web\bundles\userbundlelogistica\docs\despacho\ ';
                $link = trim($path2) . $barcode;
            } else {
                $guia = "Sin Guía";
                $link = "";
            }


            if (strlen($datosCliente->clieRAZONSOCIAL) > 21) {
                $cliente = substr($datosCliente->clieRAZONSOCIAL, 0, 21);
            } else {
                $cliente = $datosCliente->clieRAZONSOCIAL;
            }
            $direccion1 = strtoupper($datosCliente->clieCALLEP);
            $direccion2 = strtoupper($datosCliente->clieCALLES);
            /*if (!empty($datosCliente->clieCALLES)){
                $direccion2=strtoupper($datosCliente->clieCALLES);
            }*/

            if (strlen($direccion1) > 40) {
                $direccion1 = substr($direccion1, 0, 40);
            }
            if (strlen($direccion2) > 40) {
                $direccion2 = substr($direccion2, 0, 40);
            }
            if (trim($direccion2) == '') {
                $direccion2 = "&nbsp;";
            }
            $aLocadidad = $this->dimeCiudadProvincia($datosCliente->cityID);

            $telefono = "";
            if (!empty($datosCliente->clieCELULAR)) {
                $telefono .= " " . $datosCliente->clieCELULAR;
            }
            $email = explode(";", $datosCliente->clieEMAIL);

            if (count($email) == 0) {
                $email = explode(",", $datosCliente->clieEMAIL);
            }

            $datosVendedor = $this->consultaBD('SELECT * FROM cclabora_fsql007.tablasgenerales where  fgralID= "' . trim($datosCliente->clieID_VENDEDOR) . '"', 'jarvis')->fetch_object();
            $nombreATC = "S/R";
            if (is_object($datosVendedor)) {
                $nombreATC = $datosVendedor->fgralNOMBRE;
            }

            $sth_bultos = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_bulto_despacho where id_despacho_pedido='" . trim($id) . "' limit 1 ", $jarvisConex);
            $i = 0;
            $table_prod = '';
            if ($sth_bultos->num_rows > 0) {
                while ($result_bulto = $sth_bultos->fetch_object()) {
                    $sth_bulto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido where id_despacho_ped='" . trim($id) . "'", $jarvisConex);
                    $result_bul = $sth_bulto->fetch_object();
                    $bulto = $result_bulto->orden_bulto . ' de ' . $result_bul->bultos;

                    $html[$i] = file_get_contents($path);
                    /**NUEVO CODIGO*/
                    $html[$i] = str_replace("{FECHA}", date("Y-m-d", strtotime($result_des->fecha_packing)), $html[$i]);
                    $html[$i] = str_replace("{packer}", $result_des->empleado_packing, $html[$i]);
                    $html[$i] = str_replace("{picker}", $result_des->id_empleado, $html[$i]);
                    $html[$i] = str_replace("{CODIGOBARRA}", $link, $html[$i]);
                    $html[$i] = str_replace("{guia}", $guia, $html[$i]);
                    if ($result_bulto->peso_box < 1) {
                        $html[$i] = str_replace("{PESO}", 1, $html[$i]);
                    } else {
                        $html[$i] = str_replace("{PESO}", round($result_bulto->peso_box, 2), $html[$i]);
                    }

                    /***/
                    $html[$i] = str_replace("{CLIENTE}", $cliente, $html[$i]);
                    $html[$i] = str_replace("{pedido}", $result_des->nro_ped, $html[$i]);
                    $html[$i] = str_replace("{DIR1}", $direccion1, $html[$i]);
                    $html[$i] = str_replace("{DIR2}", $direccion2, $html[$i]);
                    $html[$i] = str_replace("{CIUDAD}", $aLocadidad->cityNAME, $html[$i]);
                    $html[$i] = str_replace("{DESTINO}", substr($aLocadidad->cityNAME, 0, 15), $html[$i]);
                    $html[$i] = str_replace("{TELD}", $telefono, $html[$i]);
                    $html[$i] = str_replace("{email}", $email[0], $html[$i]);
                    $html[$i] = str_replace("{BULTOS}", $bulto, $html[$i]);
                    $html[$i] = str_replace("{transporte}", $result_des->transporte, $html[$i]);
                    $html[$i] = str_replace("{atc}", $nombreATC, $html[$i]);
                    $html[$i] = str_replace("{contenido}", "Productos Veterinarios", $html[$i]);
                    $i++;
                }
            }
            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                    table {border-collapse: collapse;}
                    table td {padding: 0px}
                </style>
                <body>';
            for ($x = 0; $x < $i; $x++) {
                $pagina .= $html[$x];
            }
            $pagina .= "</body></html>";
            $paper_size = array(0, 0, 1100, 670); // TAMA�O IMPRESORA TICKETS NO MODIFICAR
            $dompdf = new Dompdf(['isHtml5ParserEnabled' => true]);
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();
            $nombrepdf = 'guiaMadre';
            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
            /**NUEVO CODIGO**/
            if ($barcode != '') {
                //unlink(trim($path2) . $barcode);
            }
            /**********************/
            return "http://servercc1/Jarvis/web/bundles/userbundlelogistica/docs/despacho/" . $nombrepdf . '.pdf';

        } else {
            return 0;
        }

    }

    /**********************/
    public function generaRFQOC($prodID, $provID, $path, $path2, $cantLE, $tipo, $jarvisconex, $us, $costoficial, $versionID, $link, $pantalla)
    {
        $dia = (int)date("N");
        $resultado = array();
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        $dias = $this->dimeDias2();
        $user = "Maria Jimenez";
        //$user =$us[0];

        $fecha = date("d") . " de " . $meses[$mes] . " del " . date("Y");
        if ($pantalla != 1) {
            $sql = "select * from cclabora_jarvis.sch_mrp_tbdata_prov p
                                              join cclabora_jarvis.rel_em_prov rel on p.provID = rel.provID
                                              where p.provID='" . trim($provID) . "'";
        } else {
            $sql = "select * from cclabora_jarvis.sch_mrp_tbdata_prov p where p.provID='" . trim($provID) . "'";
        }
        $datosProv = $this->consultaBD1($sql, $jarvisconex)->fetch_object();
        //print_r("paso6");
        if (is_object($datosProv)) {
            //print_r("paso5");
            if (!empty($datosProv->provEMAIL)) {
                $datosMP = $this->consultaBD1("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le,p.prodID,e.costo_oficial
                                                   from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID
                                                   where p.prodID='" . trim($prodID) . "' limit 1", $jarvisconex)->fetch_object();
                //$le = $cantLE;
                //print_r("paso4");
                if (is_object($datosMP)) {
                    //print_r("paso3");
                    if ($pantalla == 1 || ($datosMP->le > 0 and $datosMP->costo_oficial != 0)) {
                        $sthnume = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc WHERE prodCODIGO = '" . $datosMP->prodCODIGO . "' and versionID=0 and  month(FECHA)=" . date("m") . " and YEAR(FECHA)=" . date("Y"), $jarvisconex);
                        if ($sthnume->num_rows > 0) {
                            //$numeraciones = $sthnume->num_rows+1;
                            $resultnume = $sthnume->fetch_object();
                            if ($provID == $resultnume->codigoPROVEEDOR) {
                                $sthnumeraciones = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc WHERE fuente = $pantalla and versionID=0 and  month(FECHA)=" . date("m") . " and YEAR(FECHA)=" . date("Y") . " group by prodCODIGO", $jarvisconex);
                                $numeraciones = $sthnumeraciones->num_rows + 1;
                            } else {
                                $contProv = strlen($resultnume->codigoPROVEEDOR);
                                $CodProv = substr($resultnume->orderid, -$contProv, $contProv);
                                $raiz = substr($resultnume->orderid, 0, 5);
                                $consecutivo1 = str_replace($raiz, "", $resultnume->orderid);
                                $consecutivo = str_replace($CodProv, "", $consecutivo1);
                                $numeraciones = $consecutivo;
                            }
                        } else {
                            $sthnumeraciones = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc WHERE fuente = $pantalla and versionID=0 and  month(FECHA)=" . date("m") . " and YEAR(FECHA)=" . date("Y") . " group by prodCODIGO", $jarvisconex);
                            $numeraciones = $sthnumeraciones->num_rows + 1;
                        }
                        if ($pantalla == 1) {
                            $le = $cantLE;
                        } else if ($pantalla == 4) {
                            $le = $cantLE;
                        } else {
                            $le = $cantLE * $datosMP->le;
                        }
                        $orderid_nro = $pantalla . date("ym") . $numeraciones;
                        $orderid_nroBD = $pantalla . date("ym") . $numeraciones . "" . $datosProv->provID;
                        $nroDoc = $pantalla . date("ym") . $datosProv->provID;
                        //ECHO $orderid_nroBD;
                        if ($tipo == 1) {
                            //orden de compra
                            $total = round(($costoficial * $le), 2);
                            $costoficial = round($costoficial, 6);
                            $incoterm = 'N/A';
                            //$tablemp = "<tr><td class='letra'>".$datosMP->prodCODIGO."</td><td class='letra'>".$datosMP->prodDESCRIPCION."</td><td class='letra'></td><td class='letra' style='text-align: right;'>".$le."</td><td class='letra' style='text-align: right;'>$costoficial</td><td class='letra' style='text-align: right;'>$total</td></tr>";
                            if (isset($datosProv->incoterm)) {
                                $resultincoterm = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_incoterm where id = $datosProv->incoterm", $jarvisconex)->fetch_object();
                                if (is_object($resultincoterm)) {
                                    $incoterm = $resultincoterm->descripcion;
                                }
                            }


                            $NS = $this->dimeNSDespachadaN($datosProv->provID, $prodID);
                            $diaactual = date('Y-m-d');
                            $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                            $nuevafecha = date('Y-m-d', $nuevafecha);
                            $bio = '';
                            $criterios = '';

                            $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($datosMP->prodID) . " and estado_bio=1 limit 1; ", $jarvisconex)->fetch_object();
                            if (is_object($biblio)) {
                                $bio = utf8_encode(htmlentities($biblio->bibliografia, ENT_COMPAT, 'utf-8'));
                            }

                            $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($datosMP->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisconex)->fetch_object();
                            if (is_object($crit)) {
                                $criterios = utf8_encode(htmlentities($biblio->bibliografia, ENT_COMPAT, 'utf-8'));
                            }

                            if ($datosProv->idioma == "ES") {
                                $tablemp = "<tr><td class='letra'>" . $orderid_nroBD . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'>$bio</td><td class='letra'>$criterios</td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'>$datosMP->prodUMEDIDA</td><td class='letra'>" . $incoterm . "</td><td class='letra' style='text-align: right;'>Orden de Compra</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                            } elseif ($datosProv->idioma == "EN") {
                                $tablemp = "<tr><td class='letra'>" . $orderid_nroBD . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'>$bio</td><td class='letra'>$criterios</td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'>$datosMP->prodUMEDIDA</td><td class='letra'>" . $incoterm . "</td><td class='letra' style='text-align: right;'>Purchase Order</td><td class='letra' style='text-align: right;'>$nuevafecha</td><td class='letra'>$bio</td><td class='letra'>$criterios</td></tr>";
                            }
                            //$tablemp = "<tr><td class='letra'>" . $orderid_nroBD . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'>" . $incoterm. "</td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'>$datosMP->prodUMEDIDA</td><td class='letra' style='text-align: right;'></td><td class='letra' style='text-align: right;'></td></tr>";
                            $sqlnumeraciones = "SELECT OC FROM cclabora_jarvis.sch_mrp_tbdata_numcompras";
                            /* $sthnumeraciones = $this->consultaBD1($sqlnumeraciones,$jarvisconex);
                             $resultnumeraciones = $sthnumeraciones->fetch_object();*/

                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`costo_prov`,`versionID`,fuente)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $datosMP->costo_oficial,$orderid_nroBD,0,15,$costoficial,$versionID,$pantalla)";
                            //print_r($sqlrfqoc);
                            $resultadosql = $this->consultaBD1($sqlrfqoc, $jarvisconex);

                            $sqlhisrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso OC $orderid_nroBD','$orderid_nroBD',
                                                 $us[1],15)";
                            $resultaodhisoc = $this->consultaBD1($sqlhisrfqoc, $jarvisconex);
                            //$resultadoTransito = 1;
                            $resultadoTransito = $this->transitoFiresoftRFQOC($prodID, $orderid_nroBD, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                            //$resultado = $resultadoTransito;
                            if ($resultadosql and $resultadoTransito and $resultaodhisoc) {
                                $NS = $this->dimeNSDespachada($datosProv->provID, $datosMP->prodID);
                                $diaactual = date('Y-m-d');
                                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                                $nuevafecha = date('Y-m-d', $nuevafecha);


                                $html = file_get_contents($path);
                                $html = str_replace("{OC}", $nroDoc, $html);
                                $html = str_replace("{fecha}", $fecha, $html);
                                $html = str_replace("{proveedor}", $datosProv->provRSOCIAL, $html);
                                $html = str_replace("{contacto}", $datosProv->provCONTACTO, $html);
                                $html = str_replace("{TABLAMP}", $tablemp, $html);
                                $html = str_replace("{cpd}", $datosProv->cpd, $html);
                                $html = str_replace("{user}", $us[0], $html);
                                $html = str_replace("{fmaxe}", $nuevafecha, $html);
                                $html = str_replace("{criterios}", $criterios, $html);
                                $html = str_replace("{bio_cumplir}", $bio, $html);
                                $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                                $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                                $html = str_replace("{ruc}", '1891720188001', $html);
                                $html = str_replace("{ciudad}", 'Ambato', $html);
                                $html = str_replace("{Pais}", 'Ecuador', $html);
                                $html = str_replace("{correo}", 'operaciones@cclabs.com.ec', $html);
                                $html = str_replace("{telefono}", '+593-32434377', $html);
                                $html = str_replace("{telefono1}", '+593-22806167/+593-99911760', $html);
                                $html = str_replace("{subtotal}", ' - ', $html);
                                $html = str_replace("{iva}", ' - ', $html);
                                $html = str_replace("{envio}", ' - ', $html);
                                $html = str_replace("{otros}", ' - ', $html);
                                $html = str_replace("{total}", ' - ', $html);
                                $dompdf = new Dompdf();
                                $dompdf->loadHtml($html);
                                $dompdf->setPaper('A4', 'portrait');
                                $dompdf->render();
                                $pdf = $dompdf->output();
                                file_put_contents($path2 . $orderid_nroBD . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                                $resultado[1] = trim($path2) . $orderid_nroBD . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $resultado[0] = $orderid_nroBD;
                                /*$orderID = $resultnumeraciones->OC+1;
                                 $sqlupdnumcom = "UPDATE `jarvis`.`sch_mrp_tbdata_numcompras` SET
                                             `OC` = $orderID WHERE `ID` = 1";
                                 $this->consultaBD1($sqlupdnumcom,$jarvisconex);*/
                                $nombrepdf = $resultado[0] . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $sql = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sth = $this->consultaBD1($sql, $jarvisconex);
                                $sqlultrfq = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sthultrfq = $this->consultaBD1($sqlultrfq, $jarvisconex);
                                //print_r($sthultrfq);
                                if ($sthultrfq->num_rows > 0) {
                                    $resultultrfq = $sthultrfq->fetch_object();
                                    $resultado[3] = $resultultrfq->ID;
                                    $sqlupdpdf = "UPDATE `jarvis`.`sch_mrp_tbdata_rfqoc` SET
                                        `pdf` = '" . trim($link) . $nombrepdf . "' WHERE `ID` = " . $resultultrfq->ID;
                                    $this->consultaBD1($sqlupdpdf, $jarvisconex);
                                }
                            }
                        } else {
                            //cotizacion
                            //print_r("paso2");
                            $incoterm = 'N/A';
                            if (isset($datosProv->incoterm)) {
                                $resultincoterm = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_incoterm where id = $datosProv->incoterm", $jarvisconex)->fetch_object();
                                if (is_object($resultincoterm)) {
                                    $incoterm = $resultincoterm->descripcion;
                                }
                            }


                            $NS = $this->dimeNSCOTIZACIONN($datosProv->provID, $prodID);
                            $diaactual = date('Y-m-d');
                            $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                            $nuevafecha = date('Y-m-d', $nuevafecha);
                            $bio = '';
                            $criterios = '';

                            $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($datosMP->prodID) . " and estado_bio=1 limit 1; ", $jarvisconex)->fetch_object();
                            if (is_object($biblio)) {
                                $bio = $biblio->bibliografia;
                            }

                            $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($datosMP->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisconex)->fetch_object();
                            if (is_object($crit)) {
                                $criterios = $crit->criterio_em;
                            }

                            if ($datosProv->idioma == "ES") {
                                $tablemp = "<tr><td class='letra'>" . $orderid_nroBD . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'>$bio</td><td class='letra'>$criterios</td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'>$datosMP->prodUMEDIDA</td><td class='letra'>" . $incoterm . "</td><td class='letra' style='text-align: right;'>Cotización de Materiales</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                            } elseif ($datosProv->idioma == "EN") {
                                $tablemp = "<tr><td class='letra'>" . $orderid_nroBD . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'>$bio</td><td class='letra'>$criterios</td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'>$datosMP->prodUMEDIDA</td><td class='letra'>" . $incoterm . "</td><td class='letra' style='text-align: right;'>Request for Quotation</td><td class='letra' style='text-align: right;'>$nuevafecha</td></tr>";
                            }
                            //$tablemp = "<tr><td class='letra'>" . $orderid_nroBD . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'>$incoterm</td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'>$datosMP->prodUMEDIDA</td><td class='letra' style='text-align: right;'></td><td class='letra' style='text-align: right;'></td></tr>";
                            /* $sqlnumeraciones = "SELECT IT FROM cclabora_jarvis.sch_mrp_tbdata_numcompras";
                             $sthnumeraciones = $this->consultaBD1($sqlnumeraciones,$jarvisconex);
                             $resultnumeraciones = $sthnumeraciones->fetch_object();*/
                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`versionID`,fuente)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $datosMP->costo_oficial,$orderid_nroBD,1,14,$versionID,$pantalla)";
                            $resultadosql = $this->consultaBD1($sqlrfqoc, $jarvisconex);
                            $sqlhisrfqIT = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso COT $orderid_nroBD',$orderid_nroBD,
                                                 $us[1],14)";
                            $resultadosqlIT = $this->consultaBD1($sqlhisrfqIT, $jarvisconex);
                            if ($pantalla == 2) {
                                //$this->transitoFiresoftRFQOC($prodID, $orderid_nroBD, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                            }
                            if ($resultadosql and $resultadosqlIT) {
                                $NS = $this->dimeNSCOTIZACIONN($datosProv->provID, $datosMP->prodID);
                                $diaactual = date('Y-m-d');
                                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                                $nuevafecha = date('Y-m-d', $nuevafecha);

                                $html = file_get_contents($path);
                                $html = str_replace("{OC}", $nroDoc, $html);
                                $html = str_replace("{fecha}", $fecha, $html);
                                $html = str_replace("{proveedor}", $datosProv->provRSOCIAL, $html);
                                $html = str_replace("{contacto}", $datosProv->provCONTACTO, $html);
                                $html = str_replace("{TABLAMP}", $tablemp, $html);
                                $html = str_replace("{cpd}", $datosProv->cpd, $html);
                                $html = str_replace("{user}", $us[0], $html);
                                $html = str_replace("{fmaxe}", $nuevafecha, $html);
                                $html = str_replace("{criterios}", $criterios, $html);
                                $html = str_replace("{bio_cumplir}", $bio, $html);
                                $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                                $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                                $html = str_replace("{ruc}", '1891720188001', $html);
                                $html = str_replace("{ciudad}", 'Ambato', $html);
                                $html = str_replace("{Pais}", 'Ecuador', $html);
                                $html = str_replace("{correo}", 'operaciones@cclabs.com.ec', $html);
                                $html = str_replace("{telefono}", '+593-32434377', $html);
                                $html = str_replace("{telefono1}", '+593-22806167/+593-99911760', $html);
                                $html = str_replace("{subtotal}", ' - ', $html);
                                $html = str_replace("{iva}", ' - ', $html);
                                $html = str_replace("{envio}", ' - ', $html);
                                $html = str_replace("{otros}", ' - ', $html);
                                $html = str_replace("{total}", ' - ', $html);
                                $dompdf = new Dompdf();
                                $dompdf->loadHtml($html);
                                $dompdf->setPaper('A4', 'portrait');
                                $dompdf->render();
                                $pdf = $dompdf->output();
                                file_put_contents($path2 . $orderid_nroBD . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                                $resultado[1] = trim($path2) . $orderid_nroBD . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $resultado[0] = $orderid_nroBD;
                                /*$ITID = $resultnumeraciones->IT+1;
                                $sqlupdnumcom = "UPDATE `jarvis`.`sch_mrp_tbdata_numcompras` SET
                                            `IT` = $ITID WHERE `ID` = 1";
                                $this->consultaBD1($sqlupdnumcom,$jarvisconex);*/
                                $nombrepdf = $resultado[0] . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $sqlultrfq = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sthultrfq = $this->consultaBD1($sqlultrfq, $jarvisconex);
                                //print_r($sthultrfq);
                                if ($sthultrfq->num_rows > 0) {
                                    $resultultrfq = $sthultrfq->fetch_object();
                                    $resultado[3] = $resultultrfq->ID;
                                    $sqlupdpdf = "UPDATE `jarvis`.`sch_mrp_tbdata_rfqoc` SET
                                        `pdf` = '" . $nombrepdf . "' WHERE `ID` = " . $resultultrfq->ID;
                                    $this->consultaBD1($sqlupdpdf, $jarvisconex);
                                }
                            }
                        }
                    }
                }
            } else {
                $resultado[0] = -1;
            }
            $jarvisconex->close();
            return $resultado;
        }
    }


    public function generaRFQOC_OLD($prodID, $provID, $path, $path2, $cantLE, $tipo, $jarvisconex, $us, $costoficial, $versionID, $link, $pantalla)
    {
        $dia = (int)date("N");
        $resultado = array();
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        $dias = $this->dimeDias2();
        $user = "Maria Jimenez";
        $jarvisConex = $this->abrirconexion('jarvis');
        //$user =$us[0];
        $fecha = date("d") . " de " . $meses[$mes] . " del " . date("Y");
        $datosProv = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . trim($provID) . "'", $jarvisconex)->fetch_object();
        if (is_object($datosProv)) {
            if (!empty($datosProv->provEMAIL)) {
                $datosMP = $this->consultaBD1("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le,p.prodID,e.costo_oficial 
                                                   from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID
                                                   where p.prodID='" . trim($prodID) . "' limit 1", $jarvisconex)->fetch_object();
                $ban = 0;
                //$le = $cantLE;
                if (is_object($datosMP)) {
                    if ($datosMP->le > 0 and $datosMP->costo_oficial != '') {
                        $sthnumeraciones = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc where versionID=0 and  month(FECHA)=" . date("m") . " and YEAR(FECHA)=" . date("Y") . ";  ", $jarvisconex);
                        if ($pantalla == 1) {
                            $le = $cantLE;
                            $ban = 2;
                        } else {
                            $le = $cantLE * $datosMP->le;
                            $ban = 0;
                        }
                        $orderid_nro = $ban . date("ym") . ($sthnumeraciones->num_rows + 1) . "" . $datosProv->provID;
                        if ($tipo == 1) {

                            //orden de compra
                            $total = round(($costoficial * $le), 2);
                            $costoficial = round($costoficial, 6);
                            //$tablemp = "<tr><td class='letra'>".$datosMP->prodCODIGO."</td><td class='letra'>".$datosMP->prodDESCRIPCION."</td><td class='letra'></td><td class='letra' style='text-align: right;'>".$le."</td><td class='letra' style='text-align: right;'>$costoficial</td><td class='letra' style='text-align: right;'>$total</td></tr>";
                            $tablemp = "<tr><td class='letra'>" . $datosMP->prodCODIGO . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'></td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'></td><td class='letra' style='text-align: right;'></td></tr>";
                            $sqlnumeraciones = "SELECT OC FROM cclabora_jarvis.sch_mrp_tbdata_numcompras";
                            /* $sthnumeraciones = $this->consultaBD1($sqlnumeraciones,$jarvisconex);
                             $resultnumeraciones = $sthnumeraciones->fetch_object();*/
                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`costo_prov`,`versionID`)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $costoficial,$orderid_nro,0,15,$costoficial,$versionID)";
                            //print_r($sqlrfqoc);
                            $resultadosql = $this->consultaBD1($sqlrfqoc, $jarvisconex);

                            $sqlhisrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso OC $orderid_nro','$orderid_nro',
                                                 $us[1],15)";
                            $resultaodhisoc = $this->consultaBD1($sqlhisrfqoc, $jarvisconex);
                            //$resultadoTransito = 1;
                            $resultadoTransito = $this->transitoFiresoftRFQOC($prodID, $orderid_nro, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                            if ($resultadosql and $resultadoTransito and $resultaodhisoc) {
                                $NS = $this->dimeNSDespachada($datosProv->provID, $datosMP->prodID);
                                $diaactual = date('Y-m-d');
                                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                                $nuevafecha = date('Y-m-d', $nuevafecha);
                                $bio = '';
                                $criterios = '';

                                $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($datosMP->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
                                if (is_object($biblio)) {
                                    $bio = '<br><br>
                       <b>Bibliografia a Cumplir</b> ' . $biblio->bibliografia;
                                }

                                $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($datosMP->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
                                if (is_object($crit)) {
                                    $criterios = '<br><br>
                       <b>Criterios de Aceptacion</b> ' . $crit->criterio_em;
                                }
                                $html = file_get_contents($path);
                                $html = str_replace("{OC}", $orderid_nro, $html);
                                $html = str_replace("{fecha}", $fecha, $html);
                                $html = str_replace("{proveedor}", $datosProv->provRSOCIAL, $html);
                                $html = str_replace("{contacto}", $datosProv->provCONTACTO, $html);
                                $html = str_replace("{TABLAMP}", $tablemp, $html);
                                $html = str_replace("{cpd}", $datosProv->cpd, $html);
                                $html = str_replace("{user}", $us[0], $html);
                                $html = str_replace("{fmaxe}", $nuevafecha, $html);
                                $html = str_replace("{criterios}", $criterios, $html);
                                $html = str_replace("{bio_cumplir}", $bio, $html);
                                $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                                $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                                $html = str_replace("{ruc}", '1891720188001', $html);
                                $html = str_replace("{ciudad}", 'Ambato', $html);
                                $html = str_replace("{telefono}", '+593-032434377', $html);
                                $html = str_replace("{subtotal}", ' - ', $html);
                                $html = str_replace("{iva}", ' - ', $html);
                                $html = str_replace("{envio}", ' - ', $html);
                                $html = str_replace("{otros}", ' - ', $html);
                                $html = str_replace("{total}", ' - ', $html);
                                $dompdf = new Dompdf();
                                $dompdf->loadHtml($html);
                                $dompdf->setPaper('A4', 'portrait');
                                $dompdf->render();
                                $pdf = $dompdf->output();
                                file_put_contents($path2 . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                                $resultado[1] = trim($path2) . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $resultado[0] = $orderid_nro;
                                /*$orderID = $resultnumeraciones->OC+1;
                                 $sqlupdnumcom = "UPDATE `jarvis`.`sch_mrp_tbdata_numcompras` SET
                                             `OC` = $orderID WHERE `ID` = 1";
                                 $this->consultaBD1($sqlupdnumcom,$jarvisconex);*/
                                $nombrepdf = $resultado[0] . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $sql = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sth = $this->consultaBD1($sql, $jarvisconex);
                                $sqlultrfq = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sthultrfq = $this->consultaBD1($sqlultrfq, $jarvisconex);
                                //print_r($sthultrfq);
                                if ($sthultrfq->num_rows > 0) {
                                    $resultultrfq = $sthultrfq->fetch_object();
                                    $resultado[3] = $resultultrfq->ID;
                                    $sqlupdpdf = "UPDATE `jarvis`.`sch_mrp_tbdata_rfqoc` SET
                                        `pdf` = '" . trim($link) . $nombrepdf . "' WHERE `ID` = " . $resultultrfq->ID;
                                    $this->consultaBD1($sqlupdpdf, $jarvisconex);
                                }
                            }
                        } else {
                            //cotizacion
                            $tablemp = "<tr><td class='letra'>" . $datosMP->prodCODIGO . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'></td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'></td><td class='letra' style='text-align: right;'></td></tr>";
                            /* $sqlnumeraciones = "SELECT IT FROM cclabora_jarvis.sch_mrp_tbdata_numcompras";
                             $sthnumeraciones = $this->consultaBD1($sqlnumeraciones,$jarvisconex);
                             $resultnumeraciones = $sthnumeraciones->fetch_object();*/
                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`versionID`)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $costoficial,$orderid_nro,1,14,$versionID)";
                            //print_r($sqlrfqoc);
                            $resultadosql = $this->consultaBD1($sqlrfqoc, $jarvisconex);
                            $sqlhisrfqIT = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso COT $orderid_nro',$orderid_nro,
                                                 $us[1],14)";
                            $resultadosqlIT = $this->consultaBD1($sqlhisrfqIT, $jarvisconex);
                            if ($resultadosql and $resultadosqlIT) {
                                $NS = $this->dimeNSCOTIZACION($datosProv->provID, $datosMP->prodID);
                                $diaactual = date('Y-m-d');
                                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                                $nuevafecha = date('Y-m-d', $nuevafecha);
                                $html = file_get_contents($path);
                                $html = str_replace("{OC}", $orderid_nro, $html);
                                $html = str_replace("{fecha}", $fecha, $html);
                                $html = str_replace("{proveedor}", $datosProv->provRSOCIAL, $html);
                                $html = str_replace("{contacto}", $datosProv->provCONTACTO, $html);
                                $html = str_replace("{TABLAMP}", $tablemp, $html);
                                $html = str_replace("{cpd}", $datosProv->cpd, $html);
                                $html = str_replace("{user}", $us[0], $html);
                                $html = str_replace("{fmaxe}", $nuevafecha, $html);
                                $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                                $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                                $html = str_replace("{ruc}", '1891720188001', $html);
                                $html = str_replace("{ciudad}", 'Ambato', $html);
                                $html = str_replace("{telefono}", '+593-032434377', $html);
                                $html = str_replace("{subtotal}", ' - ', $html);
                                $html = str_replace("{iva}", ' - ', $html);
                                $html = str_replace("{envio}", ' - ', $html);
                                $html = str_replace("{otros}", ' - ', $html);
                                $html = str_replace("{total}", ' - ', $html);
                                $dompdf = new Dompdf();
                                $dompdf->loadHtml($html);
                                $dompdf->setPaper('A4', 'portrait');
                                $dompdf->render();
                                $pdf = $dompdf->output();
                                file_put_contents($path2 . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                                $resultado[1] = trim($path2) . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $resultado[0] = $orderid_nro;
                                /*$ITID = $resultnumeraciones->IT+1;
                                $sqlupdnumcom = "UPDATE `jarvis`.`sch_mrp_tbdata_numcompras` SET
                                            `IT` = $ITID WHERE `ID` = 1";
                                $this->consultaBD1($sqlupdnumcom,$jarvisconex);*/
                                $nombrepdf = $resultado[0] . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $sqlultrfq = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sthultrfq = $this->consultaBD1($sqlultrfq, $jarvisconex);
                                //print_r($sthultrfq);
                                if ($sthultrfq->num_rows > 0) {
                                    $resultultrfq = $sthultrfq->fetch_object();
                                    $resultado[3] = $resultultrfq->ID;
                                    $sqlupdpdf = "UPDATE `jarvis`.`sch_mrp_tbdata_rfqoc` SET
                                        `pdf` = '" . $nombrepdf . "' WHERE `ID` = " . $resultultrfq->ID;
                                    $this->consultaBD1($sqlupdpdf, $jarvisconex);
                                }
                            }
                        }
                    }
                }
            } else {
                $resultado[0] = -1;
            }
            $jarvisConex->close();
            return $resultado;
        }
    }

    public function generaRFQOCBulk($prodID, $provID, $path, $path2, $cantLE, $tipo, $jarvisconex, $us, $costoficial, $versionID, $link, $numeraciones)
    {
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        //$fecha = date("d")." de ".$meses[$mes]." del ".date("Y");
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosProv = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . trim($provID) . "'", $jarvisconex)->fetch_object();
        if (is_object($datosProv)) {
            if (!empty($datosProv->provEMAIL)) {

                $datosMP = $this->consultaBD1("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le,p.prodID,e.costo_oficial 
                                                   from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID 
                                                   where p.prodID='" . trim($prodID) . "' limit 1", $jarvisconex)->fetch_object();
                $ban = 3;
                if (is_object($datosMP)) {
                    if ($datosMP->le > 0 and !empty($datosMP->costo_oficial)) {
                        $le = $cantLE;
                        $orderid_nro = $ban . date("ym") . ($numeraciones) . "" . $datosProv->provID;
                        if ($tipo == 0) {
                            //$costoficial = round($costoficial, 6);
                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`costo_prov`,`versionID`,`fuente`)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $datosMP->costo_oficial,$orderid_nro,0,15,0,$versionID,3)";
                            $this->consultaBD1($sqlrfqoc, $jarvisconex);

                            $sqlhisrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso OC $orderid_nro','$orderid_nro',
                                                 $us[1],15)";
                            $this->consultaBD1($sqlhisrfqoc, $jarvisconex);
                        } else {
                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`versionID`,`fuente`)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $datosMP->costo_oficial,$orderid_nro,1,14,$versionID,3)";
                            $this->consultaBD1($sqlrfqoc, $jarvisconex);
                            $sqlhisrfqIT = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso COT $orderid_nro',$orderid_nro,
                                                 $us[1],14)";
                            $this->consultaBD1($sqlhisrfqIT, $jarvisconex);
                        }
                    }
                }
            }
        }
        $jarvisConex->close();
    }

    public function generaRFQOCBulk_OLD($prodID, $provID, $path, $path2, $cantLE, $tipo, $jarvisconex, $us, $costoficial, $versionID, $link, $pantalla)
    {
        $dia = (int)date("N");
        $resultado = array();
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        $dias = $this->dimeDias2();
        $user = "Maria Jimenez";
        //$user =$us[0];
        $jarvisConex = $this->abrirconexion('jarvis');
        $fecha = date("d") . " de " . $meses[$mes] . " del " . date("Y");
        $datosProv = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . trim($provID) . "'", $jarvisconex)->fetch_object();
        if (is_object($datosProv)) {
            if (!empty($datosProv->provEMAIL)) {

                $datosMP = $this->consultaBD1("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le,p.prodID,e.costo_oficial 
                                                   from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID 
                                                   where p.prodID='" . trim($prodID) . "' limit 1", $jarvisconex)->fetch_object();
                $ban = 0;
                //$le = $cantLE;
                if (is_object($datosMP)) {
                    if ($datosMP->le > 0 and $datosMP->costo_oficial != '') {
                        $sthnumeraciones = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc where versionID=$versionID and  month(FECHA)='" . date("m") . "' and YEAR(FECHA)='" . date("Y") . "'", $jarvisconex);
                        $le = $cantLE;
                        $orderid_nro = $ban . date("ym") . ($sthnumeraciones->num_rows + 1) . "" . $datosProv->provID;
                        if ($tipo == 1) {

                            //orden de compra
                            $total = round(($costoficial * $le), 2);
                            $costoficial = round($costoficial, 6);
                            //$tablemp = "<tr><td class='letra'>".$datosMP->prodCODIGO."</td><td class='letra'>".$datosMP->prodDESCRIPCION."</td><td class='letra'></td><td class='letra' style='text-align: right;'>".$le."</td><td class='letra' style='text-align: right;'>$costoficial</td><td class='letra' style='text-align: right;'>$total</td></tr>";
                            $tablemp = "<tr><td class='letra'>" . $datosMP->prodCODIGO . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'></td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'></td><td class='letra' style='text-align: right;'></td></tr>";
                            /*$sqlnumeraciones = "SELECT OC FROM cclabora_jarvis.sch_mrp_tbdata_numcompras";
                            $sthnumeraciones = $this->consultaBD1($sqlnumeraciones, $jarvisconex);
                            $resultnumeraciones = $sthnumeraciones->fetch_object();*/
                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`costo_prov`,`versionID`)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $costoficial,$orderid_nro,0,15,$costoficial,$versionID)";
                            //print_r($sqlrfqoc);
                            $resultadosql = $this->consultaBD1($sqlrfqoc, $jarvisconex);

                            $sqlhisrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso OC $orderid_nro','$orderid_nro',
                                                 $us[1],15)";
                            $resultaodhisoc = $this->consultaBD1($sqlhisrfqoc, $jarvisconex);
                            //$resultadoTransito = 1;
                            //$resultadoTransito = $this->transitoFiresoftRFQOC($prodID, $resultnumeraciones->OC, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                            if ($resultadosql and $resultaodhisoc) {
                                $NS = $this->dimeNSDespachadaN($datosProv->provID, $datosMP->prodID);
                                $diaactual = date('Y-m-d');
                                $nuevafecha = strtotime("+$NS day", strtotime($diaactual));
                                $nuevafecha = date('Y-m-d', $nuevafecha);

                                $bio = '';
                                $criterios = '';

                                $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($datosMP->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
                                if (is_object($biblio)) {
                                    $bio = '<br><br>
                       <b>Bibliografia a Cumplir</b> ' . $biblio->bibliografia;
                                }

                                $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($datosMP->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
                                if (is_object($crit)) {
                                    $criterios = '<br><br>
                       <b>Criterios de Aceptacion</b> ' . $crit->criterio_em;
                                }


                                $html = file_get_contents($path);
                                $html = str_replace("{OC}", $orderid_nro, $html);
                                $html = str_replace("{fecha}", $fecha, $html);
                                $html = str_replace("{proveedor}", $datosProv->provRSOCIAL, $html);
                                $html = str_replace("{contacto}", $datosProv->provCONTACTO, $html);
                                $html = str_replace("{TABLAMP}", $tablemp, $html);
                                $html = str_replace("{cpd}", $datosProv->cpd, $html);
                                $html = str_replace("{user}", $us[0], $html);
                                $html = str_replace("{fmaxe}", $nuevafecha, $html);
                                $html = str_replace("{criterios}", $criterios, $html);
                                $html = str_replace("{bio_cumplir}", $bio, $html);
                                $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                                $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                                $html = str_replace("{ruc}", '1891720188001', $html);
                                $html = str_replace("{ciudad}", 'Ambato', $html);
                                $html = str_replace("{telefono}", '+593-032434377', $html);
                                $html = str_replace("{subtotal}", ' - ', $html);
                                $html = str_replace("{iva}", ' - ', $html);
                                $html = str_replace("{envio}", ' - ', $html);
                                $html = str_replace("{otros}", ' - ', $html);
                                $html = str_replace("{total}", ' - ', $html);
                                $dompdf = new Dompdf();
                                $dompdf->loadHtml($html);
                                $dompdf->setPaper('A4', 'portrait');
                                $dompdf->render();
                                $pdf = $dompdf->output();
                                file_put_contents($path2 . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);

                                $resultado[1] = trim($path2) . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $resultado[0] = $orderid_nro;
                                $resultado[2] = $this->limpiar_texto2($datosProv->provRSOCIAL);
                                /*$orderID = $resultnumeraciones->OC + 1;
                                $sqlupdnumcom = "UPDATE `jarvis`.`sch_mrp_tbdata_numcompras` SET
                                        `OC` = $orderID WHERE `ID` = 1";
                                $this->consultaBD1($sqlupdnumcom, $jarvisconex);*/
                                $nombrepdf = $resultado[0] . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $sql = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sth = $this->consultaBD1($sql, $jarvisconex);
                                $sqlultrfq = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sthultrfq = $this->consultaBD1($sqlultrfq, $jarvisconex);
                                //print_r($sthultrfq);
                                if ($sthultrfq->num_rows > 0) {
                                    $resultultrfq = $sthultrfq->fetch_object();
                                    $resultado[3] = $resultultrfq->ID;
                                    $sqlupdpdf = "UPDATE `jarvis`.`sch_mrp_tbdata_rfqoc` SET
                                        `pdf` = '" . trim($link) . $nombrepdf . "' WHERE `ID` = " . $resultultrfq->ID;
                                    $this->consultaBD1($sqlupdpdf, $jarvisconex);
                                }
                            }
                        } else {
                            //cotizacion
                            $tablemp = "<tr><td class='letra'>" . $datosMP->prodCODIGO . "</td><td class='letra'>" . $datosMP->prodDESCRIPCION . "</td><td class='letra'></td><td class='letra' style='text-align: right;'>" . $le . "</td><td class='letra' style='text-align: right;'></td><td class='letra' style='text-align: right;'></td></tr>";
                            /*$sqlnumeraciones = "SELECT IT FROM cclabora_jarvis.sch_mrp_tbdata_numcompras";
                            $sthnumeraciones = $this->consultaBD1($sqlnumeraciones, $jarvisconex);
                            $resultnumeraciones = $sthnumeraciones->fetch_object();*/
                            $sqlrfqoc = "INSERT INTO `jarvis`.`sch_mrp_tbdata_rfqoc` (
                                                `codigoPROVEEDOR`,`prodCODIGO`,`cant`,`costo`,`orderid`,`tipo`,`estado_rfq`,`versionID`)
                                                VALUES
                                                ($datosProv->provID,'$datosMP->prodCODIGO',$le,
                                                 $costoficial,$orderid_nro,1,14,$versionID)";
                            $resultadosql = $this->consultaBD1($sqlrfqoc, $jarvisconex);
                            $sqlhisrfqIT = "INSERT INTO `jarvis`.`sch_mrp_tbdata_historiarfq` (
                                                `descripcion_historialoc`,`id_rfqoc`,`id_empleado`,`estado`)
                                                VALUES
                                                ('Ingreso COT $orderid_nro',$orderid_nro,
                                                 $us[1],14)";
                            $resultadosqlIT = $this->consultaBD1($sqlhisrfqIT, $jarvisconex);
                            if ($resultadosql and $resultadosqlIT) {

                                $bio = '';
                                $criterios = '';

                                $biblio = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_bibliografia where prodID=" . trim($datosMP->prodID) . " and estado_bio=1 limit 1; ", $jarvisConex)->fetch_object();
                                if (is_object($biblio)) {
                                    $bio = '<br><br>
                       <b>Bibliografia a Cumplir</b> ' . $biblio->bibliografia;
                                }

                                $crit = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em_criterios where prodID=" . trim($datosMP->prodID) . " and estado_crieterio=1 limit 1; ", $jarvisConex)->fetch_object();
                                if (is_object($crit)) {
                                    $criterios = '<br><br>
                       <b>Criterios de Aceptacion</b> ' . $crit->criterio_em;
                                }

                                $NSC = $this->dimeNSCOTIZACIONN($datosProv->provID, $datosMP->prodID);
                                $NSD = $this->dimeNSDespachadaN($datosProv->provID, $datosMP->prodID);
                                $diaactual = date('Y-m-d');
                                $nuevafecha = strtotime("+$NSC day", strtotime($diaactual));
                                $fmaxe = date('Y-m-d', $nuevafecha);
                                $diaactual = date('Y-m-d');
                                $nuevafecha = strtotime("+$NSD day", strtotime($diaactual));
                                $fmaxd = date('Y-m-d', $nuevafecha);
                                $html = file_get_contents($path);
                                $html = str_replace("{OC}", $orderid_nro, $html);
                                $html = str_replace("{fecha}", $fecha, $html);
                                $html = str_replace("{proveedor}", $datosProv->provRSOCIAL, $html);
                                $html = str_replace("{contacto}", $datosProv->provCONTACTO, $html);
                                $html = str_replace("{TABLAMP}", $tablemp, $html);
                                $html = str_replace("{cpd}", $datosProv->cpd, $html);
                                $html = str_replace("{user}", $us[0], $html);
                                $html = str_replace("{fmaxd}", $fmaxd, $html);
                                $html = str_replace("{fmaxe}", $fmaxe, $html);
                                $html = str_replace("{criterios}", $criterios, $html);
                                $html = str_replace("{bio_cumplir}", $bio, $html);
                                $html = str_replace("{nombre empresa}", 'CC Laboratorios Pharmavithal CIA. LTDA.', $html);
                                $html = str_replace("{address}", 'Control norte vía a Quito Km 7/2 Barrio Samanga Bajo', $html);
                                $html = str_replace("{ruc}", '1891720188001', $html);
                                $html = str_replace("{ciudad}", 'Ambato', $html);
                                $html = str_replace("{telefono}", '+593-032434377', $html);
                                $html = str_replace("{subtotal}", ' - ', $html);
                                $html = str_replace("{iva}", ' - ', $html);
                                $html = str_replace("{envio}", ' - ', $html);
                                $html = str_replace("{otros}", ' - ', $html);
                                $html = str_replace("{total}", ' - ', $html);
                                $dompdf = new Dompdf();
                                $dompdf->loadHtml($html);
                                $dompdf->setPaper('A4', 'portrait');
                                $dompdf->render();
                                $pdf = $dompdf->output();
                                file_put_contents($path2 . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);

                                $resultado[1] = trim($path2) . $orderid_nro . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $resultado[0] = $orderid_nro;
                                $resultado[2] = $this->limpiar_texto2($datosProv->provRSOCIAL);
                                /*$ITID = $resultnumeraciones->IT + 1;
                                $sqlupdnumcom = "UPDATE `jarvis`.`sch_mrp_tbdata_numcompras` SET
                                        `IT` = $ITID WHERE `ID` = 1";
                                $this->consultaBD1($sqlupdnumcom, $jarvisconex);*/
                                $nombrepdf = $resultado[0] . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                                $sqlultrfq = "SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc order by ID desc limit 1";
                                $sthultrfq = $this->consultaBD1($sqlultrfq, $jarvisconex);
                                //print_r($sthultrfq);
                                if ($sthultrfq->num_rows > 0) {
                                    $resultultrfq = $sthultrfq->fetch_object();
                                    $resultado[3] = $resultultrfq->ID;
                                    $sqlupdpdf = "UPDATE `jarvis`.`sch_mrp_tbdata_rfqoc` SET
                                        `pdf` = '" . $nombrepdf . "' WHERE `ID` = " . $resultultrfq->ID;
                                    $this->consultaBD1($sqlupdpdf, $jarvisconex);
                                }
                            }
                        }
                    }
                }
            } else {
                $resultado[0] = -1;
            }
            $jarvisConex->close();
            return $resultado;
        }
    }

    public function agregaNSBulk()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT * FROM cclabora_jarvis.a_proveedores_ns where estado='0' ", $jarvisConex);
        $arregloE = array('1' => 'I', '10201' => 'I', '10016' => 'E', '10017' => 'E', '10018' => 'I', '10022' => 'I', '10020' => 'I');
        if ($sth->num_rows > 0) {
            $i = 0;
            while ($result = $sth->fetch_object()) {
                $proveedor = $this->consultaBD1("select * from cclabora_fsql007.proveedores where provRSOCIAL like '%" . utf8_encode($result->proveedor) . "%' limit 1 ", $jarvisConex)->fetch_object();
                $producto = $this->dimeProductoByCodigo($result->prodCODIGO);
                if (is_object($proveedor) && is_object($producto)) {
                    $this->consultaBD1("insert into cclabora_jarvis.sch_admin_nivel_servicios_jira (id_indice_ns, id_estado_jira, id_subindice_ns, tipo_ns, clasificacion_ns, valor_ns, estado_ns, estatus_ns) values ('" . trim($proveedor->provID) . "','" . trim($result->abierto) . "','" . trim($producto->prodID) . "','" . trim($arregloE[$result->abierto]) . "','OC','" . trim($result->valor_a) . "','1','2') ", $jarvisConex);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_admin_nivel_servicios_jira (id_indice_ns, id_estado_jira, id_subindice_ns, tipo_ns, clasificacion_ns, valor_ns, estado_ns, estatus_ns)  values  ('" . trim($proveedor->provID) . "','" . trim($result->cotizacion) . "','" . trim($producto->prodID) . "','" . trim($arregloE[$result->cotizacion]) . "','OC','" . trim($result->valor_c) . "','1','2') ", $jarvisConex);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_admin_nivel_servicios_jira (id_indice_ns, id_estado_jira, id_subindice_ns, tipo_ns, clasificacion_ns, valor_ns, estado_ns, estatus_ns)  values ('" . trim($proveedor->provID) . "','" . trim($result->nota_p) . "','" . trim($producto->prodID) . "','" . trim($arregloE[$result->nota_p]) . "','OC','" . trim($result->valor_p) . "','1','2') ", $jarvisConex);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_admin_nivel_servicios_jira (id_indice_ns, id_estado_jira, id_subindice_ns, tipo_ns, clasificacion_ns, valor_ns, estado_ns, estatus_ns)  values ('" . trim($proveedor->provID) . "','" . trim($result->despachada) . "','" . trim($producto->prodID) . "','" . trim($arregloE[$result->despachada]) . "','OC','" . trim($result->valor_d) . "','1','2') ", $jarvisConex);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_admin_nivel_servicios_jira (id_indice_ns, id_estado_jira, id_subindice_ns, tipo_ns, clasificacion_ns, valor_ns, estado_ns, estatus_ns)  values ('" . trim($proveedor->provID) . "','" . trim($result->cuarentena) . "','" . trim($producto->prodID) . "','" . trim($arregloE[$result->cuarentena]) . "','OC','" . trim($result->valor_cu) . "','1','2') ", $jarvisConex);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_admin_nivel_servicios_jira (id_indice_ns, id_estado_jira, id_subindice_ns, tipo_ns, clasificacion_ns, valor_ns, estado_ns, estatus_ns) values ('" . trim($proveedor->provID) . "','" . trim($result->transferencia) . "','" . trim($producto->prodID) . "','" . trim($arregloE[$result->transferencia]) . "','OC','" . trim($result->valor_t) . "','1','2') ", $jarvisConex);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_admin_nivel_servicios_jira (id_indice_ns, id_estado_jira, id_subindice_ns, tipo_ns, clasificacion_ns, valor_ns, estado_ns, estatus_ns) values ('" . trim($proveedor->provID) . "','" . trim($result->bodega) . "','" . trim($producto->prodID) . "','" . trim($arregloE[$result->bodega]) . "','OC','" . trim($result->valor_b) . "','1','2') ", $jarvisConex);
                    $this->consultaBD1("update cclabora_jarvis.a_proveedores_ns set estado='1' where id_reg='" . trim($result->id_reg) . "' ", $jarvisConex);
                    $i++;
                }
            }
            echo "Ejecutado : " . $i . "<br>";
        }

    }

    public function generaOCLote($prodID, $provID, $path, $path2, $cantLE, $tipo)
    {
        ini_set('MAX_EXECUTION_TIME', 0);
        $dia = (int)date("N");
        $resultado = array();
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        $dias = $this->dimeDias2();
        $tipo_oc = 1;
        $user = "Maria Jimenez";
        $rutaArchivo = '';
        $idDoc = '';
        $fecha = "Quito DM, " . $dias[$dia] . "," . date("d") . " de " . $meses[$mes] . " de " . date("Y");
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosProv = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . trim($provID) . "'", $jarvisConex)->fetch_object();
        $idrfq = '';
        $total = 0;
        $tit = '';
        $linkPDF = '';
        $tablemp = '';
        if (is_object($datosProv)) {
            $userJira = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_jirauser where id='1' ", $jarvisConex)->fetch_object();

            if ($datosProv->status == "NACIONAL") {
                $this->consultaBD1("insert into cclabora_jarvis.sch_mrp_tbdata_purchaseorder (estatus,fecha) values ('A','" . date("Y-m-d") . "') ", $jarvisConex);
                $datosOC = $this->consultaBD1('select * from cclabora_jarvis.sch_mrp_tbdata_purchaseorder order by orderid DESC limit 1', $jarvisConex)->fetch_object();
                $idrfq = $datosOC->orderid;
            } else {
                $tipo_oc = 2;
                $this->consultaBD1("insert into cclabora_jarvis.sch_mrp_tbdata_cotizaciones  (fecha,estatus) values ('" . date("Y-m-d") . "','A') ", $jarvisConex);
                $datosCOT = $this->consultaBD1('select * from cclabora_jarvis.sch_mrp_tbdata_cotizaciones order by cotID DESC limit 1', $jarvisConex)->fetch_object();
                $idrfq = $datosCOT->cotID;

            }
            $nombreArchivo = urlencode($idrfq . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-PEDIDO MULTIPLE");
            $nombreArchivo2 = $idrfq . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-PEDIDO MULTIPLE";
            $nombreArchivo = str_replace('+', '%20', $nombreArchivo);
            $datosProducto = ' ';

            foreach ($prodID as $key => $valor) {
                $datosMP = $this->consultaBD1("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID where p.prodID='" . trim($valor) . "' limit 1", $jarvisConex)->fetch_object();
                if (is_object($datosMP)) {
                    if ($tipo == 2) {
                        $le = $cantLE[$key];
                    } else {
                        $le = $cantLE[$key] * $datosMP->le;
                    }

                    $datosProducto .= substr($datosMP->prodDESCRIPCION, 0, 20) . " ";
                    if (trim($datosProv->status) == "NACIONAL") {

                        $tablemp .= "<tr><td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td><td></td><td></td></tr>";
                        if ($tipo == 2) {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/nva_recepcion/" . $nombreArchivo . ".pdf";
                        } else {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/" . $nombreArchivo . ".pdf";
                        }
                        $tit = 'OC';
                    } else {
                        $tablemp .= "<tr><td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td></tr>";
                        if ($tipo == 2) {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/nva_recepcion/" . $nombreArchivo . ".pdf";
                        } else {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/cotizaciones/" . $nombreArchivo . ".pdf";
                        }
                        $tit = 'IT';
                    }

                }
            }

            $configJira = array('username' => "jarvis", 'password' => "jarvis", 'host' => "http://servercc3:8080");
            $jira = new jira($configJira);

            $html = file_get_contents($path);
            $html = str_replace("{NoOrden}", $idrfq, $html);
            $html = str_replace("{FECHA}", $fecha, $html);
            $html = str_replace("{Proveedor}", $datosProv->provRSOCIAL, $html);
            $html = str_replace("{provContacto}", $datosProv->provCONTACTO, $html);
            $html = str_replace("{TABLAMP}", $tablemp, $html);
            $html = str_replace("{cpd}", $datosProv->cpd, $html);
            $html = str_replace("{COMPRAS}", $user, $html);

            print_r($html);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdf = $dompdf->output();
            file_put_contents($path2 . $nombreArchivo2 . ".pdf", $pdf);
            $resultado[1] = trim($path2) . $nombreArchivo . ".pdf";

            $titulo = $tit . " " . $idrfq . "; " . $this->limpiar_texto2($datosProv->provRSOCIAL) . "; " . $this->limpiar_texto2($datosProducto);
            $resultado[0] = $idrfq;
            $descripcion = "Por favor revisar la nueva RFQ disponible en: " . $linkPDF;
            $issue = $jira->create_jira_ticketOC("OC", $titulo, $descripcion, $userJira->descripcion);
            if (is_object($issue)) {
                $resultado[2] = $issue->key;
                $jira->update_jira_fields_OC($issue->key, $this->limpiar_texto2($datosProv->provRSOCIAL), $this->limpiar_texto($datosProv->provCONTACTO), $datosProv->provEMAIL);
                $resultado[0] = $idrfq;

            }
            foreach ($prodID as $key => $valor) {
                if (!empty($idrfq)) {
                    if ($tipo == 2) {
                        $le = $cantLE[$key];
                    } else {
                        $le = $cantLE[$key] * $datosMP->le;
                    }
                    $cost = $this->get_cost_from_id($valor);
                    $total = $le * $cost;
                    $rfqID = bin2hex(openssl_random_pseudo_bytes(3));
                    $observaciones = '';
                    $datosProducto = $this->dimeProducto($valor);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_mrp_tbdata_rfq (rfqID,ticket,origFECHA,provCONTACTO,condiciones,codigoPROVEEDOR,prodID,prodCODIGO,prodDESCRIPCION,cant,observaciones,orderid,price,total,estado_rfq) values ('" . $rfqID . "','" . $issue->key . "','" . date("Y-m-d H:i:s") . "','" . $datosProv->provCONTACTO . "','" . $datosProv->cpd . "','" . $datosProv->provID . "','" . $valor . "','" . $datosProducto->prodCODIGO . "','" . $datosProducto->prodDESCRIPCION . "','" . $le . "','" . $observaciones . "','" . $idrfq . "'," . $cost . "," . $total . ",'1') ", $jarvisConex);
                    if ($tipo_oc == 1) {
                        $this->transitoFiresoft($valor, $idrfq, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                    }
                }
            }

            $jarvisConex->close();

            return $resultado;

        }


    }

    public function generaOCRfqLote($prodID, $provID, $path, $path2, $cantLE, $tipo)
    {
        ini_set('MAX_EXECUTION_TIME', 0);
        $dia = (int)date("N");
        $resultado = array();
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        $dias = $this->dimeDias2();
        $tipo_oc = 1;
        $user = "Maria Jimenez";
        $rutaArchivo = '';
        $idDoc = '';
        $fecha = "Quito DM, " . $dias[$dia] . "," . date("d") . " de " . $meses[$mes] . " de " . date("Y");
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosProv = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . trim($provID) . "'", $jarvisConex)->fetch_object();
        $idrfq = '';
        $total = 0;
        $tit = '';
        $linkPDF = '';
        $tablemp = '';
        if (is_object($datosProv)) {
            $userJira = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_jirauser where id='1' ", $jarvisConex)->fetch_object();

            if ($datosProv->status == "NACIONAL") {
                $this->consultaBD1("insert into cclabora_jarvis.sch_mrp_tbdata_purchaseorder (estatus,fecha) values ('A','" . date("Y-m-d") . "') ", $jarvisConex);
                $datosOC = $this->consultaBD1('select * from cclabora_jarvis.sch_mrp_tbdata_purchaseorder order by orderid DESC limit 1', $jarvisConex)->fetch_object();
                $idrfq = $datosOC->orderid;
            } else {
                $tipo_oc = 2;
                $this->consultaBD1("insert into cclabora_jarvis.sch_mrp_tbdata_cotizaciones  (fecha,estatus) values ('" . date("Y-m-d") . "','A') ", $jarvisConex);
                $datosCOT = $this->consultaBD1('select * from cclabora_jarvis.sch_mrp_tbdata_cotizaciones order by cotID DESC limit 1', $jarvisConex)->fetch_object();
                $idrfq = $datosCOT->cotID;

            }
            $nombreArchivo = urlencode($idrfq . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-PEDIDO MULTIPLE");
            $nombreArchivo2 = $idrfq . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-PEDIDO MULTIPLE";
            $nombreArchivo = str_replace('+', '%20', $nombreArchivo);
            $datosProducto = ' ';

            foreach ($prodID as $key => $valor) {
                $datosMP = $this->consultaBD1("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID where p.prodID='" . trim($valor) . "' limit 1", $jarvisConex)->fetch_object();
                if (is_object($datosMP)) {
                    if ($tipo == 2) {
                        $le = $cantLE[$key];
                    } else {
                        $le = $cantLE[$key] * $datosMP->le;
                    }

                    $datosProducto .= substr($datosMP->prodDESCRIPCION, 0, 20) . " ";
                    if (trim($datosProv->status) == "NACIONAL") {

                        $tablemp .= "<tr><td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td><td></td><td></td></tr>";
                        if ($tipo == 2) {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/nva_recepcion/" . $nombreArchivo . ".pdf";
                        } else {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/" . $nombreArchivo . ".pdf";
                        }
                        $tit = 'OC';
                    } else {
                        $tablemp .= "<tr><td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td></tr>";
                        if ($tipo == 2) {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/nva_recepcion/" . $nombreArchivo . ".pdf";
                        } else {
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/cotizaciones/" . $nombreArchivo . ".pdf";
                        }
                        $tit = 'IT';
                    }

                }
            }

            $configJira = array('username' => "jarvis", 'password' => "jarvis", 'host' => "http://servercc3:8080");
            $jira = new jira($configJira);

            $html = file_get_contents($path);
            $html = str_replace("{NoOrden}", $idrfq, $html);
            $html = str_replace("{FECHA}", $fecha, $html);
            $html = str_replace("{Proveedor}", $datosProv->provRSOCIAL, $html);
            $html = str_replace("{provContacto}", $datosProv->provCONTACTO, $html);
            $html = str_replace("{TABLAMP}", $tablemp, $html);
            $html = str_replace("{cpd}", $datosProv->cpd, $html);
            $html = str_replace("{COMPRAS}", $user, $html);

            print_r($html);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdf = $dompdf->output();
            file_put_contents($path2 . $nombreArchivo2 . ".pdf", $pdf);
            $resultado[1] = trim($path2) . $nombreArchivo . ".pdf";

            $titulo = $tit . " " . $idrfq . "; " . $this->limpiar_texto2($datosProv->provRSOCIAL) . "; " . $this->limpiar_texto2($datosProducto);
            $resultado[0] = $idrfq;
            $descripcion = "Por favor revisar la nueva RFQ disponible en: " . $linkPDF;
            $issue = $jira->create_jira_ticketOC("OC", $titulo, $descripcion, $userJira->descripcion);
            if (is_object($issue)) {
                $resultado[2] = $issue->key;
                $jira->update_jira_fields_OC($issue->key, $this->limpiar_texto2($datosProv->provRSOCIAL), $this->limpiar_texto($datosProv->provCONTACTO), $datosProv->provEMAIL);
                $resultado[0] = $idrfq;

            }
            foreach ($prodID as $key => $valor) {
                if (!empty($idrfq)) {
                    if ($tipo == 2) {
                        $le = $cantLE[$key];
                    } else {
                        $le = $cantLE[$key] * $datosMP->le;
                    }
                    $cost = $this->get_cost_from_id($valor);
                    $total = $le * $cost;
                    $rfqID = bin2hex(openssl_random_pseudo_bytes(3));
                    $observaciones = '';
                    $datosProducto = $this->dimeProducto($valor);
                    $this->consultaBD1("insert into cclabora_jarvis.sch_mrp_tbdata_rfq (rfqID,ticket,origFECHA,provCONTACTO,condiciones,codigoPROVEEDOR,prodID,prodCODIGO,prodDESCRIPCION,cant,observaciones,orderid,price,total,estado_rfq) values ('" . $rfqID . "','" . $issue->key . "','" . date("Y-m-d H:i:s") . "','" . $datosProv->provCONTACTO . "','" . $datosProv->cpd . "','" . $datosProv->provID . "','" . $valor . "','" . $datosProducto->prodCODIGO . "','" . $datosProducto->prodDESCRIPCION . "','" . $le . "','" . $observaciones . "','" . $idrfq . "'," . $cost . "," . $total . ",'1') ", $jarvisConex);
                    if ($tipo_oc == 1) {
                        $this->transitoFiresoft($valor, $idrfq, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                    }
                }
            }

            $jarvisConex->close();

            return $resultado;

        }


    }


    public function errorTransferencias()
    {

        $sth_table = $this->consultaBD("select * from cclabora_jarvis.a_arreglo_transacciones where estado='0'", 'jarvis');
        $cont = 0;
        if ($sth_table->num_rows > 0) {
            while ($result = $sth_table->fetch_object()) {
                //$sql ='select kr.krdID,kr.docinvID from cclabora_fsql007.kardex kr join cclabora_fsql007.documentosinventarios mi on kr.docinvID=mi.docinvID where mi.tpdiID="'.trim($result->tipod_doc).'" AND mi.docinvNUMERO="'.trim($result->nro_inv).'" and kr.krdCANTIDAD="'.trim($result->cantidad_validar).'" and kr.krdCOSTO LIKE "%'.trim($result->costo_validar).'%"';
                $sql = 'select kr.krdID,kr.docinvID from cclabora_fsql007.kardex kr join cclabora_fsql007.documentosinventarios mi on kr.docinvID=mi.docinvID where mi.tpdiID="' . trim($result->tipod_doc) . '" AND mi.docinvNUMERO="' . trim($result->nro_inv) . '" and kr.krdCANTIDAD=' . trim(str_replace(",", ".", $result->cantidad_validar)) . ' and ROUND(kr.krdCOSTO,2)=' . trim(str_replace(",", ".", $result->costo_validar)) . '; ';
                $datoSQL = $this->consultaBD($sql, 'jarvis')->fetch_object();
                if (is_object($datoSQL)) {

                    $sql = "update cclabora_fsql007.kardex set krdCANTIDAD='" . trim(str_replace(",", ".", $result->cantidad_modificar)) . "',krdCOSTO='" . trim(str_replace(",", ".", $result->costo_modificar)) . "' where krdID='" . trim($datoSQL->krdID) . "' ";
                    $sql2 = "update cclabora_jarvis.a_arreglo_transacciones set estado='1',docinvID='" . trim($datoSQL->docinvID) . "',krdID='" . trim($datoSQL->krdID) . "' where id_transacciones='" . trim($result->id_transacciones) . "'   ";
                    $this->consultaBD($sql, 'jarvis',1);
                    $this->consultaBD($sql2, 'jarvis');

                    $cont++;
                }


            }

        }
        echo "Cambiados: " . $cont . "<br>";

    }

    public function noTransferidos()
    {
        $sth = $this->consultaBD("SELECT oc.*,pr.prodID,prov.provRSOCIAL FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra oc join cclabora_fsql007.productos pr on oc.id_producto=pr.prodCODIGO join cclabora_jarvis.sch_mrp_tbdata_prov prov on prov.provID=oc.id_proveedor where estado_oc='5' and ingreso_contable='1' ", "jarvis");
        $cant = 0;
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $ban = $this->transferenciasFiresoft2(trim($result->prodID), trim($result->id_oc), utf8_encode($result->provRSOCIAL));
                if ($ban == 1) {
                    $this->consultaBD("update cclabora_jarvis.sch_mrp_tbdata_ordenes_compra set ingreso_contable='2' where id_oc='" . trim($result->id_oc) . "' ", 'jarvis');
                    $cant++;
                }

            }
        }

        echo "Transferidos: " . $cant . " de " . $sth->num_rows . "<br>";


    }


    public function generaOCMRP($prodID, $provID, $path, $path2, $cantLE)
    {
        $dia = (int)date("N");
        $resultado = array();
        $mes = (int)date("m");
        $meses = $this->dimeMeses();
        $dias = $this->dimeDias2();
        $user = "Maria Jimenez";
        $rutaArchivo = '';
        $idDoc = '';
        $fecha = "Quito DM, " . $dias[$dia] . "," . date("d") . " de " . $meses[$mes] . " de " . date("Y");
        $datosProv = $this->consultaBD("select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID='" . trim($provID) . "'", 'jarvis')->fetch_object();
        if (is_object($datosProv)) {
            if (!empty($datosProv->provEMAIL)) {
                $configJira = array('username' => "jarvis", 'password' => "jarvis", 'host' => "http://servercc3:8080");
                $jira = new jira($configJira);
                $datosMP = $this->consultaBD("select p.prodCODIGO,p.prodDESCRIPCION,p.prodUMEDIDA,e.le from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em e on p.prodID=e.prodID where p.prodID='" . trim($prodID) . "' limit 1", 'jarvis')->fetch_object();
                $le = $cantLE * $datosMP->le;
                $userJira = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_jirauser where id='1' ", 'jarvis')->fetch_object();
                if (is_object($datosMP)) {
                    if ($datosProv->status == "NACIONAL") {
                        //orden de compra
                        $tablemp = "<td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td><td></td><td></td>";
                        $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_purchaseorder (estatus,fecha) values ('A','" . date("Y-m-d") . "') ", "jarvis");
                        $datosOC = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_purchaseorder order by orderid DESC limit 1', 'jarvis')->fetch_object();
                        if (is_object($datosOC)) {
                            $html = file_get_contents($path);
                            $html = str_replace("{NoOrden}", $datosOC->orderid, $html);
                            $html = str_replace("{FECHA}", $fecha, $html);
                            $html = str_replace("{Proveedor}", $datosProv->provRSOCIAL, $html);
                            $html = str_replace("{provContacto}", $datosProv->provCONTACTO, $html);
                            $html = str_replace("{TABLAMP}", $tablemp, $html);
                            $html = str_replace("{cpd}", $datosProv->cpd, $html);
                            $html = str_replace("{COMPRAS}", $user, $html);
                            $dompdf = new Dompdf();
                            $dompdf->loadHtml($html);
                            $dompdf->setPaper('A4', 'portrait');
                            $dompdf->render();
                            $pdf = $dompdf->output();
                            file_put_contents($path2 . $datosOC->orderid . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                            $resultado[1] = trim($path2) . $datosOC->orderid . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                            $nombreArchivo = urlencode($datosOC->orderid . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20));
                            $nombreArchivo = str_replace('+', '%20', $nombreArchivo);
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/ordenes/" . $nombreArchivo . ".pdf";
                            $titulo = "OC " . $datosOC->orderid . "; " . $this->limpiar_texto2($datosProv->provRSOCIAL) . "; " . $datosMP->prodDESCRIPCION;
                            $resultado[0] = $datosOC->orderid;
                            $descripcion = "Por favor revisar la nueva RFQ disponible en: " . $linkPDF;
                            $issue = $jira->create_jira_ticketOC("OC", $titulo, $descripcion, $userJira->descripcion);
                            if (is_object($issue)) {
                                $jira->update_jira_fields_OC($issue->key, $this->limpiar_texto2($datosProv->provRSOCIAL), $this->limpiar_texto($datosProv->provCONTACTO), $datosProv->provEMAIL);
                                $rfqID = bin2hex(openssl_random_pseudo_bytes(3));
                                $observaciones = '';
                                $cost = $this->get_cost_from_id($prodID);
                                $total = $le * $cost;
                                $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_rfq (rfqID,ticket,origFECHA,provCONTACTO,condiciones,codigoPROVEEDOR,prodID,prodCODIGO,prodDESCRIPCION,cant,observaciones,orderid,price,total,estado_rfq) values ('" . $rfqID . "','" . $issue->key . "','" . date("Y-m-d H:i:s") . "','" . $datosProv->provCONTACTO . "','" . $datosProv->cpd . "','" . $datosProv->provID . "','" . $prodID . "','" . $datosMP->prodCODIGO . "','" . $datosMP->prodDESCRIPCION . "','" . $le . "','" . $observaciones . "','" . $datosOC->orderid . "'," . $cost . "," . $total . ",'1') ", 'jarvis');
                                $resultado[0] = $datosOC->orderid;
                                $this->transitoFiresoft($prodID, $datosOC->orderid, $this->limpiar_texto2($datosProv->provRSOCIAL), 1);
                            }

                        }
                    } else {
                        //cotizacion
                        $tablemp = "<td></td><td><font size=2>" . $datosMP->prodCODIGO . "</font></td><td><font size=2>" . $datosMP->prodDESCRIPCION . "</font></td><td><font size=2>$datosMP->prodUMEDIDA</font></td><td><font size=2>" . $le . "</font></td>";
                        $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_cotizaciones  (fecha,estatus) values ('" . date("Y-m-d") . "','A') ", "jarvis");
                        $datosCOT = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_cotizaciones order by cotID DESC limit 1', 'jarvis')->fetch_object();
                        if (is_object($datosCOT)) {
                            $html = file_get_contents($path);
                            $html = str_replace("{NoOrden}", $datosCOT->cotID, $html);
                            $html = str_replace("{FECHA}", $fecha, $html);
                            $html = str_replace("{Proveedor}", $datosProv->provRSOCIAL, $html);
                            $html = str_replace("{provContacto}", $datosProv->provCONTACTO, $html);
                            $html = str_replace("{TABLAMP}", $tablemp, $html);
                            $html = str_replace("{cpd}", $datosProv->cpd, $html);
                            $html = str_replace("{COMPRAS}", $user, $html);
                            $dompdf = new Dompdf();
                            $dompdf->loadHtml($html);
                            $dompdf->setPaper('A4', 'portrait');
                            $dompdf->render();
                            $pdf = $dompdf->output();
                            file_put_contents($path2 . $datosCOT->cotID . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf", $pdf);
                            $nombreArchivo = urlencode($datosCOT->cotID . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20));
                            $nombreArchivo = str_replace('+', '%20', $nombreArchivo);
                            $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/cotizaciones/" . $nombreArchivo . ".pdf";
                            $resultado[1] = trim($path2) . $datosCOT->cotID . "-" . $this->limpiar_texto2($datosProv->provRSOCIAL) . "-" . substr($datosMP->prodDESCRIPCION, 0, 20) . ".pdf";
                            $titulo = "IT " . $datosCOT->cotID . "; " . $this->limpiar_texto2($datosProv->provRSOCIAL) . "; " . $datosMP->prodDESCRIPCION;
                            $descripcion = "Por favor revisar la nueva RFQ disponible en: " . $linkPDF;
                            $issue = $jira->create_jira_ticketOC("OC", $titulo, $descripcion, $userJira->descripcion);
                            if (is_object($issue)) {
                                $jira->update_jira_fields_OC($issue->key, $this->limpiar_texto2($datosProv->provRSOCIAL), $this->limpiar_texto($datosProv->provCONTACTO), $datosProv->provEMAIL);
                                $rfqID = bin2hex(openssl_random_pseudo_bytes(3));
                                $observaciones = '';
                                $cost = $this->get_cost_from_id($prodID);
                                $total = $le * $cost;
                                $this->consultaBD("insert into cclabora_jarvis.sch_mrp_tbdata_rfq (rfqID,ticket,origFECHA,provCONTACTO,condiciones,codigoPROVEEDOR,prodID,prodCODIGO,prodDESCRIPCION,cant,observaciones,orderid,price,total) values ('" . $rfqID . "','" . $issue->key . "','" . date("Y-m-d H:i:s") . "','" . $datosProv->provCONTACTO . "','" . $datosProv->cpd . "','" . $datosProv->provID . "','" . $prodID . "','" . $datosMP->prodCODIGO . "','" . $datosMP->prodDESCRIPCION . "','" . $le . "','" . $observaciones . "','" . $datosCOT->cotID . "'," . $cost . "," . $total . ") ", 'jarvis');
                                $this->transitoFiresoft($prodID, $datosCOT->cotID, $this->limpiar_texto($datosProv->provRSOCIAL), 1);
                                $resultado[0] = $datosCOT->cotID;
                            }

                        }


                    }

                }
            } else {
                $resultado[0] = -1;
            }

            return $resultado;

        }


    }

    public function dimeTipoProducto($cod)
    {
        $datoProducto = $this->consultaBD("select em.* from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em em on p.prodID=em.prodID where prodCODIGO='" . trim($cod) . "' limit 1", "jarvis")->fetch_object();
        if (is_object($datoProducto)) {
            return $datoProducto;
        } else {
            $datoProducto = $this->consultaBD("select * from cclabora_jarvis.sch_mrp_tbdata_em  where prodID='" . trim($cod) . "' limit 1", "jarvis")->fetch_object();
            if (is_object($datoProducto)) {
                return $datoProducto;
            } else {
                return 0;
            }

        }

    }

    public function dimeLE($prodID)
    {
        $funciones = new funciones();
        $le = 0;
        $datoLE = $funciones->consultaBD("SELECT le FROM cclabora_jarvis.sch_mrp_tbdata_em where prodID = '" . trim($prodID) . "'", 'jarvis')->fetch_object();
        if (is_object($datoLE)) {
            $le = (int)$datoLE->le;
        }
        return $le;
    }

    public function dimeLotesProd($bodega, $diactual, $active_code)
    {
        $this->consultaBD("CALL cclabora_jarvis.rpt_ListadoTomaFisicaLotes('$bodega','$diactual')", 'jarvis');
        $sth_toma = $this->consultaBD("SELECT * FROM cclabora_jarvis.basura_toma_fisica where CODIGO = '$active_code'", 'jarvis');
        $lotes = array();
        if ($sth_toma->num_rows > 0) {
            while ($result = $sth_toma->fetch_object()) {
                $lotes[$result->LOTE] = $result->SALDO_LOTE;
            }
        }
        return $lotes;
    }

    public function datosEmpleado($user)
    {
//        $user='ccobo';
        if (!empty($user) || $user != 'anon.') {
            $resultado = array();
            $sql = "select email from sch_securelogin_tbdata_members where username='" . $user . "'";
            //print_r($sql);
             
            $sth = $this->consultaBD($sql, 'xtreme',41);
            $result = $sth->fetch_object(); 
            if ($sth->num_rows > 0) {
                $sql2 = "select * from sch_rrh_tbl_empleados where emplEMAIL_EMPRESARIAL='" . $result->email . "' and emplESTADO='A'";
                $sth2 = $this->consultaBD($sql2, 'xtreme',41);
                $result2 = $sth2->fetch_object();
                $resultado[0] = $result2->emplNOMBRES . " " . $result2->emplAPELLIDOS;
                $resultado[1] = $result2->emplID;
                $resultado[2] = $result->email;
            } else {
                $resultado[0] = 'Datos de Usuario No Disponible';
                $resultado[1] = 0;
                $resultado[2] = 0;
            }


        } else {
            $resultado[0] = 'Datos de Usuario No Disponible';
            $resultado[1] = 0;
        }
        return $resultado;
    }

    public function  dimeConservacion($prodID)
    {

        $sth = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_conservacion_productos where id_producto ="' . trim($prodID) . '"', 'jarvis');
        if ($sth->num_rows > 0) {
            return $sth->fetch_object();
        } else {
            $res = '';
            return $res;
        }

    }

    public function transitoFiresoft($productos, $id_oc, $proveedor, $estado)
    {
        $result_rfq = '';
        $datosOC = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where id_oc='" . trim($id_oc) . "'", 'jarvis')->fetch_object();
        if (is_object($datosOC)) {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($datosOC->nro_oc) . '"  and prodCODIGO="' . $datosOC->id_producto . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($datosOC->nro_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        } else {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        }
        $titulo = '';
        $ban = 0; //estado 1 ingreso, estado 2  salida

        $datosProveedor = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_prov where provID ='" . trim($result_rfq->codigoPROVEEDOR) . "'limit 1 ", 'jarvis')->fetch_object();
        $tit = '';
        if (is_object($datosProveedor)) {
            if ($datosProveedor->status != 'NACIONAL') {
                $tit = "N/P: IT" . $result_rfq->orderid;
            } else {
                $tit = "OC" . $result_rfq->orderid;
            }
        }
        $precio = 0;
        /* if (!empty($result_rfq->price)){
            $precio = $result_rfq->price;
        }*/
        $tipo_prod = $this->consultaBD("select tipo from cclabora_jarvis.sch_mrp_tbdata_em where prodID = '" . $productos . "' ", 'jarvis')->fetch_object();
        $result_prod = $this->consultaBD('select * from cclabora_fsql007.productos where prodID="' . $productos . '" ', 'jarvis')->fetch_object();
        $meses = $this->dimeMeses();
        $mes = (int)date('m');
        $tpdiID = '';
        $tipo = '';
        $proveedor = '';
        if ($estado == 1) { //materia prima
            $bodega = '14';
            $bodega_cuanrentena = '14';
            //$titulo ="Ingreso : ".$tit;
            $titulo = "Ingreso : ";
            $concepto_s = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $tpdiID = 'OCT';
            $tipo = 'E';
        } else if ($estado == 2) {
            $bodega = '14';
            $bodega_cuanrentena = '14';
            //$concepto_s = "Salida por Transferencia ".$tit . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $concepto_s = "Salida por Transferencia : " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;

            $tpdiID = 'SOT';
            $tipo = 'S';
        }
        $docinvNUMERO = 0;
        if (!empty($tpdiID)) {
            /*if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","' . $bodega_cuanrentena . '","' . $tpdiID . '")', 'jarvis')) {
                $docinvNUMERO = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
            }*/

            $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuanrentena . '" and tpdiID="' . $tpdiID . '"', 'jarvis');
            if ($sth_asi->num_rows > 0) {
                $result_asi = $sth_asi->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                $almsecID = $result_asi->almsecID;
                $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $almsecID . '"', 'jarvis');
            } else {
                if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuanrentena . '","' . $tpdiID . '")', 'jarvis')) {
                    $result_asi = $this->consultaBD('select almsecID,almseCNUMERO from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO;
                    $almsecID = $result_asi->almsecID;
                }
            }

        }
        if (is_object($result_asi)) {
            $userF = $this->auditoriaFiresoft($concepto_s . ' -S', '163', 'I', 42);
            if ($userF[0] == 0) {
                $userF[0] = 42;
            }
            if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                if ($userF[0] > 0) {
                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                }

                if (is_object($result_rfq)) {
                    $stocksID = 0;
                    $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega_cuanrentena . '"', 'jarvis');
                    if ($verificaStock->num_rows > 0) {
                        $result_stock = $verificaStock->fetch_object();
                        $stocksID = $result_stock->stocksID;
                        //$cantidadStock = $result_stock->stocksCANTIDAD+$datosOC->cant_r;
                        //$this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="'.$cantidadStock.'" where stocksID="'.$stocksID.'"','jarvis');
                    } else {
                        $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_cuanrentena . '","' . $productos . '","' . $result_rfq->cant . '","' . $precio . '")', 'jarvis');
                        $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                        $stocksID = $stocksID_r->stocksID;
                    }
                    if ($stocksID != 0) {
                        if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $result_rfq->cant . '","0","' . $tipo . '","' . $result_prod->presentacionID . '","' . $result_rfq->cant . '")', 'jarvis')) {
                            $ban = 1;
                            $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                        }
                    }

                }

            }
        }

        return $ban;

    }


    public function transitoFiresoftRFQOC($productos, $id_oc, $proveedor, $estado)
    {
        $datosOC = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where id_oc='" . trim($id_oc) . "'", 'jarvis')->fetch_object();
        if (is_object($datosOC)) {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($datosOC->nro_oc) . '"  and prodCODIGO="' . $datosOC->id_producto . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($datosOC->nro_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        } else {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        }

        $titulo = '';
        $ban = 0; //estado 1 ingreso, estado 2  salida
        if ($proveedor != "") {
            $datosProveedor = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_prov where provID = '" . trim($result_rfq->codigoPROVEEDOR) . "' limit 1 ", 'jarvis')->fetch_object();
            $tit = '';
            if (is_object($datosProveedor)) {
                if ($datosProveedor->status != 'NACIONAL') {
                    $tit = "N/P: IT" . substr($result_rfq->orderid, 0, -strlen($datosProveedor->provID));
                } else {
                    $tit = "OC" . substr($result_rfq->orderid, 0, -strlen($datosProveedor->provID));
                }
            }
        } else {
            $datosProveedor = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_prov where provID = '" . trim($result_rfq->codigoPROVEEDOR) . "' limit 1 ", 'jarvis')->fetch_object();
            $rfqid = substr($result_rfq->orderid, 0, -strlen($datosProveedor->provID));
            $tit = "RFQ/PO: " . $rfqid;
        }

        $precio = 0;
        /* if (!empty($result_rfq->price)){
             $precio = $result_rfq->price;
         }*/
        $proveedor = '';
        $tipo_prod = $this->consultaBD("select tipo from cclabora_jarvis.sch_mrp_tbdata_em where prodID = '" . $productos . "' ", 'jarvis')->fetch_object();
        $result_prod = $this->consultaBD('select * from cclabora_fsql007.productos where prodID="' . $productos . '" ', 'jarvis')->fetch_object();
        $meses = $this->dimeMeses();
        $mes = (int)date('m');
        $tpdiID = '';
        $tipo = '';
        if ($estado == 1) { //materia prima
            $bodega = '14';
            $bodega_cuanrentena = '14';
            $titulo = "Ingreso : " . $tit;
            $concepto_s = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $tpdiID = 'OCT';
            $tipo = 'E';
        } else if ($estado == 2) {
            $bodega = '14';
            $bodega_cuanrentena = '14';
            $concepto_s = "Salida por Transferencia " . $tit . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $tpdiID = 'SOT';
            $tipo = 'S';
        } else if ($estado == 3) {
            $bodega = '14';
            $bodega_cuanrentena = '14';
            $concepto_s = "Salida por Cierre OC/COT " . $tit . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $tpdiID = 'SOT';
            $tipo = 'S';
        }
        $docinvNUMERO = 0;
        if (!empty($tpdiID)) {
            /*if ($this->consultaBD('insert into fsql020.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","' . $bodega_cuanrentena . '","' . $tpdiID . '")', 'jarvis')) {
                $docinvNUMERO = $this->consultaBD('select almsecID from fsql020.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
            }*/
            $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuanrentena . '" and tpdiID="' . $tpdiID . '"', 'jarvis');
            if ($sth_asi->num_rows > 0) {
                $result_asi = $sth_asi->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                $almsecID = $result_asi->almsecID;
                $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $almsecID . '"', 'jarvis');
            } else {
                if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuanrentena . '","' . $tpdiID . '")', 'jarvis')) {
                    $result_asi = $this->consultaBD('select almsecID,almseCNUMERO from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO;
                    $almsecID = $result_asi->almsecID;
                }
            }

        }
        if (is_object($result_asi)) {
            if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V","42","' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                if (is_object($result_rfq)) {
                    $stocksID = 0;
                    $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega_cuanrentena . '"', 'jarvis');
                    if ($verificaStock->num_rows > 0) {
                        $result_stock = $verificaStock->fetch_object();
                        $stocksID = $result_stock->stocksID;
                        //$cantidadStock = $result_stock->stocksCANTIDAD+$datosOC->cant_r;
                        //$this->consultaBD('update fsql020.stocks set stocksCANTIDAD="'.$cantidadStock.'" where stocksID="'.$stocksID.'"','jarvis');
                    } else {
                        $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_cuanrentena . '","' . $productos . '","' . $result_rfq->cant . '","' . $precio . '")', 'jarvis');
                        $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                        $stocksID = $stocksID_r->stocksID;
                    }
                    if ($stocksID != 0) {
                        if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $result_rfq->cant . '","0","' . $tipo . '","' . $result_prod->presentacionID . '","' . $result_rfq->cant . '")', 'jarvis')) {
                            $ban = 1;
                            $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                        }
                    }

                }

            }
        }

        return $ban;

    }

    public function transitoFiresoftRFQOC_OLD($productos, $id_oc, $proveedor, $estado)
    {
        $datosOC = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where id_oc='" . trim($id_oc) . "'", 'jarvis')->fetch_object();
        if (is_object($datosOC)) {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($datosOC->nro_oc) . '"  and prodCODIGO="' . $datosOC->id_producto . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($datosOC->nro_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        } else {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        }

        $titulo = '';
        $ban = 0; //estado 1 ingreso, estado 2  salida
        $datosProveedor = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_prov where provID = '" . trim($result_rfq->codigoPROVEEDOR) . "' limit 1 ", 'jarvis')->fetch_object();
        $tit = '';
        if (is_object($datosProveedor)) {
            if ($datosProveedor->status != 'NACIONAL') {
                $tit = "N/P: IT" . $result_rfq->orderid;
            } else {
                $tit = "OC" . $result_rfq->orderid;
            }
        }
        $precio = 0;
        /* if (!empty($result_rfq->price)){
             $precio = $result_rfq->price;
         }*/
        $tipo_prod = $this->consultaBD("select tipo from cclabora_jarvis.sch_mrp_tbdata_em where prodID = '" . $productos . "' ", 'jarvis')->fetch_object();
        $result_prod = $this->consultaBD('select * from cclabora_fsql007.productos where prodID="' . $productos . '" ', 'jarvis')->fetch_object();
        $meses = $this->dimeMeses();
        $mes = (int)date('m');
        $tpdiID = '';
        $tipo = '';
        if ($estado == 1) { //materia prima
            $bodega = '14';
            $bodega_cuanrentena = '14';
            $titulo = "Ingreso : " . $tit;
            $concepto_s = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $tpdiID = 'OCT';
            $tipo = 'E';
        } else if ($estado == 2) {
            $bodega = '14';
            $bodega_cuanrentena = '14';
            $concepto_s = "Salida por Transferencia " . $tit . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $tpdiID = 'SOT';
            $tipo = 'S';
        } else if ($estado == 3) {
            $bodega = '14';
            $bodega_cuanrentena = '14';
            $concepto_s = "Salida por Cierre OC/COT " . $tit . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $tpdiID = 'SOT';
            $tipo = 'S';
        }
        $docinvNUMERO = 0;
        if (!empty($tpdiID)) {
            /*if ($this->consultaBD('insert into fsql020.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","' . $bodega_cuanrentena . '","' . $tpdiID . '")', 'jarvis')) {
                $docinvNUMERO = $this->consultaBD('select almsecID from fsql020.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
            }*/

            $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuanrentena . '" and tpdiID="' . $tpdiID . '"', 'jarvis');
            if ($sth_asi->num_rows > 0) {
                $result_asi = $sth_asi->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                $almsecID = $result_asi->almsecID;
                $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $almsecID . '"', 'jarvis');
            } else {
                if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuanrentena . '","' . $tpdiID . '")', 'jarvis')) {
                    $result_asi = $this->consultaBD('select almsecID,almseCNUMERO from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO;
                    $almsecID = $result_asi->almsecID;
                }
            }

        }
        if (is_object($result_asi)) {
            $userF = $this->auditoriaFiresoft($concepto_s . ' -S', '163', 'I', 42);
            if ($userF[0] == 0) {
                $userF[0] = 42;
            }
            if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                if ($userF[0] > 0) {
                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                }

                if (is_object($result_rfq)) {
                    $stocksID = 0;
                    $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega_cuanrentena . '"', 'jarvis');
                    if ($verificaStock->num_rows > 0) {
                        $result_stock = $verificaStock->fetch_object();
                        $stocksID = $result_stock->stocksID;
                        //$cantidadStock = $result_stock->stocksCANTIDAD+$datosOC->cant_r;
                        //$this->consultaBD('update fsql020.stocks set stocksCANTIDAD="'.$cantidadStock.'" where stocksID="'.$stocksID.'"','jarvis');
                    } else {
                        $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_cuanrentena . '","' . $productos . '","' . $result_rfq->cant . '","' . $precio . '")', 'jarvis');
                        $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                        $stocksID = $stocksID_r->stocksID;
                    }
                    if ($stocksID != 0) {
                        if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $result_rfq->cant . '","0","' . $tipo . '","' . $result_prod->presentacionID . '","' . $result_rfq->cant . '")', 'jarvis')) {
                            $ban = 1;
                            $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                        }
                    }

                }

            }
        }

        return $ban;

    }

    public function verificaLogin($id)
    {
        $us = $this->datosEmpleado($id);
        if ($us[1] == 0) {
            header('Location: http://servercc1/Jarvis/web/app.php');
        }
    }

    public function transferenciasFiresoft($productos, $id_oc, $proveedor, $estado)
    {
        $datosOC = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where id_oc='" . trim($id_oc) . "'", 'jarvis')->fetch_object();

        $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($datosOC->nro_oc) . '"  and prodCODIGO="' . $datosOC->id_producto . '" limit 1', 'jarvis')->fetch_object();
        $titulo = '';
        $ban = 0;
        $tpdiID_I = 'XIA';
        $tpdiID_S = 'XSA';

        if (is_object($result_rfq)) {
            $valor = explode("-", $result_rfq->ticket);
            if ($valor[0] == 'COT') {
                $tit = "N/P: IT" . $datosOC->nro_oc;
            } else if ($valor[0] == 'OC') {
                $tit = "OC" . $datosOC->nro_oc;
            }
        }

        $costo = $datosOC->costo_u * $datosOC->cant_r;
        $tipo_prod = $this->consultaBD("select tipo from cclabora_jarvis.sch_mrp_tbdata_em where prodID = '" . $productos . "' ", 'jarvis')->fetch_object();
        $result_prod = $this->consultaBD('select * from cclabora_fsql007.productos where prodID="' . $productos . '" ', 'jarvis')->fetch_object();
        if ($tipo_prod->tipo == 'MP' && trim($estado) == 'A P R O B A D O') { //materia prima
            $bodega = '3';
            $bodega_cuanrentena = '1';
            $titulo = "MP Aprobado: " . $tit;
        } else if ($tipo_prod->tipo == 'ME' && trim($estado) == 'A P R O B A D O') {
            $bodega = '4';
            $codigo = $productos->prodCODIGO;
            $bodega_cuanrentena = '2';
            $titulo = "ME Aprobado: " . $tit;
        } else if (trim($estado) == 'R E C H A Z A D O') {
            $bodega = '11';
            $titulo = "Rechazado: " . $tit;
        }
        $codigos = $result_prod->prodCODIGO;
        if ($codigos[0] == '5') {
            $bodega = 19;
        }
        if ($codigos[0] == '6') {
            $bodega = 19;
        }


        $docinvNUMERO = 0;


        $meses = $this->dimeMeses();
        $mes = (int)date('m');
        $concepto_s = "Salida por Transferencia " . $tit . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
        $concepto_e = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
        $salida = 0;
        /*if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","'.$bodega_cuanrentena.'","'.$tpdiID_S.'")','jarvis')){
                $docinvNUMERO = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ','jarvis')->fetch_object();
            }*/

        $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuanrentena . '" and tpdiID="' . $tpdiID_S . '"', 'jarvis');
        if ($sth_asi->num_rows > 0) {
            $result_asi = $sth_asi->fetch_object();
            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
            $almsecID = $result_asi->almsecID;
            $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', 'jarvis');
        } else {
            if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuanrentena . '","' . $tpdiID_S . '")', 'jarvis')) {
                $result_asi = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO;
                $almsecID = $result_asi->almsecID;
            }
        }


        if ($docinvNUMERO > 0) {
            $userF = $this->auditoriaFiresoft($concepto_s . ' -S', '163', 'I', 42);
            if ($userF[0] == 0) {
                $userF[0] = 42;
            }

            if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_S . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                if ($userF[0] > 0) {
                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                }

                $datos_oc = $this->consultaBD('select * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where  nro_oc ="' . trim($id_oc) . '" and estado_oc>"2" and id_producto="' . $result_prod->prodCODIGO . '" ', 'jarvis')->fetch_object();
                if (is_object($datos_oc)) {
                    $stocksID = 0;
                    $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega_cuanrentena . '"', 'jarvis');
                    if ($verificaStock->num_rows > 0) {
                        $result_stock = $verificaStock->fetch_object();
                        $stocksID = $result_stock->stocksID;
                        //$cantidadStock = $result_stock->stocksCANTIDAD+$datosOC->cant_r;
                        //  $this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="'.$cantidadStock.'" where stocksID="'.$stocksID.'"','jarvis');
                    } else {
                        $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_cuanrentena . '","' . $productos . '","' . $datos_oc->cant_r . '","' . $datos_oc->costo_u . '")', 'jarvis');
                        $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                        $stocksID = $stocksID_r->stocksID;
                    }
                    if ($stocksID != 0) {
                        if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $datos_oc->cant_r . '","' . $costo . '","S","' . $result_prod->presentacionID . '","' . $datos_oc->cant_r . '")', 'jarvis')) {
                            $salida = 1;
                            $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                        }
                    }

                }

            }
        }
        if ($salida == 1) {

            /*if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","'.$bodega.'","'.$tpdiID_I.'")','jarvis')){
                    $docinvNUMERO = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ','jarvis')->fetch_object();
                }*/

            $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega . '" and tpdiID="' . $tpdiID_I . '"', 'jarvis');
            if ($sth_asi->num_rows > 0) {
                $result_asi = $sth_asi->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                $almsecID = $result_asi->almsecID;
                $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', 'jarvis');
            } else {
                if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega . '","' . $tpdiID_I . '")', 'jarvis')) {
                    $result_asi = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                    $almsecID = $result_asi->almsecID;
                }
            }

            if ($docinvNUMERO > 0) {
                $userF = $this->auditoriaFiresoft($concepto_e . ' -S', '163', 'I', 42);
                if ($userF[0] == 0) {
                    $userF[0] = 42;
                }
                if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_I . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega . '","' . $concepto_e . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                    $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    if ($userF[0] > 0) {
                        $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                    }
                    $datos_oc = $this->consultaBD('select * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where  nro_oc ="' . trim($id_oc) . '" and estado_oc>"2" and id_producto="' . $result_prod->prodCODIGO . '" ', 'jarvis')->fetch_object();
                    if (is_object($datos_oc)) {
                        $stocksID = 0;
                        $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega . '"', 'jarvis');
                        if ($verificaStock->num_rows > 0) {
                            $result_stock = $verificaStock->fetch_object();
                            $stocksID = $result_stock->stocksID;
                            //$cantidadStock = $result_stock->stocksCANTIDAD+$datosOC->cant_r;
                            //$this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="'.$cantidadStock.'" where stocksID="'.$stocksID.'"','jarvis');
                        } else {
                            $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega . '","' . $productos . '","' . $datos_oc->cant_r . '","' . $datos_oc->costo_u . '")', 'jarvis');
                            $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                            $stocksID = $stocksID_r->stocksID;
                        }
                        if ($stocksID != 0) {
                            if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $datos_oc->cant_r . '","' . $costo . '","E","' . $result_prod->presentacionID . '","' . $datos_oc->cant_r . '")', 'jarvis')) {
                                $ban = 1;
                                $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                            }
                        }

                    }


                }
            }

        }
        return $ban;

    }


    public function dimeCategoriaProd($codigo)
    {
        $categoria = $this->consultaBD("select * from cclabora_jarvis.sch_mrp_tbdata_categoria_producto where codigo_producto='" . trim($codigo) . "' and estatus_categoria='1'  limit 1", 'jarvis')->fetch_object();
        $tipo = "S/A";
        if (is_object($categoria)) {
            $tipo = $categoria->categoria;
        }
        return $tipo;
    }


    public function lotesNegativos()
    {
        $sth_lotes = $this->consultaBD("SELECT * FROM cclabora_jarvis.saldo_lotes_fs where estado ='0' ", "jarvis");
        if ($sth_lotes->num_rows > 0) {
            while ($result_lotes = $sth_lotes->fetch_object()) {
                $sth = $this->consultaBD("SELECT lt.*,ml.krdID,kr.*,ml.movltID FROM cclabora_fsql007.lotes lt join cclabora_fsql007.movimientoslotes ml on ml.ltID=lt.ltID join cclabora_fsql007.kardex kr on kr.krdID=ml.krdID where lt.ltLOTE='" . $result_lotes->lote . "' and kr.krdTIPO='S' and lt.ltCADUCIDAD='" . $result_lotes->caducidad . "' limit 1   ", "jarvis");
                $resultado = "No se Cambio el " . $result_lotes->lote . " de Fecha : " . $result_lotes->caducidad . "<br><br>";
                if ($sth->num_rows > 0) {
                    $result = $sth->fetch_object();
                    if (!empty($result->movltID)) {
                        $this->consultaBD("update cclabora_fsql007.movimientoslotes set movltCANTIDAD='0' where movltID='" . trim($result->movltID) . "'  ", 'jarvis');
                        $this->consultaBD("update cclabora_jarvis.saldo_lotes_fs set estado='1' where id_saldo='" . trim($result_lotes->id_saldo) . "'  ", 'jarvis');
                        $resultado = "Cambiado el " . $result->movltID . "<br><br>";
                    }
                }
                echo $resultado;
            }

        }
    }

    public function lotesPositivos()
    {
        $sth_lotes = $this->consultaBD("SELECT * FROM cclabora_jarvis.saldo_lotes_fs where estado ='3' ", "jarvis");
        if ($sth_lotes->num_rows > 0) {
            while ($result_lotes = $sth_lotes->fetch_object()) {
                $sth = $this->consultaBD("SELECT lt.*,ml.krdID,kr.*,ml.movltID FROM cclabora_fsql007.lotes lt join cclabora_fsql007.movimientoslotes ml on ml.ltID=lt.ltID join cclabora_fsql007.kardex kr on kr.krdID=ml.krdID where lt.ltLOTE='" . $result_lotes->lote . "' and kr.krdTIPO='E' and lt.ltCADUCIDAD='" . $result_lotes->caducidad . "' limit 1   ", "jarvis");
                $resultado = "No se Cambio el " . $result_lotes->lote . " de Fecha : " . $result_lotes->caducidad . "<br><br>";
                if ($sth->num_rows > 0) {
                    $result = $sth->fetch_object();
                    if (!empty($result->movltID)) {
                        $this->consultaBD("update cclabora_fsql007.movimientoslotes set movltCANTIDAD='0' where movltID='" . trim($result->movltID) . "'  ", 'jarvis');
                        $this->consultaBD("update cclabora_jarvis.saldo_lotes_fs set estado='2' where id_saldo='" . trim($result_lotes->id_saldo) . "'  ", 'jarvis');
                        $resultado = "Cambiado el " . $result->movltID . "<br><br>";
                    }
                }
                echo $resultado;
            }

        }
    }

    public function transferenciasFiresoft2($productos, $id_oc, $proveedor)
    {
        $datosOrdenC = $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where id_oc="' . $id_oc . '" limit 1', 'jarvis')->fetch_object();
        // $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="'.$datosOrdenC->nro_oc.'" and prodCODIGO="'.$datosOrdenC->id_producto.'" limit 1','jarvis')->fetch_object();
        $result_rfq = '';
        $datosOC = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where id_oc='" . trim($id_oc) . "'", 'jarvis')->fetch_object();
        if (is_object($datosOC)) {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($datosOC->nro_oc) . '"  and prodCODIGO="' . $datosOC->id_producto . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($datosOC->nro_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        } else {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        }


        $titulo = '';
        $ban = 0;
        $tpdiID_I = 'XIA';
        $tpdiID_S = 'XSA';
        $salidaR = 0;
        $salidaA = 0;
        $nro_oc = '';
        if (is_object($result_rfq)) {
            if (!empty($result_rfq->ticket)) {
                $valor = explode("-", $result_rfq->ticket);
                if ($valor[0] == 'COT') {
                    $tit = "N/P: IT" . $datosOrdenC->nro_oc;
                } else if ($valor[0] == 'OC') {
                    $tit = "OC" . $datosOrdenC->nro_oc;
                }
                $nro_oc = $datosOrdenC->nro_oc;
            } else {
                $tit = "OC" . $result_rfq->orderid;
                $nro_oc = $result_rfq->orderid;
            }
        }


        $tipo_prod = $this->consultaBD("select tipo from cclabora_jarvis.sch_mrp_tbdata_em where prodID = '" . $productos . "' ", 'jarvis')->fetch_object();
        $result_prod = $this->consultaBD('select * from cclabora_fsql007.productos where prodID="' . $productos . '" ', 'jarvis')->fetch_object();
        if ($tipo_prod->tipo == 'MP') { //materia prima
            $bodega_cuanrentena = '1';
        } else if ($tipo_prod->tipo == 'ME') {
            $bodega_cuanrentena = '2';
        }


        $docinvNUMERO = 0;


        $meses = $this->dimeMeses();
        $mes = (int)date('m');
        $concepto_s = "Salida por Transferencia " . $tit . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
        $concepto_e = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
        $salida = 0;
        /*if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","'.$bodega_cuanrentena.'","'.$tpdiID_S.'")','jarvis')){
            $docinvNUMERO = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ','jarvis')->fetch_object();
        }*/


        $oc = $this->consultaBD('select lc.*,oc.costo_u,oc.cant_r FROM cclabora_jarvis.sch_mrp_tbdata_lotes_oc lc join cclabora_jarvis.sch_mrp_tbdata_ordenes_compra oc on  oc.id_oc=lc.id_oc where  lc.id_oc ="' . trim($id_oc) . '" and lc.estado_reg_lotes>"2" and lc.codigo_pro_lote="' . trim($result_prod->prodCODIGO) . '" ', 'jarvis');
        if ($oc->num_rows > 0) {
            $aprobado = 0;
            $rechazado = 0;
            $costo_u = 0;
            $loteName = "";
            $caducidadLote = "";
            while ($datos_oc = $oc->fetch_object()) {
                if ($datos_oc->estado_reg_lotes == 3) {
                    $aprobado = ($datos_oc->peso_lotes - $datos_oc->peso_t_lotes) + $aprobado;
                    $loteNameA = $datos_oc->analisis_oc;
                } else if ($datos_oc->estado_reg_lotes == 25) {
                    $aprobado = ($datos_oc->peso_lotes - $datos_oc->peso_t_lotes) + $aprobado;
                    $loteNameA = $datos_oc->analisis_oc;
                } else {
                    $rechazado = ($datos_oc->peso_lotes - $datos_oc->peso_t_lotes) + $rechazado;
                    $loteNameR = $datos_oc->analisis_oc;
                }

                $caducidadLote = $datos_oc->caducidad_lotes;
                $costo_u = $datos_oc->costo_u;
                $costo = $datos_oc->costo_u * $datos_oc->cant_r;
            }
            $costo = 0;

            //if ($docinvNUMERO>0) {
            //if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_S . '","' . $almsecID . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V","42","' . date("Y-m-d H:i:s") . '","4","0","0")', 'jarvis')) {
            // $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();

            //$stocksID = 0;
            //echo "Aprobado ".$aprobado."<br>";
            //echo "Rechazado ".$rechazado."<br>";


            if ($aprobado > 0) {
                if ($tipo_prod->tipo == 'MP') { //materia prima
                    $bodega = '3';
                } else if ($tipo_prod->tipo == 'ME') {
                    $bodega = '4';
                }
                $codigo = $result_prod->prodCODIGO;

                if ($codigo[0] == '5') {
                    $bodega = 19; //MAQUILA
                }
                if ($codigo[0] == '6') {
                    $bodega = 19; //MAQUILA
                }

                if (!empty($nro_oc)) {
                    if ($nro_oc[0] == 4) {
                        $bodega = 12; //IyD
                    }
                }


                $bodegaA = $bodega;
                $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuanrentena . '" and tpdiID="' . $tpdiID_S . '" limit 1', 'jarvis');
                if ($sth_asi->num_rows > 0) {
                    $result_asi = $sth_asi->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                    $almsecID = $result_asi->almsecID;
                    $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', 'jarvis');
                } else {
                    if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuanrentena . '","' . $tpdiID_S . '")', 'jarvis')) {
                        $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                        $docinvNUMERO = $result_asi->almseCNUMERO;
                        $almsecID = $result_asi->almsecID;
                    }
                }
                if ($docinvNUMERO > 0) {
                    $titulo = "Aprobado: " . $tit;
                    $concepto_e = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
                    $userF = $this->auditoriaFiresoft($concepto_e . ' -S', '163', 'I', 48);
                    if ($userF[0] == 0) {
                        $userF[0] = 48;
                    }
                    if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_S . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                        $docinvID = $this->consultaBD('select * from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                        if ($userF[0] > 0) {
                            $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                        }
                        $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega_cuanrentena . '"', 'jarvis');
                        if ($verificaStock->num_rows > 0) {
                            $result_stock = $verificaStock->fetch_object();
                            $stocksID = $result_stock->stocksID;
                            //$cantidadStock = $result_stock->stocksCANTIDAD+$aprobado;
                            // $this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="' . $cantidadStock . '" where stocksID="' . $stocksID . '"', 'jarvis');
                        } else {
                            $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega . '","' . $productos . '","' . $aprobado . '","' . $costo . '")', 'jarvis');
                            $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                            $stocksID = $stocksID_r->stocksID;
                        }
                        if ($stocksID != 0) {
                            //$costo = ;
                            if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $aprobado . '","' . $costo . '","S","' . $result_prod->presentacionID . '","' . $aprobado . '")', 'jarvis')) {
                                $datosKardex = $this->consultaBD("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                                if (is_object($datosKardex)) {
                                    $this->consultaBD("insert into cclabora_fsql007.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($loteNameA) . "','" . trim($caducidadLote) . "') ", 'jarvis');
                                    $datosLote = $this->consultaBD("select * from cclabora_fsql007.lotes order by ltID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                    if (is_object($datosLote)) {
                                        $this->consultaBD('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","0") ', 'jarvis');
                                        $salidaA = 1;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if ($rechazado > 0) {

                $bodega = '37';
                $bodegaR = $bodega;
                $titulo = "Rechazado: " . $tit;
                $concepto_e = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
                $userF = $this->auditoriaFiresoft($concepto_e . ' -S', '163', 'I', 48);
                if ($userF[0] == 0) {
                    $userF[0] = 48;
                }


                $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuanrentena . '" and tpdiID="' . $tpdiID_S . '" limit 1', 'jarvis');
                if ($sth_asi->num_rows > 0) {
                    $result_asi = $sth_asi->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                    $almsecID = $result_asi->almsecID;
                    $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', 'jarvis');
                } else {
                    if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuanrentena . '","' . $tpdiID_S . '")', 'jarvis')) {
                        $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                        $docinvNUMERO = $result_asi->almseCNUMERO;
                        $almsecID = $result_asi->almsecID;
                    }
                }
                if ($docinvNUMERO > 0) {
                    $titulo = "Rechazado: " . $tit;
                    $concepto_e = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
                    if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_S . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuanrentena . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                        $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                        if ($userF[0] > 0) {
                            $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                        }
                        $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega_cuanrentena . '"', 'jarvis');
                        if ($verificaStock->num_rows > 0) {
                            $result_stock = $verificaStock->fetch_object();
                            $stocksID = $result_stock->stocksID;
                            //$cantidadStock = $result_stock->stocksCANTIDAD+$rechazado;
                            //$this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="' . $cantidadStock . '" where stocksID="' . $stocksID . '"', 'jarvis');
                        } else {
                            $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega . '","' . $productos . '","' . $rechazado . '","' . $costo . '")', 'jarvis');
                            $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                            $stocksID = $stocksID_r->stocksID;
                        }
                        if ($stocksID != 0) {
                            if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $rechazado . '","' . $costo . '","S","' . $result_prod->presentacionID . '","' . $rechazado . '")', 'jarvis')) {
                                $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                                $datosKardex = $this->consultaBD("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                if (is_object($datosKardex)) {
                                    $this->consultaBD("insert into cclabora_fsql007.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($loteNameR) . "','" . trim($caducidadLote) . "') ", 'jarvis');
                                    $datosLote = $this->consultaBD("select * from cclabora_fsql007.lotes order by ltID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                    if (is_object($datosLote)) {
                                        $this->consultaBD('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","0") ', 'jarvis');
                                        $salidaR = 1;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            //}

            // }
        }
        if ($salidaA == 1) {

            /*if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","'.$bodega.'","'.$tpdiID_I.'")','jarvis')){
                $docinvNUMERO = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ','jarvis')->fetch_object();
            }*/

            $userF = $this->auditoriaFiresoft($concepto_e . ' -S', '163', 'I', 48);
            if ($userF[0] == 0) {
                $userF[0] = 48;
            }

            $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodegaA . '" and tpdiID="' . $tpdiID_I . '" limit 1', 'jarvis');
            if ($sth_asi->num_rows > 0) {
                $result_asi = $sth_asi->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                $almsecID = $result_asi->almsecID;
                $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', 'jarvis');
            } else {
                if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodegaA . '","' . $tpdiID_I . '")', 'jarvis')) {
                    $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO;
                    $almsecID = $result_asi->almsecID;
                }
            }

            if ($docinvNUMERO > 0) {
                if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_I . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodegaA . '","' . $concepto_e . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                    $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    if ($userF[0] > 0) {
                        $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                    }

                    $datos_oc = $this->consultaBD('select * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where  id_oc ="' . $id_oc . '"  ', 'jarvis')->fetch_object();
                    if (is_object($datos_oc)) {
                        $stocksID = 0;
                        $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodegaA . '"', 'jarvis');
                        if ($verificaStock->num_rows > 0) {
                            $result_stock = $verificaStock->fetch_object();
                            $stocksID = $result_stock->stocksID;
                            //$cantidadStock = $result_stock->stocksCANTIDAD+$aprobado;
                            //$this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="'.$cantidadStock.'" where stocksID="'.$stocksID.'"','jarvis');
                        } else {
                            $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodegaA . '","' . $productos . '","' . $aprobado . '","' . $costo . '")', 'jarvis');
                            $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                            $stocksID = $stocksID_r->stocksID;
                        }
                        if ($stocksID != 0) {
                            if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $aprobado . '","' . $costo . '","E","' . $result_prod->presentacionID . '","' . $aprobado . '")', 'jarvis')) {
                                $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                                $datosKardex = $this->consultaBD("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                if (is_object($datosKardex)) {
                                    $this->consultaBD("insert into cclabora_fsql007.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($loteNameA) . "','" . trim($caducidadLote) . "') ", 'jarvis');
                                    $datosLote = $this->consultaBD("select * from cclabora_fsql007.lotes order by ltID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                    if (is_object($datosLote)) {
                                        $this->consultaBD('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . trim($aprobado) . '") ', 'jarvis');
                                        $ban = 1;
                                    }
                                }


                                //lote
                            }
                        }

                    }


                }
            }

        }
        if ($salidaR == 1) {

            /*if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("0","'.$bodega.'","'.$tpdiID_I.'")','jarvis')){
                $docinvNUMERO = $this->consultaBD('select almsecID from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ','jarvis')->fetch_object();
            }*/
            $userF = $this->auditoriaFiresoft($concepto_e . ' -S', '163', 'I', 48);
            if ($userF[0] == 0) {
                $userF[0] = 48;
            }

            $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodegaR . '" and tpdiID="' . $tpdiID_I . '" limit 1', 'jarvis');
            if ($sth_asi->num_rows > 0) {
                $result_asi = $sth_asi->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                $almsecID = $result_asi->almsecID;
                $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', 'jarvis');
            } else {
                if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodegaR . '","' . $tpdiID_I . '")', 'jarvis')) {
                    $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO;
                    $almsecID = $result_asi->almsecID;
                }
            }

            if ($docinvNUMERO > 0) {
                if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_I . '","' . $almsecID . '","' . date("Y-m-d") . '","' . $bodegaR . '","' . $concepto_e . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                    $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                    if ($userF[0] > 0) {
                        $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                    }

                    $datos_oc = $this->consultaBD('select * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where  id_oc ="' . $id_oc . '"  ', 'jarvis')->fetch_object();
                    if (is_object($datos_oc)) {
                        $stocksID = 0;
                        $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodegaR . '"', 'jarvis');
                        if ($verificaStock->num_rows > 0) {
                            $result_stock = $verificaStock->fetch_object();
                            $stocksID = $result_stock->stocksID;
                            // $cantidadStock = $result_stock->stocksCANTIDAD+$rechazado;
                            //$this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="'.$cantidadStock.'" where stocksID="'.$stocksID.'"','jarvis');
                        } else {
                            $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodegaR . '","' . $productos . '","' . $rechazado . '","' . $costo . '")', 'jarvis');
                            $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                            $stocksID = $stocksID_r->stocksID;
                        }
                        if ($stocksID != 0) {
                            if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $rechazado . '","' . $costo . '","E","' . $result_prod->presentacionID . '","' . $rechazado . '")', 'jarvis')) {
                                $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                                $datosKardex = $this->consultaBD("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                if (is_object($datosKardex)) {
                                    $this->consultaBD("insert into cclabora_fsql007.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($loteNameR) . "','" . trim($caducidadLote) . "') ", 'jarvis');
                                    $datosLote = $this->consultaBD("select * from cclabora_fsql007.lotes order by ltID DESC LIMIT 1 ", 'jarvis')->fetch_object();
                                    if (is_object($datosLote)) {
                                        $this->consultaBD('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . trim($rechazado) . '") ', 'jarvis');
                                        $ban = 1;
                                    }
                                }
                                //lote
                            }
                        }

                    }


                }
            }

        }
        return $ban;

    }


    public function agregaOCFiresoft($productos, $id_oc, $proveedor)
    {
        $datosOC = $this->consultaBD("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where id_oc='" . trim($id_oc) . "'", 'jarvis')->fetch_object();
        //$costo = $datosOC->costo_u*$datosOC->cant_r;$result_rfq='';
        $costo = 0;
        if (is_object($datosOC)) {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($datosOC->nro_oc) . '"  and prodCODIGO="' . $datosOC->id_producto . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($datosOC->nro_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        } else {
            $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfq where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            if (!is_object($result_rfq)) {
                $result_rfq = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_rfqoc where orderid="' . trim($id_oc) . '" limit 1', 'jarvis')->fetch_object();
            }
        }
        $titulo = '';
        $ban = 0;
        if (is_object($result_rfq)) {
            if (!empty($result_rfq->ticket)) {
                $valor = explode("-", $result_rfq->ticket);
                if ($valor[0] == 'COT') {
                    $titulo = "N/P: IT" . $datosOC->nro_oc;
                } else if ($valor[0] == 'OC') {
                    $titulo = "OC" . $datosOC->nro_oc;
                }
            } else {
                $titulo = "OC" . $result_rfq->orderid;
            }
        }


        $tipo_prod = $this->consultaBD("select tipo from cclabora_jarvis.sch_mrp_tbdata_em where prodID = '" . $productos . "' ", 'jarvis')->fetch_object();
        $result_prod = $this->consultaBD('select * from cclabora_fsql007.productos where prodID="' . $productos . '" ', 'jarvis')->fetch_object();
        if ($tipo_prod->tipo == 'MP') { //materia prima
            $bodega_cuarentena = '1';
        } else if ($tipo_prod->tipo == 'ME') {
            $bodega_cuarentena = '2';
        }
        $docinvNUMERO = 0;
        $sth_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuarentena . '" and tpdiID="IIS" limit 1', 'jarvis');
        if ($sth_asi->num_rows > 0) {
            $result_asi = $sth_asi->fetch_object();
            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
            $almsecID = $result_asi->almsecID;
            $this->consultaBD('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', 'jarvis');
        } else {
            if ($this->consultaBD('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuarentena . '","IIS")', 'jarvis')) {
                $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                $docinvNUMERO = $result_asi->almseCNUMERO;
                $almsecID = $result_asi->almsecID;
            }
        }

        if ($docinvNUMERO != 0) {
            $meses = $this->dimeMeses();
            $mes = (int)date('m');
            $concepto = $titulo . ", " . strtoupper($meses[$mes]) . ", " . $proveedor . ", " . $result_prod->prodDESCRIPCION;
            $userF = $this->auditoriaFiresoft($concepto . ' -S', '186', 'I', 78);
            if ($userF[0] == 0) {
                $userF[0] = 78;
            }
            if ($this->consultaBD('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("IIS","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuarentena . '","' . $concepto . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', 'jarvis')) {
                $docinvID = $this->consultaBD('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', 'jarvis')->fetch_object();
                if ($userF[0] > 0) {
                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                }

                $datos_oc = $this->consultaBD('select * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra where  id_oc ="' . $id_oc . '"  ', 'jarvis')->fetch_object();
                if (is_object($datos_oc)) {
                    $stocksID = 0;
                    $verificaStock = $this->consultaBD('select * from cclabora_fsql007.stocks where prodID="' . $productos . '" and almacenID="' . $bodega_cuarentena . '"', 'jarvis');
                    if ($verificaStock->num_rows > 0) {
                        $result_stock = $verificaStock->fetch_object();
                        $stocksID = $result_stock->stocksID;
                        $cantidadStock = $result_stock->stocksCANTIDAD + $datos_oc->cant_r;
                        //$this->consultaBD('update cclabora_fsql007.stocks set stocksCANTIDAD="'.$datos_oc->cant_r.'" where stocksID="'.$stocksID.'"','jarvis');
                    } else {
                        $this->consultaBD('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_cuarentena . '","' . $productos . '","' . $datos_oc->cant_r . '","' . $datos_oc->costo_u . '")', 'jarvis');
                        $stocksID_r = $this->consultaBD('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', 'jarvis')->fetch_object();
                        $stocksID = $stocksID_r->stocksID;
                    }
                    if ($stocksID != 0) {
                        if ($this->consultaBD('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $datos_oc->cant_r . '","' . $costo . '","E","' . $result_prod->presentacionID . '","' . $datos_oc->cant_r . '")', 'jarvis')) {
                            $ban = 1;
                            $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                        }
                    }

                }


            }
        }
        return $ban;

    }

    public function ingresoPAFiresoft($id_liqop)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosPA = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_liquidacion_op op join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on op.id_liqop=bop.id_liqop where op.id_liqop='" . trim($id_liqop) . "' limit 1", $jarvisConex)->fetch_object();
        $ban = 0;
        $costo = 0; //$userF=89;
        if (is_object($datosPA)) {
            if ($datosPA->ingreso_contable == 0) {
                $titulos = 'Ingreso L: ' . $datosPA->lote_op . " OP#: " . $datosPA->nro_op;
                $userF = $this->auditoriaFiresoft($titulos . ' -S', '41', 'I', 89);
                if ($userF[0] == 0) {
                    $userF[0] = 89;
                }
                $producto = $this->dimeProductoByCodigo($datosPA->id_producto);
                $docinvNUMERO = 0;
                $bodega_cuarentena = 7;
                $sth_asi = $this->consultaBD1('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_cuarentena . '" and tpdiID="IIS" limit 1', $jarvisConex);
                if ($sth_asi->num_rows > 0) {
                    $result_asi = $sth_asi->fetch_object();
                    $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                    $almsecID = $result_asi->almsecID;
                    $this->consultaBD1('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', $jarvisConex);
                } else {
                    $insertAM = $this->consultaBD1('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodega_cuarentena . '","IIS")', $jarvisConex);
                    if ($insertAM == 1) {
                        $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                        $docinvNUMERO = $result_asi->almseCNUMERO;
                        $almsecID = $result_asi->almsecID;
                    }
                }
                if ($docinvNUMERO != 0) {
                    $meses = $this->dimeMeses();
                    $mes = (int)date('m');
                    $concepto = $titulos;
                    $isenrtAM = $this->consultaBD1('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("IIS","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodega_cuarentena . '","' . $concepto . '","V","' . trim($userF[0]) . '","' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex);
                    if ($isenrtAM == 1) {
                        $docinvID = $this->consultaBD1('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                        $stocksID = 0;
                        $verificaStock = $this->consultaBD1('select * from cclabora_fsql007.stocks where prodID="' . $producto->prodID . '" and almacenID="' . $bodega_cuarentena . '"', $jarvisConex);
                        if ($userF[0] > 0) {
                            $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                        }

                        if ($verificaStock->num_rows > 0) {
                            $result_stock = $verificaStock->fetch_object();
                            $stocksID = $result_stock->stocksID;
                        } else {
                            $this->consultaBD1('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_cuarentena . '","' . $producto->prodID . '","' . $datosPA->q_producida . '","' . $costo . '")', $jarvisConex);
                            $stocksID_r = $this->consultaBD1('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                            $stocksID = $stocksID_r->stocksID;
                        }
                        if ($stocksID != 0) {
                            $insertKrd = $this->consultaBD1('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $datosPA->q_producida . '","' . $costo . '","E","' . $producto->presentacionID . '","' . $datosPA->q_producida . '")', $jarvisConex);
                            if ($insertKrd == 1) {
                                $ban = 1;
                                $datosKardex = $this->consultaBD1("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                if (is_object($datosKardex)) {
                                    $ban = 1;
                                    $this->consultaBD1("insert into cclabora_fsql007.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($datosPA->lote_op) . "','" . trim($datosPA->fecha_caducidad_op) . "') ", $jarvisConex);
                                    $datosLote = $this->consultaBD1("select * from cclabora_fsql007.lotes order by ltID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                    if (is_object($datosLote)) {
                                        $this->consultaBD1('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . trim($datosPA->q_producida) . '") ', $jarvisConex);

                                    }
                                }
                                $this->consultaBD1('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', $jarvisConex);
                            }
                        }

                    }
                }
            }

        }
        if ($ban == 1) {
            $this->consultaBD1("update cclabora_jarvis.sch_prod_tbdata_liquidacion_op set ingreso_contable='1' where id_liqop='" . trim($id_liqop) . "' ", $jarvisConex);
        }

        $jarvisConex->close();
        return $ban;
    }

    public function dimeVentaProd($mes, $year, $prodID)
    {
        $sth = $this->consultaBD('SELECT f.fvtaID,f.fvtaSECUENCIA,d.prodID,i.ipfCANTIDAD,f.fvtaEMISION,d.depcPVP FROM cclabora_fsql007.facturasventa f join cclabora_fsql007.itemspedidofacturados i on f.fvtaID=i.fvtaID join cclabora_fsql007.detallepedidosclientes d on i.depcID=d.depcID where month(fvtaEMISION)="' . trim($mes) . '" and year(fvtaEMISION)="' . trim($year) . '" and d.prodID="' . trim($prodID) . '"', 'jarvis');
        $resultado = array();
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                if (isset($resultado[0])) {
                    $resultado[0] = $resultado[0] + $result->ipfCANTIDAD;//CANTIDAD
                } else {
                    $resultado[0] = $result->ipfCANTIDAD;//CANTIDAD
                }
                $usd = $result->ipfCANTIDAD * $result->depcPVP;
                if (isset($resultado[1])) {
                    $resultado[1] = $resultado[1] + $usd;//USD
                } else {
                    $resultado[1] = $usd;//USD
                }
            }
        } else {
            $resultado[0] = 0;
            $resultado[1] = 0;
        }

        return $resultado;
    }

    public function dimePSSProd($mes, $year, $prodID, $estado, $condicion)
    {
        $sth = '';
        $sql = '';
        if ($condicion == 1) {
            $sql = "SELECT sum(pss.prodCANT) as prodCANT, sum(pss.total) as total FROM cclabora_jarvis.sch_mrp_tbdata_pss pss
                join cclabora_jarvis.sch_admin_tbdata_clientes cl on pss.clieID = cl.clieID
                join cclabora_fsql007.notaspedidoclientes npc on cl.clieID = npc.clieID
                where month(fechaINGRESO)='" . trim($mes) . "' and year(fechaINGRESO)='" . trim($year) . "' 
                and npc.pedidoNUMERO = pss.numPEDIDO and pss.prodID=" . trim($prodID);
            $sth = $this->consultaBD($sql, 'jarvis',1);
            /*$sth = $this->consultaBD('SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_pss
        WHERE month(fechaINGRESO)="'.trim($mes).'" and year(fechaINGRESO)="'.trim($year).'"
        and prodID="'.trim($prodID).'"  ','jarvis');*/
        } else {
            $sql = "SELECT sum(pss.prodCANT) as prodCANT, sum(pss.total) as total FROM cclabora_jarvis.sch_mrp_tbdata_pss pss
                join cclabora_jarvis.sch_admin_tbdata_clientes cl on pss.clieID = cl.clieID
                join cclabora_fsql007.notaspedidoclientes npc on cl.clieID = npc.clieID
                where pss.estadoPSS = '" . $estado . "' and npc.pedidoNUMERO = pss.numPEDIDO and pss.prodID=" . trim($prodID);
            //echo $sql."<br>";
            $sth = $this->consultaBD($sql, 'jarvis',1);
            /*$sth = $this->consultaBD('SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_pss
        WHERE estadoPSS = '.$estado.' and prodID="'.trim($prodID).'"','jarvis');*/
        }

        $resultado = array();
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                if (isset($resultado[0])) {
                    $resultado[0] = $resultado[0] + ($result->prodCANT);//CANTIDAD
                } else {
                    $resultado[0] = ($result->prodCANT);//CANTIDAD
                }
                $usd = $result->total;
                if (isset($resultado[1])) {
                    $resultado[1] = $resultado[1] + $usd;//USD
                } else {
                    $resultado[1] = $usd;//USD
                }
            }
        } else {
            $resultado[0] = 0;
            $resultado[1] = 0;
        }

        return $resultado;
    }

    public function  dimePropietario($codigo)
    {
        $propietario = 'TERCERO';
        if ($codigo[0] == 1) {
            $propietario = 'CC LABORATORIOS';
        }
        return $propietario;
    }


    public function dimeProdCODIGO($prodID)
    {
        $prodCODIGO = '';

        $sth = $this->consultaBD('SELECT prodCODIGO FROM cclabora_jarvis.sch_admin_tbdata_productos p
                                  where p.prodID=' . $prodID, 'jarvis');
        if ($sth->num_rows > 0) {
            $result = $sth->fetch_object();
            $prodCODIGO = $result->prodCODIGO;
        }
        return $prodCODIGO;
    }


    public function rpt_resumenventasitems($tobode = "09", $togrupod = "0", $togrupoh = "zzzzzzzzzzzzzz", $toitemd = "", $toitemh = "",
                                           $todesde = '', $tohasta = '', $toconsolidar = "", $totipo = "09")
    {

        $sql = "select
             sum(a.krdcantidad) as krdcantidad
      from cclabora_fsql007.kardex a
         inner join cclabora_fsql007.kardexventas b            on a.krdid = b.krdid
         inner join cclabora_fsql007.stocks c                  on a.stocksid = c.stocksid
         inner join cclabora_fsql007.productos d               on c.prodid = d.prodid
         inner join cclabora_fsql007.gruposinventarios e       on d.grupinvid = e.grupinvid
         inner join cclabora_fsql007.documentosinventarios f   on a.docinvid = f.docinvid
         inner join cclabora_fsql007.almacenes g               on f.almacenid = g.almacenid
         inner join cclabora_fsql007.facturasventa h           on f.docinvid = h.docinvid
         inner join cclabora_fsql007.documentosventa i         on h.docvtaid = i.docvtaid
            where a.krdcantidad + b.krdtotalrenglon <> 0
                  and g.almacencodigo like concat('$tobode','%')
                  and (f.docinvfecha between '$todesde' and '$tohasta')
                  and (e.grupinvcodigo between '$togrupod' and concat('$togrupoh','_'))
                  and (d.prodcodigo between '$toitemd' and concat('$toitemh','_'));";

        return $this->consultaBD($sql, "fsql007");
    }

    public function rpt_EstadisticasVentasLinea($em = '', $start_date, $end_date, $prodCODE = '', $return_DM = 0, $tobodegas = array("09", 11, "80"), $legal = false)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        set_time_limit(160);
        $rand = "temp" . mt_rand();
        $temp_table = $return_DM == 1 ? $rand : "sch_mrp_tbdata_dmtable";
        $table = "";
        if (!$end_date) {
            $end_date = date("y-m-d");
        }
        if (!$start_date) {
            $start_date = date("Y-m-d", strtotime($end_date . " -93 days"));
        }
        $legal = '';
        if ($legal) {
            $legal = ' AND (((select ccstat from cclabora_jarvis.sch_mrp_tbdata_em where prodID=c.prodID) = "ACTIVO" or (select ccstat from cclabora_jarvis.sch_mrp_tbdata_em where prodID=c.prodID) = "SUSPENDIDO" )
            and ((select regstat from cclabora_jarvis.shc_iyd_tbdata_entvprod where prodID=c.prodID and entID<>0 LIMIT 1)="VIGENTE")) ';
        }
        $this->truncate_temp_table($em, $temp_table);
        $sth = " CREATE " . " TABLE IF NOT EXISTS cclabora_jarvis.$temp_table (CODIGO_ALMACEN CHAR(4), NOMBRE_ALMACEN VARCHAR(50), CODIGO_LINEA VARCHAR(15),
        NOMBRE_LINEA VARCHAR(50), CODIGO_PRODUCTO VARCHAR(30), NOMBRE_PRODUCTO VARCHAR(200), MES VARCHAR(10), CANTIDAD DECIMAL(14,2),
        VALOR_VENTA DECIMAL(14,2), COSTO_VENTA DECIMAL(14,2), UTILIDAD DECIMAL(14,2), PORCENTAJE DECIMAL(14,2), NMES DECIMAL(2),
         `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
         UNIQUE KEY `UNICA` (`CODIGO_PRODUCTO`,`MES`));";
        $this->consultaBD($sth, 'jarvis');
        $sqlBod = 'select id_almacen from cclabora_jarvis.sch_admin_bodegas_select where tipo_bodega="VL"';
        $sthBod = $this->consultaBD1($sqlBod, $jarvisConex);
        while ($resultBod = $sthBod->fetch_object()) {
            $codes2 = '';
            set_time_limit(160);
            if (is_array($prodCODE)) {
                $count = count($prodCODE);
                foreach ($prodCODE as $code) {
                    $codes2 .= "LIKE '$code%'";
                    $count--;
                    if ($count >= 1) {
                        $codes2 .= " OR d.prodCODIGO ";
                    }
                }
            } else {
                if ($prodCODE <> '') {
                    $toITEM_D = $prodCODE;
                    $toITEM_H = $prodCODE;
                } else {
                    $toITEM_D = '0';
                    $toITEM_H = 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz';
                }
                $codes2 = "BETWEEN '" . $toITEM_D . "' AND '" . $toITEM_H . "'";
                $toDESDE = $start_date;
                $toHASTA = $end_date;
                $toTIPO = 1;
                $tpID = array("SXV", "IXV");
                foreach ($tpID as $tpdiID) {
                    set_time_limit(160);
                    $sql2 = "SELECT f.almacenCODIGO,f.almacenDESCRIPCION,d.prodCODIGO,d.prodDESCRIPCION,MONTH(e.docinvFECHA) as NAME_MES,
                             SUM(a.krdCANTIDAD) as CANTIDAD,SUM(b.krdTOTALRENGLON) as TOTAL,SUM(a.krdCOSTO) as COSTO,MONTH(e.docinvFECHA) as MONTH,
                             g.ldisCODIGO,g.ldisDESCRIPCION	 FROM cclabora_fsql007.Kardex a
                             INNER JOIN cclabora_fsql007.KardexVentas b ON a.krdID = b.krdID	 INNER JOIN cclabora_fsql007.Stocks c ON a.stocksID = c.stocksID
                             INNER JOIN cclabora_fsql007.Productos d ON c.prodID = d.prodID INNER JOIN cclabora_fsql007.DocumentosInventarios e ON a.docinvID = e.docinvID
                             INNER JOIN cclabora_fsql007.Almacenes f ON e.almacenID = f.almacenID INNER JOIN cclabora_fsql007.LineasDistribucion g ON d.ldisID = g.ldisID
                             WHERE e.tpdiID = '$tpdiID' AND f.almacenCODIGO LIKE CONCAT('" . $resultBod->id_almacen . "','%') AND e.docinvFECHA BETWEEN '$toDESDE' AND '$toHASTA'
                             AND (d.prodCODIGO " . $codes2 . ") " . $legal . " GROUP BY 1,3,5 ORDER BY 1,3,9;";
                    $sth = $this->consultaBD1($sql2, $jarvisConex);
                    if ($sth->num_rows > 0 && is_object($sth)) {
                        $Aresult = $sth->fetch_all();
                        for ($i = 0; $i < count($Aresult); $i++) {
                            set_time_limit(160);
                            $result = $Aresult[$i];
                            $loBODE = $result[0];
                            $loNOMBODE = $result[1];
                            $loCODIGO = $result[2];
                            $loDESCRIPCION = utf8_encode($result[3]);
                            $loNAME_MES = $result[4];
                            $loCANTIDAD = $result[5];
                            $loVENTA = $result[6];
                            $loCOSTO = $result[7];
                            $loMES = $result[8];
                            $loLINEAC = $result[9];
                            $loLINEAN = $result[10];
                            if ($toTIPO == 2) {
                                $loBODE = 'XX';
                                $loNOMBODE = 'TODOS LOS ALMACENES';
                            }
                            $sql1 = "SELECT COUNT(*) as varCUANTOS FROM cclabora_jarvis.$temp_table
                                     WHERE CODIGO_ALMACEN = '$loBODE' AND CODIGO_PRODUCTO = '$loCODIGO'
                                     AND NMES = '$loMES' AND CODIGO_LINEA = '$loLINEAC' LIMIT 1;";
                            $sth2 = $this->consultaBD1($sql1, $jarvisConex);
                            $varCUANTOS = $sth2->fetch_object();
                            if (($varCUANTOS->varCUANTOS == '' || $varCUANTOS->varCUANTOS == 0)) {
                                $sql3 = "INSERT INTO cclabora_jarvis.$temp_table
                                          (CODIGO_ALMACEN,NOMBRE_ALMACEN,CODIGO_LINEA,NOMBRE_LINEA,CODIGO_PRODUCTO,NOMBRE_PRODUCTO,MES,CANTIDAD,VALOR_VENTA,COSTO_VENTA,NMES)
                                          VALUES ('$loBODE','$loNOMBODE','$loLINEAC','$loLINEAN','$loCODIGO','$loDESCRIPCION','$loNAME_MES','$loCANTIDAD','$loVENTA','$loCOSTO','$loMES');";
                            } else {
                                $sql3 = "UPDATE cclabora_jarvis.$temp_table SET CANTIDAD = CANTIDAD + $loCANTIDAD, VALOR_VENTA = VALOR_VENTA + $loVENTA,
                                          COSTO_VENTA = COSTO_VENTA + $loCOSTO WHERE CODIGO_ALMACEN = '$loBODE' AND CODIGO_PRODUCTO = '$loCODIGO'
                                          AND NMES = '$loMES' AND CODIGO_LINEA = '$loLINEAC';";
                            }
                            $this->consultaBD1($sql3, $jarvisConex);
                        }
                    }
                }
            }
        }
        $sth2 = $this->consultaBD("select * from cclabora_jarvis.$temp_table", "jarvis");
        while ($result = $sth2->fetch_object()) {
            $sql4 = "UPDATE cclabora_jarvis.$temp_table SET UTILIDAD = " . ($result->VALOR_VENTA - $result->COSTO_VENTA) . ",
				 PORCENTAJE = fs_UTILIDAD(($result->VALOR_VENTA - $result->COSTO_VENTA),$result->VALOR_VENTA)
				 where CODIGO_PRODUCTO = '" . $result->CODIGO_PRODUCTO . "'";
            $this->consultaBD1($sql4, $jarvisConex);
        }

        $table .= "<div class='table-responsive'><table class=\"table table-hover\" id=\"Exportar_a_Excel\" border=\"0px\">";
        $table .= "<thead><tr>";
        $total_value = 0;
        $total_array = array();
        $sth = "SELECT * FROM cclabora_jarvis.$temp_table ORDER BY NOMBRE_PRODUCTO,MES,CODIGO_ALMACEN,CODIGO_LINEA,NMES;";
        $sth = $this->consultaBD1($sth, $jarvisConex);
        $arrValues = $sth->fetch_all(MYSQLI_ASSOC);
        if (!empty($arrValues)) {
            set_time_limit(160);
            $total_array += $arrValues;
            foreach ($arrValues[0] as $key => $useless) {
                $table .= "<th>$key</th>";
            }
            $table .= "</tr></thead>";
            foreach ($arrValues as $row) {
                $table .= "<tbody><tr>";
                foreach ($row as $key => $val) {
                    if ($key == "CANTIDAD") {
                        $total_value += $val;
                    }
                    $s = $val;
                    if ($key == "CODIGO_PRODUCTO") {
                        $s = "<a  href='../logistica/productoacabado/post?codigo=" . trim($val) . "' target='_blank'>" . $val . "</a>";
                    }

                    $table .= "<td>$s</td>";
                }
                $table .= "</tr></tbody>";
            }
        }
        $table .= "</table></div>";
        if ($return_DM == 3) return $temp_table;
        if ($return_DM == 1) {
            $this->drop_temp_table($em, $temp_table);
            return $total_value;
        }
        if ($return_DM == 2) return $total_array;
        $jarvisConex->close();
        return $table;
    }//FIN FUNCION

    public function get_client_product_price($clieID, $prodID, $warehouse_ID = 8)
    {
        $varR = $this->consultaBD("select cliePVPASIGNADO from cclabora_jarvis.sch_admin_tbdata_clientes where clieID=" . $clieID, 'fsql007');
        //print_r($varR);
        $result2 = $varR->fetch_object();
        $discounted_price = "s.stocksPVP" . $result2->cliePVPASIGNADO;
        $sql = "select $discounted_price as price from cclabora_fsql007.stocks s where s.prodID = " . $prodID . " and s.almacenID = " . $warehouse_ID;
        //print_r($sql);
        $varR2 = $this->consultaBD($sql, 'fsql007');
        if ($varR2->num_rows > 0) {
            $result = $varR2->fetch_object();
            $price = $result->price;
        } else {
            $sql = "select $discounted_price as price from cclabora_fsql007.stocks s where s.prodID = " . $prodID . " and s.almacenID = 19";
            $varR2 = $this->consultaBD($sql, 'fsql007');
            if ($varR2->num_rows > 0) {
                $result = $varR2->fetch_object();
                $price = $result->price;
            } else {
                $price = 0;
            }
        }
        //print_R($sql);
        return $price;
        //return $sql;
    }

    public function get_client_product_pricecc($clieID, $prodID, $warehouse_ID = 8)
    {
        if ($clieID = '65' or $clieID = '611' or $clieID = '1334' or $clieID = '789' or $clieID = '740') {
            $discounted_price = "s.stocksPVP2";
        } elseif ($clieID = '660' or $clieID = '1061' or $clieID = '598' or $clieID = '954' or $clieID = '1043' or
            $clieID = '1085' or $clieID = '1109' or $clieID = '1402' or $clieID = '332' or $clieID = '1160' or
            $clieID = '422' or $clieID = '1154' or $clieID = '460' or $clieID = '479' or $clieID = '978' or $clieID = '1130'
        ) {
            $discounted_price = "s.stocksPVP6";
        } else {
            $discounted_price = "s.stocksPVP1";
        }
        $sql = "select $discounted_price as price from cclabora_fsql007.stocks s where s.prodID = " . $prodID . " and s.almacenID = " . $warehouse_ID;
        $sht = $this->consultaBD($sql, "fsql007");
        $result = $sht->fetch_object();
        //return $this->fetch_var($sql);
        return $result->price;
    }

    public function get_cost_from_id($active_id)
    {
        return $this->get_cost('d.prodID', $active_id);
    }

    public function get_cost_oficial($active_id)
    {
        $sql = "";
        $sht = $this->consultaBD($sql, "fsql007");
        $result = $sht->fetch_object();
        return $result->costo_oficial;
    }

    public function  dimeMeses()
    {
        $meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio',
            8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre', 13 => '12 Meses Atras', 14 => 'Anual');
        return $meses;
    }

    public function  dimeMesesA()
    {
        $meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio',
            8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
        return $meses;
    }

    public function  dimeDias()
    {
        $dias = array(0 => 'Domingo', 1 => 'Lunes', 2 => 'Martes', 3 => 'Miercoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sabado');
        return $dias;
    }

    public function  dimeDias2()
    {
        $dias = array(1 => 'Lunes', 2 => 'Martes', 3 => 'Miercoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sabado', 7 => 'Domingo');
        return $dias;
    }

    function paint_mrpmanual1($table, $onclick = '')
    {
        if (!empty($table)) {
            uksort($table, 'strnatcmp');
            //print_r($valor);echo "<br>";
            $x = 0;
            $tabla = '';
            foreach ($table as $key => $value) {
                $class = 'class="' . $value['style'] . " " . ($x % 2 == 0 ? 'cclabswhiteBackground' : '') . '"';
                //echo "class  is $class<br>";
                if (isset($value['tooltip'])) {
                    $tolltip = $value['tooltip'];
                } else {
                    $tolltip = '';
                }
                $tabla .= "<tr id='" . $x . "' " . $class . " " . $tolltip . ">
					<td>" . $value['menorPP'] . "</td>
					<td>" . $value['code'] . '</td>
					<td>' . utf8_decode($key) . '</td>
					<td>
						<select onchange="changelote(this)" name="LT|' . $value['code'] . '|lotes|' . $x . '">' . $value['lote_options'] . '</select>
						<spam name="LE|' . $value['code'] . '" id="LE|' . $value['code'] . '"> ' . $value['active_le'] . '</spam>
					</td>
					<td>
						<spam name="ST|' . $value['code'] . '" id="ST|' . $value['code'] . '">' . $value['stocks'] . '</spam>
					</td>
					<td>
						<select onchange="changeDM(this)" name="DM|' . $value['code'] . '|' . round($value['DM'], 0) . '|' . $x . '">
							' . $value['lote_options'] . '
						</select>
						<spam name="DM|' . $value['code'] . '" id="DM|' . $value['code'] . '"> ' . round($value['DM'], 0) . '</spam>
					</td>
					<td>
						<spam id="QP|' . $value['code'] . '" name="QP|' . $value['code'] . '">' . $value['to_produce'] . '</spam>
					</td>
					<td align="left">
						<spam id="MPE|' . $value['code'] . '" name="MPE|' . $value['code'] . '">' . $value['tooltipTD'] . '</spam>
					</td>
					<td>
						<input onclick="selectcheck(this)" type="checkbox" id="' . $value['code'] . '" name="' . $key . '" ' . $value['checked'] . '>
						<input type="hidden" name="' . $key . '|prodID" value="' . $value['prodID'] . '">
						<input type="hidden" name="' . $key . '|value" id="' . $key . '|value" value="' . $value['to_produce'] . '">
						<input type="hidden" name="id' . $x . '" id="id' . $x . '" value="' . $x . '">
						<input type="hidden" name="' . $value['code'] . '|canproduce" id="' . $value['code'] . '|canproduce" value="' . $value['tooltipTD'] . '">
						<input type="hidden" name="' . $key . '|canproduceRFP" id="' . $key . '|canproduceRFP" value="' . $value['tooltipTD'] . '">
					</td>
				   </tr>';
                $x++;
            }
            return $tabla;
        } else {
            return "No hay datos que mostrar";
        }

    }

    function paint_mrpmanual($table, $onclick = '')
    {
        if (!empty($table)) {
            uksort($table, 'strnatcmp');
            //print_r($valor);echo "<br>";
            $x = 0;
            $tabla = '';
            foreach ($table as $key => $value) {
                $class = 'class="' . $value['style'] . " " . ($x % 2 == 0 ? 'cclabswhiteBackground' : '') . '"';
                //echo "class  is $class<br>";
                if (isset($value['tooltip'])) {
                    $tolltip = $value['tooltip'];
                } else {
                    $tolltip = '';
                }
                $tabla .= "<tr id='" . $x . "' " . $class . " " . $tolltip . ">
					<td>" . $value['menorPP'] . "</td>
					<td><label><a  href='../logistica/productoacabado/post?codigo=" . trim($value['code']) . "' target='_blank'>" . $value['code'] . '</a></label></td>
					<td><label onclick="mostrarEXPMPME(' . $value["to_produce"] . ',' . $value['prodID'] . ')">' . $key . '</label></td>
					<td>
						<select onchange="changelote(this)" name="LT|' . $value['code'] . '|lotes|' . $x . '">' . $value['lote_options'] . '</select>
						<spam name="LE|' . $value['code'] . '" id="LE|' . $value['code'] . '"> ' . $value['active_le'] . '</spam>
					</td>
					<td>
						<spam name="ST|' . $value['code'] . '" id="ST|' . $value['code'] . '">' . $value['stocks'] . '</spam>
					</td>
					<td>
						<select onchange="changeDM(this)" name="DM|' . $value['code'] . '|' . round($value['DM'], 0) . '|' . $x . '">
							' . $value['lote_options'] . '
						</select>
						<spam name="DM|' . $value['code'] . '" id="DM|' . $value['code'] . '"> ' . round($value['DM'], 0) . '</spam>
					</td>
					<td>
					    <input onchange="changeQP(this)" type="text" id="QP|' . $value['code'] . '|' . utf8_decode($key) . '" name="QP|' . $value['code'] . '|' . utf8_decode($key) . '" value="' . $value['to_produce'] . '"/>
						<input type="hidden" id="MPE|' . $value['code'] . '" name="MPE|' . $value['code'] . '" value="' . $value['tooltipTD'] . '"/>
					</td>
					
					<td>
						<input onclick="selectcheck(this)" type="checkbox" id="' . $value['prodID'] . '|' . $value['to_produce'] . '" name="' . $value['prodID'] . '|' . $value['to_produce'] . '" ' . $value['checked'] . '>
					    <input type="hidden" name="' . $key . '|value" id="' . $key . '|value" value="' . $value['to_produce'] . '">
					</td>
				   </tr>';
                $x++;
                /*<!--<td align="left">

						<spam id="MPE|' . $value['code'] . '" name="MPE|' . $value['code'] . '">' . $value['tooltipTD'] . '</spam>
					</td>-->*/
            }
            return $tabla;
        } else {
            return "No hay datos que mostrar";
        }

    }

    public function get_cost($type, $active_id)
    {
        $sql = "SELECT round(a.krdCOSTO /a.krdCANTIDAD ,5) AS cost
			FROM cclabora_fsql007.Kardex a
			LEFT JOIN cclabora_fsql007.DocumentosInventarios b   ON a.docinvID = b.docinvID
			LEFT JOIN cclabora_fsql007.Stocks c                  ON a.stocksID = c.stocksID
			LEFT JOIN cclabora_fsql007.Productos d               ON c.prodID = d.prodID
			LEFT JOIN cclabora_fsql007.GruposInventarios e       ON d.grupinvID = e.grupinvID
			LEFT JOIN cclabora_fsql007.Almacenes f               ON b.almacenID = f.almacenID
			WHERE (f.almacenCODIGO = 1 or f.almacenCODIGO = 2)
			AND e.grupinvCODIGO BETWEEN '' AND CONCAT('','_')
			AND " . $type . " LIKE '%" . $active_id . "%'
			AND round(a.krdCOSTO /a.krdCANTIDAD ,5)<>0
			ORDER BY docinvFECHA asc,almacenCODIGO,prodCODIGO,krdTIPO,b.tpdiID,b.docinvNUMERO limit 1";
        $value = $this->fetch_var($sql);
        $value = !empty($value) ? $value : 0;
        return $value;
    }

    public function get_costOficial($active_id)
    {
        $sql = "SELECT costo_oficial FROM cclabora_jarvis.sch_mrp_tbdata_em where prodID = $active_id";
        //echo $sql;
        $value = $this->fetch_var($sql);
        $value = !empty($value) ? $value : 0;
        return $value;
    }

    function porcentaje($cantidad, $porciento, $decimales)
    {
        return number_format($cantidad * $porciento / 100, $decimales);
    }

    public function get_costPA($fechai, $fechaf, $procCODIGO)
    {
        $sql = "SELECT fs_DIVISIONCERO(b.krdCOSTO,b.krdCANTIDAD) AS ITEM_PROMEDIO
      FROM DocumentosInventarios a 
         LEFT JOIN Kardex b                    ON a.docinvID = b.docinvID
         LEFT JOIN Stocks c                    ON b.stocksID = c.stocksID
         LEFT JOIN Productos d                 ON c.prodID = d.prodID
         LEFT JOIN Almacenes e                 ON c.almacenID = e.almacenID
         LEFT JOIN TipoDocumentosInventarios f ON a.tpdiID = f.tpdiID
         LEFT JOIN fsqladmin.Usuarios g        ON a.docinvINSUSER = g.usersID
         LEFT JOIN fsqladmin.Usuarios h        ON a.docinvUPDUSER = h.usersID
         LEFT JOIN FacturasCompra i            ON a.docinvID = i.docinvID
         LEFT JOIN MovimientosProveedores j    ON i.edcpID = j.edcpID
         LEFT JOIN AutorizacionesFacturas k    ON i.fcomID = k.fcomID
         LEFT JOIN AutorizacionesProveedores l ON k.autpID = l.autpID
         LEFT JOIN FacturasVenta m             ON a.docinvID = m.docinvID
         LEFT JOIN PuntosVenta n               ON m.ptovtaID = n.ptovtaID
            WHERE (e.almacenCODIGO BETWEEN 7 AND CONCAT(7,'_')) 
                   AND (a.docinvFECHA BETWEEN '" . $fechai . "' AND '" . $fechaf . "')
                   AND a.tpdiID = 'IPT' AND d.prodCODIGO = '" . $procCODIGO . "' and a.docinvCONCEPTO  != 'Anulado'
       ORDER BY 1 desc limit 1";
        $value = $this->fetch_var($sql);
        $value = !empty($value) ? $value : 0;
        return $value;
    }


    function dimeIRProd($prodID)
    {
        $producto = $this->dimeProductoByCodigo($prodID);
        $mysqli = $this->abrirconexion('jarvis');
        $fecha = date('Y-m-d');

        $nuevafecha = strtotime('-30 day', strtotime($fecha));
        $nuevafecha = date('Y-m-d', $nuevafecha);
        $stocksPA = $this->consultaBD1($this->in_stock($producto->prodID, 9), $mysqli)->fetch_object();
        $stmtsql = $this->consultaBD1("SELECT sum(a.krdCANTIDAD) AS CANTIDAD_ENTRADA
											    FROM cclabora_fsql007.Kardex a
												LEFT JOIN cclabora_fsql007.DocumentosInventarios b   ON a.docinvID = b.docinvID
												LEFT JOIN cclabora_fsql007.Stocks c                  ON a.stocksID = c.stocksID
												LEFT JOIN cclabora_fsql007.Productos d               ON c.prodID = d.prodID
												LEFT JOIN cclabora_fsql007.GruposInventarios e       ON d.grupinvID = e.grupinvID
												LEFT JOIN cclabora_fsql007.Almacenes f               ON b.almacenID = f.almacenID
												LEFT JOIN fsqladmin.Usuarios g      ON b.docinvINSUSER = g.usersID
												LEFT JOIN fsqladmin.Usuarios h      ON b.docinvUPDUSER = h.usersID
												WHERE (a.krdTIPO = 'S' and f.almacenCODIGO = 09)
												AND d.prodCODIGO = '" . $prodID . "'
												AND b.docinvFECHA BETWEEN '$nuevafecha'
												and '$fecha'", $mysqli);

        if ($stmtsql->num_rows > 0) {
            $fila = $stmtsql->fetch_object();
            $saldoacumulado = $fila->CANTIDAD_ENTRADA;
        } else {
            $saldoacumulado = 0;
        }
        if ($stocksPA->cant == 0) {
            $IR = 0;
        } else {
            $IR = round($saldoacumulado / $stocksPA->cant, 1);
        }
        $mysqli->close();
        return $IR;
    }

    function dimeNivelServicio($provID, $prodID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="' . $provID . '" and id_subindice_ns="' . $prodID . '" ', $jarvisConex);
        $ns = 0;
        if ($sth_ns->num_rows > 0) {
            $m = 1;
            while ($result = $sth_ns->fetch_object()) {
                if ($result->estado_ns != 0) {
                    if ($result->id_estado_jira != 11200) {
                        if ($result->id_estado_jira != 11201) {
                            $ns = $ns + $result->valor_ns;
                            $m++;
                        }
                    }
                }

            }

        }
        $jarvisConex->close();
        return $ns;

    }

    function dimeTodosNivelServicio($prodID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_prov = $this->consultaBD1('SELECT distinct id_indice_ns FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_subindice_ns=' . trim($prodID) . ' and estado_ns = 1;', $jarvisConex);
        $nsp = array();
        if ($sth_prov->num_rows > 0) {
            while ($result_prov = $sth_prov->fetch_object()) {
                $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="' . $result_prov->id_indice_ns . '" and id_subindice_ns="' . $prodID . '"  and estado_ns = 1', $jarvisConex);
                $ns = 0;
                if ($sth_ns->num_rows > 0) {
                    $m = 1;
                    while ($result = $sth_ns->fetch_object()) {
                        if ($result->estado_ns != 0) {
                            if ($result->id_estado_jira != 11200) {
                                if ($result->id_estado_jira != 11201) {
                                    $ns = $ns + $result->valor_ns;
                                    $m++;
                                }
                            }
                        }

                    }
                }
                $nsp[$result_prov->id_indice_ns] = $ns;
            }


        }


        $jarvisConex->close();
        return $nsp;

    }

    function dimeNSDespachada($provID, $prodID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="' . $provID . '" and id_subindice_ns="' . $prodID . '" ', $jarvisConex);
        $ns = 0;
        if ($sth_ns->num_rows > 0) {
            $m = 1;
            while ($result = $sth_ns->fetch_object()) {
                if ($result->estado_ns != 0) {
                    if ($result->id_estado_jira == 1 or $result->id_estado_jira == 10016 or $result->id_estado_jira == 10017) {
                        $ns = $ns + $result->valor_ns;
                        $m++;

                    }
                }

            }

        }
        $jarvisConex->close();
        return $ns;
    }

    function dimeNSCOTIZACION($provID, $prodID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="' . $provID . '" and id_subindice_ns="' . $prodID . '" ', $jarvisConex);
        $ns = 0;
        if ($sth_ns->num_rows > 0) {
            $m = 1;
            while ($result = $sth_ns->fetch_object()) {
                if ($result->estado_ns != 0) {
                    if ($result->id_estado_jira == 10201) {
                        $ns = $ns + $result->valor_ns;
                        $m++;

                    }
                }

            }

        }
        $jarvisConex->close();
        return $ns;
    }

    function dimeNSCOTIZACIONN($provID, $prodID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="' . $provID . '" and id_subindice_ns="' . $prodID . '" ', $jarvisConex);
        $ns = 0;
        if ($sth_ns->num_rows > 0) {
            $m = 1;
            while ($result = $sth_ns->fetch_object()) {
                if ($result->estado_ns != 0) {
                    if ($result->id_estado_jira == 14) {
                        $ns = $ns + $result->valor_ns;
                        $m++;

                    }
                }

            }

        }
        $jarvisConex->close();
        return $ns;
    }

    function dimeNSxEstado($provID, $prodID, $estado)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_estado = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_tbdata_estados where tipo = "OCIT" and estadoID <= ' . $estado . ' and (estadoID != 18 and estadoID !=20) ', $jarvisConex);
        $ns = 0;
        //echo 'SELECT * FROM cclabora_jarvis.sch_admin_tbdata_estados where tipo = "OCIT" and estadoID <= '.$estado.' and (estadoID != 18 and estadoID !=20) ';
        if ($sth_estado->num_rows > 0) {
            while ($resultestado = $sth_estado->fetch_object()) {
                $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where estado_ns = 1 and id_indice_ns="' . $provID . '" and id_subindice_ns="' . $prodID . '" and id_estado_jira = ' . $resultestado->estadoID, $jarvisConex);
                if ($sth_ns->num_rows > 0) {
                    $m = 1;
                    while ($result = $sth_ns->fetch_object()) {
                        $ns = $ns + $result->valor_ns;
                        $m++;
                    }
                }
            }
        }
        $jarvisConex->close();
        return $ns;
    }

    function dimeNSDespachadaN($provID, $prodID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="' . $provID . '" and id_subindice_ns="' . $prodID . '" ', $jarvisConex);

        //print_r('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="'.$provID.'" and id_subindice_ns="'.$prodID.'" ');
        $ns = 0;
        if ($sth_ns->num_rows > 0) {
            $m = 1;
            while ($result = $sth_ns->fetch_object()) {
                if ($result->estado_ns != 0) {
                    if ($result->id_estado_jira == 14 or $result->id_estado_jira == 15 or $result->id_estado_jira == 16) {
                        $ns = $ns + $result->valor_ns;
                        $m++;

                    }
                }

            }

        }
        $jarvisConex->close();
        return $ns;
    }

    public function dime_costo($type, $active_id)
    {
        if ($type == "ME") {
            $almacenID = 4;
        } elseif ($type == "MP") {
            $almacenID = 3;
        } elseif ($type == "PA") {
            $almacenID = 9;
        }
        $sql = "SELECT stocksCOSTO FROM cclabora_fsql007.stocks WHERE prodID = $active_id and almacenID = $almacenID";
        $value = $this->fetch_var($sql);
        $value = !empty($value) ? $value : 0;
        return $value;
    }

    public function display_db_query_ing_ped($query_string, $header_bool, $table_params, $TR_head_params = '', $TR_table_params = '', $TD_table_params = '', $check_box = '')
    {
        //print_r($query_string);
        $TH_table_params = '';
        if ($TR_table_params == "colors") $TR_table_colors = true; else $TR_table_colors = false;
        $sth = $this->consultaBD($query_string, 'jarvis');

        if ($sth->num_rows > 0) {
            $valoresH = array_keys($sth->fetch_assoc());
        } else {
            $valoresH = array_keys($sth->fetch_all());
        }

        $column_count = $sth->field_count;
        $sth = $this->consultaBD($query_string, 'jarvis');
        $output = '<TABLE table table-bordered table-hover table-condensed width="100%" id="itempedido" ' . $table_params . '>';
        //print_r($sth);
        while ($result = $sth->fetch_all()) {
            //print_r($result);
            if ($header_bool) {
                $header_line = ("<TR $TR_head_params>");
                $headers = array_keys(current($result));
                for ($column_num = 0; $column_num < $column_count; $column_num++) {
                    $field_name = $headers[$column_num];
                    $header_line .= ("<TH $TH_table_params>$valoresH[$field_name]</TH>");
                }
                if ($check_box) {
                    global $delete;
                    $header_line .= "<TH $TH_table_params>" . strtoupper($delete) . "</TH>";
                }
                $header_line .= ("</TR>");
                $output .= $header_line;
            }
            if (is_array($TR_table_params)) {
                $TR_table_parms = implode(" ", $TR_table_params);
            }
            $x = 0;
            $f = 0;
            foreach ($result as $key => $arr) {
                if ($TR_table_colors)
                    $TR_table_params = 'class="' . ($key % 2 <> 0 ? 'cclabsgraybackground' : 'cclabswhiteBackground') . '"';
                $output .= ("<TR  $TR_table_params >");
                $ban = 0;
                if ($arr[5] == 100) {
                    $valor = $arr[3];
                    $f++;
                    $arr[3] = '<span id="valor_desc_' . $f . '" ondblclick="modificaInput(' . $f . ')" >' . $valor . '</span><input style="display:none;" ondblclick="cierraInput(' . $f . ')" onchange="modifica(' . "'" . $f . "'" . ',' . "'" . $arr[0] . "'" . ',' . "'" . $arr[1] . "'" . ',this)" size="5" id="cant_desc_' . $f . '" value="' . $valor . '"/>';
                }
                foreach ($arr as $key2 => $value) {

                    $output .= "<TD $TD_table_params>$value</TD>";
                }
                if ($check_box == "backorder") {
                    $output .= '<TD $TD_table_params><center>
                                <input type="checkbox" onclick="delete_item2(this.value)"
                                id="checkbox[' . $key . ']" name="checkbox[' . $key . ']"
                                value="' . $arr[0] . "|" . $arr[1] . '" /></center>
                                </TD>';
                } else {
                    $output .= '<TD $TD_table_params><center>
                                <input type="checkbox" onclick="delete_item2(this.value)"
                                id="checkbox[' . $key . ']" name="checkbox[' . $key . ']"
                                value="' . $arr[1] . '" /></center>
                              </TD>';
                }
                $output .= ("</TR>");
                $x++;

            }
            //flush();
        }
        $output .= ("</TABLE>");
        return $output;
    }

    public function explode_options($post)
    {
        foreach (explode('&', $post['options']) as $chunk) {
            $opt = explode("=", $chunk);
            if ($opt) $post[$opt[0]] = $opt[1];
        }
        return $post;
    }

    public function getUltimoDiaMes($elAnio, $elMes)
    {
        return date("d", (mktime(0, 0, 0, ($elMes + 1), 1, $elAnio) - 1));
    }

    public function dias_transcurridos($fecha_i, $fecha_f)
    {
        $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        return $dias;
    }

    public function dias_transcurridosSFDS($fecha_i, $fecha_f)
    {
        $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        $fecha1 = strtotime($fecha_i);
        $fecha2 = strtotime($fecha_f);
        for ($fecha1; $fecha1 <= $fecha2; $fecha1 = strtotime('+1 day ' . date('Y-m-d', $fecha1))) {
            if ((strcmp(date('D', $fecha1), 'Sun') == 0) or (strcmp(date('D', $fecha1), 'Sat') == 0)) {
                $dias--;
            }
        }
        return $dias;
    }

    public function dias_transcurridos_total($fecha_i, $fecha_f)
    {
        $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        return $dias;
    }

    public function dimeDiasTranscurridos($fi, $ff)
    {
        $datetime1 = new DateTime ($fi);
        $datetime2 = new DateTime ($ff);
        $interval = $datetime1->diff($datetime2);
        $daydiff = str_replace("+", "", $interval->format('%R%a'));
        return $daydiff;
    }

    public function in_stock($prodID, $warehouse)
    {
        if (!empty($warehouse) && is_numeric($warehouse)) {
            $warehouse = " a.almacenCODIGO = $warehouse";
        }
        if (!empty($warehouse) && $warehouse == "MP") {
            $warehouse = "(a.almacenCODIGO = 1 or a.almacenCODIGO = 2  or a.almacenCODIGO = 3 or a.almacenCODIGO = 16)";
        }
        if (!empty($warehouse) && $warehouse == "IGSF") { // Carlos says to check ONLY in 3 or 4 for the IGSF rule
            $warehouse = "(a.almacenCODIGO = 4 or a.almacenCODIGO = 3)";
        }
        $sql = "select sum(stocksCANTIDAD) as cant from cclabora_fsql007.stocks s join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID 	where s.prodID = $prodID and $warehouse";
        return $sql;
    }

    public function dimeNombreEstatusJira($id)
    {
        $sth = $this->consultaBD('select * from cclabora_jarvis.sch_admin_estados_jira where codigo_estado="' . trim($id) . '"', 'jarvis');
        if ($sth->num_rows) {
            $result = $sth->fetch_object();
        } else {
            $result = $sth->num_rows;
        }
        return $result;
    }

    function limpiar_texto($s)
    {
        $s = preg_replace("[����]", "a", $s);
        $s = preg_replace("[����]", "A", $s);
        $s = preg_replace("[���]", "e", $s);
        $s = preg_replace("[���]", "E", $s);
        $s = preg_replace("[���]", "i", $s);
        $s = preg_replace("[���]", "I", $s);
        $s = preg_replace("[�����]", "o", $s);
        $s = preg_replace("[����]", "O", $s);
        $s = preg_replace("[���]", "u", $s);
        $s = preg_replace("[ÚÛ]", "U", $s);
        $s = preg_replace("[ñ]", "n", $s);
        $s = preg_replace("[Ñ]", "N", $s);

        $s = str_replace("Í", "I", $s);
        $s = str_replace("í", "i", $s);
        $s = str_replace("Ñ", "N", $s);
        $s = str_replace("ñ", "n", $s);


        $s = str_replace("-", "", $s);
        $s = str_replace("�", "n", $s);
        $s = str_replace("�", "N", $s);
        $s = str_replace("�", "a", $s);
        $s = str_replace("�", "A", $s);
        $s = str_replace("�", "e", $s);
        $s = str_replace("�", "E", $s);
        $s = str_replace("�", "i", $s);
        $s = str_replace("�", "i", $s);
        $s = str_replace("�", "o", $s);
        $s = str_replace("�", "O", $s);
        $s = str_replace("�", "u", $s);
        $s = str_replace("�", "u", $s);
        $s = str_replace(")", "", $s);
        $s = str_replace("(", "", $s);

        return $s;
    }

    function limpiar_texto2($s)
    {
        $s = utf8_encode($s);
        $s = str_replace("Í", "I", $s);
        $s = str_replace("í", "i", $s);
        $s = str_replace("É", "E", $s);
        $s = str_replace("é", "e", $s);
        $s = str_replace("Ñ", "N", $s);
        $s = str_replace("ñ", "n", $s);

        return $s;

    }

    public function round_down($number, $precision = 2)
    {
        $fig = (int)str_pad('1', $precision, '0');
        return (floor($number * $fig) / $fig);
    }

    public function pull_promotions($prodID = '0', $clieID = '0', $qpurchased = '0', $display = false, $orderID = '0')
    {
        //1004,2465,120,false,1134329756
        $promo = array();
        $promo_upsell = 'Usted esta comprando un total de {BUYING}, \\n con un BONO de {GETTING}.  \n Si usted compra {BUYMORE} m�s (por un total de {TOTALBUY}), \\npodr� obtener {GETMORE} m�s \\n(por un total de {TOTALGET}) gratis';
        $promo_no_upsell = "�ltimo nivel de promociones";
        $limit = "";
        $sql1 = "select sum(quantity) as quantity from cclabora_jarvis.sch_sales_tbdata_orders where ordID=" . $orderID . " and prodID=" . $prodID . " and disc <> 100";
        $sth1 = $this->consultaBD($sql1, "jarvis");
        $valor = $sth1->fetch_object();
        $bought = $valor->quantity;
        if ($bought == "")
            $bought = 0;
        $sql1 = "select sum(quantity) as quantity from cclabora_jarvis.sch_sales_tbdata_orders where ordID=" . $orderID . " and prodID=" . $prodID . " and type='order' and disc = 100";
        $sth1 = $this->consultaBD($sql1, "jarvis");
        $valor = $sth1->fetch_object();
        $bn = $valor->quantity;
        if ($bn == "")
            $bn = 0;
        $promo['bought'] = (int)(!empty($bought) ? $bought : 0);  // this is what they already have on the books
        $promo['free'] = (int)(!empty($bn) ? $bn : 0);    // this is the bonuses on the books
        $promo['buymore'] = $qpurchased - 0; // this is what they are buying right now (no upsell)
        $promo['getmore'] = 0;            // this is what they will get right now (no upsell)
        $promo['upbuy'] = 0;                // this is what they will buy if they take the upsell
        $promo['upget'] = 0;                // this is what they will get if they take the upsell
        $promo['free_prodID'] = 0;        // this is the product they will get for free (future)
        $promo['tracking'] = '';
        // calculate the MAX possible purchase (to know if they got past the highest bonus)
        $sql1 = "select MAX(pur2qual) as 'BUY',free_qty as 'GET' from cclabora_jarvis.sch_sales_tbdata_promotions promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC limit 1";
        $sth1 = $this->consultaBD($sql1, "jarvis");
        $highest = $sth1->fetch_object();
        $sql2 = "select MIN(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotions promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual asc limit 1 ";
        $sth2 = $this->consultaBD($sql2, "jarvis");
        $lowest = $sth2->fetch_object();
        //Al tener mas cantidad de la ultima promocion
        if (!empty($highest) && ($promo['bought']) >= $highest->BUY) {
            $promo['upbuy'] = 0;
            $promo['upget'] = floor(($promo['bought'] * $highest->GET) / ($highest->BUY)) - $promo['free'];
            if ($display)
                echo "Rule of 'More than MAX purchased retains %' gives you => " . ($promo['buymore'] + $promo['bought']) + $promo['upget'] . "<br>";
            $promo['tracking'] .= 1;
        } elseif (!empty($lowest) && ($promo['bought']) <= $lowest->BUY) {
            $promo['upbuy'] = $lowest->BUY - $promo['buymore'];
            $promo['upget'] = $lowest->GET - 0;
            if ($promo['buymore'] == $lowest->BUY) {
                $promo['getmore'] = $lowest->GET - 0;
            }
            $promo['free_prodID'] = $lowest->free_prodID - 0;
            $promo['tracking'] .= 2;
        } else {
            $sql = "select MAX(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotions promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC ";
            $sth2 = $this->consultaBD($sql, "jarvis");
            $result = $sth2->fetch_object();
            $promo['upbuy'] = !empty($result) ? $result->BUY - $promo['buymore'] : 0;
            if (!empty($result)) {
                $promo['getmore'] = $result->GET - 0;
                $promo['free_prodID'] = $result->free_prodID - 0;
            }
            $promo['tracking'] .= 3;
        }
        if (!empty($highest) && ($promo['bought']) <= $highest->BUY) {
            $sql = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotions promo where ( (prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=" . ($promo['upbuy']) . " order by promo.promo_end DESC,pur2qual DESC";
            if ($display) echo $this->display_db_query($sql . $limit, 1, ' style="text-align: left; width: 50%;" border="1" cellpadding="2" cellspacing="2"');
            $sth2 = $this->consultaBD($sql, "fsql007");
            $result = $sth2->fetch_object();
            if (!empty($result)) {
                if ($promo['tracking'] != 3 and $promo['tracking'] != 2) {
                    $promo['getmore'] = $result->GET - 0;
                    $promo['free_prodID'] = $result->free_prodID - 0;
                }
            }
            $sql1 = "select promoDESC as DESCRIPTION,MIN(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotions promo	where ((prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND (clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . "<promo.pur2qual )) order by promo.promo_end DESC,pur2qual ASC";

            $sql1 = "SELECT * FROM cclabora_jarvis.sch_sales_tbdata_pricepromotions where prodID=" . trim($prodID);
            //$sth2 =  $this->consultaBD($sql1,"jarvis")->fetch_object();
            $result = $this->consultaBD($sql1, "jarvis")->fetch_object();
            if (is_object($result)) {
                $promotions = array();
                $promotions['q1'] = $result->p1;
                $promotions['p1'] = $result->q1;
                $promotions['p2'] = $result->p2;
                $promotions['q2'] = $result->q2;
                $promotions['p3'] = $result->p3;
                $promotions['q3'] = $result->q3;
                $promotions['p4'] = $result->p4;
                $promotions['q4'] = $result->q4;
                $promotions['p5'] = $result->p5;
                $promotions['q5'] = $result->q5;
                $promotions['p6'] = $result->p6;
                $promotions['q6'] = $result->q6;
                $promotions['p7'] = $result->p7;
                $promotions['q7'] = $result->q7;
                $promotions['p8'] = $result->p8;
                $promotions['q8'] = $result->q8;
                $promotions['p9'] = $result->p9;
                $promotions['q9'] = $result->q9;
                $promotions['p10'] = $result->p10;
                $promotions['q10'] = $result->q10;
                $i = 1;
                $promocion = 0;
                $regalo = 0;
                $x = 0;
                $buymore = 0;
                $getmore = 0;
                $get = 0;
                $get_more = 0;
                $buymore_t = 0;
                foreach ($promo as $key => $valor) {
                    if ($promo['buymore'] >= $promotions['q' . $i] && $promotions['q' . $i] != 0) {
                        $promocion = $promotions['p' . $i];
                        $regalo = $promotions['q' . $i];
                        $x = $i;
                    }
                    $i++;
                }
                $buymore = $promocion;
                $getmore = $regalo;
                if ($x > 0) {
                    $x++;
                    if (isset($promotions['q' . $x])) {
                        if ($promotions['q' . $x] != 0) {
                            $buymore = $promotions['p' . $x];
                            $getmore = $promotions['q' . $x];
                        }
                    }
                }
                if ($promocion > 0) {
                    if ($regalo > 1) {
                        $aux = explode(".", ($promo['buymore'] / $regalo));
                        $get = $aux[0] * $promocion;
                    } else {
                        $get = $regalo;
                    }
                    $buymore_t = ($getmore - $promo['buymore']);
                    //$get_more = round(($buymore_t / $getmore), 0)*$getmore;
                    $get_more = $buymore - $get;
                }

                if ($get > 0) {
                    $promo['upsell'] = str_replace("{BUY}", ($promo['buymore']), "Por la cantidad escogida de {BUY}
			unidades le regalaremos {GET} gratis,<br>
			Pero si usted compra {BUYMORE} unidades mas, le regalaremos {GETMORE} unidades mas,
			para un total de {BUY+BUYMORE} unidades con {GET+GETMORE} unidades gratis");
                    $promo['upsell'] = str_replace("{GET}", ($get), $promo['upsell']);
                    $promo['upsell'] = str_replace("{BUYMORE}", ($buymore_t), $promo['upsell']);
                    $promo['upsell'] = str_replace("{GETMORE}", ($get_more), $promo['upsell']);
                    $promo['upsell'] = str_replace("{BUY+BUYMORE}", ($promo['buymore'] + $buymore_t), $promo['upsell']);
                    $promo['upsell'] = str_replace("{GET+GETMORE}", ($get_more + $get), $promo['upsell']);
                    if ($promo['tracking'] != 1 or $promo['tracking'] != 2) {
                        $promo['upbuy'] = ($buymore_t);
                        $promo['upget'] = ($get_more + $get);
                    }
                    $promo['tracking'] .= 5;
                } else {
                    $promo['upsell'] = $promo['buymore'];
                    $promo['tracking'] .= 6;
                }


            }


            /*$result1 = $sth2->fetch_object();
            if(($result1->BUY-($promo['bought']))>0){
                $promo['upsell']=str_replace("{BUY}",($promo['buymore']),"Por la cantidad escogida de {BUY}
			unidades le regalaremos {GET} gratis,<br>
			Pero si usted compra {BUYMORE} unidades mas le regalaremos {GETMORE} unidades mas,
			para un total de {BUY+BUYMORE} unidades con {GET+GETMORE} unidades gratis");
                $promo['upsell']=str_replace("{GET}",($result1->GET),$promo['upsell']);
                $promo['upsell']=str_replace("{BUYMORE}",($result1->BUY-$bought),$promo['upsell']);
                $promo['upsell']=str_replace("{GETMORE}",($result1->GET-$bn),$promo['upsell']);
                $promo['upsell']=str_replace("{BUY+BUYMORE}",($bought+($result1->BUY-$bought)),$promo['upsell']);
                $promo['upsell']=str_replace("{GET+GETMORE}",($bn+($result1->GET-$bn)),$promo['upsell']);
                if ($promo['tracking'] != 1 or $promo['tracking'] != 2){
                    $promo['upbuy']=($result1->BUY-$bought);
                    $promo['upget']=($result1->GET-$bn);
                }
                $promo['tracking'].=5;
            }else{
                $promo['upsell']=$result1->BUY;
                $promo['tracking'].=6;
            }*/
        } else {
            $sql = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotions promo where ( (prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['buymore'] + $promo['bought']) . ">=promo.pur2qual ))
		    group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=" . ($promo['upbuy'] + $promo['buymore']) . " order by promo.promo_end DESC,pur2qual DESC";
            $sth2 = $this->consultaBD($sql, "jarvis");
            if ($sth2->num_rows > 0) {
                $result = $sth2->fetch_object();
                $promo['getmore'] = $result->GET - 0;
                $promo['free_prodID'] = $result->free_prodID - 0;
            }

            $promo['upsell'] = $sql;
            $promo['tracking'] .= 7;

        }
        $promo['upbuy'] = !empty($promo['upbuy']) ? abs($promo['upbuy']) : 0;
        return $promo;
    }

    public function pull_promotionsCOT($prodID = '0', $clieID = '0', $qpurchased = '0', $display = false, $orderID = '0')
    {
        $promo = array();
        $promo_upsell = 'Usted esta comprando un total de {BUYING}, \\n con un BONO de {GETTING}.  \n Si usted compra {BUYMORE} m�s (por un total de {TOTALBUY}), \\npodr� obtener {GETMORE} m�s \\n(por un total de {TOTALGET}) gratis';
        $promo_no_upsell = "�ltimo nivel de promociones";
        $limit = "";
        $sql1 = "select sum(quantity) as quantity from cclabora_jarvis.sch_sales_tbdata_cotizaciones where ordID=" . $orderID . " and prodID=" . $prodID . " and disc <> 100";
        $sth1 = $this->consultaBD($sql1, "jarvis");
        $valor = $sth1->fetch_object();
        $bought = $valor->quantity;
        if ($bought == "")
            $bought = 0;
        $sql1 = "select sum(quantity) as quantity from cclabora_jarvis.sch_sales_tbdata_cotizaciones where ordID=" . $orderID . " and prodID=" . $prodID . " and type='order' and disc = 100";
        $sth1 = $this->consultaBD($sql1, "jarvis");
        $valor = $sth1->fetch_object();
        $bn = $valor->quantity;
        if ($bn == "")
            $bn = 0;
        $promo['bought'] = (int)(!empty($bought) ? $bought : 0);  // this is what they already have on the books
        $promo['free'] = (int)(!empty($bn) ? $bn : 0);    // this is the bonuses on the books
        $promo['buymore'] = $qpurchased - 0; // this is what they are buying right now (no upsell)
        $promo['getmore'] = 0;            // this is what they will get right now (no upsell)
        $promo['upbuy'] = 0;                // this is what they will buy if they take the upsell
        $promo['upget'] = 0;                // this is what they will get if they take the upsell
        $promo['free_prodID'] = 0;        // this is the product they will get for free (future)
        $promo['tracking'] = '';
        // calculate the MAX possible purchase (to know if they got past the highest bonus)
        $sql1 = "select MAX(pur2qual) as 'BUY',free_qty as 'GET' from cclabora_jarvis.sch_sales_tbdata_promotions promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC limit 1";
        $sth1 = $this->consultaBD($sql1, "jarvis");
        $highest = $sth1->fetch_object();
        $sql2 = "select MIN(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotions promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual asc limit 1 ";
        $sth2 = $this->consultaBD($sql2, "jarvis");
        $lowest = $sth2->fetch_object();
        //Al tener mas cantidad de la ultima promocion
        if (!empty($highest) && ($promo['bought']) >= $highest->BUY) {
            $promo['upbuy'] = 0;
            $promo['upget'] = $this->round_down((($promo['bought'] * $highest->GET) / ($highest->BUY)), 0) - $promo['free'];
            if ($display)
                echo "Rule of 'More than MAX purchased retains %' gives you => " . ($promo['buymore'] + $promo['bought']) + $promo['upget'] . "<br>";
            $promo['tracking'] .= 1;
        } elseif (!empty($lowest) && ($promo['bought']) <= $lowest->BUY) {
            $promo['upbuy'] = $lowest->BUY - $promo['buymore'];
            $promo['upget'] = $lowest->GET - 0;
            if ($promo['buymore'] == $lowest->BUY) {
                $promo['getmore'] = $lowest->GET - 0;
            }
            $promo['free_prodID'] = $lowest->free_prodID - 0;
            $promo['tracking'] .= 2;
        } else {
            $sql = "select MAX(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotions promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC ";
            $sth2 = $this->consultaBD($sql, "jarvis");
            $result = $sth2->fetch_object();
            $promo['upbuy'] = !empty($result) ? $result->BUY - $promo['buymore'] : 0;
            if (!empty($result)) {
                $promo['getmore'] = $result->GET - 0;
                $promo['free_prodID'] = $result->free_prodID - 0;
            }
            $promo['tracking'] .= 3;
        }
        if (!empty($highest) && ($promo['bought']) <= $highest->BUY) {
            $sql = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotions promo where ( (prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=" . ($promo['upbuy']) . " order by promo.promo_end DESC,pur2qual DESC";
            if ($display) echo $this->display_db_query($sql . $limit, 1, ' style="text-align: left; width: 50%;" border="1" cellpadding="2" cellspacing="2"');
            $sth2 = $this->consultaBD($sql, "fsql007");
            $result = $sth2->fetch_object();
            if (!empty($result)) {
                if ($promo['tracking'] != 3 and $promo['tracking'] != 2) {
                    $promo['getmore'] = $result->GET - 0;
                    $promo['free_prodID'] = $result->free_prodID - 0;
                }
            }
            $sql1 = "select promoDESC as DESCRIPTION,MIN(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotions promo	where ((prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND (clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . "<promo.pur2qual )) order by promo.promo_end DESC,pur2qual ASC";
            $sth2 = $this->consultaBD($sql1, "jarvis");
            $result1 = $sth2->fetch_object();
            if (($result1->BUY - ($promo['bought'])) > 0) {
                $promo['upsell'] = str_replace("{BUY}", ($bought), "Por la cantidad escogida de {BUY}
			unidades le regalaremos {GET} gratis,<br>
			Pero si usted compra {BUYMORE} unidades mas le regalaremos {GETMORE} unidades mas,
			para un total de {BUY+BUYMORE} unidades con {GET+GETMORE} unidades gratis");
                $promo['upsell'] = str_replace("{GET}", ($promo['getmore']), $promo['upsell']);
                $promo['upsell'] = str_replace("{BUYMORE}", ($result1->BUY - $bought), $promo['upsell']);
                $promo['upsell'] = str_replace("{GETMORE}", ($result1->GET - $bn - $promo['getmore']), $promo['upsell']);
                $promo['upsell'] = str_replace("{BUY+BUYMORE}", ($bought + ($result1->BUY - $bought)), $promo['upsell']);
                $promo['upsell'] = str_replace("{GET+GETMORE}", ($bn + ($result1->GET - $bn)), $promo['upsell']);
                if ($promo['tracking'] != 1 or $promo['tracking'] != 2) {
                    $promo['upbuy'] = ($result1->BUY - $bought);
                    $promo['upget'] = ($result1->GET - $bn);
                }
                $promo['tracking'] .= 5;
            } else {
                $promo['upsell'] = $result1->BUY;
                $promo['tracking'] .= 6;
            }
        } else {
            /*$sql = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotions promo where ( (prodid=". (int)$prodID." or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=". (int)$clieID." or clieID=0) AND (".(int)($promo['buymore']+$promo['bought']).">=promo.pur2qual ))
		    group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=".($promo['upbuy']+$promo['buymore'])." order by promo.promo_end DESC,pur2qual DESC";
            $sth2 =  $this->consultaBD($sql,"jarvis");
            $result = $sth2->fetch_object();
            $promo['getmore'] = $result->GET - 0;
            $promo['free_prodID'] = $result->free_prodID - 0;*/
            //$promo['upsell'] = $promo_no_upsell;
            $promo['tracking'] .= 7;
            //$promo['sql'] = $sql;

        }
        $promo['upbuy'] = !empty($promo['upbuy']) ? abs($promo['upbuy']) : 0;
        return $promo;
    }


    public function pull_promotionscc($prodID = '0', $clieID = '0', $qpurchased = '0', $display = false, $orderID = '0')
    {
        $limit = "";
        $promo = array();
        $limit = "";
        $promo = array();
        $promo_upsell = 'Usted esta comprando un total de {BUYING}, \\n con un BONO de {GETTING}.  \n Si usted compra {BUYMORE} m�s (por un total de {TOTALBUY}), \\npodr� obtener {GETMORE} m�s \\n(por un total de {TOTALGET}) gratis';
        $promo_no_upsell = "�ltimo nivel de promociones";
        $bought = $this->fetch_var("select sum(quantity) as suma from cclabora_jarvis.sch_sales_tbdata_orders where ordID=" . $orderID . " and prodID=" . $prodID . " and disc <> 100");
        $bn = $this->fetch_var("select sum(quantity) as suma from cclabora_jarvis.sch_sales_tbdata_orders where ordID=" . $orderID . " and prodID=" . $prodID . " and type='order' and disc = 100");
        $promo['bought'] = (int)(!empty($bought) ? $bought : 0);  // this is what they already have on the books
        $promo['free'] = (int)(!empty($bn) ? $bn : 0);    // this is the bonuses on the books
        $promo['buymore'] = $qpurchased - 0; // this is what they are buying right now (no upsell)
        $promo['getmore'] = 0;            // this is what they will get right now (no upsell)
        $promo['upbuy'] = 0;                // this is what they will buy if they take the upsell
        $promo['upget'] = 0;                // this is what they will get if they take the upsell
        $promo['free_prodID'] = 0;        // this is the product they will get for free (future)
        $promo['tracking'] = 0;
        // calculate the MAX possible purchase (to know if they got past the highest bonus)
        $ht = $this->consultaBD("select MAX(pur2qual) as 'BUY',free_qty as 'GET' from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC limit 1", "jarvis");
        $highest = $ht->fetch_object();
        // calculate the MIN possible purchase (to know if they get nothing as a bonus)
        $highest_buy = 0;
        $highest_get = 0;
        if (!empty($highest->BUY)) {
            $highest_buy = $highest->BUY;
        }
        if (!empty($highest->GET)) {
            $highest_get = $highest->GET;
        }
        $lo = $this->consultaBD("select MIN(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual asc limit 1 ", "jarvis");
        $lowest = $lo->fetch_object();
        //Al tener mas cantidad de la ultima promocion
        $lowest_buy = 0;
        $lowest_get = 0;
        $lowest_free = 0;
        if (!empty($lowest->BUY)) {
            $lowest_buy = $lowest->BUY;
        }
        if (!empty($lowest->GET)) {
            $lowest_get = $lowest->GET;
        }
        if (!empty($lowest->free_prodID)) {
            $lowest_free = $lowest->free_prodID;
        }
        if (($promo['bought']) >= $highest_buy) {
            $promo['upbuy'] = 0;
            $promo['upget'] = $this->round_down((($promo['bought'] * $highest_get) / ($highest_buy)), 0) - $promo['free'];
            if ($display) echo "Rule of 'More than MAX purchased retains %' gives you => " . ($promo['buymore'] + $promo['bought']) + $promo['upget'] . "<br>";
            $promo['tracking'] .= 1;
            $promo['free_prodID'] = $prodID;
            $promo['highest_get'] = $highest_get;
            $promo['highest_buy'] = $highest_buy;
            $promo['free'] = (int)$qpurchased;
        } elseif (!empty($lowest) && ($promo['bought']) <= $lowest_buy) {
            $promo['upbuy'] = $lowest_buy - $promo['buymore'];
            $promo['upget'] = $lowest_get - 0;
            if ($promo['buymore'] == $lowest_buy) {
                $promo['getmore'] = $lowest_get - 0;
            }
            $promo['free_prodID'] = $lowest_free - 0;
            $promo['tracking'] .= 2;
            //$promo['sql'] = $sql;
        } else {
            $sql = "select MAX(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC ";
            $result = $this->consultaBD($sql, "jarvis")->fetch_object();
            $promo['upbuy'] = !empty($result) ? $result->BUY - $promo['buymore'] : 0;
            $promo['getmore'] = $result->GET - 0;
            $promo['free_prodID'] = $result->free_prodID - 0;
            $promo['tracking'] .= 3;
            $promo['sql'] = $sql;
        }
        if (($promo['bought']) <= $highest_buy) {
            $sql = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ( (prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=" . ($promo['upbuy']) . " order by promo.promo_end DESC,pur2qual DESC";
            if ($display) echo display_db_query($sql . $limit, 1, ' style="text-align: left; width: 50%;" border="1" cellpadding="2" cellspacing="2"');
            $result = $this->consultaBD($sql, "jarvis")->fetch_object();
            if (!empty($result)) {
                if ($promo['tracking'] != 3 and $promo['tracking'] != 2) {
                    $promo['getmore'] = $result->GET - 0;
                    $promo['free_prodID'] = $result->free_prodID - 0;
                    $promo['sql'] = $sql;
                }
            }
            $sql1 = "select promoDESC as DESCRIPTION,MIN(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotionscc promo	where ((prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND (clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . "<promo.pur2qual )) order by promo.promo_end DESC,pur2qual ASC";
            $result1 = $this->consultaBD($sql1, "jarvis")->fetch_object();
            if (!empty($result)) {
                if (($result1->BUY - ($promo['bought'])) > 0) {
                    $promo['upsell'] = str_replace("{BUYMORE}", ($result1->BUY - ($promo['bought'])), "Por la compra de {BUYMORE} unidades mas le regalaremos {GETMORE} gratis");
                    $promo['upsell'] = str_replace("{GETMORE}", ($result1->GET - $promo['free']), $promo['upsell']);
                    if ($promo['tracking'] != 1 or $promo['tracking'] != 2) {
                        $promo['upbuy'] = $result1->BUY - ($promo['bought']);
                        $promo['upget'] = $result1->GET - $promo['free'];
                    }
                    $promo['tracking'] .= 5;
                } else {
                    $promo['upsell'] = $result1->BUY;
                    $promo['tracking'] .= 6;
                }
                $promo['sql'] = $sql;
            }
        } else {
            $sql = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ( (prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['buymore'] + $promo['bought']) . ">=promo.pur2qual ))
		 group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=" . ($promo['upbuy'] + $promo['buymore']) . " order by promo.promo_end DESC,pur2qual DESC";
            $result = $this->consultaBD($sql, "jarvis")->fetch_object();
            if (!empty($result)) {
                $promo['getmore'] = $result->GET - 0;
                $promo['free_prodID'] = $result->free_prodID - 0;
                $promo['upsell'] = $promo_no_upsell;
                $promo['tracking'] .= 7;
                $promo['sql'] = $sql;
            }
        }
        $promo['upbuy'] = !empty($promo['upbuy']) ? abs($promo['upbuy']) : 0;
        return $promo;
    }

    public function pull_promotionscc2($prodID = '0', $clieID = '0', $qpurchased = '0', $display = false, $orderID = '0')
    {
        $limit = "";
        $promo = array();
        $promo_upsell = 'Usted esta comprando un total de {BUYING}, \\n con un BONO de {GETTING}.  \n Si usted compra {BUYMORE} m�s (por un total de {TOTALBUY}), \\npodr� obtener {GETMORE} m�s \\n(por un total de {TOTALGET}) gratis';
        $promo_no_upsell = "�ltimo nivel de promociones";

        $bought = $this->fetch_var("select sum(quantity) from cclabora_jarvis.sch_sales_tbdata_orders where ordID=" . $orderID . " and prodID=" . $prodID . " and disc <> 100");
        $bn = $this->fetch_var("select sum(quantity) from cclabora_jarvis.sch_sales_tbdata_orders where ordID=" . $orderID . " and prodID=" . $prodID . " and type='order' and disc = 100");
        $promo['bought'] = (int)(!empty($bought) ? $bought : 0);  // this is what they already have on the books
        $promo['free'] = (int)(!empty($bn) ? $bn : 0);    // this is the bonuses on the books
        $promo['buymore'] = $qpurchased - 0; // this is what they are buying right now (no upsell)
        $promo['getmore'] = 0;            // this is what they will get right now (no upsell)
        $promo['upbuy'] = 0;                // this is what they will buy if they take the upsell
        $promo['upget'] = 0;                // this is what they will get if they take the upsell
        $promo['free_prodID'] = 0;        // this is the product they will get for free (future)
        $promo['tracking'] = '';
        $sql1 = "select MAX(pur2qual) as 'BUY',free_qty as 'GET' from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC limit 1";
        $sth1 = $this->consultaBD($sql1, "jarvis");
        $highest = $sth1->fetch_object();
        $highest_buy = 0;
        $highest_get = 0;
        if (!empty($highest->BUY)) {
            $highest_buy = $highest->BUY;
        }
        if (!empty($highest->GET)) {
            $highest_get = $highest->GET;
        }

        $sql2 = "select MIN(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) )
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual asc limit 1 ";
        $sth2 = $this->consultaBD($sql2, "jarvis");
        $lowest = $sth2->fetch_object();
        $lowest_buy = 0;
        $lowest_get = 0;
        $lowest_free = 0;
        if (!empty($lowest->BUY)) {
            $lowest_buy = $lowest->BUY;
        }
        if (!empty($lowest->GET)) {
            $lowest_get = $lowest->GET;
        }
        if (!empty($lowest->free_prodID)) {
            $lowest_free = $lowest->free_prodID;
        }

        if (!empty($highest) && ($promo['bought']) >= $highest_buy) {
            $promo['upbuy'] = 0;
            $promo['upget'] = $this->round_down((($promo['bought'] * $highest_get) / ($highest_buy)), 0) - $promo['free'];
            if ($display) echo "Rule of 'More than MAX purchased retains %' gives you => " . ($promo['buymore'] + $promo['bought']) + $promo['upget'] . "<br>";
            $promo['tracking'] .= 1;

        } elseif (!empty($lowest) && ($promo['bought']) <= $lowest_buy) {
            $promo['upbuy'] = $lowest_buy - $promo['buymore'];
            $promo['upget'] = $lowest_get - 0;
            if ($promo['buymore'] == $lowest_buy) {
                $promo['getmore'] = $lowest_get - 0;
            }
            $promo['free_prodID'] = $lowest_free - 0;
            $promo['tracking'] .= 2;
        } else {
            $sql3 = "select MAX(pur2qual) as 'BUY',free_qty as 'GET',free_prodID from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ((prodid=" . (int)$prodID . " or prodID=0)
			AND	((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by promo.pur2qual order by promo.promo_end DESC,pur2qual DESC ";
            $sth3 = $this->consultaBD($sql3, "jarvis");
            if ($sth3->num_rows > 0) {
                $result = $sth3->fetch_object();
                $promo['upbuy'] = !empty($result) ? $result->BUY - $promo['buymore'] : 0;
                $promo['getmore'] = $result->GET - 0;
                $promo['free_prodID'] = $result->free_prodID - 0;
                $promo['tracking'] .= 3;
            }
        }
        if (($promo['bought']) <= $highest_buy) {
            $sql3 = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ( (prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . ">=promo.pur2qual ))
		 group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=" . ($promo['upbuy']) . " order by promo.promo_end DESC,pur2qual DESC";

            if ($display) echo $this->display_db_query($sql3 . $limit, 1, ' style="text-align: left; width: 50%;" border="1" cellpadding="2" cellspacing="2"');
            $sth3 = $this->consultaBD($sql3, "jarvis");
            if ($sth3->num_rows > 0) {
                $result = $sth3->fetch_object();
                if ($promo['tracking'] != 3 and $promo['tracking'] != 2) {
                    $promo['getmore'] = $result->GET - 0;
                    $promo['free_prodID'] = $result->free_prodID - 0;
                }
            }
            $sql1 = "select promoDESC as DESCRIPTION,MIN(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotionscc promo	where ((prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND (clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['bought']) . "<promo.pur2qual )) order by promo.promo_end DESC,pur2qual ASC";
            $sth = $this->consultaBD($sql1, "fsql007");
            if ($sth->num_rows > 0) {
                $result1 = $sth->fetch_object();
                if (($result1->BUY - ($promo['bought'])) > 0) {
                    $promo['upsell'] = str_replace("{BUYMORE}", ($result1->BUY - ($promo['bought'])), "Por la compra de {BUYMORE} unidades mas le regalaremos {GETMORE} gratis");
                    $promo['upsell'] = str_replace("{GETMORE}", ($result1->GET - $promo['free']), $promo['upsell']);
                    if ($promo['tracking'] != 1 or $promo['tracking'] != 2) {
                        $promo['upbuy'] = $result1->BUY - ($promo['bought']);
                        $promo['upget'] = $result1->GET - $promo['free'];
                    }
                    $promo['tracking'] .= 5;
                } else {
                    $promo['upsell'] = $result1->BUY;
                    $promo['tracking'] .= 6;
                }
            }
        } else {
            $sql = "select promo.prodID, promoDESC as DESCRIPTION,MAX(pur2qual) as 'BUY',(select prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.prodID) as 'PRODUCT',
			promo.free_prodID,free_qty as 'GET',(select  prodDESCRIPCION from cclabora_fsql007.productos p where p.prodID=promo.free_prodID) as 'FREE',promo_start as 'FROM',promo_end as 'TO'
			from cclabora_jarvis.sch_sales_tbdata_promotionscc promo where ( (prodid=" . (int)$prodID . " or prodID=0) AND ((NOW() BETWEEN promo.promo_start AND promo.promo_end) OR promo.promo_end is null)
			AND	(clieID=" . (int)$clieID . " or clieID=0) AND (" . (int)($promo['buymore'] + $promo['bought']) . ">=promo.pur2qual ))
		 group by PRODUCT,FREE,promo.pur2qual,promo.clieID HAVING BUY=" . ($promo['upbuy'] + $promo['buymore']) . " order by promo.promo_end DESC,pur2qual DESC";
            $sth = $this->consultaBD($sql, "fsql007");
            if ($sth->num_rows > 0) {
                $result = $sth->fetch_object();
                $promo['getmore'] = $result->GET - 0;
                $promo['free_prodID'] = $result->free_prodID - 0;
                $promo['upsell'] = $promo_no_upsell;
                $promo['tracking'] .= 7;
            }
        }
        $promo['upbuy'] = !empty($promo['upbuy']) ? abs($promo['upbuy']) : 0;
        return $promo;
    }


    public function get_prod_desc_list()
    {
        $sql = "select prodID,prodDESCRIPCION from cclabora_fsql007.productos";
        return $sql;
    }

    public function get_prod_id_by_name($prodName)
    {
        $sql = "select prodID from cclabora_fsql007.productos where prodDESCRIPCION='$prodName'";
        return $this->fetch_var($sql);
    }

    public function get_prod_id_by_code($prodCode)
    {
        $sql = "select prodID from cclabora_fsql007.productos where prodCODIGO='$prodCode'";

        $sth = $this->consultaBD($sql, "fsql007");
        return $arrValues = $sth->fetch_all();
    }

    public function get_prod_id_by_codeObj($prodCode)
    {

        $sql = "select prodID from cclabora_fsql007.productos where prodCODIGO like '%$prodCode%'";
        //print_r($sql."<br>");
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1($sql, $jarvisConex);
        $jarvisConex->close();
        if ($sth->num_rows > 0) {
            return $arrValues = $sth->fetch_object();
        } else {
            return 0;
        }

    }

    public function get_prov_id_by_nombre($provNombre)
    {
        $sql = "select provID from cclabora_jarvis.sch_mrp_tbdata_prov where provRSOCIAL='" . $provNombre . "'";
        //print_r($sql."<br>");
        $sth = $this->consultaBD($sql, "jarvis");
        //print_r($sth);
        //echo "<br>";
        return $arrValues = $sth->fetch_object();
    }

    public function fetch_var($sql)
    {

        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1($sql, $jarvisConex);

        if (is_object($sth)) {
            if ($sth->num_rows > 0) {

                $result = $sth->fetch_object();
                $jarvisConex->close();
                if (isset($result->DM)) {
                    return $result->DM;
                } else if (isset($result->cant)) {
                    return $result->cant;
                } else if (isset($result->cost)) {
                    return $result->cost;
                } else if (isset($result->costo_oficial)) {
                    return $result->costo_oficial;
                } else if (isset($result->suma)) {

                    return $result->suma;
                } else if (isset($result->stocksCOSTO)) {

                    return $result->stocksCOSTO;
                }
            } else {
                $jarvisConex->close();
                return 0;
            }
        } else {
            $jarvisConex->close();
            return 0;
        }
    }

    public function dimeUbicacionLote($id_lote, $tipo)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        if ($tipo == 1) {
            $lote = $this->consultaBD1('select ubicacion_lotes as ubicacion from cclabora_jarvis.sch_mrp_tbdata_lotes_oc where id_lotes_oc="' . trim($id_lote) . '"', $jarvisConex)->fetch_object();
        } else if ($tipo == 2) {
            $lote = $this->consultaBD1('select ubicacion_loteinv as ubicacion from cclabora_jarvis.sch_mrp_tbdata_lotes_inventario where id_lote_inv="' . trim($id_lote) . '"', $jarvisConex)->fetch_object();
        } else if ($tipo == 3) {
            $lote = $this->consultaBD1('select observacion_loteop as ubicacion from cclabora_jarvis.sch_prod_tbdata_bultos_op where id_bultos_op="' . trim($id_lote) . '"', $jarvisConex)->fetch_object();
        }
        $sth_ubicacion = $this->consultaBD('select r.*,b.nombre_bodega,f.nombre_fila_bodega from cclabora_jarvis.sch_mrp_tbdata_rack_bodega r join cclabora_jarvis.sch_mrp_tbdata_filas_bodega f on r.id_fila_bodega=f.id_fila_bodega join cclabora_jarvis.sch_mrp_tbdata_bodegas b on  f.id_bodega=b.id_bodega where id_rack_bodega="' . trim($lote->ubicacion) . '" ', 'jarvis');
        $ubicacion = array();
        if ($sth_ubicacion->num_rows > 0) {
            $result_ubiacion = $sth_ubicacion->fetch_object();
            $ubicacion[0] = 1;
            $ubicacion[1] = 'Ubicado en el Pallet: ' . $result_ubiacion->codigo_rack_bodega . ' <br> Nivel: ' . $result_ubiacion->nivel_rack_bodega . ' <br> De la Fila: ' . $result_ubiacion->nombre_fila_bodega . ' <br> En la Bodega : ' . $result_ubiacion->nombre_bodega;

        } else {
            $ubicacion[0] = 0;
            $ubicacion[1] = 'Ubicaci&oacute;n No Valida';
        }
        $jarvisConex->close();
        return $ubicacion;
    }

    public function get_accterid_by_decription($description)
    {
        $sql = "select accionterapeuticaID from cclabora_jarvis.sch_admin_tbdata_accionterapeutica where description='$description'";
        return $this->fetch_var($sql);
    }

    public function get_rutaid_by_decription($description, $atcID)
    {
        $sql = "select idsch_sales_tbdata_ruta from cclabora_jarvis.sch_sales_tbdata_ruta where RutaDescripcion='$description' and IdATC = '$atcID'";
        $sth = $this->consultaBD($sql, "fsql007");
        return $arrValues = $sth->fetch_object();
    }

    public function get_segid_by_decription($description)
    {
        IF ($description == '0') {
            return 4;
        } else {
            $sql = "select groupprodID from cclabora_jarvis.sch_mrp_tbdata_groupprod where description='$description'";
            return $this->fetch_var($sql);
        }
    }

    public function get_forfarid_by_decription($description)
    {
        $sql = "select formafarmaID from cclabora_jarvis.sch_admin_tbdata_formafarma where description='$description'";
        //print_r($sql);
        return $this->fetch_var($sql);

    }

    public function display_db_query_ped($query_string, $header_bool, $table_params, $TR_head_params = '', $TR_table_params = '', $TD_table_params = '', $check_box = '')
    {
        $porVencer = 0;
        $vencido = 0;
        $TH_table_params = '';
        if ($TR_table_params == "colors") $TR_table_colors = true; else $TR_table_colors = false;
        $sth = $this->consultaBD($query_string, 'fsql007');
        $sth1 = $this->consultaBD($query_string, 'fsql007');
        $column_count = $sth->field_count;
        $output = "<TABLE table table-bordered table-hover table-condensed " . $table_params . ">";
        //$totalvencido=0;$totalvencido=0;
        global $totalvencido;
        global $totalxvencer;
        $totalvencido = 0;
        while ($result1 = $sth1->fetch_object()) {

            if (($result1->DIAS > 0) and ($result1->VENCIDO > 0)) {
                $totalxvencer += $result1->VENCIDO;
            }

            if (($result1->DIAS < 0) and ($result1->VENCIDO > 0)) {
                $totalvencido += $result1->VENCIDO;
            }
        }
        $vencido = 0;
        while ($result = $sth->fetch_object()) {
            $ban = 0;
            if ($header_bool) {
                $res = (array)$result;
                $header_line = ("<TR $TR_head_params>");
                $headers = array_keys($res);
                for ($column_num = 0; $column_num < $column_count; $column_num++) {
                    $field_name = $headers[$column_num];
                    $header_line .= ("<TH $TH_table_params>$field_name</TH>");
                }
                if ($check_box) {
                    global $delete;
                    $header_line .= "<TH $TH_table_params>" . strtoupper($delete) . "</TH>";
                }
                $header_line .= ("</TR>");
                $output .= $header_line;
            }
            if (is_array($TR_table_params)) {
                $TR_table_parms = implode(" ", $TR_table_params);
            }

            $x = 0;

            $output .= ("<TR  $TR_table_params >");

            foreach ($result as $key => $arr) {
                $PASO1 = 0;
                $PASO2 = 0;
                if ($TR_table_colors) {
                    $TR_table_params = 'class="' . ($key % 2 <> 0 ? 'cclabsgraybackground' : 'cclabswhiteBackground') . '"';
                }
                if ($arr == -0.00) {
                    $arr = 0.00;
                }
                if ($key == "DIAS") {
                    if ($arr < 0) {
                        $PASO1 = 1;
                    }
                }

                if ($key == "VENCIDO") {

                    if ($arr > 0) {
                        $ban = 1;
                        $vencido = $vencido + $arr;
                    }
                    if ($arr == 0) {
                        $PASO2 = 1;
                    }
                    if (($arr > 0) and ($result->DIAS > 0)) {
                        $arr = 0.00;
                    }
                }
                if ($key == "TOTAL") {
                    $porVencer = $porVencer + $arr;
                }

                if ($key == "DIAS") {
                    if ($arr < 0) {
                        if ($ban == 1) {
                            $dias = ($arr * -1);
                            $output .= "<TD $TD_table_params>$dias</TD>";
                        } else {
                            //$output .= "<TD $TD_table_params>$arr</TD>";
                            $output .= "<TD $TD_table_params>PAGADO</TD>";
                        }
                    } else {
                        $output .= "<TD $TD_table_params>$arr</TD>";
                    }
                } else {
                    $output .= "<TD $TD_table_params>$arr</TD>";
                }
                $x++;
            }
            flush();

        }
        $output .= ("</TR>");
        $output .= ("</TABLE>");
        $resultado = array();
        $resultado[0] = $output;
        $resultado[1] = $totalxvencer;
        $resultado[2] = $totalvencido;
        return $resultado;
    }


    function display_db_query($query_string, $header_bool, $table_params, $TR_head_params = '', $TR_table_params = '', $TD_table_params = '', $check_box = '')
    {
        $TH_table_params = '';
        if ($TR_table_params == "colors") $TR_table_colors = true; else $TR_table_colors = false;
        $sth2 = $this->consultaBD($query_string, 'jarvis');
        if ($sth2->num_rows > 0) {
            $valoresH = array_keys($sth2->fetch_assoc());
        } else {
            $valoresH = array_keys($sth2->fetch_all());
        }
        $sth = $this->consultaBD($query_string, 'jarvis');
        $column_count = $sth->field_count;
        $output = "<TABLE table table-bordered table-hover table-condensed $table_params>";
        while ($result = $sth->fetch_all()) {
            if ($header_bool) {
                $header_line = ("<TR $TR_head_params>");
                $headers = array_keys(current($result));
                for ($column_num = 0; $column_num < $column_count; $column_num++) {
                    $field_name = $valoresH[$column_num];
                    $header_line .= ("<TH $TH_table_params>$field_name</TH>");
                }
                if ($check_box) {
                    //global $delete;
                    $delete = "Borrar";
                    $header_line .= "<TH $TH_table_params>" . strtoupper($delete) . "</TH>";
                }
                $header_line .= ("</TR>");
                $output .= $header_line;
            }
            if (is_array($TR_table_params)) {
                $TR_table_parms = implode(" ", $TR_table_params);
            }
            $x = 0;
            foreach ($result as $key => $arr) {
                if ($TR_table_colors) $TR_table_params = 'class="' . ($key % 2 <> 0 ? 'cclabsgraybackground' : 'cclabswhiteBackground') . '"';
                $output .= ("<TR  $TR_table_params >");
                foreach ($arr as $key2 => $value) {
                    $output .= "<TD $TD_table_params>$value</TD>";
                }
                if ($check_box == "backorder") {
                    $output .= '<TD $TD_table_params><center><input type="checkbox" onclick="delete_backorder(this.value)" id="checkbox[' . $key . ']" name="checkbox[' . $key . ']" value="' . $arr['NUMERO_PEDIDO'] . "|" . $arr['NUMERO_LINEA'] . '" /></center></TD>';
                } else {
                    $codigo = "";
                    if (isset($arr['Codigo'])) {
                        $codigo = $arr['Codigo'];
                    }
                    $output .= '<TD $TD_table_params><center><input type="checkbox" onclick="delete_item(this.value)" id="checkbox[' . $key . ']" name="checkbox[' . $key . ']" value="' . $codigo . '" /></center></TD>';
                }
                $output .= ("</TR>");
                $x++;
            }
            //flush();
        }
        $output .= ("</TABLE>");
        return $output;
    }


    public function rpt_PedidosPendientesFacturarClie($clieID = '', $toVEND_D = '1', $toVEND_H = '99999999', $toDESDE = "2014-01-01", $toHASTA = '', $toCLIENTED = '', $toCLIENTEH = '', $toALMACEN = '')
    {
        $toclieID = $clieID ? " and a.clieID = $clieID" : '';
        $toHASTA = $toHASTA ? $toHASTA : date("Y-m-d", strtotime("-1 day"));
        $sql = "SELECT a.pedidoNUMERO AS PEDIDO, a.pedidoFECHA AS FECHA, CASE a.pedidoESTATUS WHEN 'R' THEN 'INGRESADO' WHEN 'P' THEN 'APROBADO'
              END AS ESTADO_PEDIDO FROM cclabora_fsql007.NotasPedidoClientes a WHERE a.pedidoTIPO = 'P' AND a.fgralID BETWEEN '$toVEND_D' AND '$toVEND_H'
              AND a.pedidoFECHA BETWEEN '$toDESDE' AND '$toHASTA' AND (a.pedidoESTATUS = 'R' OR a.pedidoESTATUS = 'P') $toclieID  GROUP BY a.pedidoNUMERO ORDER BY 1; ";

        return $sql;
    }

    public function display_db_query_ped_pen($query_string, $header_bool, $table_params, $TR_head_params = '', $TR_table_params = '', $TD_table_params = '', $check_box = '')
    {
        $TH_table_params = '';
        if ($TR_table_params == "colors") $TR_table_colors = true; else $TR_table_colors = false;
        $sth = $this->consultaBD($query_string, 'fsql007');
        $column_count = $sth->field_count;
        $output = "<TABLE table table-bordered table-hover table-condensed " . $table_params . ">";
        if ($sth->num_rows > 0) {
            $valoresH = array_keys($sth->fetch_assoc());
        } else {
            $valoresH = array_keys($sth->fetch_all());
        }
        while ($result = $sth->fetch_all()) {
            //print_r($result);
            if ($header_bool) {
                $header_line = ("<TR $TR_head_params>");
                $headers = array_keys(current($result));
                // print_r($headers);
                for ($column_num = 0; $column_num < $column_count; $column_num++) {
                    //echo  count($headers)." - ".$column_num."-".$headers[$column_num]."<br>";
                    //$field_name = $headers[$column_num];
                    $header_line .= ("<TH $TH_table_params>$valoresH[$column_num]</TH>");
                }
                if ($check_box) {
                    global $delete;
                    $header_line .= "<TH $TH_table_params>" . strtoupper($delete) . "</TH>";
                }
                $header_line .= ("</TR>");
                $output .= $header_line;
            }
            if (is_array($TR_table_params)) {
                $TR_table_parms = implode(" ", $TR_table_params);
            }
            $x = 0;

            foreach ($result as $key => $arr) {
                if ($TR_table_colors) $TR_table_params = 'class="' . ($key % 2 <> 0 ? 'cclabsgraybackground' : 'cclabswhiteBackground') . '"';
                $output .= ("<TR  $TR_table_params >");

                foreach ($arr as $key2 => $value) {

                    $output .= "<TD $TD_table_params>$value</TD>";
                    if ($key2 == "PEDIDO") {
                        $NoPedido = $value;
                    }

                }
                $val = strstr($NoPedido, 'PED');
                if (empty($val)) {

                    $sth = $this->consultaBD("SELECT pedidosJira FROM cclabora_jarvis.sch_sales_tbdata_firesoftjira_ped where pedidosFiresoft = '$NoPedido'", 'jarvis');
                    $num_fields = $sth->field_count;
                    $result = $sth->fetch_object();
                    $nro_pedido = 0;
                    if (!empty($result->pedidosJira)) {
                        $nro_pedido = $result->pedidosJira;
                    }
                    if ($check_box == "backorder") {
                        $output .= '<TD $TD_table_params><center><input type="checkbox" onclick="delete_backorder(this.value)" id="checkbox[' . $key . ']" name="checkbox[' . $key . ']" value="' . $arr['NUMERO_PEDIDO'] . "|" . $arr['NUMERO_LINEA'] . '" /></center></TD>';
                    } else {
                        $output .= '<TD $TD_table_params><center><button class="btn btn-info btn-sm" type="button"  onclick="irjira(this.value)" name="" value="' . $nro_pedido . '">Jira</button></center></TD>';
                    }
                }
                $output .= ("</TR>");
                $x++;
            }

            flush();
        }
        $output .= ("</TABLE>");

        return $output;
    }

    public function validaVacio($var)
    {
        if (empty($var)) {
            $res = "No tiene registrado";
        } else {
            $res = $var;
        }
        return $res;
    }

    public function dimeProveedor($id)
    {
        $sth = $this->consultaBD('select * from cclabora_jarvis.sch_mrp_tbdata_prov where provID="' . trim($id) . '"', 'jarvis');
        if ($sth->num_rows > 0) {
            $res = $sth->fetch_object();
        } else {
            $res = $sth->num_rows;
        }
        return $res;
    }

    public function dimeProducto($id)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1('select * from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em em on p.prodID = em.prodID where p.prodID like "' . trim($id) . '"', $jarvisConex);
        //print_r('select * from cclabora_fsql007.productos p join cclabora_jarvis.sch_mrp_tbdata_em em on p.prodID = em.prodID where p.prodID="'.trim($id).'"');
        $jarvisConex->close();
        if ($sth->num_rows > 0) {
            $res = $sth->fetch_object();
        } else {
            $res = $sth->num_rows;
        }
        return $res;
    }

    public function dimeProductoByCodigo($id)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1('select * from cclabora_fsql007.productos where prodCODIGO like "%' . trim($id) . '%"', $jarvisConex);
        //PRINT_R('select * from cclabora_fsql007.productos where prodCODIGO like "%'.trim($id).'%"');
        $jarvisConex->close();
        if ($sth->num_rows > 0) {
            $res = $sth->fetch_object();
        } else {
            $res = $sth->num_rows;
        }
        return $res;
    }

    public function dimeConfig($var, $tabla)
    {

        if ($tabla == 'jiraticketdescription') {
            $query = $this->consultaBD("select * from cclabora_jarvis.sch_admin_tbdata_$tabla tb where tb.nombre='$var'", 'jarvis');
            $row = $query->fetch_object();
            return $row->Descr;
        } elseif ($tabla == 'jirauser') {
            $query = $this->consultaBD("select * from cclabora_jarvis.sch_admin_tbdata_$tabla tb where tb.id='$var'", 'jarvis');
            $row = $query->fetch_object();
            return $row;
        } elseif ($tabla == 'jarvisconfig') {
            $query = $this->consultaBD("select * from cclabora_jarvis.sch_admin_tbdata_$tabla tb where tb.nombre_jconfig='$var'", 'jarvis');
            $row = $query->fetch_object();
            return $row->descripcion_jconfig;
        } else if ($tabla == 'projectsjira') {
            $query = $this->consultaBD("select * from cclabora_jarvis.sch_admin_tbdata_$tabla tb where tb.projectsJiraDESCRIPCION='$var'", 'jarvis');
            $row = $query->fetch_object();
            return $row;
        }
    }

    public function login_check($jarvis = '')
    {
        if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
            $user_id = $_SESSION['user_id'];
            $login_string = $_SESSION['login_string'];
            $username = $_SESSION['username'];
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $sth = $this->consultaBD("SELECT m.password,m.session_id FROM secure_login.members m   WHERE m.id = '$user_id' LIMIT 1", 'jarvis');
            $result = $sth->fetch_object();
            $password = $result->password;
            $session = !empty($_COOKIE['sec_session_id']) && $_COOKIE['sec_session_id'] == $result->session_id ? true : false;
            $login_check = hash('sha512', $password . $user_browser);
            if ($login_check == $login_string) {
                return true;
            } else {
                return false;
            }
            if (!$password) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isWeekend($date)
    {
        return (date('N', strtotime($date)) >= 6);
    }

    public function get_list_product_price($prodID)
    {
        $sql = "select s.stocksPVP1 as price from cclabora_fsql007.stocks s where s.prodID = " . $prodID . " and almacenID = 8";
        return $this->fetch_var($sql);
    }

    function get_dm_from_prodCODIGO($prodCODIGO)
    {
        //$this->check_dm_report();
        $jarvisConex = $this->abrirconexion('jarvis');
        // print_r("SELECT sum(CANTIDAD)/3 as DM FROM cclabora_jarvis.sch_mrp_tbdata_dmtable where CODIGO_PRODUCTO = '$prodCODIGO'<br>");
        $valor = $this->consultaBD1("SELECT sum(CANTIDAD)/3 as DM FROM cclabora_jarvis.sch_mrp_tbdata_dmtable where CODIGO_PRODUCTO = '$prodCODIGO'", $jarvisConex);
        $jarvisConex->close();
        if (is_object($valor)) {
            $dm = $valor->fetch_object();

            return $dm->DM;
        } else {
            return 0;
        }


    }

    public function get_prod_name_from_id($prodID)
    {
        $sql = "select prodDESCRIPCION from cclabora_fsql007.productos where prodID=$prodID";
        return $this->fetch_var($sql);
    }

    public function get_OC_data_from_online($OC)
    {
        require_once('restrequest.php');
        $request = new RestRequest;
        $request->openConnect('http://www.cclaboratorios.com/sitio/jarvis/api.php?OC=' . $OC);
        $request->execute();
        return $request;
    }

    public function Email_to_jarvisID($email)
    {
        $sql = "select id from cclabora_jarvis.sch_securelogin_tbdata_members where email = '$email'";
        return $this->fetch_var($sql);
    }

    public function get_cost_from_code($active_code)
    {
        return $this->get_cost('d.prodCODIGO', $active_code);
    }

    public function get_COSTO_PA($active_prodID)
    {
        $sql = "select stocksCOSTO FROM cclabora_fsql007.stocks WHERE almacenID='8' and prodID=$active_prodID";
        $costo = $this->consultaBD($sql, 'jarvis')->fetch_object();
        if (is_object($costo)) {
            return $costo->stocksCOSTO;
        } else {
            return 0;
        }
    }

    public function check_dm_report($em = '')
    {
        $sql = "SELECT TIMESTAMPDIFF(
			MICROSECOND , (
			SELECT MAX( time )
			FROM cclabora_jarvis.sch_mrp_tbdata_dmtable ) , NOW( )
			) ;";
        $dmtime = $this->fetch_var($sql);
        //  print_r($dmtime);
        if ($dmtime >= 6000000000 || ($dmtime == '') || ($dmtime == 0)) {
            //	echo "got here <br>";
            $this->rpt_EstadisticasVentasLinea($em, '', '', '', 3, array("09", 11), true);
        }
        return true;
    }

    /*public function get_dm_from_prodCODIGO($prodCODIGO)
    {
        $this->check_dm_report();
        $sql = $this->consultaBD("SELECT sum(CANTIDAD)/3 as DM FROM cclabora_jarvis.sch_mrp_tbdata_dmtable where CODIGO_PRODUCTO = '$prodCODIGO'","fsql007");
        return $sql->fetch_object();
    }*/

    public function get_slider()
    {
        $sql = $this->consultaBD("select value from cclabora_jarvis.sch_sales_tbdata_general where title = 'PPto'", "fsql007");
        $result = $sql->fetch_object();
        return $result->value;
    }

    public function get_prod_code_from_id($prodID)
    {
        $sql = "select prodCODIGO from cclabora_fsql007.productos where prodID=$prodID";
        $sth = $this->consultaBD($sql, "fsql007");
        $result = $sth->fetch_object();
        return $result->prodCODIGO;
    }

    public function pull_IGS($active_ingID, $start_date = '', $end_date = '', $cantdiv = 3)
    {

        $IGS = array();
        $sql = "SELECT prodCODIGO,prodDESCRIPCION, em2.cant as cant,dr,em.costorder from cclabora_fsql007.productos p
		INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em2 em2 ON em2.prodID = p.prodID
		INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON p.prodID = em.prodID WHERE em2.ing = '$active_ingID'";
        $sth = $this->consultaBD($sql, 'fsql007');
        $IGS['DM'] = "";
        while ($result = $sth->fetch_object()) {
            $IGS['DM'] += $this->get_dm_from_prodCODIGO($result->prodCODIGO) * $result->cant;
        }
        $sql = "SELECT prodCODIGO,em.dr,em.costorder from cclabora_fsql007.productos p
		INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON p.prodID = em.prodID WHERE em.prodID = '$active_ingID'";
        $sth = $this->consultaBD($sql, 'fsql007');
        $result = $sth->fetch_object();
        $IGS['dr'] = $result->dr;
        $active_costorder = $result->costorder;
        $costo = $this->get_cost_from_code($result->prodCODIGO);
        $IGS['Dd'] = $IGS['DM'] / 30;
        $IGS['SS'] = $IGS['Dd'] * $IGS['dr'];
        $IGS['PP'] = $IGS['SS'] + ($IGS['dr'] * $IGS['Dd']);
        $IGS['LE'] = 6.8 * $IGS['Dd'] * 2 / 0.0028;
        $IGS['LE'] = sqrt($IGS['LE']);
        if ((0.25 * $costo) == 0) {
            $IGS['EOQ'] = 0;
        } else {
            $IGS['EOQ'] = sqrt((2 * $IGS['DM'] * $active_costorder) / (0.25 * $costo));
        }
        $IGS['DM'] = round($IGS['DM'], 2, PHP_ROUND_HALF_UP);
        $IGS['Dd'] = round($IGS['Dd'], 0, PHP_ROUND_HALF_UP);
        $IGS['SS'] = round($IGS['SS'], 0, PHP_ROUND_HALF_UP);
        $IGS['PP'] = round($IGS['PP'], 0, PHP_ROUND_HALF_UP);
        $IGS['LE'] = round($IGS['LE'], 0, PHP_ROUND_HALF_UP);
        $IGS['EOQ'] = round($IGS['EOQ'], 0, PHP_ROUND_HALF_UP);
        return $IGS;
    }

    public function pull_IGSPA($active_ingID, $start_date = '', $end_date = '', $cantdiv = 3)
    {

        $DM = 0;
        $DM += $this->get_dm_from_prodCODIGO($active_ingID);

        return $DM;
    }

    public function pull_IGSf($prodID)
    {
        $IGS = $this->pull_IGS($prodID);
        $failedsql = "select FECHA from cclabora_jarvis.sch_mrp_tbdata_rptkardexinv where CODIGO LIKE '%" . $this->get_prod_code_from_id($prodID) . "%'  and SALDO_CANTIDAD > " . $IGS['PP'] . " order by FECHA DESC,NUMERO DESC LIMIT 1";
        $failed = $this->fetch_var($failedsql);
        return $this->pull_IGS($prodID, $failed);
    }

    public function translate($nombre)
    {

        $query = $this->consultaBD("select * from cclabora_jarvis.sch_admin_tbdata_translate where translateNOMBRE='" . $nombre . "'", "jarvis");
        $result = 0;
        if ($query->num_rows > 0) {
            $row = $query->fetch_object();
            $result = $row->translateDESCRIPCION;
        }
        return $result;
    }

    function get_emp_name($empID)
    {
        $sql = "select concat(emplAPELLIDOS,' ',emplNOMBRES) as NAME from cclabora_fsql007.empleados where emplID = $empID";
        return $sql;
    }

    function kmm($mileage, $format_in, $format_out)
    {
        if ($format_in == $this->translate('mv_meter_km') && $format_out == $this->translate('mv_meter_miles')) {
            $mileage = $mileage * 0.621371192;
        }
        if ($format_in == $this->translate('mv_meter_miles') && $format_out == $this->translate('mv_meter_km')) {
            $mileage = $mileage * 1.609344;
        }
        return round($mileage);
    }

    function time_renew_to_word($word)
    {
        $mv_time = explode(",", $this->translate('mv_time'));
        switch ($word) {
            Case $mv_time[5]:
                $timeword = "years";
                break;
            Case $mv_time[3]:
                $timeword = "months";
                break;
            Case $mv_time[0]:
                $timeword = "days";
                break;
            Case $mv_time[1]:
                $timeword = "hours";
                break;
            Case $mv_time[2]:
                $timeword = "minutes";
                break;
            Case $mv_time[4]:
                $timeword = "seconds";
                break;
        }
        return $timeword;
    }

    public function ugly($desc, $type = 1)
    {
        $ugly = '';
        if ($type == 1) {
            $ugly = str_replace(".", "_", $desc);
            $ugly = str_replace(" ", "_", $ugly);
        }
        if ($type == 2) {
            $ugly = str_replace("__", "._", $desc);
            $ugly = str_replace("_", " ", $ugly);
        }
        return $ugly;
    }

    public function flush_it($str = '', $add_date = 0)
    {
        //echo $str . " ";
        echo ($add_date ? date('H:i:s') . ' ' : '') . Encoding::toUTF8($str);
        echo str_repeat(" ", 16 * 1024), "\n";
        flush();
        set_time_limit(150);
    }

    public function can_produce($prodID, $to_produce, $checked, $db, $jarvis)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $can_produce = array('can_produce' => true);
        $demand = 0;
        // calculate if it is POSSIBLE to create this - turn the line RED if not enough stock on hand

        // read the formula of this product
        $sth = $this->consultaBD1("select ing,cant from cclabora_jarvis.sch_mrp_tbdata_em2 where prodID = $prodID", $jarvisConex);
        while ($result = $sth->fetch_object()) {
            $make_one = $result->cant;
            $demand = 0;
            $ing = $result->ing;
            //	echo "we need $make_one of the ingredient $ing to make one<br>we want to make $to_produce so we need " . $to_produce * $make_one . " to complete the order";
            //NOV 11, 2014 Carlos says this is wrong now and wants B16 out of the calculations
            // $sql2 .= "and (a.almacenCODIGO = '16' or almacenCODIGO='03' or almacenCODIGO='04') ";
            // so, taking it back out (as it was originally......)
            $result2 = $this->consultaBD1($this->in_stock($ing, "(almacenCODIGO='03' or almacenCODIGO='04' or almacenCODIGO='80')"), $jarvisConex)->fetch_object();

            $in_stock = $result2->cant;
            $fail = false;
            $add_2_fail = $this->consultaBD1("select dm from $db.sch_mrp_tbdata_demandvrfq where prodID=$ing", $jarvisConex);
            if ($add_2_fail->num_rows > 0) {
                $result_demand = $add_2_fail->fetch_object();
                $in_stock -= $result_demand->dm;
            }

            // check quantity on hand against the TO_PRODUCE * what is needed for the product

            if (($to_produce * $make_one) > $in_stock) {
                $can_produce['can_produce'] = false;
                $can_produce[$ing] = ($to_produce * $make_one) - $in_stock;
                $fail = true;
            }
            // see if it is checked - if so, then add that demand to the table
            if ($checked) {
                if ($can_produce['can_produce'] == true) {
                    // add it to the working database for products
                    $sql = "insert into $db.sch_mrp_tbdata_demandvrfq (prodID,dm) VALUES (" . $ing . ",dm + ($to_produce * $make_one))
				ON DUPLICATE KEY UPDATE dm = dm+($to_produce * $make_one);";
                    //print_r($sql);
                    $jarvis->getConnection()->prepare($sql)->execute();
                }
            }

            if ($checked || $fail) {
                // add it to the FAILED database for later RFQ
                $sql = "insert into $db.sch_mrp_tbdata_demandvrfq (prodID,fail) VALUES ($ing,fail + ($to_produce * $make_one))
			ON DUPLICATE KEY UPDATE fail = fail+($to_produce * $make_one);";
                $jarvis->getConnection()->prepare($sql)->execute();
            }
        }
        $jarvisConex->close();
        return $can_produce;
    }

    public function paint_tablePA($table, $onclick = '')
    {
        uksort($table, 'strnatcmp');
        //	print_r($table);echo "<br>";
        $x = 0;
        $tabla = '';
        foreach ($table as $key => $value) {
            $class = 'class="' . $value['style'] . " " . ($x % 2 == 0 ? 'cclabswhiteBackground' : '') . '"';
            //echo "class  is $class<br>";
            $tabla .= "<tr id='" . $x . "' " . $class . ">
                            <td><a  href='../logistica/productoacabado/post?codigo=" . trim($value['code']) . "' target='_blank'>" . $value['code'] . '</a></td>
                            <td>' . $key . $value['BCPA'] . '</td>
                            <td align="left">' . $value['tooltipTD'] . '</td>
                            <td>' . $value['active_le'] . '</td>
                            <td><select onchange="submit()" name="' . $key . '|lotes">' . $value['lote_options'] . '</select></td>
                            <td>' . $value['to_produce'] . '</td>' . $value['rfp_data'] . '
                            <td>
                                <input type="checkbox" ' . $onclick . ' name="' . $key . '" ' . $value['checked'] . '>
                                <input type="hidden" name="' . $key . '|prodID" value="' . $value['prodID'] . '">
                                <input type="hidden" name="' . $key . '|value" value="' . $value['to_produce'] . '">
                                <input type="hidden" name="id' . $x . '" value="' . $x . '">
                            </td>
                       </tr>';
            $x++;
        }

        return $tabla;
    }

    public function do_reportePA($em, $type, $output = '', $mp = '', $debug = '', $start_date = '', $end_date = '', $start_year = '', $end_year = '')
    {
        // type FC is for 'ForeCast' to use as a Logistica Simulator for PA
        // when used, it requires a start and end month (from day 1 of start to 'last day' of end)
        // AND start_year/end_year (optional as we will default to 'this year', but if it breaks a year, MUST have it!)
        // and pulls DM from the sales.forecast table instead of the regular DM table
        // - otherwise, it follows PA type reporting
        // type MPto is for 'Forecast' with MP for the Logistica Simulator
        // pull DM From the sales.forecast table and follow MP reporting, putting all the data into mrp.mpto instead of mrp.mp
        $RFP = array();
        set_time_limit(160);
        $valores = array();
        $jarvisConex = $this->abrirconexion('jarvis');
        $active_code = '';
        $active_desc = '';
        $active_prodID = '';
        $active_dr = '';
        $active_le = '';
        $active_presentacion = '';
        $onclick = '';
        $canpro = 0;
        $table = "";
        $checked = '';
        $ONPAGE = '0';
        $CLICKED = '0';
        $total1 = '0';
        $total2 = '0';
        $total3 = '0';
        $total4 = '0';
        $total5 = '0';
        $total6 = '0';
        $clicked1 = '0';
        $clicked2 = '0';
        $clicked3 = '0';
        $clicked4 = '0';
        $clicked5 = '0';
        $clicked6 = '0';
        $bodega16 = 0;
        $DMto = 0;
        $almacenes = '';
        // delete and make a temp table for counting the products	(both a 'working' and 'FAILED' table)
        $db = ($type == "FC" || $type == "MPto") ? "jarvis" : "jarvis";
        $sql = "DROP TABLE IF EXISTS $db.sch_mrp_tbdata_demandvrfq;";
        $em->getConnection()->prepare($sql)->execute();
        $sql = "CREATE TABLE IF NOT EXISTS $db.sch_mrp_tbdata_demandvrfq (
		 `prodID` int(11)  PRIMARY KEY  NOT NULL,
		  `dm` int(11) default 0 NOT NULL,
		  `fail` int(11) default 0 NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $em->getConnection()->prepare($sql)->execute();

        if ($type == "MP" || $type == "MPto") {
            $PA = "(em.tipo = 'ME' or em.tipo = 'MP')";
            // TO DO - make sure this $restrict is needed as it is bypassed below by "($type=="PA"?$restrict:'')" (currrently in line 1040)
            $restrict = " and (em.ccstat='ACTIVO' or em.ccstat='SUSPENDIDO') and 'VIGENTE' in (select regstat from cclabora_jarvis.shc_iyd_tbdata_entvprod where prodID=p.prodID )";
            $almacenes = "(a.almacenCODIGO = '03' or a.almacenCODIGO = '04')";
            $onclick = '';
        }
        if ($type == "PA" || $type == "FC") {
            $PA = "em.tipo = 'PA'";
            $restrict = " and em.ccstat='ACTIVO' and evp.regstat='VIGENTE' and evp.defaultent=1 ";
            $almacenes = "(a.almacenCODIGO = '09' or a.almacenCODIGO = '80')";
            $onclick = 'onclick="submit()"';
        }

        if ($type != "FC" && $type != "MPto") {
            $this->check_dm_report();
            $DM_table = "sch_mrp_tbdata_dmtable";
        } else {
            $DM_table = "sch_sales_tbdata_forecast";
        }

        set_time_limit(160);
        // grab all products and codigo from database
        $sql = 'SELECT p.prodID,p.prodCODIGO,p.prodDESCRIPCION,em.dr,em.le,em.presentacion from cclabora_fsql007.productos p
                INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON em.prodID = p.prodID
                join cclabora_jarvis.shc_iyd_tbdata_entvprod evp on evp.prodID=p.prodID
                WHERE ' . $PA . ($type == "PA" ? $restrict : '') . ' order by p.prodCODIGO';
        $sth = $this->consultaBD1($sql, $jarvisConex);

        //$total = $jarvis->last_row_count();
        $current = 0;
        while ($result = $sth->fetch_object()) {
            $current++;
            $active_products = '';
            $ing = array();
            //	php_progress_bar($current,$total);
            $DM = 0;
            $Dd = 0;
            $SS = 0;
            $PP = 0;
            $in_stock = '';
            $style = '';
            $tooltip = '';
            $tooltipTD = '';
            $cantBCPA = 0;
            $cantBCMPME = 0;
            $cantBMPME = 0;
            $cantBT = 0;
            $cant = 1;
            $active_code = trim($result->prodCODIGO);
            $active_dr = $result->dr;
            // TO DO - fix this for 'bano' - we tried $active_desc=(iconv("UTF-8", "ISO-8859-1", $result->prodDESCRIPCION)); but it didn't work
            $active_desc = trim($result->prodDESCRIPCION);
            $active_prodID = $result->prodID;
            $active_le = $result->le;
            $active_presentacion = $result->presentacion;

            // pull the quantity in bodegas to get $in_stock for that product
            $result2 = $this->consultaBD1($this->in_stock($active_prodID, $almacenes), $jarvisConex)->fetch_object();
            $in_stock = $result2->cant;
            // calculate PP for this product

            if ($type == "MP" || $type == "MPto") {
                if ($output == 'DM') $active_prodID = $mp;
                // lookup the products the ingredient is in, making sure they are in the 'legal' list
                $sql4 = "SELECT prodCODIGO, em2.cant as cant from cclabora_fsql007.productos p
                         INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em2 em2 ON em2.prodID = p.prodID
                         INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON em.prodID = p.prodID
                         WHERE em2.ing = '$active_prodID' $restrict order by p.prodCODIGO";
                $sth4products = $this->consultaBD1($sql4, $jarvisConex);
                while ($result4products = $sth4products->fetch_object()) {
                    set_time_limit(160);
                    // build a list for $active_products
                    $active_products = "CODIGO_PRODUCTO = '" . $result4products->prodCODIGO . "'";
                    $ing[$active_prodID] = $result4products->cant;
                    if ($type == "MP") {
                        $sql2 = "SELECT sum(CANTIDAD)/3 as DM FROM $db.$DM_table where $active_products group BY CODIGO_PRODUCTO ";
                        $sth2 = $this->consultaBD1($sql2, $jarvisConex);
                        /*if($debug){
                            echo( __LINE__ . " " . $sql2."<br>");
                        }*/
                        while ($result2 = $sth2->fetch_object()) {
                            $DM += $result2->DM * $result4products->cant;
                        }
                    }
                    if ($type == "MPto") {
                        // calculate the months and years if the report is FC
                        // function modified from http://stackoverflow.com/questions/18742998/how-to-list-all-months-between-two-dates
                        $start = new \DateTime($start_year . '-' . $start_date . "-01");
                        //$start->modify('first day of this month');
                        $end = new \DateTime($end_year . '-' . $end_date . "-01");
                        $end->modify('first day of next month');
                        $interval = \DateInterval::createFromDateString('1 month');
                        $period = new \DatePeriod($start, $interval, $end);
                        $count = 0;
                        foreach ($period as $dt) {
                            $sthdt = $this->consultaBD1("select `" . $dt->format("m") . "` as mes from cclabora_jarvis.sch_sales_tbdata_forecast where code = " . $active_prodID . " and year = " . $dt->format("Y"), $jarvisConex);
                            $resuldt = $sthdt->fetch_object();
                            $DM += $resuldt->mes;
                            $count++;
                        }
                        $DM = $DM / $count;
                    }
                }
            } else {
                if ($output == 'DM') $active_code = $mp;
                if ($type == "FV") {
                    // calculate the months and years if the report is FC
                    // function modified from http://stackoverflow.com/questions/18742998/how-to-list-all-months-between-two-dates
                    $start = new \DateTime($start_year . '-' . $start_date . "-01");
                    //$start->modify('first day of this month');
                    $end = new \DateTime($end_year . '-' . $end_date . "-01");
                    $end->modify('first day of next month');
                    $interval = \DateInterval::createFromDateString('1 month');
                    $period = new \DatePeriod($start, $interval, $end);
                    $count = 0;
                    foreach ($period as $dt) {
                        $sthdt = $this->consultaBD1("select `" . $dt->format("m") . "` from cclabora_jarvis.sch_sales_tbdata_forecast where code = " . $active_prodID . " and year = " . $dt->format("Y"), $jarvisConex);
                        $resuldt = $sthdt->fetch_object();
                        $DM += $resuldt->mes;
                        $count++;
                    }
                    $DMto = $DM / $count;
                }

                // get the DM90
                $sql2 = "SELECT sum(CANTIDAD)/3 as DM FROM cclabora_jarvis.sch_mrp_tbdata_dmtable
                where CODIGO_PRODUCTO = '$active_code' group BY CODIGO_PRODUCTO ";
                //echo $sql2;
                $sth2 = $this->consultaBD1($sql2, $jarvisConex);
                //print_r($sth2);
                //if($debug){if($active_code=="162BCOB0020")flush_it( __LINE__ . " " . $sql2."<br>");}
                //	flush_it( "row count is " . $jarvis->last_row_count()."<br>");
                if ($sth2->num_rows > 0) {
                    while ($result2 = $sth2->fetch_object()) {
                        set_time_limit(160);
                        $DM = $result2->DM;
                        //	{if($active_code=="162BCOB0020") echo __LINE__ . " DM is $DM<br>";}
                        //$DM += (isset($ing[$active_prodID])?$ing[$active_prodID]:0);
                    }
                }
                if ($type == "FV") {
                    $sthdt = $this->consultaBD1("select value as val from cclabora_jarvis.sch_sales_tbdata_general where title = 'PPto'", $jarvisConex);
                    $resuldt = $sthdt->fetch_object();
                    $slider = $resuldt->val;
                    $DM = ($slider * $DMto / 100) + ((100 - $slider) * $DM / 100);
                }
            }
            if ($output == 'DM') {
                return $DM;
            }
            $Dd = $DM / 30;
            $SS = $Dd * $active_dr;
            $PP = $SS + ($active_dr * $Dd);
            if ($DM <> 0 && $in_stock < $PP && $PP <> 0 && $active_le > 0) {
                if ($type == "MP" || $type == "MPto")
                    $num_lote_standard = ceil($PP / $active_le);
                else
                    $num_lote_standard = ceil($DM / $active_le);
                if (isset($_POST[$this->ugly($active_desc) . "|lotes"]) && array_key_exists($this->ugly($active_desc), $_REQUEST)) {
                    $num_lote_standard = $_POST[$this->ugly($active_desc) . "|lotes"];
                }
                $TO_PRODUCE = $num_lote_standard * $active_le;
                $ONPAGE += $TO_PRODUCE;
                $code = substr($active_code, 2, 1);
                $total = "total$code";
                if (isset($$total)) {
                    $$total += $TO_PRODUCE;
                }
                if (array_key_exists($this->ugly($active_desc), $_REQUEST)) {
                    $checked = 'checked="checked"';
                    $CLICKED += $TO_PRODUCE;
                    $clicked_code = "clicked$code";
                    $$clicked_code += $TO_PRODUCE;
                } else
                    $checked = '';

                // create the tooltip for ALL products, using cuantidad in bodega 8
                $sth2 = $this->consultaBD1("select stocksCANTIDAD from cclabora_fsql007.stocks s
				join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
				where a.almacenCODIGO = '08' and s.prodID = $active_prodID ", $jarvisConex);
                $cantBCPA = 0;
                while ($result2 = $sth2->fetch_object()) {
                    $tooltip = 'title="en cuarentena PA = ' . $result2->stocksCANTIDAD . "\r\n";
                    $cantBCPA = $result2->stocksCANTIDAD;
                }
                // if the quantity on hand is not enough, turn the line red
                $can_produce = ''; // doing this just to clear out
                $can_produce = $this->can_produce($active_prodID, $TO_PRODUCE, $checked, $db, $em);
                if ($can_produce['can_produce'] == false) {
                    ///{if($active_code=="162BCOB0020"){echo __LINE__ ." can_produce is " ;print_r($can_produce);echo "<br>";}}
                    $style = 'redcolor';

                    if ($checked == 'checked="checked"')
                        $canpro = 1;
                    foreach ($can_produce as $ing => $value) {
                        //{if($active_code=="162BCOB0020")echo __LINE__ ." REDCOLOR => ing is $ing and value is $value<br>";}
                        if ($ing <> 'can_produce') {
                            $sth3 = $this->consultaBD1("select prodDESCRIPCION from cclabora_fsql007.productos
						where prodID = $ing", $jarvisConex);
                            //flush_it( $sql."<br>");
                            $sth4 = $this->consultaBD1("select und from cclabora_jarvis.sch_mrp_tbdata_em2
						where prodID = $active_prodID and ing = $ing", $jarvisConex);
                            //flush_it( $sql."<br>");
                            while ($result4 = $sth4->fetch_object()) {
                                $undvalue = $result4->und;
                            }
                            // pull the quantity from bodega 16 to add to the tooltip
                            // create the tooltip for ALL products, using cuantidad in bodega 8
                            $sth2 = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
							join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
							where (a.almacenCODIGO = '16') and s.prodID = $ing ", $jarvisConex);
                            //				{if($active_code=="162BCOB0020")flush_it( $sql2."<br>");}
                            while ($result2 = $sth2->fetch_object()) {
                                $bodega16 = $result2->stocksCANTIDAD;
                            }
                            $bodega16 = $bodega16 <> '' ? $bodega16 : 0;
                            $cantBCMPME = 0;
                            $cantBMPME = 0;
                            while ($result3 = $sth3->fetch_object()) {

                                $tooltip .= "Falta " . $result3->prodDESCRIPCION . " " . $value . " $undvalue en transito = $bodega16\r\n";
                                //$tooltipTD .="Falta " .$result3->prodDESCRIPCION . " " . $value . " $undvalue en transito = $bodega16<BR>";
                                $cantBT = $bodega16;
                                //Agrega al tooltip la cantidad de prodDESCRIPCION en la bodega 01
                                $sthMP = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                                    join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                                    where a.almacenCODIGO = '01' and s.prodID = $ing ", $jarvisConex);
                                $resultMP = $sthMP->fetch_object();
                                $bodegaMP = $resultMP->stocksCANTIDAD;
                                $bodegaMP = $bodegaMP <> '' ? $bodegaMP : 0;
                                $tooltip .= "Cuarentena MP " . $result3->prodDESCRIPCION . " = $bodegaMP\r\n";
                                //if($bodegaMP > 0){
                                //$tooltipTD.="Cuarentena MP " .$result3->prodDESCRIPCION . " = $bodegaMP<br>";
                                //}
                                $cantBCMPME += $bodegaMP;

                                $sthMP = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                                    join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                                    where a.almacenCODIGO = '03' and s.prodID = $ing ", $jarvisConex);
                                $resultMP = $sthMP->fetch_object();

                                $cantBMPME += $resultMP->stocksCANTIDAD;

                                //Agrega al tooltip la cantidad de prodDESCRIPCION en la bodega 02
                                $sthME = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                                    join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                                    where a.almacenCODIGO = '02' and s.prodID = $ing ", $jarvisConex);
                                $resultME = $sthME->fetch_object();
                                $bodegaME = $resultME->stocksCANTIDAD;
                                $bodegaME = $bodegaME <> '' ? $bodegaME : 0;
                                //$tooltip .= "Cuarentena ME " .$result3->prodDESCRIPCION . " = $bodegaME\r\n";
                                //if($bodegaME > 0){
                                //$tooltipTD.="Cuarentena ME " .$result3->prodDESCRIPCION . " = $bodegaME<br>";
                                //}
                                $cantBCMPME += $bodegaME;

                                $sthME = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                                    join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                                    where a.almacenCODIGO = '04' and s.prodID = $ing ", $jarvisConex);
                                $resultME = $sthME->fetch_object();

                                $cantBMPME += $resultME->stocksCANTIDAD;
                                if ($cant != 1) {
                                    $tooltipTD .= "<br>" . $cant . ".- " . $result3->prodDESCRIPCION . "<br>";
                                    $tooltipTD .= "Falta = " . $value . "<br>";
                                    //$tooltipTD .= "B.C. PA =  ".$cantBCPA."; ";
                                    $tooltipTD .= "B.C. MP/ME =  " . $cantBCMPME;
                                    $tooltipTD .= ";B. MP/ME = " . $cantBMPME . ";<br>";
                                    $tooltipTD .= "B. Tr&aacute;nsito = " . $cantBT . "<br>";
                                } else {
                                    $tooltipTD .= $cant . ".- " . $result3->prodDESCRIPCION . "<br>";
                                    $tooltipTD .= "Falta = " . $value . "<br>";
                                    //$tooltipTD .= "B.C. PA =  ".$cantBCPA."; ";
                                    $tooltipTD .= "B.C. MP/ME =  " . $cantBCMPME;
                                    $tooltipTD .= "; B. MP/ME = " . $cantBMPME . ";<br>";
                                    $tooltipTD .= "B. Tr&aacute;nsito = " . $cantBT . ";<br>";
                                }
                                $cant++;
                            }
                            if ($output == 2) {
                                $RFP[$active_prodID] = $TO_PRODUCE;
                                //print_r($RFP);echo "<br>";
                            }
                        }
                    }
                } else {
                    //$tooltipTD = "B.C. PA =  ".$cantBCPA."<br>";

                }
                $tooltip .= '"';
                //$tooltipTD.='"';
                //echo "tooltip is $tooltip<br>";


                // set the options for both types here
                $table[$active_desc]['num_lote_standard'] = $num_lote_standard;
                $table[$active_desc]['active_le'] = $active_le;

                if (!$output) {
                    $table[$active_desc]['style'] = $style;
                    $table[$active_desc]['BCPA'] = "<br>B.C. PA =  " . $cantBCPA;
                    $table[$active_desc]['tooltipTD'] = $tooltipTD;
                    $table[$active_desc]['code'] = $active_code;
                    $table[$active_desc]['to_produce'] = $TO_PRODUCE;
                    $table[$active_desc]['checked'] = $checked;
                    $table[$active_desc]['prodID'] = $active_prodID;
                    $table[$active_desc]['lote_options'] = '';
                    for ($x = 1; $x <= 50; $x++) {
                        $selected = '';

                        if ($num_lote_standard == $x) {
                            $selected = 'selected="selected"';
                        }
                        $table[$active_desc]['lote_options'] .= '<option ' . $selected . '  value="' . $x . '">' . $x . '</option>';
                    }

                    // set the rfp data bit, though later it may be replaced
                    $table[$active_desc]['rfp_data'] = '<td>&nbsp</td>';
                    //  set the RFP data number and background color according to the production from THIS week
                    $selected_week = date('o-\WW');
                    $rfpsql = "select p.prodID,p.prodCODIGO,p.prodDESCRIPCION,r.cant,em.le,em.opt from cclabora_jarvis.sch_mrp_tbdata_rfp r
                                join cclabora_fsql007.productos p on p.prodID=r.ing
                                join cclabora_jarvis.sch_mrp_tbdata_em em on em.prodID=p.prodID
                                where r.week = '$selected_week' and r.ing=$active_prodID";
                    $rfpsth = $this->consultaBD1($rfpsql, $jarvisConex);
                    //	echo __LINE__ . " got here<br>";
                    while ($rfpresult = $rfpsth->fetch_object()) {
                        $productionID = $result->prodID;
                        // pull the last 12month and optimal timing info
                        $sqlb = "from (SELECT a.ordpFECHAPEDIDO AS FECHA_ORDEN,c.prodCODIGO AS CODIGO_PRODUCTO_TERMINADO,c.prodDESCRIPCION AS NOMBRE_PRODUCTO_TERMINADO,
                                a.ordpCANTIDAD    AS CANTIDAD_A_PRODUCIR,
                                sum((((SUBSTRING(d.dtimepFINAL,1,2) * 60) + SUBSTRING(d.dtimepFINAL,4,2)) - ((SUBSTRING(d.dtimepINICIO,1,2) * 60) + SUBSTRING(d.dtimepINICIO,4,2))) / 60) AS TIEMPO
                                FROM cclabora_fsql007.OrdenesProduccion a
                                INNER JOIN cclabora_fsql007.Stocks b ON a.stocksID = b.stocksID
                                INNER JOIN cclabora_fsql007.Productos c ON b.prodID = c.prodID
                                INNER JOIN cclabora_fsql007.DetalleTiemposProductivos d ON a.ordpID = d.ordpID
                                INNER JOIN cclabora_fsql007.DocumentosTiemposProductivos e ON d.doctpID = e.doctpID
                                INNER JOIN cclabora_fsql007.TablasGenerales f ON d.fgralID = f.fgralID
                                WHERE a.ordpFECHAPEDIDO BETWEEN '" . date('Y-m-d', strtotime("-1 year")) . "' AND '" . date('Y-m-d', strtotime("yesterday")) . "'
                                and c.prodCODIGO = '" . $rfpresult->prodCODIGO . "'
                                group by a.ordpNUMERO,c.prodCODIGO ,a.ordpFECHAPEDIDO
                                order by CODIGO_PRODUCTO_TERMINADO) as tempo";
                        // we have to pull the time separately from the quantity
                        $rfpsql2 = "select sum(tempo.CANTIDAD_A_PRODUCIR) as cant " . $sqlb;
                        $rfpsth2 = $this->consultaBD1($rfpsql2, $jarvisConex);
                        $rfpresult2 = $rfpsth2->fetch_object();
                        $prodID['cant'] = $rfpresult2->cant;
                        //	echo "<hr>".__LINE__ . " " .$rfpsql2."<br>"."result quantity is ".$table[$rfpresult->prodID]['cant']."<br>";print_r($rfpresult2);echo "<br>";
                        $rfpsql2 = "select sum(tempo.TIEMPO) as ptime " . $sqlb;
                        $rfpsth2 = $this->consultaBD1($rfpsql2, $jarvisConex);
                        $rfpresult2 = $rfpsth2->fetch_object();
                        $prodID['ptime'] = $rfpresult2->ptime;
                        $prodID["12m_av"] = round($prodID['ptime'] / $prodID['cant'], 4, PHP_ROUND_HALF_UP);
                        // pull the lote standar from the database
                        $prodID['to_produce'] = $rfpresult->cant;
                        $color = 'class="cclabs_green_back white_text"';
                        if ($prodID['12m_av'] < $rfpresult->opt)
                            $color = 'class="cclabs_red_back white_text"';
                        //		echo __LINE__ . " color is now $color and productionID is $productionID while active_prodID is $active_prodID and prodID['to_produce'] is ".$prodID['to_produce']."<br>";

                        $table[$active_desc]['rfp_data'] = '<td><span ' . $color . '>&nbsp' . $prodID['to_produce'] . '&nbsp</span></td>';
                    }
                    //echo "<hr>ugly active_desc is ".ugly($active_desc)."<br>".ugly($active_desc)."|lotes"."<br>and in the array is ".(array_key_exists(ugly($active_desc)."|lotes",$_REQUEST))."<br>the value is ".$_POST[ugly($active_desc)."|lotes"]."<br>".$table[$active_desc]['lote_options']."<hr>";
                } else {
                    $RFP[$active_prodID] = $TO_PRODUCE;
                    //print_r($RFP);echo "<br>";
                }
                if ($type == "PA" && !$output) {
                    ?>
                    <script
                        type="text/javascript">document.getElementById("ONPAGE").innerHTML = "<?php echo $ONPAGE ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("CLICKED").innerHTML = "<?php echo $CLICKED ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("total1").innerHTML = "<?php echo $total1 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("clicked1").innerHTML = "<?php echo $clicked1 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("total2").innerHTML = "<?php echo $total2 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("clicked2").innerHTML = "<?php echo $clicked2 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("total3").innerHTML = "<?php echo $total3 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("clicked3").innerHTML = "<?php echo $clicked3 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("total4").innerHTML = "<?php echo $total4 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("clicked4").innerHTML = "<?php echo $clicked4 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("total5").innerHTML = "<?php echo $total5 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("clicked5").innerHTML = "<?php echo $clicked5 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("total6").innerHTML = "<?php echo $total6 ?>";</script>
                    <script
                        type="text/javascript">document.getElementById("clicked6").innerHTML = "<?php echo $clicked6 ?>";</script>
                    <?php
                }
            }
        } ?>
        <script type="text/javascript">document.getElementById("canproduce").value = "<?php echo $canpro ?>";</script>
        <?php
        //	drop_temp_table($DM_table);
        // update the menu line as needed
        //	echo "output is $output<br>";
        if ($output) {
            if (isset($RFP))
                return $RFP;
            else
                return '';
        } else {
            // echo __LINE__ . " got here<br>";
            $valores[] = $this->paint_tablePA($table, $onclick);
            $valores[] = $ONPAGE;
            $valores[] = $CLICKED;
            $valores[] = $total1;
            $valores[] = $clicked1;
            $valores[] = $total2;
            $valores[] = $clicked2;
            $valores[] = $total3;
            $valores[] = $clicked3;
            $valores[] = $total4;
            $valores[] = $clicked4;
            $valores[] = $total5;
            $valores[] = $clicked5;
            $valores[] = $total6;
            $valores[] = $clicked6;
            $jarvisConex->close();
            return $valores;
        }
    }

    public function  dimeEmpleado($idEmpl)
    {
        $jarvisConex = $this->abrirconexion('jarvis',41);
        $query = $this->consultaBD1("SELECT * FROM sch_rrh_tbl_empleados where emplID='" . $idEmpl . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function  dimeEstado($idEst)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_estados where estadoID='" . trim($idEst) . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function  dimeCliente($clieID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_clientes where clieID='" . $clieID . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {

            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function  dimeVendedor($idVendedor)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT ep.emplNOMBRES,ep.emplAPELLIDOS,at.* FROM cclabora_jarvis.sch_admin_tddata_atcs at join cclabora_fsql007.empleados ep on ep.emplID=at.IDEmpleado  where at.IDVendedor='" . $idVendedor . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function  dimeTaGenereles($idTG)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT * from cclabora_fsql007.tablasgenerales where fgralID='" . trim($idTG) . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function  dimeClienteRuta($clieID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT rr.*,ru.RutaDescripcion FROM cclabora_jarvis.rel_clie_ruta rr join cclabora_jarvis.sch_sales_tbdata_ruta ru on rr.rutaID=ru.idsch_sales_tbdata_ruta  where clieID='" . $clieID . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            $result = $query->fetch_object();

            return $result->RutaDescripcion;
        } else {
            return 'No Registrado';
        }
    }

    public function  dimeCiudadServientrega($idCity)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_servientrega_tbdata_ciudades where cityID='" . $idCity . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            return $query->fetch_object();
        } else {
            return 0;
        }
    }


    public function  dimeCiudadProvincia($idCity)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
      
        $query = $this->consultaBD1("SELECT ct.cityNAME,pv.provinciaNOMBRE,pv.provinciaID FROM cclabora_jarvis.sch_admin_tbdata_ciudades ct join cclabora_jarvis.sch_admin_tbdata_provincias pv on ct.provinciaID=pv.provinciaID where cityID='" . $idCity . "' ", $jarvisConex);
        
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function  dimeCiudadProvinciaN($idName)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT ct.cityNAME,pv.provinciaNOMBRE,pv.provinciaID FROM cclabora_jarvis.sch_admin_tbdata_ciudades ct join cclabora_jarvis.sch_admin_tbdata_provincias pv on ct.provinciaID=pv.provinciaID where cityNAME='" . $idName . "' ", $jarvisConex);
        $jarvisConex->close();
        if ($query->num_rows > 0) {
            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function dimeCoordenadasCliente($clieID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_co = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_customeraddress P where P.CustomerAddressCode = '" . $clieID . "'", $jarvisConex);
        if (($sth_co->num_rows) > 0) {
            $coordenadas = $sth_co->fetch_object();
            $loc = $coordenadas->CustomerAddressLongitude . " , " . $coordenadas->CustomerAddressLatitude;
        } else {
            $loc = "No tiene registrado";
        }
        $jarvisConex->close();
        return $loc;

    }

    public function  dimeEmpleadoUsuaro($idEmpl)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $query = $this->consultaBD1("SELECT * FROM cclabora_fsql007.empleados where emplID='" . $idEmpl . "' ", $jarvisConex);
        if ($query->num_rows > 0) {
            $jarvisConex->close();
            return $query->fetch_object();
        } else {
            return 0;
        }
    }

    public function getDiasEnSemana($numeroSemana, $anio)
    {
        $tiempoSemana = strtotime($anio . '0104 +' . ($numeroSemana - 1) . ' weeks');
        $lunesSemana = strtotime('-' . (date('w', $tiempoSemana) - 1) . ' days', $tiempoSemana);
        $diasSemana = array();
        for ($i = 0; $i < 7; ++$i) {
            $diasSemana[] = strtotime('+' . $i . ' days', $lunesSemana);
        }

        return $diasSemana;
    }

    public function last_row_count($BD = 'jarvis')
    {
        $sth = $this->consultaBD("SELECT FOUND_ROWS()", $BD);
        return $sth->field_count;

    }

    function do_reporte($jarvis, $type, $output = '', $mp = '', $debug = '', $start_date = '', $end_date = '', $start_year = '', $end_year = '')
    {
        $RFP = array();
        set_time_limit(160);
        $active_code = '';
        $active_desc = '';
        $active_prodID = '';
        $active_dr = '';
        $active_le = '';
        $active_presentacion = '';
        $table = "";
        $checked = '';
        $ONPAGE = '0';
        $CLICKED = '0';
        $total1 = '0';
        $total2 = '0';
        $total3 = '0';
        $total4 = '0';
        $total5 = '0';
        $total6 = '0';
        $clicked1 = '0';
        $clicked2 = '0';
        $clicked3 = '0';
        $clicked4 = '0';
        $clicked5 = '0';
        $clicked6 = '0';
        $DM = 0;
        $resultado = array();
        $canpro = 0;
        $db = ($type == "FC" || $type == "MPto") ? "jarvis" : "jarvis";
        $almacenes = '';
        $jarvisConex = $this->abrirconexion('jarvis');
        //$this->consultaBD("DROP TABLE IF EXISTS $db.sch_mrp_tbdata_demandvrfq",'jarvis');
        //$this->consultaBD("CREATE TABLE IF NOT EXISTS $db.sch_mrp_tbdata_demandvrfq (`prodID` int(11)  PRIMARY KEY  NOT NULL,`dm` int(11) default 0 NOT NULL,
        // `fail` int(11) default 0 NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;",'jarvis');
        $jarvis->getConnection()->prepare("DROP TABLE IF EXISTS $db.sch_mrp_tbdata_demandvrfq;")->execute();
        $jarvis->getConnection()->prepare("CREATE TABLE IF NOT EXISTS $db.sch_mrp_tbdata_demandvrfq (`prodID` int(11)  PRIMARY KEY  NOT NULL,`dm` int(11) default 0 NOT NULL, `fail` int(11) default 0 NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;")->execute();

        if ($type == "MP" || $type == "MPto") {
            $PA = "(em.tipo = 'ME' or em.tipo = 'MP')";
            $restrict = " and (em.ccstat='ACTIVO' or em.ccstat='SUSPENDIDO') and 'VIGENTE' in (select regstat from cclabora_jarvis.shc_iyd_tbdata_entvprod where prodID=p.prodID )";
            $almacenes = "(a.almacenCODIGO = '03' or a.almacenCODIGO = '04')";
            $onclick = '';
        }
        if ($type == "PA" || $type == "FC") {
            $PA = "em.tipo = 'PA'";
            $restrict = " and em.ccstat='ACTIVO' and evp.regstat='VIGENTE' and evp.defaultent=1 ";
            $almacenes = "(a.almacenCODIGO = '09' or a.almacenCODIGO = '80')";
            $onclick = 'onclick="submit()"';
        }


        if ($type != "FC" && $type != "MPto") {
            //$this->check_dm_report($jarvis);
            $DM_table = "sch_mrp_tbdata_dmtable";
        } else {
            $DM_table = "sch_sales_tbdata_forecast";
        }
        set_time_limit(160);
        $sql = 'SELECT p.prodID,p.prodCODIGO,p.prodDESCRIPCION,em.dr,em.le,em.presentacion from cclabora_fsql007.productos p
            INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON em.prodID = p.prodID
            join cclabora_jarvis.shc_iyd_tbdata_entvprod evp on evp.prodID=p.prodID
            WHERE ' . $PA . ($type == "PA" ? $restrict : '') . ' order by p.prodCODIGO';
        $sth = $this->consultaBD1($sql, $jarvisConex);

        $total = $this->last_row_count('jarvis');
        $current = 0;
        while ($result = $sth->fetch_object()) {
            $current++;
            $active_products = '';
            $ing = array();
            $DM = 0;
            $Dd = 0;
            $SS = 0;
            $PP = 0;
            $in_stock = '';
            $style = '';
            $tooltip = '';
            $active_code = trim($result->prodCODIGO);
            $active_dr = $result->dr;
            $active_desc = trim($result->prodDESCRIPCION);
            $active_prodID = $result->prodID;
            $active_le = $result->le;
            $active_presentacion = $result->presentacion;
            $result2 = $this->consultaBD1($this->in_stock($active_prodID, $almacenes), $jarvisConex)->fetch_object();
            $in_stock = $result2->cant;

            if ($type == "MP" || $type == "MPto") {
                if ($output == 'DM') $active_prodID = $mp;
                $sql4 = "SELECT prodCODIGO, em2.cant as cant from cclabora_fsql007.productos p INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em2 em2 ON em2.prodID = p.prodID INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON em.prodID = p.prodID WHERE em2.ing = '$active_prodID' $restrict order by p.prodCODIGO";
                $sth4products = $this->consultaBD1($sql4, $jarvisConex);
                while ($result4products = $sth4products->fetch_object()) {
                    set_time_limit(160);
                    $active_products = "CODIGO_PRODUCTO = '" . $result4products->prodCODIGO . "'";
                    $ing[$active_prodID] = $result4products->cant;
                    if ($type == "MP") {
                        $sql2 = "SELECT sum(CANTIDAD)/3 as DM FROM $db.$DM_table where $active_products group BY CODIGO_PRODUCTO ";
                        $sth2 = $this->consultaBD1($sql2, $jarvisConex);
                        while ($result2 = $sth2->fetch_object()) {
                            $DM += $result2->DM * $result4products->cant;
                        }
                    }
                    if ($type == "MPto") {
                        $start = new DateTime($start_year . '-' . $start_date . "-01");
                        $end = new DateTime($end_year . '-' . $end_date . "-01");
                        $end->modify('first day of next month');
                        $interval = DateInterval::createFromDateString('1 month');
                        $period = new DatePeriod($start, $interval, $end);
                        $count = 0;
                        foreach ($period as $dt) {
                            $DM += $this->fetch_var("select `" . $dt->format("m") . "` from cclabora_jarvis.sch_sales_tbdata_forecast where code = " . $active_prodID . " and year = " . $dt->format("Y"));
                            $count++;
                        }
                        $DM = $DM / $count;
                    }
                }
            } else {
                if ($output == 'DM') $active_code = $mp;
                if ($type == "FV") {
                    $start = new DateTime($start_year . '-' . $start_date . "-01");
                    $end = new DateTime($end_year . '-' . $end_date . "-01");
                    $end->modify('first day of next month');
                    $interval = DateInterval::createFromDateString('1 month');
                    $period = new DatePeriod($start, $interval, $end);
                    $count = 0;
                    foreach ($period as $dt) {
                        $DM += $this->fetch_var("select `" . $dt->format("m") . "` from cclabora_jarvis.sch_sales_tbdata_forecast where code = " . $active_prodID . " and year = " . $dt->format("Y"));
                        $count++;
                    }
                    $DMto = $DM / $count;
                }

                $sql2 = "SELECT sum(CANTIDAD)/3 as DM FROM cclabora_jarvis.sch_mrp_tbdata_dmtable where CODIGO_PRODUCTO = '$active_code' group BY CODIGO_PRODUCTO ";
                $sth2 = $this->consultaBD1($sql2, $jarvisConex);
                if (is_array($sth2)) {//cclabora_jarvis.sch_mrp_tbdata_dmtable existe
                    while ($result2 = $sth2->fetch_object()) {
                        set_time_limit(160);
                        $DM = $result2->DM;
                    }
                }
                if ($type == "FV") {
                    $slider = $this->fetch_var("select value from cclabora_jarvis.sch_sales_tbdata_general where title = 'PPto'");
                    $DM = ($slider * $DMto / 100) + ((100 - $slider) * $DM / 100);
                }
            }
            if ($output == 'DM') {
                $resultado[0] = $DM;
            }
            $Dd = $DM / 30;
            $SS = $Dd * $active_dr;
            $PP = $SS + ($active_dr * $Dd);

            if ($DM <> 0 && $in_stock < $PP && $PP <> 0 && $active_le > 0) {
                if ($type == "MP" || $type == "MPto")
                    $num_lote_standard = ceil($PP / $active_le);
                else
                    $num_lote_standard = ceil($DM / $active_le);

                if (isset($_POST[$this->ugly($active_desc) . "|lotes"]) && array_key_exists(ugly($active_desc), $_REQUEST)) {
                    $num_lote_standard = $_POST[$this->ugly($active_desc) . "|lotes"];
                }
                $TO_PRODUCE = $num_lote_standard * $active_le;
                $ONPAGE += $TO_PRODUCE;
                $code = substr($active_code, 2, 1);
                $total = "total$code";
                $total += $TO_PRODUCE;
                if (array_key_exists($this->ugly($active_desc), $_REQUEST)) {
                    $checked = 'checked="checked"';
                    $CLICKED += $TO_PRODUCE;
                    $clicked_code = "clicked$code";
                    $clicked_code += $TO_PRODUCE;
                } else
                    $checked = '';

                $sth2 = $this->consultaBD1("select stocksCANTIDAD from cclabora_fsql007.stocks s
                                           join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
				                           where a.almacenCODIGO = '08' and s.prodID = $active_prodID ", $jarvisConex);
                while ($result2 = $sth2->fetch_object()) {
                    $tooltip = 'title="en cuarentena PA = ' . $result2->stocksCANTIDAD . "\r\n";
                }
                $can_produce = $this->can_produce($active_prodID, $TO_PRODUCE, $checked, $db, $jarvis);
                if ($can_produce['can_produce'] == false) {
                    $style = 'redcolor';
                    if ($checked == 'checked="checked"')
                        $canpro = 1;
                    foreach ($can_produce as $ing => $value) {

                        if ($ing <> 'can_produce') {
                            $sth3 = $this->consultaBD1("select prodDESCRIPCION from cclabora_fsql007.productos where prodID = $ing", $jarvisConex);

                            $sth4 = $this->consultaBD1("select und from cclabora_jarvis.sch_mrp_tbdata_em2 where prodID = $active_prodID and ing = $ing", $jarvisConex);
                            while ($result4 = $sth4->fetch_object()) {
                                $undvalue = $result4->und;
                            }
                            $sth2 = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
							join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
							where (a.almacenCODIGO = '16' or a.almacenCODIGO = '01' or a.almacenCODIGO = '02') and s.prodID = $ing ", $jarvisConex);
                            while ($result2 = $sth2->fetch_object()) {
                                $bodega16 = $result2->stocksCANTIDAD;
                            }
                            $bodega16 = $bodega16 <> '' ? $bodega16 : 0;
                            while ($result3 = $sth3->fetch_object()) {
                                $tooltip .= "Falta " . $result3->prodDESCRIPCION . " " . $value . " $undvalue en transito = $bodega16\r\n";
                                $sthMP = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                where a.almacenCODIGO = '01' and s.prodID = $ing ", $jarvisConex);
                                $resultMP = $sthMP->fetch_object();
                                $bodegaMP = $resultMP->stocksCANTIDAD;
                                $bodegaMP = $bodegaMP <> '' ? $bodegaMP : 0;
                                $tooltip .= "Cuarentena MP " . $result3->prodDESCRIPCION . " = $bodegaMP\r\n";
                                $sthME = $this->consultaBD1("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                where a.almacenCODIGO = '02' and s.prodID = $ing ", $jarvisConex);
                                $resultME = $sthME->fetch_object();
                                $bodegaME = $resultME->stocksCANTIDAD;
                                $bodegaME = $bodegaME <> '' ? $bodegaME : 0;
                                $tooltip .= "Cuarentena ME " . $result3->prodDESCRIPCION . " = $bodegaME\r\n";
                            }
                            if ($output == 2) {
                                $RFP[$active_prodID] = $TO_PRODUCE;
                            }
                        }
                    }
                }
                $tooltip .= '"';
                $table[$active_desc]['num_lote_standard'] = $num_lote_standard;
                $table[$active_desc]['active_le'] = $active_le;
                if (!$output) {
                    $table[$active_desc]['style'] = $style;
                    $table[$active_desc]['tooltip'] = $tooltip;
                    $table[$active_desc]['code'] = $active_code;
                    $table[$active_desc]['to_produce'] = $TO_PRODUCE;
                    $table[$active_desc]['checked'] = $checked;
                    $table[$active_desc]['prodID'] = $active_prodID;
                    $table[$active_desc]['lote_options'] = '';
                    for ($x = 1; $x <= 50; $x++) {
                        $selected = '';
                        if ($num_lote_standard == $x) {
                            $selected = 'selected="selected"';
                        }
                        $table[$active_desc]['lote_options'] .= '<option ' . $selected . '  value="' . $x . '">' . $x . '</option>';
                    }
                    $table[$active_desc]['rfp_data'] = '<td>&nbsp</td>';
                    $selected_week = date('o-\WW');
                    $rfpsql = "select p.prodID,p.prodCODIGO,p.prodDESCRIPCION,r.cant,em.le,em.opt from cclabora_jarvis.sch_mrp_tbdata_rfp r
                    join cclabora_fsql007.productos p on p.prodID=r.ing
                    join cclabora_jarvis.sch_mrp_tbdata_em em on em.prodID=p.prodID
                    where r.week = '$selected_week' and r.ing=$active_prodID";
                    $rfpsth = $this->consultaBD1($rfpsql, $jarvisConex);
                    while ($rfpresult = $rfpsth->fetch_object()) {
                        $productionID = $result->prodID;
                        $sqlb = "from (SELECT a.ordpFECHAPEDIDO AS FECHA_ORDEN,c.prodCODIGO AS CODIGO_PRODUCTO_TERMINADO,c.prodDESCRIPCION AS NOMBRE_PRODUCTO_TERMINADO,
                        a.ordpCANTIDAD    AS CANTIDAD_A_PRODUCIR,
                        sum((((SUBSTRING(d.dtimepFINAL,1,2) * 60) + SUBSTRING(d.dtimepFINAL,4,2)) - ((SUBSTRING(d.dtimepINICIO,1,2) * 60) + SUBSTRING(d.dtimepINICIO,4,2))) / 60) AS TIEMPO
                        FROM cclabora_fsql007.OrdenesProduccion a
                        INNER JOIN cclabora_fsql007.Stocks b ON a.stocksID = b.stocksID
                        INNER JOIN cclabora_fsql007.Productos c ON b.prodID = c.prodID
                        INNER JOIN cclabora_fsql007.DetalleTiemposProductivos d ON a.ordpID = d.ordpID
                        INNER JOIN cclabora_fsql007.DocumentosTiemposProductivos e ON d.doctpID = e.doctpID
                        INNER JOIN cclabora_fsql007.TablasGenerales f ON d.fgralID = f.fgralID
                        WHERE a.ordpFECHAPEDIDO BETWEEN '" . date('Y-m-d', strtotime("-1 year")) . "' AND '" . date('Y-m-d', strtotime("yesterday")) . "'
                        and c.prodCODIGO = '" . $rfpresult->prodCODIGO . "'
                        group by a.ordpNUMERO,c.prodCODIGO ,a.ordpFECHAPEDIDO
                        order by CODIGO_PRODUCTO_TERMINADO) as tempo";
                        $rfpsql2 = "select sum(tempo.CANTIDAD_A_PRODUCIR) as cant " . $sqlb;
                        $rfpsth2 = $this->consultaBD1($rfpsql2, $jarvisConex);
                        $rfpresult2 = $rfpsth2->fetch_object();
                        $prodID['cant'] = $rfpresult2->cant;
                        $rfpsql2 = "select sum(tempo.TIEMPO) as ptime " . $sqlb;
                        $rfpsth2 = $this->consultaBD1($rfpsql2, $jarvisConex);
                        $rfpresult2 = $rfpsth2->fetch_object();
                        $prodID['ptime'] = $rfpresult2->ptime;
                        $prodID['12m_av'] = round($prodID['ptime'] / $prodID['cant'], 4, PHP_ROUND_HALF_UP);
                        $prodID['to_produce'] = $rfpresult->cant;
                        $color = 'class="cclabs_green_back white_text"';
                        if ($prodID['12m_av'] < $rfpresult->opt)
                            $color = 'class="cclabs_red_back white_text"';
                        $table[$active_desc]['rfp_data'] = '<td><span ' . $color . '>&nbsp' . $prodID['to_produce'] . '&nbsp</span></td>';
                    }
                } else {
                    $RFP[$active_prodID] = $TO_PRODUCE;
                }

                if ($type == "PA" && !$output) {
                    $resultado[0] = $ONPAGE;
                    $resultado[1] = $CLICKED;
                    $resultado[2] = $total1;
                    $resultado[3] = $clicked1;
                    $resultado[4] = $total2;
                    $resultado[5] = $clicked2;
                    $resultado[6] = $total3;
                    $resultado[7] = $clicked3;
                    $resultado[8] = $total4;
                    $resultado[9] = $clicked4;
                    $resultado[10] = $total5;
                    $resultado[11] = $clicked5;
                    $resultado[12] = $total6;
                    $resultado[13] = $clicked6;

                }
            }
        }
        $resultado[14] = $canpro;
        if ($output) {
            if (isset($RFP))
                $resultado[0] = $RFP;
            else
                $resultado[0] = 0;
        } else {
            $resultado[15] = $this->paint_table($table, $onclick);
        }
        $jarvisConex->close();
        return $resultado;

    }

    function paint_table($table, $onclick = '')
    {
        if (!empty($table)) {
            uksort($table, 'strnatcmp');
            $x = 0;
            $tabla = "";
            foreach ($table as $key => $value) {
                if (isset($value['tooltip'])) {
                    $tooltip = $value['tooltip'];
                } else {
                    $tooltip = '';
                }
                $class = 'class="' . $value['style'] . " " . ($x % 2 == 0 ? 'cclabswhiteBackground' : '') . '"';
                $tabla .= "<tr id='" . $x . "' " . $class . " " . $tooltip . "><td>" . $value['code'] . '</td><td>' . $key . '</td><td>' . $value['active_le'] . '</td><td><select onchange="submit()" name="' . $key . '|lotes">' . $value['lote_options'] . '</select></td><td>' . $value['to_produce'] . '</td>' . $value['rfp_data'] . '<td><input type="checkbox" ' . $onclick . ' name="' . $key . '" ' . $value['checked'] . '><input type="hidden" name="' . $key . '|prodID" value="' . $value['prodID'] . '"><input type="hidden" name="' . $key . '|value" value="' . $value['to_produce'] . '"><input type="hidden" name="id' . $x . '" value="' . $x . '"></td></tr>';
                $x++;
            }
            return $tabla;
        } else {
            return "No hay Datos que mostrar";
        }
    }


    function array_recibe($url_array)
    {
        $tmp = stripslashes($url_array);
        $tmp = urldecode($tmp);
        $tmp = unserialize($tmp);
        return $tmp;
    }

    public function need_produce($prodID, $to_produce, $checked, $db)
    {
        $can_produce = array('can_produce' => true);
        $demand = 0;
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("select ing,cant from cclabora_jarvis.sch_mrp_tbdata_em2 where prodID = $prodID", $jarvisConex);
        while ($result = $sth->fetch_object()) {
            $make_one = $result->cant;
            $demand = 0;
            $ing = $result->ing;
            $result2 = $this->consultaBD1($this->in_stock($ing, "(almacenCODIGO='03' or almacenCODIGO='04' or almacenCODIGO='80')"), $jarvisConex)->fetch_object();
            if (isset($result2->cant))
                $in_stock = $result2->cant;
            else $in_stock = 0;
            $fail = false;
            $add_2_fail = $this->consultaBD1("select dm from $db.sch_mrp_tbdata_demandvrfq where prodID=$ing;", $jarvisConex);
            if ($add_2_fail->num_rows > 0) {
                $result_demand = $add_2_fail->fetch_object();
                $in_stock -= $result_demand->dm;
            }
            if (($to_produce * $make_one) >= $in_stock) {
                $can_produce['can_produce'] = false;
                $can_produce[$ing] = ($to_produce * $make_one) - $in_stock;
                $fail = true;
            } else {
                $can_produce['can_produce'] = false;
                $can_produce[$ing] = $to_produce * $make_one;
            }
            if ($checked) {
                if ($can_produce['can_produce'] == true) {
                    $this->consultaBD1("insert into $db.sch_mrp_tbdata_demandvrfq (prodID,dm) VALUES (" . $ing . ",dm + ($to_produce * $make_one))
				ON DUPLICATE KEY UPDATE dm = dm+($to_produce * $make_one);", $jarvisConex);
                }
            }
            if ($checked || $fail) {
                $this->consultaBD1("insert into $db.sch_mrp_tbdata_demandvrfq (prodID,fail) VALUES ($ing,fail + ($to_produce * $make_one))
			ON DUPLICATE KEY UPDATE fail = fail+($to_produce * $make_one);", $jarvisConex);
            }
        }
        $jarvisConex->close();
        return $can_produce;
    }

    public function explosionMPME($prodID, $to_produce, $checked, $db)
    {
        $can_produce = array('can_produce' => true);
        $demand = 0;
        $sth = $this->consultaBD("select ing,cant from cclabora_jarvis.sch_mrp_tbdata_em2 where prodID = $prodID", 'jarvis');
        while ($result = $sth->fetch_object()) {
            $make_one = $result->cant;
            $demand = 0;
            $ing = $result->ing;
            $result2 = $this->consultaBD($this->in_stock($ing, "(almacenCODIGO='03' or almacenCODIGO='04' or almacenCODIGO='80')"), 'jarvis')->fetch_object();
            if (isset($result2->cant))
                $in_stock = $result2->cant;
            else $in_stock = 0;
            $fail = false;
            $add_2_fail = $this->consultaBD("select dm from $db.sch_mrp_tbdata_demandvrfq where prodID=$ing;", $db);
            if ($add_2_fail->num_rows > 0) {
                $result_demand = $add_2_fail->fetch_object();
                $in_stock -= $result_demand->dm;
            }
            if (($to_produce * $make_one) >= $in_stock) {
                $can_produce['can_produce'] = false;
                $can_produce[$ing] = ($to_produce * $make_one);
                $fail = true;
            } else {
                $can_produce['can_produce'] = false;
                $can_produce[$ing] = $to_produce * $make_one;
            }
            if ($checked) {
                if ($can_produce['can_produce'] == true) {
                    $this->consultaBD("insert into $db.sch_mrp_tbdata_demandvrfq (prodID,dm) VALUES (" . $ing . ",dm + ($to_produce * $make_one))
				ON DUPLICATE KEY UPDATE dm = dm+($to_produce * $make_one);", $db);
                }
            }
            if ($checked || $fail) {
                $this->consultaBD("insert into $db.sch_mrp_tbdata_demandvrfq (prodID,fail) VALUES ($ing,fail + ($to_produce * $make_one))
			ON DUPLICATE KEY UPDATE fail = fail+($to_produce * $make_one);", $db);
            }
        }
        return $can_produce;
    }

    function do_reporte2($em = '', $type, $output = '', $mp = '', $debug = '', $start_date = '', $end_date = '', $start_year = '', $end_year = '')
    {
        $product_type = 'em.tipo = "PA"';
        $ingredient_type = 'em.tipo = "ME" or em.tipo = "MP"';
        $LoteEst = array();
        $RFP = array();
        set_time_limit(160);
        $active_code = '';
        $active_desc = '';
        $active_prodID = '';
        $active_dr = '';
        $active_le = '';
        $active_presentacion = '';
        $table = "";
        $checked = '';
        $ONPAGE = '0';
        $CLICKED = '0';
        $total1 = '0';
        $total2 = '0';
        $total3 = '0';
        $total4 = '0';
        $total5 = '0';
        $total6 = '0';
        $clicked1 = '0';
        $clicked2 = '0';
        $clicked3 = '0';
        $clicked4 = '0';
        $clicked5 = '0';
        $clicked6 = '0';
        $almacenes = '';
        $canpro = 0;
        $startmas90 = new \DateTime(date("Y-m-d"));
        $endmas90 = new \DateTime(date("Y-m-d"));
        $endmas90->modify('+3 month');
        $intervalmas90 = \DateInterval::createFromDateString('1 month');
        $periodmas90 = new \DatePeriod($startmas90, $intervalmas90, $endmas90);
        $DMmas90 = 0;

        $db = ($type == "FC" || $type == "MPto") ? "jarvis" : "jarvis";
        $this->consultaBD("DROP TABLE IF EXISTS $db.sch_mrp_tbdata_demandvrfq;", $db);
        $this->consultaBD("CREATE TABLE IF NOT EXISTS $db.sch_mrp_tbdata_demandvrfq (`prodID` int(11)  PRIMARY KEY  NOT NULL,
                  `dm` int(11) default 0 NOT NULL,
                  `fail` int(11) default 0 NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;", $db);

        if ($type == "MP" || $type == "MPto") {
            $PA = "(em.tipo = 'ME' or em.tipo = 'MP')";
            $restrict = " and (em.ccstat='ACTIVO' or em.ccstat='SUSPENDIDO') and 'VIGENTE' in (select regstat from cclabora_jarvis.shc_iyd_tbdata_entvprod where prodID=p.prodID )";
            $almacenes = "(a.almacenCODIGO = '03' or a.almacenCODIGO = '04' or a.almacenCODIGO = '16' or a.almacenCODIGO = '02' or a.almacenCODIGO = '01')";
            $onclick = '';
        }
        if ($type == "PA" || $type == "FC") {
            $PA = "em.tipo = 'PA'";
            $restrict = " and em.ccstat='ACTIVO' and evp.regstat='VIGENTE' and evp.defaultent=1 ";
            $almacenes = "a.almacenCODIGO = '09'";
            $onclick = 'onclick="submit()"';
        }
        if ($type != "FC" && $type != "MPto") {
            //$this->check_dm_report($em);
            $DM_table = "sch_mrp_tbdata_dmtable";
        } else
            $DM_table = "sch_sales_tbdata_forecast";
        set_time_limit(160);
        $sql = 'SELECT p.prodID,p.prodCODIGO,p.prodDESCRIPCION,em.dr,em.le,em.presentacion from cclabora_fsql007.productos p
                INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON em.prodID = p.prodID
                join cclabora_jarvis.shc_iyd_tbdata_entvprod evp on evp.prodID=p.prodID
                WHERE ' . $PA . ($type == "PA" ? $restrict : '') . ' order by p.prodCODIGO';
        $sth = $this->consultaBD($sql, 'fsql007');
        $total = $this->last_row_count('jarvis');
        $current = 0;
        while ($result = $sth->fetch_object()) {
            $current++;
            $active_products = '';
            $ing = array();
            $DM = 0;
            $Dd = 0;
            $SS = 0;
            $PP = 0;
            $in_stock = '';
            $style = '';
            $tooltip = '';
            $active_code = trim($result->prodCODIGO);
            $active_dr = $result->dr;
            $active_desc = trim($result->prodDESCRIPCION);
            $active_prodID = $result->prodID;
            $active_le = $result->le;
            $active_presentacion = $result->presentacion;
            $result2 = $this->consultaBD($this->in_stock($active_prodID, $almacenes), 'jarvis')->fetch_object();

            $in_stock = $result2->cant;
            $DMmas90 = 0;
            if ($type == "MP" || $type == "MPto") {

                foreach ($periodmas90 as $dtmas90) {
                    $dmprodsqlmas90 = "select `" . $dtmas90->format("n") . "` from cclabora_jarvis.sch_mrp_tbdata_rptpptomp where idMP = " . $result->prodID . " and fcyear = " . $dtmas90->format("Y");
                    //$DMprodIDmas90= FETCH_VAR($dmprodsqlmas90);
                    $DMprodIDmas90 = $this->consultaBD($dmprodsqlmas90, 'jarvis');
                    if ($DMprodIDmas90->num_rows > 0) {
                        $resultDMprodIDmas90 = $DMprodIDmas90->fetch_all();
                        //print_r($resultDMprodIDmas90);
                        $DMmas90 += $resultDMprodIDmas90[0][0];
                    } else {
                        $DMmas90 += 0;
                    }
                }

                if ($output == 'DM')
                    $active_prodID = $mp;
                $sql4 = "SELECT prodCODIGO, em2.cant as cant from cclabora_fsql007.productos p INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em2 em2 ON em2.prodID = p.prodID INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON em.prodID = p.prodID WHERE em2.ing = '$active_prodID' $restrict order by p.prodCODIGO";
                $sth4products = $this->consultaBD($sql4, 'jarvis');
                while ($result4products = $sth4products->fetch_object()) {
                    set_time_limit(160);
                    $active_products = "CODIGO_PRODUCTO = '" . $result4products->prodCODIGO . "'";
                    $ing[$active_prodID] = $result4products->cant;
                    if ($type == "MP") {
                        $sql2 = "SELECT sum(CANTIDAD)/3 as DM FROM $db.$DM_table where $active_products group BY CODIGO_PRODUCTO ";
                        //ECHO $sql2;
                        $sth2 = $this->consultaBD($sql2, 'jarvis');

                        while ($result2 = $sth2->fetch_object()) {
                            $DM += $result2->DM * $result4products->cant;
                        }
                    }
                    if ($type == "MPto") {
                        $start = new DateTime($start_year . '-' . $start_date . "-01");
                        $end = new DateTime($end_year . '-' . $end_date . "-01");
                        $end->modify('first day of next month');
                        $interval = DateInterval::createFromDateString('1 month');
                        $period = new DatePeriod($start, $interval, $end);
                        $count = 0;
                        foreach ($period as $dt) {
                            $DM += $this->fetch_var("select `" . $dt->format("m") . "` from cclabora_jarvis.sch_sales_tbdata_forecast where code = " . $active_prodID . " and year = " . $dt->format("Y"));
                            $count++;
                        }
                        $DM = $DM / $count;
                    }
                }
            } else {
                if ($output == 'DM') $active_code = $mp;
                if ($type == "FV") {
                    $start = new DateTime($start_year . '-' . $start_date . "-01");
                    $end = new DateTime($end_year . '-' . $end_date . "-01");
                    $end->modify('first day of next month');
                    $interval = DateInterval::createFromDateString('1 month');
                    $period = new DatePeriod($start, $interval, $end);
                    $count = 0;
                    foreach ($period as $dt) {
                        $DM += $this->fetch_var("select `" . $dt->format("m") . "` from cclabora_jarvis.sch_sales_tbdata_forecast where code = " . $active_prodID . " and year = " . $dt->format("Y"));
                        $count++;
                    }
                    $DMto = $DM / $count;
                }

                /*$sql2="SELECT sum(CANTIDAD)/3 as DM FROM cclabora_jarvis.sch_mrp_tbdata_dmtable where CODIGO_PRODUCTO = '$active_code' group BY CODIGO_PRODUCTO ";
                $sth2 = $this->consultaBD($sql2,'jarvis');
                while($result2 = $sth2->fetch_object()){
                    set_time_limit(160);
                    $DM = $result2->DM;

                }*/

                $sql2 = "SELECT prodCODIGO,prodDESCRIPCION, em2.cant as cant from cclabora_fsql007.productos p
		INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em2 em2 ON em2.prodID = p.prodID WHERE em2.ing = '$active_prodID'";
                $sth2 = $this->consultaBD($sql2, 'jarvis');
                while ($result2 = $sth2->fetch_object()) {
                    $DM += $this->get_dm_from_prodCODIGO($result2->prodCODIGO) * $result2->cant;
                }


                if ($type == "FV") {
                    $slider = $this->fetch_var("select value from cclabora_jarvis.sch_sales_tbdata_general where title = 'PPto'");
                    $DM = ($slider * $DMto / 100) + ((100 - $slider) * $DM / 100);
                }
            }
            if ($output == 'DM') {
                return $DM;
            }
            $DMmas90 = $DMmas90 / 3;

            if ($DMmas90 > $DM) {
                $DM = $DMmas90;
            }
            $Dd = $DM / 30;
            $SS = $Dd * $active_dr;
            $PP = $SS + ($active_dr * $Dd);

            if ($active_code) {
                $cod = '';
                $sql8 = "SELECT prodCODIGO,prodDESCRIPCION, em2.cant as cant from cclabora_fsql007.productos p INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em2 em2 ON em2.prodID = p.prodID WHERE em2.ing = '$active_prodID' order by p.prodCODIGO";
                $sth8 = $this->consultaBD($sql8, 'jarvis');
                $LoteEst = array();
                $cant = 0;
                while ($result8 = $sth8->fetch_object()) {
                    $sql7 = 'SELECT p.prodID,prodCODIGO,prodDESCRIPCION,dr,le,presentacion,em.ccstat,em.opt,em2.cant
					from cclabora_fsql007.productos p INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em2 em2 ON em2.prodID = p.prodID
					INNER JOIN cclabora_jarvis.sch_mrp_tbdata_em em ON em.prodID = p.prodID
					WHERE ' . $product_type . ' and prodCODIGO = "' . $result8->prodCODIGO . '" order by p.prodDESCRIPCION';
                    $sth7 = $this->consultaBD($sql7, 'jarvis');
                    $result7 = $sth7->fetch_object();
                    $LoteEst[$cant] = $result7->le * $result8->cant;
                    $cant = $cant + 1;
                }
                if (count($LoteEst) > 0) {
                    $CMRP = max($LoteEst);
                    if ($PP < $CMRP) {
                        if ($active_prodID == 781) {
                            $PP = round($CMRP / 14, 0);
                        } elseif ($active_prodID == 468) {
                            $PP = round($CMRP / 12, 0);
                        } elseif ($active_prodID == 467) {
                            $PP = round($CMRP / 12, 0);
                        } elseif ($active_prodID == 303) {
                            $PP = round($CMRP / 12, 0);
                        } elseif ($active_prodID == 302) {
                            $PP = round($CMRP / 12, 0);
                        } else {
                            $PP = round($CMRP, 0);
                        }
                    }
                }
            }

            if ($DM <> 0 && $in_stock < $PP && $PP <> 0 && $active_le > 0) {
                if ($type == "MP" || $type == "MPto") {
                    $num_lote_standard = ($PP + $DM) / $active_le;
                    if ($num_lote_standard > 0 and $num_lote_standard < 1) {
                        $num_lote_standard = 1;
                    } else {
                        $num_lote_standard = round(($PP + $DM) / $active_le, 0, PHP_ROUND_HALF_UP);
                    }
                } else {
                    $num_lote_standard = $DM / $active_le;
                    if ($num_lote_standard > 0 and $num_lote_standard < 1) {
                        $num_lote_standard = 1;
                    } else {
                        $num_lote_standard = round($DM / $active_le, 0, PHP_ROUND_HALF_UP);
                    }
                }
                if (isset($_POST[$this->ugly($active_desc) . "|lotes"]) && array_key_exists(ugly($active_desc), $_REQUEST)) {
                    $num_lote_standard = $_POST[$this->ugly($active_desc) . "|lotes"];
                }
                $stocks1 = $this->consultaBD($this->in_stock($active_prodID, 16), 'jarvis')->fetch_object();
                $stocks2 = $this->consultaBD($this->in_stock($active_prodID, 1), 'jarvis')->fetch_object();
                $stocks3 = $this->consultaBD($this->in_stock($active_prodID, 2), 'jarvis')->fetch_object();

                $TO_PRODUCE = ($num_lote_standard * $active_le);
                $ONPAGE += $TO_PRODUCE;
                $code = substr($active_code, 2, 1);
                //$total = "total$code";
                $total = "total";
                $total += $TO_PRODUCE;

                if (array_key_exists($this->ugly($active_desc), $_REQUEST)) {
                    $checked = 'checked="checked"';
                    $CLICKED += $TO_PRODUCE;
                    //$clicked_code = "clicked$code";
                    $clicked_code = "clicked";
                    $clicked_code += $TO_PRODUCE;
                } else
                    $checked = '';

                $sth2 = $this->consultaBD("select stocksCANTIDAD from cclabora_fsql007.stocks s
				join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
				where a.almacenCODIGO = '08' and s.prodID = $active_prodID ", 'fsql007');
                while ($result2 = $sth2->fetch_object()) {
                    $tooltip = 'title="en cuarentena PA = ' . $result2->stocksCANTIDAD . "\r\n";
                }
                $can_produce = $this->can_produce($active_prodID, $TO_PRODUCE, $checked, $db, $em);
                if ($can_produce['can_produce'] == false) {
                    $style = 'redcolor';
                    if ($checked == 'checked="checked"')
                        $canpro = 1;
                    foreach ($can_produce as $ing => $value) {
                        if ($ing <> 'can_produce') {
                            $sth3 = $this->consultaBD("select prodDESCRIPCION from cclabora_fsql007.productos where prodID = $ing", 'fsql007');
                            $sth4 = $this->consultaBD("select und from cclabora_jarvis.sch_mrp_tbdata_em2  where prodID = $active_prodID and ing = $ing", 'jarvis');
                            while ($result4 = $sth4->fetch_object()) {
                                $undvalue = $result4->und;
                            }
                            $sth2 = $this->consultaBD("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
							join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
							where (a.almacenCODIGO = '16' or a.almacenCODIGO = '01' or a.almacenCODIGO = '02') and s.prodID = $ing ", 'fsql007');

                            while ($result2 = $sth2->fetch_object()) {
                                $bodega16 = $result2->stocksCANTIDAD;
                            }
                            $bodega16 = $bodega16 <> '' ? $bodega16 : 0;
                            while ($result3 = $sth3->fetch_object()) {

                                $tooltip .= "Falta " . $result3->prodDESCRIPCION . " " . $value . " $undvalue en transito = $bodega16\r\n";
                                $sthMP = $this->consultaBD("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                where a.almacenCODIGO = '01' and s.prodID = $ing ", 'fsql007');
                                $resultMP = $sthMP->fetch_object();
                                $bodegaMP = $resultMP->stocksCANTIDAD;
                                $bodegaMP = $bodegaMP <> '' ? $bodegaMP : 0;
                                $tooltip .= "Cuarentena MP " . $result3->prodDESCRIPCION . " = $bodegaMP\r\n";
                                $sthME = $this->consultaBD("select sum(stocksCANTIDAD) as stocksCANTIDAD from cclabora_fsql007.stocks s
                                join cclabora_fsql007.almacenes a on a.almacenID = s.almacenID
                                where a.almacenCODIGO = '02' and s.prodID = $ing ", 'fsql007');
                                $resultME = $sthME->fetch_object();
                                $bodegaME = $resultME->stocksCANTIDAD;
                                $bodegaME = $bodegaME <> '' ? $bodegaME : 0;
                                $tooltip .= "Cuarentena ME " . $result3->prodDESCRIPCION . " = $bodegaME\r\n";
                            }
                            if ($output == 2) {
                                $RFP[$active_prodID] = $TO_PRODUCE;
                            }
                        }
                    }
                }

                $tooltip .= '"';
                $table[$active_desc]['num_lote_standard'] = $num_lote_standard;
                $table[$active_desc]['active_le'] = $active_le;

                if (!$output) {
                    $table[$active_desc]['style'] = $style;
                    $table[$active_desc]['tooltip'] = $tooltip;
                    $table[$active_desc]['code'] = $active_code;
                    $table[$active_desc]['to_produce'] = $TO_PRODUCE;
                    $table[$active_desc]['checked'] = $checked;
                    $table[$active_desc]['prodID'] = $active_prodID;
                    for ($x = 1; $x <= 50; $x++) {
                        $selected = '';
                        if ($num_lote_standard == $x) {
                            $selected = 'selected="selected"';
                        }
                        $table[$active_desc]['lote_options'] .= '<option ' . $selected . '  value="' . $x . '">' . $x . '</option>';
                    }

                    $table[$active_desc]['rfp_data'] = '<td>&nbsp</td>';
                    $selected_week = date('o-\WW');
                    $rfpsql = "select p.prodID,p.prodCODIGO,p.prodDESCRIPCION,r.cant,em.le,em.opt from cclabora_jarvis.sch_mrp_tbdata_rfp r
                    join cclabora_fsql007.productos p on p.prodID=r.ing
                    join cclabora_jarvis.sch_mrp_tbdata_em em on em.prodID=p.prodID
                    where r.week = '$selected_week' and r.ing=$active_prodID";
                    $rfpsth = $this->consultaBD($rfpsql, 'jarvis');
                    while ($rfpresult = $rfpsth->fetch_object()) {
                        $productionID = $result->prodID;
                        $sqlb = "from (SELECT a.ordpFECHAPEDIDO AS FECHA_ORDEN,c.prodCODIGO AS CODIGO_PRODUCTO_TERMINADO,c.prodDESCRIPCION AS NOMBRE_PRODUCTO_TERMINADO,
                        a.ordpCANTIDAD    AS CANTIDAD_A_PRODUCIR,
                        sum((((SUBSTRING(d.dtimepFINAL,1,2) * 60) + SUBSTRING(d.dtimepFINAL,4,2)) - ((SUBSTRING(d.dtimepINICIO,1,2) * 60) + SUBSTRING(d.dtimepINICIO,4,2))) / 60) AS TIEMPO
                        FROM cclabora_fsql007.OrdenesProduccion a
                        INNER JOIN cclabora_fsql007.Stocks b ON a.stocksID = b.stocksID
                        INNER JOIN cclabora_fsql007.Productos c ON b.prodID = c.prodID
                        INNER JOIN cclabora_fsql007.DetalleTiemposProductivos d ON a.ordpID = d.ordpID
                        INNER JOIN cclabora_fsql007.DocumentosTiemposProductivos e ON d.doctpID = e.doctpID
                        INNER JOIN cclabora_fsql007.TablasGenerales f ON d.fgralID = f.fgralID
                        WHERE a.ordpFECHAPEDIDO BETWEEN '" . date('Y-m-d', strtotime("-1 year")) . "' AND '" . date('Y-m-d', strtotime("yesterday")) . "'
                        and c.prodCODIGO = '" . $rfpresult->prodCODIGO . "'
                        group by a.ordpNUMERO,c.prodCODIGO ,a.ordpFECHAPEDIDO
                        order by CODIGO_PRODUCTO_TERMINADO) as tempo";
                        $rfpsql2 = "select sum(tempo.CANTIDAD_A_PRODUCIR) as cant " . $sqlb;
                        $rfpsth2 = $this->consultaBD($rfpsql2, 'jarvis');
                        $rfpresult2 = $rfpsth2->fetch_object();
                        $prodID['cant'] = $rfpresult2->cant;
                        $rfpsql2 = "select sum(tempo.TIEMPO) as ptime " . $sqlb;
                        $rfpsth2 = $this->consultaBD($rfpsql2, 'jarvis');
                        $rfpresult2 = $rfpsth2->fetch_object();
                        $prodID['ptime'] = $rfpresult2->ptime;
                        $prodID['12m_av'] = round($prodID['ptime'] / $prodID['cant'], 4, PHP_ROUND_HALF_UP);
                        $prodID['to_produce'] = $rfpresult->cant;
                        $color = 'class="cclabs_green_back white_text"';
                        if ($prodID['12m_av'] < $rfpresult->opt)
                            $color = 'class="cclabs_red_back white_text"';
                        $table[$active_desc]['rfp_data'] = '<td><span ' . $color . '>&nbsp' . $prodID['to_produce'] . '&nbsp</span></td>';
                    }
                } else {
                    $RFP[$active_prodID] = $TO_PRODUCE;
                }
                if ($type == "PA" && !$output) {
                    $resultado[0] = $ONPAGE;
                    $resultado[1] = $CLICKED;
                    $resultado[2] = $total1;
                    $resultado[3] = $clicked1;
                    $resultado[4] = $total2;
                    $resultado[5] = $clicked2;
                    $resultado[6] = $total3;
                    $resultado[7] = $clicked3;
                    $resultado[8] = $total4;
                    $resultado[9] = $clicked4;
                    $resultado[10] = $total5;
                    $resultado[11] = $clicked5;
                    $resultado[12] = $total6;
                    $resultado[13] = $clicked6;
                }
            }
        }
        $resultado[14] = $canpro;
        if ($output) {
            if (isset($RFP))
                $resultado[0] = $RFP;
            else
                $resultado[0] = 0;
        } else {
            $resultado[15] = $this->paint_table($table, $onclick);
        }

        return $resultado;
    }

    function dimeTktProm($bodega, $prodID, $rango)
    {
        $TKT = 0;
        $sth_stocks = $this->consultaBD("SELECT stocksID FROM cclabora_fsql007.stocks where almacenID = $bodega and prodID = $prodID", 'jarvis');
        if ($sth_stocks->num_rows > 0) {
            $resultstocksID = $sth_stocks->fetch_object();
            $sth_kardex = $this->consultaBD("CALL cclabora_jarvis.rpt_Kardex('$resultstocksID->stocksID','0')", 'jarvis');

            $fechaf = date('Y-m-d');
            $nuevafecha = strtotime('-' . $rango . ' month', strtotime($fechaf));
            $fechai = date('Y-m-d', $nuevafecha);
            $cant = 1;
            if ($sth_kardex->num_rows > 0) {
                while ($result = $sth_kardex->fetch_object()) {
                    if (($result->FECHA >= $fechai && $result->FECHA <= $fechaf)) {
                        if ($result->CANTIDAD_EGRESA > 0) {
                            $TKT += $result->CANTIDAD_EGRESA;
                            $cant++;
                        }
                    }
                }
                $TKTP = $TKT / $cant;
            } else {
                $TKTP = 0;
            }
            return $TKTP;
        } else {
            return 0;
        }
    }


    function costoproduccion($prodID)
    {
        $costoprod = 0;
        $sth = $this->consultaBD("select ing,cant from cclabora_jarvis.sch_mrp_tbdata_em2 where prodID = $prodID", 'jarvis');
        while ($result = $sth->fetch_object()) {
            $costo = $this->get_cost('d.prodID', $result->ing);
            $costoprod += $costo * $result->cant;
        }
        return $costoprod;
    }

    function DimeDR($prodID)
    {
        $DR = 0;
        $sth = $this->consultaBD("select dr from cclabora_jarvis.sch_mrp_tbdata_em where prodID = $prodID", 'jarvis');
        if ($sth->num_rows > 0) {
            $result = $sth->fetch_object();
            $DR += $result->dr;
        }
        return $DR;
    }

    function dimeEM($prodID)
    {


        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_em where prodID = $prodID", $jarvisConex);
        $result = 0;
        if ($sth->num_rows > 0) {
            $result = $sth->fetch_object();
        }
        $jarvisConex->close();


        return $result;
    }


    function dimeMuestreo($cantLiq)
    {
        $result = (pow(1.96, 2) * 0.5 * $cantLiq) / (pow(0.5, 2) * ($cantLiq - 1) + pow(1.96, 2) * 0.5);
        return round($result);
    }

    function autenticar()
    {
        $params = array(
            'login' => '1891720188001',
            'password' => '123456'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, "http://190.57.155.236:5782/dmz-tramaco-comercial-ws/webresources/Cliente/autenticar/");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        $result = curl_exec($ch);
        $decodedText = html_entity_decode($result);
        $myArray = json_decode($decodedText, true);
        //print_r($myArray);

        return ($myArray['salidaAutenticarWs']['usuario']);
    }

    function generarGuiasTramaco2($id_despacho, $ruta)
    {
        $user = $this->autenticar();
        $cartones = 0;
        $codParroquia = '';
        $configJira = array('username' => "jarvis", 'password' => "jarvis", 'host' => "http://servercc3:8080");
        $jira = new jira($configJira);
        $remitente = array();
        $ltsCargaDestino = array();
        $carga = array();
        $destinatario = array();
        $destinatario = array();
        $tipoIden = 0;
        $lstGuia = array();
        $jarvisConex = $this->abrirconexion('jarvis');
        //$datosDespacho = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido where id_despacho_ped='".trim($id_despacho)."' limit 1 ",$jarvisConex)->fetch_object();
        $datosDespacho = $this->consultaBD1("SELECT dp.*,oh.OrderContactId,oh.OrderShipToAddressCode FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido dp 
                join cclabora_jarvis.sch_sales_tbdata_orderheader oh on dp.nro_ped = oh.OrderNumber where dp.id_despacho_ped='" . trim($id_despacho) . "' limit 1 ", $jarvisConex)->fetch_object();
        if (is_object($datosDespacho)) {
            $datosBulto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_bulto_despacho where id_despacho_pedido='" . trim($id_despacho) . "' ", $jarvisConex);
            $bultos = $datosBulto->num_rows;
            $sth = $this->consultaBD1("select * from cclabora_jarvis.sch_tramaco_tbdata_localidad where id = 69 and activo = 1", $jarvisConex);
            $result = 0;
            $datosCliente = $this->dimeCliente($datosDespacho->clieID);
            if ($sth->num_rows > 0) {
                $result = $sth->fetch_object();
            }
            $remitente['apellidos'] = utf8_encode($result->nombre);
            $remitente['callePrimaria'] = utf8_encode($result->callePrimaria);
            $remitente['calleSecundaria'] = utf8_encode($result->calleSecundaria);
            $remitente['ciRuc'] = $result->ruc;
            $remitente['codigo Parroquia'] = $result->idParroquia;
            $remitente['email'] = $result->email;
            $remitente['nombres'] = $result->nombre;
            $remitente['numero'] = $result->numero;
            $remitente['referencia'] = $result->referencia;
            $remitente['telefono'] = $result->telefono;
            $remitente['tipoIden'] = "04";
            $remitente['codigoPostal'] = $result->codigoPostal;
            $sthcontrato = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_contrato", $jarvisConex);
            $resultcontrato = 0;
            if ($sthcontrato->num_rows > 0) {
                $resultcontrato = $sthcontrato->fetch_object();
            }
            if (round($datosDespacho->peso_total, 0) <= 50) {
                $sthproducto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_productos WHERE nombre = 'CARGA COURIER'", $jarvisConex);
            } else {
                $sthproducto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_productos WHERE nombre = 'CARGA LIVIANA'", $jarvisConex);
            }
            $resultproducto = 0;
            if ($sthproducto->num_rows > 0) {
                $resultproducto = $sthproducto->fetch_object();
            }
            $carga['alto'] = "0";
            $carga['ancho'] = "0";
            $carga['bultos'] = $bultos;
            $carga['cajas'] = $cartones;
            $carga['cantidadDoc'] = "0";
            $carga['descripcion'] = "Pedido";
            $carga['largo'] = "0";
            $carga['peso'] = round($datosDespacho->peso_total, 0);
            $carga['producto'] = $resultproducto->id;
            $carga['contrato'] = $resultcontrato->contrato;
            $carga['valorAsegurado'] = "0";
            $carga['adjuntos'] = "0";
            $carga['localidad'] = $result->id;
            $carga['guia'] = "";
            $carga['valorCobro'] = "0";
            $carga['observacion'] = "N/A";

            /*$infoCliente[9] = $this->validarTxt($datosProvinciaCiudad->cityNAME);
            $infoCliente[10] = $this->validarTxt($datosProvinciaCiudad->provinciaNOMBRE);*/
            switch ($datosCliente->clieTRUC) {
                case 1:
                    $tipoIden = "04";
                    break;
                case 2:
                    $tipoIden = "05";
                    break;
                case 3:
                    $tipoIden = "08";
                    break;
            }

            $ma = explode(";", $datosCliente->clieEMAIL);
            $mails = '';
            for ($i = 0; $i < count($ma); $i++) {
                if ($i == 0) {
                    $mails .= strtoupper($ma[$i]);
                } else {
                    $mails .= "<br>" . strtoupper($ma[$i]);
                }
            }
            $razonSocial = '';
            if ($datosDespacho->OrderShipToAddressCode != 1) {
                $sqlAddress = "SELECT * FROM cclabora_jarvis.sch_admin_tbdata_customeraddress where CustomerAddressCode = $datosCliente->clieID and CustomerAddressId = $datosDespacho->OrderShipToAddressCode";
                $sthAddress = $this->consultaBD1($sqlAddress, $jarvisConex);
                $resultAddress = $sthAddress->fetch_object();
                $datosProv = $this->dimeCiudadProvinciaN($resultAddress->CustomerAddressCity);
                if (is_object($datosProv)) {
                    //$sth_parroquia = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_dpa where provincia='" . trim($datosProv->provinciaNOMBRE) . "' and canton like '%" . trim($datosProv->cityNAME) . "%' and estado='0' ", $jarvisConex);
                    $sth_parroquia = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_dpa where provincia='" . trim($datosProv->provinciaNOMBRE) . "' and (canton like '%" . trim($datosProv->cityNAME) . "%' or parroquia like '%" . trim($datosProv->cityNAME) . "%')  and estado='0' ", $jarvisConex);
                    if ($sth_parroquia->num_rows > 0) {
                        $find = 0;
                        $direccion = $resultAddress->CustomerAddressStreet;
                        $auxDir = explode(" ", $direccion);
                        while ($result_parroquia = $sth_parroquia->fetch_object()) {
                            if ($find == 0) {
                                $find = $result_parroquia->codigo_DPA;
                            }
                            if (stristr(strtoupper($direccion), strtoupper($result_parroquia->parroquia))) {
                                $codParroquia = $result_parroquia->codigo_DPA;
                            }
                        }
                        if ($codParroquia == 0) {
                            $codParroquia = $find;
                        }
                    }
                }
                $sqlContact = "SELECT * FROM cclabora_jarvis.sch_admin_tbdata_customercontact where CustomerContactCustomer = $datosCliente->clieID and CustomerContactId = $datosDespacho->OrderContactId";
                $sthContact = $this->consultaBD1($sqlContact, $jarvisConex);
                $resultContact = $sthContact->fetch_object();
                $razonSocial = $resultContact->CustomerContactName;
            } else {
                $datosProv = $this->dimeCiudadProvincia($datosCliente->cityID);
                $codParroquia = 0;
                if (is_object($datosProv)) {
                    $sth_parroquia = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_dpa where provincia='" . trim($datosProv->provinciaNOMBRE) . "' and (canton like '%" . trim($datosProv->cityNAME) . "%' or parroquia like '%" . trim($datosProv->cityNAME) . "%')  and estado='0' ", $jarvisConex);
                    if ($sth_parroquia->num_rows > 0) {
                        $find = 0;
                        $direccion = $datosCliente->clieCALLEP . " " . $datosCliente->clieCALLES . " " . $datosCliente->clieOBSERVACIONES;
                        $auxDir = explode(" ", $direccion);
                        while ($result_parroquia = $sth_parroquia->fetch_object()) {
                            if ($find == 0) {
                                $find = $result_parroquia->codigo_DPA;
                            }
                            if (stristr(strtoupper($direccion), strtoupper($result_parroquia->parroquia))) {
                                $codParroquia = $result_parroquia->codigo_DPA;
                            }
                        }
                        if ($codParroquia == 0) {
                            $codParroquia = $find;
                        }
                    }
                }
                $razonSocial = utf8_encode($datosCliente->clieRAZONSOCIAL);
            }

            $destinatario['apellidos'] = utf8_encode($razonSocial);
            $destinatario['callePrimaria'] = utf8_encode($datosCliente->clieCALLEP);
            $destinatario['calleSecundaria'] = utf8_encode($datosCliente->clieCALLES);
            $destinatario['ciRuc'] = $datosCliente->clieRUC;
            $destinatario['codigoParroquia'] = $codParroquia;
            $destinatario['email'] = $mails;
            $destinatario['nombres'] = utf8_encode($datosCliente->clieRAZONSOCIAL);
            $destinatario['numero'] = "S/N";
            if (!empty($datosCliente->clieOBSERVACIONES)) {
                $destinatario['referencia'] = utf8_encode($datosCliente->clieOBSERVACIONES);
            } else {
                $destinatario['referencia'] = "N/A";
            }
            if (!empty($datosCliente->clieCELULAR)) {
                $destinatario['telefono'] = $datosCliente->clieCELULAR;
            } else {
                $destinatario['telefono'] = '0000000000';
            }
            $destinatario['tipoIden'] = $tipoIden;
            $destinatario['codigoPostal'] = "N/A";

            $ltsCargaDestino['id'] = $datosDespacho->nro_ped;
            $ltsCargaDestino['destinatario'] = $destinatario;
            $ltsCargaDestino['carga'] = $carga;
            $params = array(
                'usuario' => $user,
                'lstCargaDestino' => $ltsCargaDestino,
                'remitente' => $remitente
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, "http://190.57.155.236:5782/dmz-tramaco-comercial-ws/webresources/Comercial/generarGuia/");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
            $result = curl_exec($ch);
            $decodedText = html_entity_decode($result);
            $myArray = json_decode($decodedText, true);
            if (isset($myArray['salidaGenerarGuiaWs'])) {
                $lstGuia[0]['id'] = $myArray['salidaGenerarGuiaWs']['lstGuias'][0]['id'];
                $lstGuia[0]['guia'] = $myArray['salidaGenerarGuiaWs']['lstGuias'][0]['guia'];
                $params1 = array(
                    'usuario' => $user,
                    'lstGuia' => $lstGuia
                );

                $ch1 = curl_init();
                curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch1, CURLOPT_URL, "http://190.57.155.236:5782/dmz-tramaco-comercial-ws/webresources/Comercial/generarPdf/");
                curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($params1));

                $pdf = curl_exec($ch1);
                $path2 = $ruta . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\guias_tramaco\ ';

                $nombre = "G-" . trim($datosDespacho->nro_ped) . "-" . trim($datosCliente->clieID) . "_" . date("d-m") . ".pdf";
                $rutapdf = trim($path2) . $nombre;
                file_put_contents(trim($rutapdf), $pdf);
                if (!empty($datosDespacho->ticket_jira)) {
                    $link = "Guia disponible en http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/guias_tramaco/" . $nombre;
                    $jira->add_jira_comment($datosDespacho->ticket_jira, $link); //COMENTAR TICKET
                    $jira->update_jira_fields_transporte($datosDespacho->ticket_jira, 'TRAMACO', $lstGuia[0]['guia']);
                }
                $resultado[0] = $rutapdf;
                $resultado[1] = $lstGuia[0]['guia'];
                //echo" update cclabora_jarvis.sch_mrp_tbdata_despacho_pedido set guia_despcaho='".$lstGuia[0]['guia']."',transporte='TRAMACO' where id_despacho_ped='".trim($id_despacho)."' <br>";
                $this->consultaBD1("update cclabora_jarvis.sch_mrp_tbdata_despacho_pedido set guia_despcaho='" . $lstGuia[0]['guia'] . "',transporte='TRAMACO' where id_despacho_ped='" . trim($id_despacho) . "'", $jarvisConex);
                $resultado[2] = $nombre;
                $jarvisConex->close();
                return $resultado;
            } else {
                echo "<h3>No Se Gener&oacute; la Gu&iacute;a de Tramaco, por favor debe generarla manualmente.</h3>";
                return 0;
            }
        } else {
            echo "<h3>No Se Gener&oacute; la Gu&iacute;a de Tramaco, No Hay Datos del Pedido registrados en Sistema.</h3>";
            return 0;
        }
    }

    /**NUEVO CODIGO**/
    public function generaCodigoBarraServientrega($cod, $rootdir)
    {
        $charset = 'C39';
        $myBarcode = new barCode();
        $path = $rootdir . '/../' . 'web\bundles\userbundlelogistica\docs\despacho\ ';
        $myBarcode->savePath = trim($path);
        $myBarcode->getBarcodePNGPath($cod, $charset, 2, 45);
        //$bcHTMLRaw = $myBarcode->getBarcodeHTML($cod, 'C128C', 2, 45);
        return $charset . '_' . $cod . ".png";
    }
    /****************/

    /**NUEVO CODIGO**/
    function generarGuiasServientrega($id_despacho, $datosCliente, $idRemitente, $idProducto)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosDespacho = $this->consultaBD1("SELECT dp.*,oh.OrderContactId,oh.OrderShipToAddressCode,oh.OrderSpecialInstructions,oh.OrderTotal,oh.OrderShipToAddressCode,oh.OrderContactId FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido dp 
                join cclabora_jarvis.sch_sales_tbdata_orderheader oh on dp.nro_ped = oh.OrderNumber where dp.id_despacho_ped='" . trim($id_despacho) . "' limit 1 ", $jarvisConex)->fetch_object();
        if (is_object($datosDespacho)) {
            //print_r("PASO");
            $datosDespacho->peso_total;
            $sth = $this->consultaBD1("select * from cclabora_jarvis.sch_servientrega_tbdata_remitente where id = $idRemitente and activo = 1", $jarvisConex);
            if ($sth->num_rows > 0) {
                //print_r("PASO1");
                $ciudadServientregar = $this->dimeCiudadServiEntrega($datosCliente->cityID);
                //print_r($ciudadServientregar);
                if (is_object($ciudadServientregar) and $ciudadServientregar->codigo_S != 0) {
                    //print_r("PASO2");
                    $result = $sth->fetch_object();
                    $sqlAddress = "SELECT * FROM cclabora_jarvis.sch_admin_tbdata_customeraddress 
					where CustomerAddressCode = " . $datosCliente->clieID . " 
					and CustomerAddressId = " . $datosDespacho->OrderShipToAddressCode;
                    $datosAddress = $this->consultaBD1($sqlAddress, $jarvisConex)->fetch_object();
                    $sqlContact = "SELECT * FROM cclabora_jarvis.sch_admin_tbdata_customercontact 
					where CustomerContactCustomer = " . $datosCliente->clieID . " 
					and CustomerContactId = " . $datosDespacho->OrderContactId;
                    $datosContact = $this->consultaBD1($sqlContact, $jarvisConex)->fetch_object();


                    if (!empty($datosCliente->clieCELULAR)) {
                        $telefono_destinatario = $datosCliente->clieCELULAR;
                    } else {
                        $telefono_destinatario = '0000000000';
                    }
                    $pesoTotal = 0;
                    if ($datosDespacho->peso_total < 1) {
                        $pesoTotal = 1;
                    } else {
                        $pesoTotal = $datosDespacho->peso_total;
                    }
                    if (is_object($datosAddress)) {
                        $address = $datosAddress->CustomerAddressStreet;
                    } else {
                        $address = utf8_encode($datosCliente->clieCALLEP) . " " . utf8_encode($datosCliente->clieCALLES);
                    }
                    if (is_object($datosContact)) {
                        $contact = $datosContact->CustomerContactName;
                    } else {
                        $contact = utf8_encode($datosCliente->clieCONTACTO);
                    }

                    $params = array(
                        'ID_TIPO_LOGISTICA' => 1,
                        'DETALLE_ENVIO_1' => utf8_decode($datosDespacho->OrderSpecialInstructions),
                        'DETALLE_ENVIO_2' => utf8_decode($datosDespacho->OrderSpecialInstructions),
                        'DETALLE_ENVIO_3' => utf8_decode($datosDespacho->OrderSpecialInstructions),
                        'ID_CIUDAD_ORIGEN' => $result->idCiudad,
                        'ID_CIUDAD_DESTINO' => $ciudadServientregar->codigo_S,
                        'ID_DESTINATARIO_NE_CL' => $datosCliente->clieRUC,
                        'RAZON_SOCIAL_DESTI_NE' => utf8_decode($datosCliente->clieRAZONSOCIAL),
                        'NOMBRE_DESTINATARIO_NE' => utf8_encode($contact),
                        'APELLIDO_DESTINATAR_NE' => utf8_encode($contact),
                        'DIRECCION1_DESTINAT_NE' => utf8_encode($address),
                        'SECTOR_DESTINAT_NE' => utf8_encode($address),
                        'TELEFONO1_DESTINAT_NE' => $telefono_destinatario,
                        'TELEFONO2_DESTINAT_NE' => $telefono_destinatario,
                        'CODIGO_POSTAL_DEST_NE' => '000000',
                        'ID_REMITENTE_CL' => $result->ruc,
                        'RAZON_SOCIAL_REMITE' => $result->nombre,
                        'NOMBRE_REMITENTE' => 'Cedis',
                        'APELLIDO_REMITE' => 'CCLabs',
                        'DIRECCION1_REMITE' => utf8_decode($result->callePrimaria) . " " . utf8_decode($result->numero) . " y " . utf8_decode($result->calleSecundaria),
                        'SECTOR_REMITE' => utf8_decode($result->callePrimaria),
                        'TELEFONO1_REMITE' => $result->telefono,
                        'TELEFONO2_REMITE' => $result->telefono,
                        'CODIGO_POSTAL_REMI' => $result->codigoPostal,
                        'ID_PRODUCTO' => $idProducto,
                        'CONTENIDO' => "Pedido",
                        "NUMERO_PIEZAS" => $datosDespacho->bultos,
                        "VALOR_MERCANCIA" => 1,
                        "VALOR_ASEGURADO" => 0,
                        "LARGO" => 0,
                        "ANCHO" => 0,
                        "ALTO" => 0,
                        "PESO_FISICO" => (double)$pesoTotal,
                        "LOGIN_CREACION" => "fabricio.chavez",
                        "PASSWORD" => "CEDIS5454"
                    );


                    //PRINT_R($params);
                    //PRINT_R(json_encode($params)."PASO<br>");

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    curl_setopt($ch, CURLOPT_URL, "https://swservicli.servientrega.com.ec:5052/api/guiawebs/");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_POST, TRUE);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
                    // Set HTTP Header for POST request


                    $result = curl_exec($ch);
                    //print_r($result);

                    if (curl_errno($ch)) {
                        $resulterror = 'cURL ERROR -> ' . curl_errno($ch) . ': ' . curl_error($ch);
                    } else {
                        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        switch ($returnCode) {
                            case 200:
                                break;
                            default:
                                $resulterror = 'HTTP ERROR -> ' . $returnCode . "<br>";
                                //print_r($resulterror);
                                break;
                        }
                    }
                    curl_close($ch);
                    $jsonObject = json_decode($result);
                    if (is_object($jsonObject)) {
                        if ($jsonObject->id != 0) {
                            $this->consultaBD1("update cclabora_jarvis.sch_mrp_tbdata_despacho_pedido set guia_despcaho='" . $jsonObject->id . "',transporte='SERVIENTREGA' where id_despacho_ped='" . trim($id_despacho) . "'", $jarvisConex);
                            return $jsonObject->id;
                        } else {
                            return 0;
                        }
                    } else {
                        return 0;
                    }
                } else {
                    return "C";
                }
            }
        }
    }

    /*******************************/

    function generarGuiasTramaco($peso, $bultos, $cartones, $datosCliente, $idDesPed, $ruta, $ticket)
    {
        $user = $this->autenticar();
        $configJira = array('username' => "jarvis", 'password' => "jarvis", 'host' => "http://servercc3:8080");
        $jira = new jira($configJira);
        $remitente = array();
        $ltsCargaDestino = array();
        $carga = array();
        $destinatario = array();
        $destinatario = array();
        $tipoIden = 0;
        $lstGuia = array();
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("select * from cclabora_jarvis.sch_tramaco_tbdata_localidad where id = 69 and activo = 1", $jarvisConex);
        $result = 0;
        //print_r($sth);
        if ($sth->num_rows > 0) {
            $result = $sth->fetch_object();
        }

        $remitente['apellidos'] = $result->nombre;
        $remitente['callePrimaria'] = $result->callePrimaria;
        $remitente['calleSecundaria'] = $result->calleSecundaria;
        $remitente['ciRuc'] = $result->ruc;
        $remitente['codigoParroquia'] = $result->idParroquia;
        $remitente['email'] = $result->email;
        $remitente['nombres'] = $result->nombre;
        $remitente['numero'] = $result->numero;
        $remitente['referencia'] = $result->referencia;
        $remitente['telefono'] = $result->telefono;
        $remitente['tipoIden'] = "04";
        $remitente['codigoPostal'] = $result->codigoPostal;


        $sthcontrato = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_contrato", $jarvisConex);
        $resultcontrato = 0;
        if ($sthcontrato->num_rows > 0) {
            $resultcontrato = $sthcontrato->fetch_object();
        }

        if ($peso <= 50) {
            $sthproducto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_productos WHERE nombre = 'CARGA COURIER'", $jarvisConex);
        } else {
            $sthproducto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_productos WHERE nombre = 'CARGA LIVIANA'", $jarvisConex);
        }

        $resultproducto = 0;
        if ($sthproducto->num_rows > 0) {
            $resultproducto = $sthproducto->fetch_object();
        }

        $carga['alto'] = "0";
        $carga['ancho'] = "0";
        $carga['bultos'] = $bultos;
        $carga['cajas'] = $cartones;
        $carga['cantidadDoc'] = "0";
        $carga['descripcion'] = "Pedido";
        $carga['largo'] = "0";
        $carga['peso'] = $peso;
        $carga['producto'] = $resultproducto->id;
        $carga['contrato'] = $resultcontrato->contrato;
        $carga['valorAsegurado'] = "0";
        $carga['adjuntos'] = "0";
        $carga['localidad'] = $result->id;
        $carga['guia'] = "";
        $carga['valorCobro'] = "0";
        $carga['observacion'] = "N/A";

        /*$infoCliente[9] = $this->validarTxt($datosProvinciaCiudad->cityNAME);
        $infoCliente[10] = $this->validarTxt($datosProvinciaCiudad->provinciaNOMBRE);*/
        switch ($datosCliente->clieTRUC) {
            case 1:
                $tipoIden = "04";
                break;
            case 2:
                $tipoIden = "05";
                break;
            case 3:
                $tipoIden = "08";
                break;
        }

        $ma = explode(";", $datosCliente->clieEMAIL);
        $mails = '';
        for ($i = 0; $i < count($ma); $i++) {
            if ($i == 0) {
                $mails .= strtoupper($ma[$i]);
            } else {
                $mails .= "<br>" . strtoupper($ma[$i]);
            }
        }

        $datosProv = $this->dimeCiudadProvincia($datosCliente->cityID);
        $codParroquia = 0;
        if (is_object($datosProv)) {
            $sth_parroquia = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_tramaco_tbdata_dpa where provincia='" . trim($datosProv->provinciaNOMBRE) . "' and canton='" . trim($datosProv->cityNAME) . "' and estado='1' ", $jarvisConex);
            if ($sth_parroquia->num_rows > 0) {
                $find = 0;
                $direccion = $datosCliente->clieCALLEP . " " . $datosCliente->clieCALLES . " " . $datosCliente->clieOBSERVACIONES;
                $auxDir = explode(" ", $direccion);
                while ($result_parroquia = $sth_parroquia->fetch_object()) {
                    $find = $result_parroquia->codigo_DPA;
                    if (stristr(strtoupper($direccion), strtoupper($result_parroquia->parroquia))) {
                        $codParroquia = $result_parroquia->codigo_DPA;
                    }
                }
                if ($codParroquia == 0) {
                    $codParroquia = $find;
                }
            }
        }
        $destinatario['apellidos'] = utf8_encode($datosCliente->clieNOMBRECOMERCIAL);
        $destinatario['callePrimaria'] = $datosCliente->clieCALLEP;
        $destinatario['calleSecundaria'] = $datosCliente->clieCALLES;
        $destinatario['ciRuc'] = $datosCliente->clieRUC;
        $destinatario['codigoParroquia'] = $codParroquia;
        $destinatario['email'] = $mails;
        $destinatario['nombres'] = utf8_encode($datosCliente->clieRAZONSOCIAL);
        $destinatario['numero'] = "S/N";
        if (!empty($datosCliente->clieOBSERVACIONES)) {
            $destinatario['referencia'] = $datosCliente->clieOBSERVACIONES;
        } else {
            $destinatario['referencia'] = "N/A";
        }
        if (!empty($datosCliente->clieCELULAR)) {
            $destinatario['telefono'] = $datosCliente->clieCELULAR;
        } else {
            $destinatario['telefono'] = '0000000000';
        }
        $destinatario['tipoIden'] = $tipoIden;
        $destinatario['codigoPostal'] = "N/A";

        $ltsCargaDestino['id'] = $idDesPed;
        $ltsCargaDestino['destinatario'] = $destinatario;
        $ltsCargaDestino['carga'] = $carga;

        $params = array(
            'usuario' => $user,
            'lstCargaDestino' => $ltsCargaDestino,
            'remitente' => $remitente
        );
        $jarvisConex->close();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, "http://190.57.155.236:5681/dmz-tramaco-comercial-ws/webresources/Comercial/generarGuia/");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        $result = curl_exec($ch);
        $decodedText = html_entity_decode($result);
        $myArray = json_decode($decodedText, true);
        if (isset($myArray['salidaGenerarGuiaWs'])) {
            $lstGuia[0]['id'] = $myArray['salidaGenerarGuiaWs']['lstGuias'][0]['id'];
            $lstGuia[0]['guia'] = $myArray['salidaGenerarGuiaWs']['lstGuias'][0]['guia'];
            $params1 = array(
                'usuario' => $user,
                'lstGuia' => $lstGuia
            );

            $ch1 = curl_init();
            curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch1, CURLOPT_URL, "http://190.57.155.236:5681/dmz-tramaco-comercial-ws/webresources/Comercial/generarPdf/");
            curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($params1));

            $pdf = curl_exec($ch1);
            $path2 = $ruta . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\guias_tramaco\ ';

            $nombre = "G-" . trim($idDesPed) . "-" . trim($datosCliente->clieID) . "_" . date("d-m") . ".pdf";
            $rutapdf = trim($path2) . $nombre;
            file_put_contents(trim($rutapdf), $pdf);
            //$link = "Guia disponible en http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/guias_tramaco/" . $nombre;
            //$jira->add_jira_comment($ticket, $link); //COMENTAR TICKET
            $resultado[0] = $rutapdf;
            $resultado[1] = $lstGuia[0]['guia'];
            $resultado[2] = $nombre;
            return $resultado;
        } else {
            echo "<h3>No Se Gener&oacute; la Gu&iacute;a de Tramaco, por favor debe generarla manualmente.</h3>";
            return 0;
        }
    }

    function generarRemitente($lstLocalidad, $localidad)
    {
        $cant = count($lstLocalidad);
        for ($i = 0; $i <= $cant; $i++) {
            //if($lstLocalidad[$i]['nombre']
        }
    }

    public function arreglarIngresosLotes()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("select * from cclabora_jarvis.sch_prod_tbdata_bultos_op op join sch_prod_tbdata_liquidacion_op bop on  op.id_liqop=bop.id_liqop", $jarvisConex);
        $a_lotes = array();
        $f_caducidad = array();
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                if (isset($a_lotes[$result->lote_op])) {
                    $a_lotes[$result->lote_op] = $a_lotes[$result->lote_op] + $result->qty_lote_op;
                } else {
                    $a_lotes[$result->lote_op] = $result->qty_lote_op;
                }
                if (!isset($f_caducidad[$result->lote_op])) {
                    $f_caducidad[$result->lote_op] = $result->fecha_caducidad_op;
                }
            }
        }
        foreach ($a_lotes as $key => $valor) {
            $caducidad = $f_caducidad[$key];
            $this->consultaBD1("insert into cclabora_jarvis.sch_prod_tbdata_reg_lotes ( lote_desc, cant_lote, fecha_vence_lote, fecha_reg_lote, estadi_reg_lote) VALUES ('" . trim($key) . "','" . trim($valor) . "','" . trim($caducidad) . "','" . date("Y-m-d H:i:s") . "','1') ", $jarvisConex);

        }
        $jarvisConex->close();

    }

    public function saldoLote($id_reg_lotes)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $saldo = 0;
        $salidas = $this->consultaBD1("SELECT sum(cant_movlote) as cant FROM cclabora_jarvis.sch_prod_tbdata_movimiento_lotes where tipo_movlote='S' and id_reg_lote='" . trim($id_reg_lotes) . "' ", $jarvisConex)->fetch_object();
        if (is_object($salidas)) {
            $saldo += $salidas->cant;
        }
        $entrada = $this->consultaBD1("SELECT sum(cant_movlote) as cant FROM cclabora_jarvis.sch_prod_tbdata_movimiento_lotes where tipo_movlote='I' and id_reg_lote='" . trim($id_reg_lotes) . "' ", $jarvisConex)->fetch_object();
        if (is_object($salidas)) {
            $saldo = $saldo - $entrada->cant;
        }
        $DatosLote = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_reg_lotes where id_reg_lotes='" . trim($id_reg_lotes) . "' limit 1 ", $jarvisConex)->fetch_object();
        if (is_object($DatosLote)) {
            $saldo = $DatosLote->cant_lote - $saldo;
        }
        $jarvisConex->close();
        return $saldo;
    }

    public function buscaLote($id_lote)
    {
        $funciones = new funciones();
        $jarvisConex = $funciones->abrirconexion('jarvis');
        $sth_lotes = $funciones->consultaBD1("SELECT DISTINCT lt.*,op.id_liqop,op.nro_bultos,pr.prodCODIGO,pr.prodID,pr.prodDESCRIPCION,em.le,em.tipo FROM cclabora_jarvis.sch_prod_tbdata_reg_lotes lt
                                              join cclabora_jarvis.sch_prod_tbdata_bultos_op  bop on bop.lote_op=lt.lote_desc
                                              join cclabora_jarvis.sch_prod_tbdata_liquidacion_op op on bop.id_liqop=op.id_liqop
                                              join cclabora_jarvis.sch_admin_tbdata_productos pr on pr.prodCODIGO=op.id_producto
                                              join cclabora_jarvis.sch_mrp_tbdata_em em on pr.prodID=em.prodID
                                              where id_reg_lotes='" . trim($id_lote) . "';", $jarvisConex);
        $tr = '';
        if ($sth_lotes->num_rows) {
            $tr = $sth_lotes->fetch_object();
        }
        $jarvisConex->close();
        return $tr;

    }

    public function saldoBultoLote($idbulto)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $saldo = 0;
        $salidas = $this->consultaBD1("SELECT sum(cant_movlote) as cant FROM cclabora_jarvis.sch_prod_tbdata_kardex_lotes kl  join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes ml on kl.id_movlote=ml.id_movlote where kl.id_bulto=" . trim($idbulto) . " and ml.tipo_movlote='S';", $jarvisConex)->fetch_object();
        if (is_object($salidas)) {
            $saldo += $salidas->cant;
        }
        $salidas = $this->consultaBD1("SELECT sum(cant_movlote) as cant FROM cclabora_jarvis.sch_prod_tbdata_lote_despacho ld  join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes ml on ld.id_movlote=ml.id_movlote where ld.id_bultos_op=" . trim($idbulto) . " and ml.tipo_movlote='S'", $jarvisConex)->fetch_object();
        if (is_object($salidas)) {
            $saldo += $salidas->cant;
        }
        $entrada = $this->consultaBD1("SELECT sum(cant_movlote) as cant FROM cclabora_jarvis.sch_prod_tbdata_kardex_lotes kl  join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes ml on kl.id_movlote=ml.id_movlote where kl.id_bulto=" . trim($idbulto) . " and ml.tipo_movlote='I';", $jarvisConex)->fetch_object();
        if (is_object($salidas)) {
            $saldo = $saldo - $entrada->cant;
        }
        $entrada = $this->consultaBD1("SELECT sum(cant_movlote) as cant FROM cclabora_jarvis.sch_prod_tbdata_lote_despacho ld  join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes ml on ld.id_movlote=ml.id_movlote where ld.id_bultos_op=" . trim($idbulto) . " and ml.tipo_movlote='I'", $jarvisConex)->fetch_object();
        if (is_object($salidas)) {
            $saldo = $saldo - $entrada->cant;
        }


        $datosBulto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_bultos_op where id_bultos_op='" . trim($idbulto) . "' limit 1 ", $jarvisConex)->fetch_object();
        if (is_object($datosBulto)) {
            $saldo = $datosBulto->qty_lote_op - $saldo;
        }
        $jarvisConex->close();
        return $saldo;
    }

    public function calificacionProv($idProv)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_rfq = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_rfq where codigoPROVEEDOR='" . trim($idProv) . "'", $jarvisConex);
        //$estatus = array('14'=>'14','15'=>'15','16'=>'16','17'=>'17','19'=>'19','21'=>'21','10018'=>'10018');
        $estatus = array('1' => '1', '10017' => '10017', '10201' => '10201', '10016' => '10016', '10016' => '10016', '11201' => '11201', '10018' => '10018');
        $estadosTiempo = array();
        $nivelServicioOC = array();
        $producto = array();
        if ($sth_rfq->num_rows > 0) {
            while ($resul_rfq = $sth_rfq->fetch_object()) {
                $sht_oc = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_jiracontrol where id_ticket_jira='" . trim($resul_rfq->ticket) . "' ", $jarvisConex);
                if ($sht_oc->num_rows > 0) {
                    while ($resul_oc = $sht_oc->fetch_object()) {
                        if (isset($estatus[$resul_oc->id_estatus_jira])) {
                            $fechAux = explode(" ", $resul_oc->fecha_trans);
                            $estadosTiempo[$resul_rfq->ticket][$resul_oc->id_estatus_jira] = $fechAux[0];
                        }
                    }
                }
                $producto[$resul_rfq->ticket] = $resul_rfq->prodCODIGO . ";" . $resul_rfq->prodDESCRIPCION;
                $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_nivel_servicios_jira where id_indice_ns="' . $idProv . '" and id_subindice_ns="' . $resul_rfq->prodID . '" ', $jarvisConex);
                $ns = 0;
                $m = 1;
                if ($sth_ns->num_rows > 0) {

                    while ($result = $sth_ns->fetch_object()) {
                        if ($result->estado_ns != 0) {
                            if ($result->id_estado_jira != 11200) {
                                if ($result->id_estado_jira != 11201) {
                                    $ns = $ns + $result->valor_ns;
                                    $m++;
                                }
                            }
                        }
                    }
                }
                $nivelServicioOC[$resul_rfq->ticket] = $ns;
            }
        }
        $maximaCalificacion = 100;
        $totalCalif = 0;
        $tr = '<tr><th colspan="6">NO HAY REGISTRO DE ORDENES DE COMPRA</th></tr>';
        $califGeneral = 0;
        $OTPorcGeneral = 0;
        $maximaOT = 100;
        $totalOT = 0;
        if (count($estadosTiempo) > 0) {
            $tr = '';
            $contador = 0;
            foreach ($estadosTiempo as $key => $valor) {
                $OT = "OT";
                if (isset($estadosTiempo[$key][11201])) {
                    $tiempof = $estadosTiempo[$key][11201];
                } else {
                    $tiempof = end($estadosTiempo[$key]);
                }
                $tiempo = $this->dimeDiasTranscurridos($estadosTiempo[$key][1], $tiempof);
                if ($tiempo != 0) {
                    $calif = round(($nivelServicioOC[$key] * $maximaCalificacion) / $tiempo, 1);
                    if ($calif > $maximaCalificacion) {
                        $calif = $maximaCalificacion;
                    }
                    $OTPorc = round(($nivelServicioOC[$key] * $maximaOT) / $tiempo, 1);
                    if ($OTPorc > $maximaOT) {
                        $OTPorc = $maximaOT;
                    }
                    if ($OTPorc < 100 and $OTPorc >= 90) {
                        $OT = "OT + 1";
                    } elseif ($OTPorc < 90 and $OTPorc >= 80) {
                        $OT = "OT + 2";
                    } elseif ($OTPorc < 80) {
                        $OT = "OT + 3";
                    }
                    $datosProducto = explode(";", $producto[$key]);
                    $tr .= '<tr>
                                <td><a href="http://servercc3:8080/browse/' . $key . '" class="btn btn-link" target="blank_" >' . $key . '</a></td>
                                <td>' . $datosProducto[0] . '</td>
                                <td>' . utf8_encode($datosProducto[1]) . '</td>
                                <td>' . $nivelServicioOC[$key] . '</td>
                                <td>' . $tiempo . '</td>
                                <td>' . $calif . '</td>
                                <td>' . $OT . '</td>
                          </tr>';
                    $totalCalif += $calif;
                    $totalOT += $OTPorc;
                    $contador++;
                }
            }
            if ($contador > 0) {
                $califGeneral = round($totalCalif / ($contador), 1);
                $OTPorcGeneral = round($totalOT / ($contador), 1);
            }

            if ($OTPorcGeneral > $maximaOT) {
                $OTPorcGeneral = $maximaOT;
            }
            if ($OTPorcGeneral < 100 and $OTPorcGeneral >= 90) {
                $OTGeneral = "OT + 1";
            } elseif ($OTPorcGeneral < 90 and $OTPorcGeneral >= 80) {
                $OTGeneral = "OT + 2";
            } elseif ($OTPorcGeneral < 80) {
                $OTGeneral = "OT + 3";
            }
        }
        $table[0] = $tr;
        $table[1] = '' . $califGeneral . ' <input type="hidden" id="calif_prov" name="calif_prov" value="' . $califGeneral . '">';
        $table[2] = $califGeneral;
        $jarvisConex->close();
        return $table;
    }

    public function estilosExcel()
    {
        $estilosExcel = array();
        $estilosExcel['estiloTituloReporte'] = array(
            'font' => array(
                'name' => 'Verdana',
                'bold' => true,
                'italic' => false,
                'strike' => false,
                'size' => 14,
                'color' => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' => array(
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array(
                    'rgb' => '002D90')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_NONE
                )
            ),
            'alignment' => array(
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'rotation' => 0,
                'wrap' => TRUE
            )
        );


        $estilosExcel['estiloTituloColumnas'] = array(
            'font' => array(
                'name' => 'Calibri',
                'bold' => true,
                'color' => array(
                    'rgb' => '000000'
                ),
                'size' => 11
            ),
            'borders' => array(
                'top' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '000000'
                    )
                ),
                'bottom' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                ),
                'left' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                ),
                'right' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            ),
            'alignment' => array(
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => TRUE
            )
        );


        $estilosExcel['estiloInformacion'] = new \PHPExcel_Style();
        $estilosExcel['estiloInformacion']->applyFromArray(array(
            'font' => array(
                'name' => 'Calibri',
                'color' => array(
                    'rgb' => '000000'
                ),
                'size' => 11
            ),
            'borders' => array(
                'left' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                ),
                'button' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                ),
                'top' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                ),
                'right' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            )
        ));

        $estilosExcel['estiloInformacionbutton'] = array(
            'borders' => array(
                'bottom' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            )
        );

        return $estilosExcel;
    }

    public function auditoriaFiresoft($msj, $proceso, $tip, $user)
    {
        //echo "PASO";
        $host = @gethostbyaddr($_SERVER['REMOTE_ADDR']);
        //print_r($host);
        $ban = array(0 => 0, 1 => 0);
        if (!empty($host)) {
            $jarvisConex = $this->abrirconexion('jarvis');
            $datosHost = $this->consultaBD1("SELECT * FROM fsqladmin.sesiones where sesionPCNAME like '%" . trim($host) . "%' ORDER BY sesionINGRESO desc LIMIT 1;", $jarvisConex)->fetch_object();
            //print_r($datosHost);
            if (is_object($datosHost)) {
                $insert = $this->consultaBD1("insert into fsqladmin.auditoria (auditoriaFECHAEVENTO, auditoriaEVENTO, procesosID, sesionID, auditoriaDESCRIPCION, emprID) values ('" . date("Y-m-d H:i:s") . "','" . trim($tip) . "'," . trim($proceso) . "," . trim($datosHost->sesionID) . ",'" . $msj . "',7) ", $jarvisConex);
                if ($insert == 1) {
                    $ban[0] = $datosHost->usersID;
                    $datosAuditoria = $this->consultaBD1("SELECT * FROM fsqladmin.auditoria ORDER BY auditoriaID DESC LIMIT 1;", $jarvisConex)->fetch_object();
                    if (is_object($datosAuditoria)) {
                        $ban[1] = $datosAuditoria->auditoriaID;
                    }

                }
            } else {
                if (is_int($user)) {
                    $datosHost = $this->consultaBD1("SELECT * FROM fsqladmin.sesiones where usersID = '" . trim($user) . "' ORDER BY sesionINGRESO desc LIMIT 1;", $jarvisConex)->fetch_object();
                    if (is_object($datosHost)) {
                        $insert = $this->consultaBD1("insert into fsqladmin.auditoria (auditoriaFECHAEVENTO, auditoriaEVENTO, procesosID, sesionID, auditoriaDESCRIPCION, emprID) values ('" . date("Y-m-d H:i:s") . "','" . trim($tip) . "'," . trim($proceso) . "," . trim($datosHost->sesionID) . ",'" . $msj . "',7) ", $jarvisConex);
                        if ($insert == 1) {
                            $ban[0] = $datosHost->usersID;
                            $datosAuditoria = $this->consultaBD1("SELECT * FROM fsqladmin.auditoria ORDER BY auditoriaID DESC LIMIT 1;", $jarvisConex)->fetch_object();
                            if (is_object($datosAuditoria)) {
                                $ban[1] = $datosAuditoria->auditoriaID;
                            }
                        }
                    }
                }
            }
            $jarvisConex->close();
        } else {
            if (is_int($user)) {
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosHost = $this->consultaBD1("SELECT * FROM fsqladmin.sesiones where usersID = '" . trim($user) . "' ORDER BY sesionINGRESO desc LIMIT 1;", $jarvisConex)->fetch_object();
                if (is_object($datosHost)) {
                    $insert = $this->consultaBD1("insert into fsqladmin.auditoria (auditoriaFECHAEVENTO, auditoriaEVENTO, procesosID, sesionID, auditoriaDESCRIPCION, emprID) values ('" . date("Y-m-d H:i:s") . "','" . trim($tip) . "'," . trim($proceso) . "," . trim($datosHost->sesionID) . ",'" . $msj . "',7) ", $jarvisConex);
                    if ($insert == 1) {
                        $ban[0] = $datosHost->usersID;
                        $datosAuditoria = $this->consultaBD1("SELECT * FROM fsqladmin.auditoria ORDER BY auditoriaID DESC LIMIT 1;", $jarvisConex)->fetch_object();
                        if (is_object($datosAuditoria)) {
                            $ban[1] = $datosAuditoria->auditoriaID;
                        }
                    }
                }
                $jarvisConex->close();
            }
        }
        return $ban;
    }


    public function eventosAuditoria($idauditoria, $tableid, $evento)
    {
        $result = 0;
        $jarvisConex = $this->abrirconexion('jarvis');
        $insert = $this->consultaBD1("insert into cclabora_fsql007.eventosauditoria (auditoriaID, tableID, eventoIDPrimary) values (" . trim($idauditoria) . "," . trim($tableid) . "," . trim($evento) . ") ", $jarvisConex);
        $jarvisConex->close();
        if ($insert) {
            $result = 1;
        }
        return $result;
    }

    public function validaPermiso($user, $link, $dir)
    {
        $jarvisConex = $this->abrirconexion('xtreme',0); 
        $permisos = array(); 
//        $user='ccobo';
        $sql = "SELECT up.*,sp.nombre_subprocesos FROM sch_securelogin_tbdata_usuarios_permisos up
               join sch_securelogin_tbdata_members m on up.id_usuario=m.id
               join sch_securelogin_tbdata_subprocesos sp on up.id_subprocesos=sp.id_subprocesos
               where m.username='" . trim($user) . "' and m.expired=0 and sp.link_subprocesos='" . $link . "' and sp.estado_subprocesos=1;";
        $sth_p = $this->consultaBD1($sql, $jarvisConex);
        $jarvisConex->close();
        if ($sth_p->num_rows > 0) {
            $nombre_p = '';
            while ($result = $sth_p->fetch_object()) {
                $permisos[$result->id_accion_permiso] = $result->id_accion_permiso;
                $nombre_p = $result->nombre_subprocesos;
            }
            if (strlen($nombre_p) <= 4) {
                $permisos['page'] = utf8_encode(strtoupper($nombre_p));
            } else {
                $permisos['page'] = utf8_encode(ucwords(strtolower($nombre_p)));
            }
        } else {
            /*header('Status: 301 Moved Permanently', false, 301);
            header('Location: ' . $dir . '/web/app.php/menu');
            exit();*/
        }
        return $permisos;

    }

    public function dimeHeaderNs()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $header[0] = '';
        $header[1] = 0;
        $cont = 1;
        $sth_ns = $this->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_tbdata_estados where tipo = "OCIT" and orden_estado !=0 group by orden_estado', $jarvisConex);
        if ($sth_ns->num_rows > 0) {
            $m = 1;
            while ($result = $sth_ns->fetch_object()) {
                $nombreEStJira = $result->description;
                if ($nombreEStJira == 'NOTA DE PEDIDO') {
                    $nombreEStJira = 'NT.PEDIDO';
                }
                $nombreEStJira = substr($nombreEStJira, 0, 11);
                $header[0] .= '<th>' . strtoupper($nombreEStJira) . '</th>';
                $cont++;
            }
        }
        $header[1] = $cont;
        $jarvisConex->close();
        return $header;

    }

    public function pdfpacking($idped, $path, $path2)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosPedido = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido dp
                                           join cclabora_jarvis.sch_admin_tbdata_clientes c on dp.clieID=c.clieID
                                           join cclabora_fsql007.tablasgenerales tg on tg.fgralID=c.clieID_VENDEDOR
                                           where id_despacho_ped=" . trim($idped) . " limit 1;", $jarvisConex)->fetch_object();
        $html = file_get_contents($path);
        if (is_object($datosPedido)) {
            $nro_ped = $datosPedido->nro_ped;
            $titulo = 'Packing List ';
            if ($datosPedido->fvtaID == 0) {
                $titulo .= 'Muestra';
            } else {
                if (substr($nro_ped, 0, 3) == 'DEV') {
                    $titulo .= 'Devoluc&oacute;n';
                } else {
                    $titulo .= 'Pedido';
                }
            }
            $sth_detalle = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_lote_despacho lt
                                                join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes mv on lt.id_movlote=mv.id_movlote
                                                join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_bultos_op=lt.id_bultos_op
                                                join cclabora_jarvis.sch_prod_tbdata_liquidacion_op op on bop.id_liqop=op.id_liqop
                                                join cclabora_jarvis.sch_admin_tbdata_productos p on op.id_producto=p.prodCODIGO
                                                where id_despacho_ped=" . trim($datosPedido->id_despacho_ped) . " order by p.prodDESCRIPCION ASC ", $jarvisConex);
            $table = '';
            $items = array();
            if ($sth_detalle->num_rows > 0) {
                while ($result_detalle = $sth_detalle->fetch_object()) {
                    if (isset($items[$result_detalle->prodDESCRIPCION])) {
                        $items[$result_detalle->prodDESCRIPCION] = $items[$result_detalle->prodDESCRIPCION] + $result_detalle->cant_movlote;
                    } else {
                        $items[$result_detalle->prodDESCRIPCION] = $result_detalle->cant_movlote;
                    }
                    $item[$result_detalle->prodDESCRIPCION] = $result_detalle->cant_movlote;
                    $table .= '<tr>
                                <td>' . $result_detalle->prodDESCRIPCION . '</td>
                                <td>' . $result_detalle->lote_op . '</td>
                                <td>' . $result_detalle->cant_movlote . '</td>
                             </tr>';
                }
            }
            $ciudad = $this->dimeCiudadProvincia($datosPedido->cityID);
            $city = '';
            $provincia = '';
            if (is_object($ciudad)) {
                $city = $ciudad->cityNAME;
                $provincia = $ciudad->provinciaNOMBRE;
            }
            $porciones = explode(";", $datosPedido->clieEMAIL);
            if (trim($porciones[0]) == '') {
                $html = str_replace("{email}", 'No tiene', $html);
            } else {
                $html = str_replace("{email}", $porciones[0], $html);
            }
            $html = str_replace("{titulo_ped}", $titulo, $html);
            $html = str_replace("{pagina}", '1', $html);
            $html = str_replace("{fecha}", date('dd/mm/Y'), $html);
            $html = str_replace("{hora}", date('H:i:s'), $html);
            $html = str_replace("{nombre}", $datosPedido->clieRAZONSOCIAL, $html);
            //  $html = str_replace("{cedula}",$datosPedido->clieRUC,$html);
            $html = str_replace("{telefono}", $datosPedido->clieFONO1, $html);
            $html = str_replace("{celular}", $datosPedido->clieCELULAR, $html);
            $html = str_replace("{contacto}", $datosPedido->clieCONTACTO, $html);
            $direccionc = $datosPedido->clieCALLEP . " " . $datosPedido->clieCALLES;
            $html = str_replace("{direccion_cliente}", $direccionc, $html);
            $html = str_replace("{ciudad}", $city, $html);
            $html = str_replace("{Provincia}", $provincia, $html);
            $html = str_replace("{nombre_vendedor}", $datosPedido->fgralNOMBRE, $html);
            $html = str_replace("{fecha_hora_recibo}", $datosPedido->fecha_reg, $html);
            $html = str_replace("{instrucciones}", $datosPedido->observaciones, $html);
            $html = str_replace("{num_items}", count($items), $html);
            $html = str_replace("{TABLA}", $table, $html);
            $options = new Options();
            $options->set('enable_html5_parser', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $nombre_pdf = 'packing';
            $pdf = $dompdf->output();
            file_put_contents($path2 . trim($nombre_pdf) . ".pdf", $pdf);
            $pedidoPDF = $path2 . $nombre_pdf . ".pdf";
            return "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/pickings/ " . trim($nombre_pdf) . ".pdf";
        }
    }

    public function pdfpedido($nro_ped, $path, $path2)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosClientes = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_orderheader oh
                                             join cclabora_jarvis.sch_admin_tbdata_clientes c on oh.OrderCustomerCode=c.clieID
                                             join cclabora_fsql007.tablasgenerales tg on tg.fgralID=oh.OrderSalesPersonCode
                                             where oh.OrderNumber=" . trim($nro_ped) . " limit 1 ", $jarvisConex)->fetch_object();
        $subtotal = 0;
        $tabla = "<table>";
        $items = 0;
        if (is_object($datosClientes)) {
            $sth_detalle = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_orderfinaldetail  ot join cclabora_jarvis.sch_admin_tbdata_productos p on ot.OrderFinalDetailProductCode=p.prodID where ot.OrderDate='" . trim($datosClientes->OrderDate) . "' and ot.OrderSalesPersonCode=" . trim($datosClientes->OrderSalesPersonCode) . " order by ot.OrderFinalDetailProductCode asc; ", $jarvisConex);
            $subtotal = $datosClientes->OrderSubtotal;

            if ($sth_detalle->num_rows > 0) {
                $items = $sth_detalle->num_rows;
                while ($result_detale = $sth_detalle->fetch_object()) {

                    $pss = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_pss where numPEDIDO=" . trim($nro_ped) . " and prodID=" . trim($result_detale->prodID) . " and prodCANT=" . round($result_detale->OrderFinalDetailQuantity, 0) . " and facturados=0;", $jarvisConex);
                    $varpss = '&nbsp;';
                    if ($pss->num_rows > 0) {
                        $varpss = '*';
                    }
                    if ($result_detale->OrderFinalDetailListPrice > 0) {
                        $campodescuentototal = 100 - (($result_detale->OrderFinalDetailPrice * 100) / $result_detale->OrderFinalDetailListPrice);
                    } else {
                        $campodescuentototal = 0;
                    }

                    $tabla .= '<tr><td style="width:10%;" align="right"><font size=1>' . $varpss . '</font></td>
							<td style="width:40%;"><font size=1>' . $result_detale->prodID . " - " . $result_detale->prodDESCRIPCION . '</font></td>
						<td style="width:10%;" align="right"><font size=1>' . round($result_detale->OrderFinalDetailQuantity, 0) . '</font></td>
						<td style="width:10%;" align="right"><font size=1>' . round($result_detale->OrderFinalDetailListPrice, 2) . '</font></td>
						<td style="width:10%;" align="right"><font size=1>' . round($result_detale->OrderFinalDetailPrice, 2) . '</font></td>
						<td style="width:10%;" align="right"><font size=1>' . round($result_detale->OrderFinalDetailSubtotal, 2) . '</font></td>
						<td style="width:10%;" align="right"><font size=1>(' . round($campodescuentototal, 0) . '%)</font></td></tr>';
                }
            }
            $tabla .= "</table>";


            $descuentoP = $subtotal - $datosClientes->OrderFinalSubtotal;
            $porDescuento = (100 - (($datosClientes->OrderFinalSubtotal * 100) / $subtotal));
            $direccionc = $datosClientes->clieCALLEP . " " . $datosClientes->clieCALLES;

            $jarvisConex = $this->abrirconexion('jarvis');
            $address = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_customeraddress where CustomerAddressId=" . trim($datosClientes->OrderShipToAddressCode) . " and CustomerAddressCode=" . trim($datosClientes->OrderCustomerCode) . "  limit 1;", $jarvisConex)->fetch_object();;
            $jarvisConex->close();
            $dir = 'Sin Especificar';
            if (is_object($address)) {
                $dir = utf8_encode(strtoupper($address->CustomerAddressStreet . ", " . $address->CustomerAddressCity . ", " . $address->CustomerAddressState));
                if (trim($address->CustomerAddressCity) != 'Desconocido') {
                    $nombreciudad = $address->CustomerAddressCity;
                }

            }

            $campodescuento = $descuentoP . " (" . $porDescuento . "%)";
            $html = file_get_contents($path);
            $fecha = explode(" ", $datosClientes->OrderDate);
            $html = str_replace("{pedido}", $nro_ped, $html);
            $html = str_replace("{fecha}", $fecha[0], $html);
            $porciones = explode(";", $datosClientes->clieEMAIL);
            if (trim($porciones[0]) == '') {
                $html = str_replace("{email}", 'No tiene', $html);
            } else {
                $html = str_replace("{email}", $porciones[0], $html);
            }
            $campolistaprecio = '';
            if ($datosClientes->cliePVPASIGNADO == 1) {
                $campolistaprecio = "PRODUCTOR - PRODUCTOR";
            } elseif ($datosClientes->cliePVPASIGNADO == 2) {
                $campolistaprecio = "ALMACEN - ALMACEN";
            } elseif ($datosClientes->cliePVPASIGNADO == 3) {
                $campolistaprecio = "SUBDISTRIBUIDOR - SUBDISTRIBUIDOR";
            } elseif ($datosClientes->cliePVPASIGNADO == 4) {
                $campolistaprecio = "DISTRIBUIDOR - DISTRIBUIDOR";
            }

            $ciudad = $this->dimeCiudadProvincia($datosClientes->cityID);
            $city = '';
            $provincia = '';
            if (is_object($ciudad)) {
                $city = $ciudad->cityNAME;
                $provincia = $ciudad->provinciaNOMBRE;
            }
            $html = str_replace("{nombre}", utf8_encode($datosClientes->clieRAZONSOCIAL), $html);
            $html = str_replace("{cedula}", $datosClientes->clieRUC, $html);
            $html = str_replace("{telefono}", $datosClientes->clieFONO1, $html);
            $html = str_replace("{celular}", $datosClientes->clieCELULAR, $html);
            $html = str_replace("{ciudad}", $city, $html);
            $html = str_replace("{Provincia}", $provincia, $html);
            $html = str_replace("{TABLA}", $tabla, $html);
            $html = str_replace("{total}", round($datosClientes->OrderFinalTotal, 2), $html);
            $html = str_replace("{instrucciones}", $datosClientes->OrderSpecialInstructions, $html);
            $html = str_replace("{hora}", $fecha[1], $html);
            $html = str_replace("{cod_vendedor}", $datosClientes->fgralID, $html);
            $html = str_replace("{terminos_pago}", $datosClientes->clieDIASPLAZO, $html);
            $html = str_replace("{num_items}", $items, $html);
            $html = str_replace("{fecha_hora_recibo}", $datosClientes->OrderCreatedOn, $html);
            $html = str_replace("{fecha_hora_ingreso}", $datosClientes->OrderDate, $html);
            $html = str_replace("{lista_precio}", $campolistaprecio, $html);
            $html = str_replace("{contacto}", $datosClientes->clieRAZONSOCIAL, $html);
            $html = str_replace("{subtotal}", round($subtotal, 2), $html);
            $html = str_replace("{descuento}", $campodescuento, $html);
            $html = str_replace("{subdescuento}", round($datosClientes->OrderFinalTotal, 2), $html);
            $html = str_replace("{direccion_cliente}", $direccionc, $html);
            $html = str_replace("{direccion_envio}", $dir, $html);
            $html = str_replace("{nombre_vendedor}", $datosClientes->fgralNOMBRE, $html);
            $html = str_replace("{pagina}", "1", $html);
            $options = new Options();
            $options->set('enable_html5_parser', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $nombre_pdf = 'pedido_p';
            $pdf = $dompdf->output();
            file_put_contents($path2 . $nombre_pdf . ".pdf", $pdf);
            $pedidoPDF = $path2 . $nombre_pdf . ".pdf";
            return "http://servercc1/Jarvis/src/UserBundle/GEVentasBundle/Resources/public/docs/pedidos/" . $nombre_pdf . ".pdf";
        }
    }


    public function pdffactura($idFacutra, $path, $path2)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_items = $this->consultaBD1("call cclabora_fsql007.rpt_DocumentosVenta(" . $idFacutra . ", '42', 007)", $jarvisConex);
        $jarvisConex->close();
        $tr = '';
        $html = file_get_contents($path);
        if ($sth_items->num_rows > 0) {
            while ($result_items = $sth_items->fetch_object()) {
                $emails = explode(";", $result_items->CORREO_ELECTRONICO);
                $email = $result_items->CORREO_ELECTRONICO;
                if (isset($emails[0])) {
                    $email = $emails[0];
                }
                $html = str_replace("{ruc}", $result_items->EMPR_RUC, $html);
                $html = str_replace("{factura}", $result_items->ESTABLECIMIENTO . '-' . $result_items->PUNTO_EMISION . '-0000' . $result_items->SECUENCIA, $html);
                $html = str_replace("{auto}", $result_items->NUMERO_AUTORIZACION, $html);
                $html = str_replace("{fechayh}", $result_items->FECHA_AUTORIZACION, $html);
                $html = str_replace("{ambiente}", $result_items->AMBIENTE, $html);
                $html = str_replace("{t_emision}", 'NORMAL', $html);
                $html = str_replace("{c_acceso}", $result_items->NUMERO_AUTORIZACION, $html);
                $html = str_replace("{nombre_empresa}", $result_items->EMPR_RAZONSOCIAL, $html);
                $html = str_replace("{direccion_empresa}", $result_items->EMPR_DIRECCION, $html);
                $html = str_replace("{tlf_empresa}", $result_items->EMPR_TELEFONO1, $html);
                $html = str_replace("{nombre_cliente}", $result_items->CLIENTE_NOMBRE, $html);
                $html = str_replace("{ruc_cliente}", $result_items->CLIENTE_RUC, $html);
                $html = str_replace("{tlf_cliente}", $result_items->CLIENTE_TELEFONO1, $html);
                $html = str_replace("{f_emision}", $result_items->EMISION_FECHA_LARGA, $html);
                $html = str_replace("{f_vence}", $result_items->VENCIMIENTO_FECHA_LARGA, $html);

                $html = str_replace("{valor_iva1}", round($result_items->PORCENTAJE_IVA, 0) . '%', $html);
                $html = str_replace("{st_1}", $result_items->SUBTOTAL_IMPONIBLE, $html);
                $html = str_replace("{valor_iva2}", $result_items->PORCENTAJE_DESCUENTO, $html);
                $html = str_replace("{st_2}", $result_items->SUBTOTAL_NOIMPONIBLE, $html);
                $html = str_replace("{st_3}", ($result_items->SUBTOTAL_IMPONIBLE + $result_items->SUBTOTAL_NOIMPONIBLE), $html);
                $html = str_replace("{desc}", $result_items->DESCUENTO_TOTAL, $html);
                $html = str_replace("{p_iva}", round($result_items->PORCENTAJE_IVA, 0) . "%", $html);
                $html = str_replace("{iva}", round($result_items->PORCENTAJE_IVA, 0), $html);
                $html = str_replace("{total}", round($result_items->TOTAL_FACTURA, 2), $html);

                $html = str_replace("{atc}", $result_items->VENDEDOR, $html);
                $html = str_replace("{zona}", $result_items->CLIENTE_ZONA, $html);
                $html = str_replace("{pedido}", $result_items->PEDIDO, $html);
                $html = str_replace("{ciudad}", $result_items->EMPR_CIUDAD, $html);
                $html = str_replace("{fecha_ped}", $result_items->FECHA_EMISION, $html);
                $html = str_replace("{for_pago}", $result_items->DETALLE_DEL_PAGO_SRI, $html);
                $html = str_replace("{email}", $email, $html);
                $html = str_replace("{observa}", $result_items->OBSERVACIONES_FACTURA, $html);

                $tr .= '<tr>
                          <td>' . $result_items->ITEM_CODIGO . '</td>
                          <td>' . $result_items->ITEM_DESCRIPCION . '</td>
                          <td>' . round($result_items->ITEM_CANTIDAD, 0) . '</td>
                          <td>' . round($result_items->ITEM_PVP, 2) . '</td>
                          <td>' . round($result_items->ITEM_PORDES1, 2) . '</td>
                          <td>' . round($result_items->ITEM_BASEIMPUESTO, 2) . '</td>
                     </tr>';

            }
            $html = str_replace("{TABLAMP}", $tr, $html);
            $options = new Options();
            $options->set('enable_html5_parser', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $nombre_pdf = 'factura';
            $pdf = $dompdf->output();
            file_put_contents($path2 . $nombre_pdf . ".pdf", $pdf);
            $pedidoPDF = $path2 . $nombre_pdf . ".pdf";
            return "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/despacho/" . $nombre_pdf . ".pdf";


        } else {
            return '';
        }


    }

    public function dimeLotesAbiertos($codigoProducto)
    {
        $funciones = new funciones();
        $jarvisConex = $funciones->abrirconexion("jarvis");
        $sth_liq = $funciones->consultaBD1("SELECT op.*,bop.id_bultos_op,bop.lote_op,bop.qty_lote_op,bop.fecha_caducidad_op,bop.nro_op_butlo FROM cclabora_jarvis.sch_prod_tbdata_liquidacion_op op join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on op.id_liqop=bop.id_liqop where id_producto='" . trim($codigoProducto) . "' ", $jarvisConex);
        $lotes = array();
        $bultos = array();
        $totalLotes = array();
        $resultado = array('0' => '', '1' => '', '2' => '', '3' => '');
        if ($sth_liq->num_rows > 0) {
            while ($result_liq = $sth_liq->fetch_object()) {
                $bultos[$result_liq->lote_op][$result_liq->nro_op_butlo] = $result_liq->qty_lote_op;
                $descarga = $funciones->consultaBD1("SELECT sum(mlot.cant_movlote) as cant FROM cclabora_jarvis.sch_prod_tbdata_lote_despacho ld join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes mlot on ld.id_movlote=mlot.id_movlote where ld.id_bultos_op='" . trim($result_liq->id_bultos_op) . "' and ld.estado_lote_despacho!='0' ", $jarvisConex)->fetch_object();
                if (is_object($descarga)) {
                    $cant = 0;
                    if (!empty($descarga->cant)) {
                        $cant = $descarga->cant;
                    }
                    if (isset ($totalLotes[$result_liq->lote_op])) {
                        $totalLotes[$result_liq->lote_op] = $totalLotes[$result_liq->lote_op] - $cant;
                    } else {
                        $totalLotes[$result_liq->lote_op] = $result_liq->qty_lote_op - $cant;
                    }

                    if (isset($lotes[$result_liq->lote_op][$result_liq->nro_op_butlo])) {
                        $lotes[$result_liq->lote_op][$result_liq->nro_op_butlo] = $lotes[$result_liq->lote_op][$result_liq->nro_op_butlo] + $cant;
                    } else {
                        $lotes[$result_liq->lote_op][$result_liq->nro_op_butlo] = $cant;
                    }
                } else {
                    $lotes[$result_liq->lote_op][$result_liq->nro_op_butlo] = 0;
                }
            }
        }
        asort($totalLotes);
        if (count($totalLotes) > 0) {
            $lotemin = key($totalLotes);
            $lotesArreglo = $lotes[$lotemin];
            arsort($lotesArreglo);
            $resultado[0] = $lotemin;
            foreach ($lotesArreglo as $key => $valor) {
                $saldo = ($bultos[$lotemin][$key] - $valor);
                if ($saldo > 0) {
                    $resultado[1] = $key;
                    $resultado[2] = $saldo;
                    $resultado[3] = $this->dimePosLote($lotemin, $key);
                    break;
                }
            }
        }
        /*if (!isset($resultado[1])){
            $resultado[1]='S/A';
        }
        if (!isset($resultado[3])){
            $resultado[3]='S/A';
        }*/
        $jarvisConex->close();
        return $resultado;
    }

    public function  dimePosLote($lote, $bulto)
    {
        $funciones = new funciones();
        $jarvisConex = $funciones->abrirconexion('jarvis');
        $pos = 'S/A';
        $ext = '';
        if (!empty($bulto)) {
            $ext = "and nro_op_butlo='" . trim($bulto) . "'";
        }

        $posBulto = $funciones->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_bultos_op where lote_op='" . trim($lote) . "' " . $ext . "  limit 1", $jarvisConex)->fetch_object();
        if (is_object($posBulto)) {
            if (!empty($posBulto->observacion_loteop)) {
                $pos = $posBulto->observacion_loteop;
            }
        }
        $jarvisConex->close();
        return $pos;
    }

    public function transferenciaBodegasFiresoft($id_oc, $bodega_s, $bodega_i)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosOC = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_ordenes_compra oc
                                       join cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq on oc.id_producto=rfq.prodCODIGO and oc.nro_oc=rfq.orderid
                                       join cclabora_jarvis.sch_admin_tbdata_productos p on p.prodCODIGO=oc.id_producto
                                       join cclabora_jarvis.sch_mrp_tbdata_em em on p.prodID=em.prodID
                                       join cclabora_jarvis.sch_mrp_tbdata_prov prov on prov.provID=rfq.codigoPROVEEDOR where oc.id_oc=" . trim($id_oc) . " limit 1;", $jarvisConex)->fetch_object();
        $meses = $this->dimeMeses();
        $tpdiID_I = 'XIA';
        $tpdiID_S = 'XSA';
        $ingresoI = 0;
        $salidaS = 0;

        if (is_object($datosOC)) {
            $nro_rfq = "RFQ: " . substr($datosOC->orderid, 0, 5);
            $cant_lote = 0;
            $lote = '';
            $sth_lotes = $this->consultaBD1("select * from cclabora_jarvis.sch_mrp_tbdata_lotes_oc where id_oc=" . trim($id_oc) . " ", $jarvisConex);

            if ($sth_lotes->num_rows > 0) {
                while ($result_lotes = $sth_lotes->fetch_object()) {
                    $cant_lote = $cant_lote + ($result_lotes->peso_lotes - $result_lotes->peso_t_lotes);
                    $lote = $result_lotes->analisis_oc;
                    $caducidadLote = $result_lotes->caducidad_lotes;
                }
            }
            $costo = $cant_lote * $datosOC->costo_u;
            if ($cant_lote > 0 && !empty($lote)) {
                $docinvNUMERO = 0;
                if (!empty($bodega_s)) {
                    $bodedaSalida = $this->consultaBD1("SELECT almacenID,almacenDESCRIPCION FROM cclabora_fsql007.almacenes where almacenCODIGO=" . trim($bodega_s) . " limit 1 ", $jarvisConex)->fetch_object();

                    if (is_object($bodedaSalida)) {
                        $mes = (int)date('m');
                        $concepto_s = "Salida por Transferencia " . $nro_rfq . ", " . strtoupper($meses[$mes]) . ", " . $datosOC->provRSOCIAL . ", " . $datosOC->prodDESCRIPCION;
                        $result_asi = $this->consultaBD1('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodedaSalida->almacenID . '" and tpdiID="' . $tpdiID_S . '" limit 1', $jarvisConex)->fetch_object();
                        if (is_object($result_asi)) {
                            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                            $this->consultaBD1('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', $jarvisConex);
                        } else {
                            if ($this->consultaBD1('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodedaSalida->almacenID . '","' . $tpdiID_S . '")', $jarvisConex)) {
                                $result_asi = $this->consultaBD1('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                $docinvNUMERO = $result_asi->almseCNUMERO;
                            }
                        }
                        if ($docinvNUMERO > 0) {
                            $userF = $this->auditoriaFiresoft($concepto_s . '-J', '163', 'I', 47);
                            if ($userF[0] == 0) {
                                $userF[0] = 47;
                            }
                            if ($this->consultaBD1('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_S . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodedaSalida->almacenID . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex)) {
                                $docinvID = $this->consultaBD1('select * from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                                }
                                $verificaStock = $this->consultaBD1('select * from cclabora_fsql007.stocks where prodID="' . $datosOC->prodID . '" and almacenID="' . $bodedaSalida->almacenID . '"', $jarvisConex);
                                if ($verificaStock->num_rows > 0) {
                                    $result_stock = $verificaStock->fetch_object();
                                    $stocksID = $result_stock->stocksID;
                                } else {
                                    $this->consultaBD1('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodedaSalida->almacenID . '","' . $datosOC->prodID . '","' . $cant_lote . '","' . $costo . '")', $jarvisConex);
                                    $stocksID_r = $this->consultaBD1('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                                    $stocksID = $stocksID_r->stocksID;
                                }
                                if ($stocksID != 0) {
                                    if ($this->consultaBD1('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $cant_lote . '","' . $costo . '","S","' . $datosOC->presentacionID . '","' . $cant_lote . '")', $jarvisConex)) {
                                        $datosKardex = $this->consultaBD1("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                        $this->consultaBD('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                                        if (is_object($datosKardex)) {
                                            $this->consultaBD1("insert into cclabora_fsql007.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($lote) . "','" . trim($caducidadLote) . "') ", $jarvisConex);
                                            $datosLote = $this->consultaBD1("select * from cclabora_fsql007.lotes order by ltID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                            if (is_object($datosLote)) {
                                                $this->consultaBD1('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . $cant_lote . '") ', $jarvisConex);
                                                $salidaS = 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }

                if (!empty($bodega_i) && $salidaS != 0) {
                    $docinvNUMERO = 0;
                    $concepto_e = "Ingreso por Transferencia " . $nro_rfq . ", " . strtoupper($meses[$mes]) . ", " . $datosOC->provRSOCIAL . ", " . $datosOC->prodDESCRIPCION;
                    $userF = $this->auditoriaFiresoft($concepto_e . '-J', '163', 'I', 47);
                    if ($userF[0] == 0) {
                        $userF[0] = 47;
                    }
                    $bodegaEntrada = $this->consultaBD1("SELECT almacenID,almacenDESCRIPCION FROM cclabora_fsql007.almacenes where almacenCODIGO=" . trim($bodega_i) . " limit 1 ", $jarvisConex)->fetch_object();
                    if (is_object($bodegaEntrada)) {
                        $result_asi = $this->consultaBD1('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodegaEntrada->almacenID . '" and tpdiID="' . $tpdiID_I . '" limit 1', $jarvisConex)->fetch_object();
                        if (is_object($result_asi)) {
                            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                            $this->consultaBD1('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', $jarvisConex);
                        } else {
                            if ($this->consultaBD1('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodegaEntrada->almsecID . '","' . $tpdiID_I . '")', $jarvisConex)) {
                                $result_asi = $this->consultaBD1('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                $docinvNUMERO = $result_asi->almseCNUMERO;
                            }
                        }
                        if ($docinvNUMERO > 0) {
                            if ($this->consultaBD1('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_I . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodegaEntrada->almacenID . '","' . $concepto_e . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex)) {
                                $docinvID = $this->consultaBD1('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                                }
                                $stocksID = 0;
                                $verificaStock = $this->consultaBD1('select * from cclabora_fsql007.stocks where prodID="' . $datosOC->prodID . '" and almacenID="' . $bodegaEntrada->almacenID . '"', $jarvisConex);
                                if ($verificaStock->num_rows > 0) {
                                    $result_stock = $verificaStock->fetch_object();
                                    $stocksID = $result_stock->stocksID;
                                } else {
                                    $this->consultaBD1('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodegaEntrada->almacenID . '","' . $datosOC->prodID . '","' . $cant_lote . '","' . $costo . '")', $jarvisConex);
                                    $stocksID_r = $this->consultaBD1('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                                    $stocksID = $stocksID_r->stocksID;
                                }
                                if ($stocksID != 0) {
                                    if ($this->consultaBD1('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $cant_lote . '","' . $costo . '","E","' . $datosOC->presentacionID . '","' . $cant_lote . '")', $jarvisConex)) {
                                        $this->consultaBD1('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', $jarvisConex);
                                        $datosKardex = $this->consultaBD1("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                        if (is_object($datosKardex)) {
                                            $this->consultaBD1("insert into cclabora_fsql007.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($lote) . "','" . trim($caducidadLote) . "') ", $jarvisConex);
                                            $datosLote = $this->consultaBD1("select * from cclabora_fsql007.lotes order by ltID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                            if (is_object($datosLote)) {
                                                $this->consultaBD1('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . trim($cant_lote) . '") ', $jarvisConex);
                                                $ingresoI = 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }
            }

        }
        $ban = 0;
        if ($ingresoI != 0 && $salidaS != 0) {
            $ban = 1;
        }
        return $ban;
    }

    public function  agregarPededidos()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $result = 0;
        $sth_ped = $this->consultaBD1("SELECT * FROM cclabora_fsql007.notaspedidoclientes npc join cclabora_jarvis.sch_admin_tbdata_clientes c on c.clieID = npc.clieID where pedidoESTATUS='P';", $jarvisConex);
        $jarvisConex->close();
        $cant_producto = 0;
        if ($sth_ped->num_rows > 0) {
            while ($result_ped = $sth_ped->fetch_object()) {
                $jarvisConex = $this->abrirconexion('jarvis');
                $validaPed = $this->consultaBD1("SELECT id_ped FROM cclabora_jarvis.sch_sales_tbdata_pedidos where  nro_ped=" . trim($result_ped->pedidoNUMERO) . ";", $jarvisConex);
                $validaFact = $this->consultaBD1("SELECT fvtaID FROM cclabora_fsql007.facturasventa where fvtaPEDIDO=" . trim($result_ped->pedidoNUMERO) . " and fvtaFORMAPAGO!='A' ;", $jarvisConex);
                $jarvisConex->close();
                if ($validaPed->num_rows == 0 && $validaFact->num_rows == 0) {
                    $jarvisConex = $this->abrirconexion('jarvis');
                    $insert = $this->consultaBD1("insert into cclabora_jarvis.sch_sales_tbdata_pedidos (nro_ped, clieID, fecha_ped, observacion_ped, observacion_envio, q_productos_ped,f_pago, subt_ped, total_ped, estato_ped, fecha_reg_ped) values (" . trim($result_ped->pedidoNUMERO) . "," . trim($result_ped->clieID) . ",'" . trim($result_ped->pedidoINSTIME) . "','" . utf8_encode($result_ped->pedidoATENCION) . "','" . utf8_encode($result_ped->pedidoCONDICIONES) . "',0,''," . trim($result_ped->pedidoNOIMPONIBLE) . "," . trim($result_ped->pedidoTOTAL) . ",1,'" . date("Y-m-d H:i:s") . "') ", $jarvisConex);
                    $jarvisConex->close();
                    if ($insert == 1) {
                        $jarvisConex = $this->abrirconexion('jarvis');
                        $datosPed = $this->consultaBD1("SELECT id_ped FROM cclabora_jarvis.sch_sales_tbdata_pedidos order by id_ped desc limit 1", $jarvisConex)->fetch_object();
                        $jarvisConex->close();
                        if (is_object($datosPed)) {
                            $idped = $datosPed->id_ped;
                            $jarvisConex = $this->abrirconexion('jarvis');
                            $sth_detalle = $this->consultaBD1("SELECT * FROM  cclabora_fsql007.detallepedidosclientes dp where pedidoID='" . $result_ped->pedidoID . "';", $jarvisConex);
                            $jarvisConex->close();
                            if ($sth_detalle->num_rows > 0) {
                                $cant_producto = 0;
                                while ($result_detalle = $sth_detalle->fetch_object()) {
                                    // $desc = $result_detalle->depcPVP - $result_detalle->OrderFinalDetailPrice;
                                    $jarvisConex = $this->abrirconexion('jarvis');
                                    $pss = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_pss where numPEDIDO=" . trim($result_ped->pedidoNUMERO) . " and prodID=" . trim($result_detalle->prodID) . " and prodCANT=" . $result_detalle->depcCANTIDAD . " and facturados=0;", $jarvisConex);
                                    $estado = 1;
                                    if ($pss->num_rows > 0) {
                                        $estado = 2;
                                    }
                                    $cant_producto = $cant_producto + round($result_detalle->depcCANTIDAD, 0);
                                    $this->consultaBD1("insert into cclabora_jarvis.sch_sales_tbdata_pedidos_detalle (id_pedido, prodID, cant_prod, valor_unit, valor_desc, id_listprecio, fecha_reg_ped, estado_peddet) values (" . trim($idped) . "," . trim($result_detalle->prodID) . "," . round($result_detalle->depcCANTIDAD) . "," . round($result_detalle->depcPVP, 3) . "," . round($result_detalle->depcPORDES_1, 3) . ",'" . trim($result_ped->almacenID) . "','" . date("Y-m-d H:i:s") . "'," . $estado . ") ", $jarvisConex);
                                    $jarvisConex->close();
                                }
                            }
                            $jarvisConex = $this->abrirconexion('jarvis');
                            $this->consultaBD1("update cclabora_jarvis.sch_sales_tbdata_pedidos set q_productos_ped=" . trim($cant_producto) . " where id_ped=" . trim($idped) . " ", $jarvisConex);
                            $jarvisConex->close();

                        }
                    }

                }
            }

            $jarvisConex = $this->abrirconexion('jarvis');
            $sth_insert = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_pedidos where estato_ped=1;", $jarvisConex);
            $jarvisConex->close();
            if ($sth_insert->num_rows > 0) {
                while ($result_insert = $sth_insert->fetch_object()) {
                    $jarvisConex = $this->abrirconexion('jarvis');
                    $sth_de = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_pedidos_detalle where id_pedido=" . $result_insert->id_ped . ";", $jarvisConex);
                    if ($sth_de->num_rows == 0) {
                        $this->consultaBD1("delete from cclabora_jarvis.sch_sales_tbdata_pedidos where id_ped=" . $result_insert->id_ped . ";", $jarvisConex);
                    }
                    $jarvisConex->close();
                }
            }
        }
        //$jarvisConex->close();
        return $result;
    }

    public function  agregarPedidos()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $result = 0;
        $sth_ped = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_orderheader npc join cclabora_jarvis.sch_admin_tbdata_clientes c on c.clieID = npc.OrderCustomerCode where EstadoOrder='95' and OrderStatus = 'P'", $jarvisConex);
        $jarvisConex->close();
        $cant_producto = 0;
        if ($sth_ped->num_rows > 0) {
            while ($result_ped = $sth_ped->fetch_object()) {
                $jarvisConex = $this->abrirconexion('jarvis');
                $validaPed = $this->consultaBD1("SELECT id_ped FROM cclabora_jarvis.sch_sales_tbdata_pedidos where  nro_ped=" . trim($result_ped->OrderNumber) . ";", $jarvisConex);
                $validaFact = $this->consultaBD1("SELECT fvtaID FROM cclabora_fsql007.facturasventa where fvtaPEDIDO=" . trim($result_ped->OrderNumber) . " and fvtaFORMAPAGO!='A' ;", $jarvisConex);
                $jarvisConex->close();
                if ($validaPed->num_rows == 0 && $validaFact->num_rows == 0) {
                    $jarvisConex = $this->abrirconexion('jarvis');
                    if ($result_ped->OrderPriceListCode == 'DIASCC') {
                        $insert = $this->consultaBD1("insert into cclabora_jarvis.sch_sales_tbdata_pedidos (nro_ped, clieID, fecha_ped, observacion_ped, observacion_envio, q_productos_ped,f_pago, subt_ped, total_ped, estato_ped, fecha_reg_ped) values (" . trim($result_ped->OrderNumber) . "," . trim($result_ped->OrderCustomerCode) . ",'" . trim($result_ped->OrderCreatedOn) . "','" . utf8_encode($result_ped->OrderSpecialInstructions) . "','" . utf8_encode('DIAS CCLABS') . "',0,''," . trim($result_ped->OrderSubtotal) . "," . trim($result_ped->OrderTotal) . ",1,'" . date("Y-m-d H:i:s") . "') ", $jarvisConex);
                    } ELSE {
                        $insert = $this->consultaBD1("insert into cclabora_jarvis.sch_sales_tbdata_pedidos (nro_ped, clieID, fecha_ped, observacion_ped, observacion_envio, q_productos_ped,f_pago, subt_ped, total_ped, estato_ped, fecha_reg_ped) values (" . trim($result_ped->OrderNumber) . "," . trim($result_ped->OrderCustomerCode) . ",'" . trim($result_ped->OrderCreatedOn) . "','" . utf8_encode($result_ped->OrderSpecialInstructions) . "','" . utf8_encode('DESPACHO NORMAL') . "',0,''," . trim($result_ped->OrderSubtotal) . "," . trim($result_ped->OrderTotal) . ",1,'" . date("Y-m-d H:i:s") . "') ", $jarvisConex);
                    }

                    $jarvisConex->close();
                    if ($insert == 1) {
                        $jarvisConex = $this->abrirconexion('jarvis');
                        $datosPed = $this->consultaBD1("SELECT id_ped FROM cclabora_jarvis.sch_sales_tbdata_pedidos order by id_ped desc limit 1", $jarvisConex)->fetch_object();
                        $jarvisConex->close();
                        if (is_object($datosPed)) {
                            $idped = $datosPed->id_ped;
                            $jarvisConex = $this->abrirconexion('jarvis');
                            $sth_detalle = $this->consultaBD1("SELECT * FROM  cclabora_jarvis.sch_sales_tbdata_orderfinaldetail dp where OrderSalesPersonCode='" . $result_ped->OrderSalesPersonCode . "' and OrderDate='" . $result_ped->OrderDate . "'", $jarvisConex);
                            $jarvisConex->close();
                            if ($sth_detalle->num_rows > 0) {
                                $cant_producto = 0;
                                while ($result_detalle = $sth_detalle->fetch_object()) {
                                    // $desc = $result_detalle->depcPVP - $result_detalle->OrderFinalDetailPrice;
                                    $jarvisConex = $this->abrirconexion('jarvis');
                                    $pss = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_pss where numPEDIDO=" . trim($result_ped->OrderNumber) . " and prodID=" . trim($result_detalle->OrderFinalDetailProductCode) . " and prodCANT=" . $result_detalle->OrderFinalDetailQuantity . " and facturados=0;", $jarvisConex);
                                    $estado = 1;
                                    if ($pss->num_rows > 0) {
                                        $estado = 2;
                                    }
                                    $cant_producto = $cant_producto + round($result_detalle->OrderFinalDetailQuantity, 0);
                                    $porc = 0;
                                    if ($result_detalle->OrderFinalDetailStatus == 'A') {
                                        $porc = 100;
                                    }
                                    $this->consultaBD1("insert into cclabora_jarvis.sch_sales_tbdata_pedidos_detalle (id_pedido, prodID, cant_prod, valor_unit, valor_desc, id_listprecio, fecha_reg_ped, estado_peddet) values (" . trim($idped) . "," . trim($result_detalle->OrderFinalDetailProductCode) . "," . round($result_detalle->OrderFinalDetailQuantity) . "," . round($result_detalle->OrderFinalDetailPrice, 3) . "," . round($porc, 3) . ",'" . trim($result_detalle->OrderFinalDetailLine) . "','" . date("Y-m-d H:i:s") . "'," . $estado . ") ", $jarvisConex);
                                    $jarvisConex->close();
                                }
                            }
                            $jarvisConex = $this->abrirconexion('jarvis');
                            $this->consultaBD1("update cclabora_jarvis.sch_sales_tbdata_pedidos set q_productos_ped=" . trim($cant_producto) . " where id_ped=" . trim($idped) . " ", $jarvisConex);
                            $jarvisConex->close();

                        }
                    }

                }
            }

            $jarvisConex = $this->abrirconexion('jarvis');
            $sth_insert = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_pedidos where estato_ped=1;", $jarvisConex);
            $jarvisConex->close();
            if ($sth_insert->num_rows > 0) {
                while ($result_insert = $sth_insert->fetch_object()) {
                    $jarvisConex = $this->abrirconexion('jarvis');
                    $sth_de = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_pedidos_detalle where id_pedido=" . $result_insert->id_ped . ";", $jarvisConex);
                    if ($sth_de->num_rows == 0) {
                        $this->consultaBD1("delete from cclabora_jarvis.sch_sales_tbdata_pedidos where id_ped=" . $result_insert->id_ped . ";", $jarvisConex);
                    }
                    $jarvisConex->close();
                }
            }
        }
        //$jarvisConex->close();
        return $result;
    }

    public function corregirTransitoFaltantes()
    {
        $ids = '3987;4039;4101;4279;4303;4373;4509;4515;4613';
        $a_ids = explode(';', $ids);
        $i = 0;
        foreach ($a_ids as $valor) {
            $jarvisConex = $this->abrirconexion('jarvis');
            $datosOC = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                            join cclabora_jarvis.sch_mrp_tbdata_prov prov on rfq.codigoPROVEEDOR=prov.provID
                                            join cclabora_jarvis.sch_admin_tbdata_productos p on rfq.prodCODIGO=p.prodCODIGO where rfq.ID=" . trim($valor) . " limit 1;", $jarvisConex)->fetch_object();
            $jarvisConex->close();
            if (is_object($datosOC)) {
                $ban = $this->transitoFiresoft($datosOC->prodID, $datosOC->orderid, $datosOC->provRSOCIAL, 1);
                if ($ban == 1) {
                    $i++;
                    echo $i . ' : Transferido Ingreso OC ' . $datosOC->orderid . "<br>";
                }
            }

        }


    }

    public function dimeRfqFallidas()
    {
        $funciones = new funciones();
        $jarvisconex = $funciones->abrirconexion("jarvis");

        $sth_fact = $funciones->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                             join cclabora_jarvis.sch_admin_tbdata_productos p on p.prodCODIGO=rfq.prodCODIGO
                                             join cclabora_jarvis.sch_mrp_tbdata_em  em on p.prodID=em.prodID
                                             join cclabora_jarvis.sch_mrp_tbdata_prov prov  on prov.provID=rfq.codigoPROVEEDOR
                                             where rfq.estado_rfq=64", $jarvisconex);

        $tr = '';
        if ($sth_fact->num_rows > 0) {
            while ($result_fact = $sth_fact->fetch_object()) {
                if ($result_fact->versionID == 0) {
                    $fuente = 'GMP';
                } else {
                    $fuente = 'PMC';
                }
                $tr .= '<tr id="tr_' . trim($result_fact->orderid) . '">
                            <td style=\'font-size:97%;\'>' . $fuente . '</td>
                            <td style=\'font-size:97%;\'><a href="../logistica/genericoOC?id_rfq=' . $result_fact->ID . '" target="_blank">' . $result_fact->orderid . '</a></td>
                            <td style=\'font-size:97%;\'><a  href="../logistica/materiaP/post?id=' . trim($result_fact->prodID) . '" target="_blank">' . $result_fact->prodCODIGO . '</a></td>
                            <td style=\'font-size:97%;\'>' . utf8_encode($result_fact->prodDESCRIPCION) . '</td>
                            <td style=\'font-size:97%;\'>' . $result_fact->cant . '</td>
                            <td style=\'font-size:97%;\'><a  href="../logistica/proveedores/post?id=' . trim($result_fact->provID) . '" target="_blank">' . utf8_encode($result_fact->provRSOCIAL) . '</a></td>
                            <td style=\'font-size:97%;\'>' . $result_fact->FECHA . '</td>
                            <td style=\'font-size:97%;\'>
                                <button type="submit" class="btn btn-success" id="ColocarCot" name="ColocarCot" value="' . $result_fact->ID . '">Re-abrir</button>

                                <label class="checkbox-inline">
                                       <input type="checkbox" id="Cerrar[' . $result_fact->ID . ']"
                                       name="Cerrar[' . $result_fact->ID . ']" value="' . $result_fact->ID . '">
                                       Cerrar
                                </label>
                            </td>
                        </tr>';
            }
        }
        return $tr;

    }

    public function tktDev($id_tkt, $dir, $tip)
    {

        $jarvisConex = $this->abrirconexion('jarvis');
        $comple = '';
        if ($tip == 1) {
            $comple = "pa.id_dev_pa=" . trim($id_tkt);
        } else if ($tip == 2) {
            $comple = "dev.id_bulto_dev=" . trim($id_tkt);
        }

        $sth_dev = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_devolucion_pa pa
                                                    join cclabora_jarvis.sch_mrp_tbdata_bulto_dev dev on pa.id_dev_pa=dev.id_dev_pa
                                                    join cclabora_jarvis.sch_admin_tbdata_productos p on dev.id_producto=p.prodCODIGO  where " . $comple . ";", $jarvisConex);
        $jarvisConex->close();
        $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\devoluciones\ticketBultoDev.html.twig';
        $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\devoluciones\ ';
        $i = 0;
        $html = array();
        if ($sth_dev->num_rows > 0) {
            while ($result_dev = $sth_dev->fetch_object()) {
                $nombreProducto = substr($result_dev->prodDESCRIPCION, 0, 46);
                /*if (strlen ($nombreProducto)>30){
                    //$caracter = round(strlen($nombreProducto)/2,0);
                    $prod1 =substr($nombreProducto, 0, -30 );
                    $prod1 =substr($nombreProducto, 0, -$caracter );
                    $prod2 = substr($nombreProducto, $caracter);
                    $complemento = '<tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                     <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    ';
                }else{
                    $prod1 = $nombreProducto;
                    $prod2='';

                }*/
                $prod1 = $nombreProducto;

                $complemento = '<tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                     <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                     <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>

                                    ';

                $fecha = explode(" ", $result_dev->recha_recepcion_dev);
                if ($result_dev->id_empleado != 0) {
                    $datosEmpleado = $this->dimeEmpleado($result_dev->id_empleado);

                    if (is_object($datosEmpleado)) {
                        $auxN = explode(" ", $datosEmpleado->emplNOMBRES);
                        $auxA = explode(" ", $datosEmpleado->emplAPELLIDOS);
                        $nombre = $auxN[0] . " " . $auxA[0];
                    } else {
                        $nombre = 'No registrado';
                    }

                } else {
                    $nombre = 'No registrado';
                }
                $cbar = '';
                if (!empty($result_dev->id_barcode)) {
                    $cbar = $result_dev->id_barcode;
                    $cbar = str_replace("(", "", $cbar);
                    $cbar = str_replace(")", "", $cbar);
                    $charset = 'C128';
                    $myBarcode = new barCode();
                    $myBarcode->savePath = trim($path2);
                    $myBarcode->getBarcodePNGPath($cbar, $charset, 2, 45);
                    $barcode = $charset . '_' . $cbar . ".png";
                    $link = trim($path2) . $barcode;
                    $unlink[] = $link;
                }


                $link = trim($path2) . $barcode;
                $header = "D E T E N I D O";
                $html[$i] = file_get_contents($path);
                $html[$i] = str_replace("{nombreProd1}", $prod1, $html[$i]);
                // $html[$i] = str_replace("{nombreProd2}",$prod2,$html[$i]);
                $html[$i] = str_replace("{codigoProd}", $result_dev->id_producto, $html[$i]);
                $html[$i] = str_replace("{qty}", $result_dev->cant_prod, $html[$i]);
                $html[$i] = str_replace("{op}", $result_dev->RetReqNumber, $html[$i]);
                $html[$i] = str_replace("{fechaI}", $fecha[0], $html[$i]);
                $html[$i] = str_replace("{bulto}", $result_dev->bultos_dev . ' de ' . $result_dev->nro_bultos, $html[$i]);
                $html[$i] = str_replace("{empleado}", $nombre, $html[$i]);
                $html[$i] = str_replace("{lote}", $result_dev->lote_pro, $html[$i]);
                $html[$i] = str_replace("{cod}", $barcode, $html[$i]);
                $html[$i] = str_replace("{observ}", $result_dev->observacion_bulto_dev, $html[$i]);
                $html[$i] = str_replace("{barcode}", $result_dev->id_barcode, $html[$i]);
                $html[$i] = str_replace("{link}", $link, $html[$i]);
                $html[$i] = str_replace("{complemento}", $complemento, $html[$i]);
                $html[$i] = str_replace("{titulo}", $header, $html[$i]);
                $html[$i] = str_replace("{propietario}", $this->dimePropietario($result_dev->prodCODIGO), $html[$i]);
                $i++;
            }

            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
            foreach ($html as $key => $valor) {
                $pagina .= $valor;
            }

            $pagina .= "</body></html>";
            $paper_size = array(0, 0, 950, 600); // TAMA? IMPRESORA TICKETS NO MODIFICAR
            $dompdf = new Dompdf();
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();
            $nombrepdf = 'devolucion';
            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
            $todosPDf = trim($nombrepdf . ".pdf");
            foreach ($unlink as $links) {
                unlink($links);
            }

            return "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/devoluciones/" . trim($todosPDf);

        } else {
            return 0;
        }

    }

    public function ingresoFiresoftDEV($id_bulto_dev, $bodega_i)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosDEV = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_bulto_dev bdev
                                        join cclabora_jarvis.sch_mrp_tbdata_devolucion_pa pa on pa.id_dev_pa=bdev.id_dev_pa
                                        join cclabora_jarvis.sch_admin_tbdata_productos p on p.prodCODIGO=bdev.id_producto
                                        where bdev.id_bulto_dev=" . trim($id_bulto_dev) . " limit 1; ", $jarvisConex)->fetch_object();
        $jarvisConex->close();
        $ingresoI = 0;
        if (is_object($datosDEV)) {
            $meses = $this->dimeMeses();
            $costo = $datosDEV->cant_prod * $datosDEV->costo_u;
            $tpdiID_I = 'IIS';
            $lote = strtoupper(trim($datosDEV->lote_pro));
            $caducidadLote = '0000-00-00';
            $jarvisConex = $this->abrirconexion('jarvis');
            $datosLote = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_reg_lotes where lote_desc='" . trim($datosDEV->lote_pro) . "' limit 1 ", $jarvisConex)->fetch_object();
            $jarvisConex->close();
            if (is_object($datosLote)) {
                $caducidadLote = $datosLote->fecha_vence_lote;
            } else {
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosLote = $this->consultaBD1("SELECT * FROM fsql020.lotes where ltLOTE='" . trim($datosDEV->lote_pro) . "' limit 1 ", $jarvisConex)->fetch_object();
                $jarvisConex->close();
                if (is_object($datosLote)) {
                    $caducidadLote = $datosLote->ltCADUCIDAD;
                }
            }
            if ($datosDEV->cant_prod > 0 && !empty($datosDEV->lote_pro)) {
                $docinvNUMERO = 0;
                $mes = (int)date('m');
                $concepto_e = "Ingreso DEV#" . $datosDEV->RetReqNumber . ", " . utf8_encode($datosDEV->lote_pro) . ", " . strtoupper($meses[$mes]);
                //$userF=$this->auditoriaFiresoft($concepto_e.'-J','163','I',47);
                $userF[0] = 47;
                if ($userF[0] == 0) {
                    $userF[0] = 47;
                }
                if (!empty($bodega_i)) {
                    $jarvisConex = $this->abrirconexion('jarvis');
                    $bodegaEntrada = $this->consultaBD1("SELECT almacenID,almacenDESCRIPCION FROM fsql020.almacenes where almacenCODIGO=" . trim($bodega_i) . " limit 1 ", $jarvisConex)->fetch_object();
                    if (is_object($bodegaEntrada)) {
                        $result_asi = $this->consultaBD1('select * from fsql020.almacen_secuencias_inventarios where almacenID="' . $bodegaEntrada->almacenID . '" and tpdiID="' . $tpdiID_I . '" limit 1', $jarvisConex)->fetch_object();
                        if (is_object($result_asi)) {
                            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                            $this->consultaBD1('update fsql020.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', $jarvisConex);
                        } else {
                            if ($this->consultaBD1('insert into fsql020.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodegaEntrada->almsecID . '","' . $tpdiID_I . '")', $jarvisConex)) {
                                $result_asi = $this->consultaBD1('select * from fsql020.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                $docinvNUMERO = $result_asi->almseCNUMERO;
                            }
                        }
                        if ($docinvNUMERO > 0) {
                            if ($this->consultaBD1('insert into fsql020.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_I . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodegaEntrada->almacenID . '","' . $concepto_e . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex)) {
                                $docinvID = $this->consultaBD1('select docinvID from fsql020.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                                }
                                $stocksID = 0;
                                $verificaStock = $this->consultaBD1('select * from fsql020.stocks where prodID="' . $datosDEV->prodID . '" and almacenID="' . $bodegaEntrada->almacenID . '"', $jarvisConex);
                                if ($verificaStock->num_rows > 0) {
                                    $result_stock = $verificaStock->fetch_object();
                                    $stocksID = $result_stock->stocksID;
                                } else {
                                    $this->consultaBD1('insert fsql020.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodegaEntrada->almacenID . '","' . $datosDEV->prodID . '","' . $datosDEV->cant_prod . '","' . $costo . '")', $jarvisConex);
                                    $stocksID_r = $this->consultaBD1('select stocksID from fsql020.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                                    $stocksID = $stocksID_r->stocksID;
                                }
                                if ($stocksID != 0) {
                                    if ($this->consultaBD1('insert into fsql020.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $datosDEV->cant_prod . '","' . $costo . '","E","' . $datosDEV->presentacionID . '","' . $datosDEV->cant_prod . '")', $jarvisConex)) {
                                        $this->consultaBD1('select * from fsql020.stocks where stocksID="' . $stocksID . '"', $jarvisConex);
                                        $datosKardex = $this->consultaBD1("select * from fsql020.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                        if (is_object($datosKardex)) {
                                            $datosLote = $this->consultaBD1("select * from fsql020.lotes where ltLOTE='" . trim($lote) . "' limit 1;", $jarvisConex)->fetch_object();
                                            if (is_object($datosLote)) {
                                                $this->consultaBD1('insert into fsql020.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . trim($datosDEV->cant_prod) . '") ', $jarvisConex);
                                                $ingresoI = 1;
                                            } else {
                                                $this->consultaBD1("insert into fsql020.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($lote) . "','" . trim($caducidadLote) . "') ", $jarvisConex);
                                                $datosLote = $this->consultaBD1("select * from fsql020.lotes order by ltID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                                if (is_object($datosLote)) {
                                                    $this->consultaBD1('insert into fsql020.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . trim($datosDEV->cant_prod) . '") ', $jarvisConex);
                                                    $ingresoI = 1;
                                                }
                                            }
                                            $this->consultaBD1("select * from fsql020.lotes", $jarvisConex)->fetch_object();
                                        }
                                    }
                                }
                            }


                        }

                    }
                    $jarvisConex->close();
                }

            }

        }
        return $ingresoI;

    }

    public function transferenciaDEVFiresoft($id_analisis_dev, $bodega_s, $bodega_i)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosDEV = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_garcal_tbdata_anslisis_dev ana
                                        join cclabora_jarvis.sch_garcal_tbdata_anslisis_ca ca on ana.id_analisis_ca=ca.id_analisis_ca
                                        join cclabora_jarvis.sch_mrp_tbdata_bulto_dev dev on ana.id_bulto_dev=dev.id_bulto_dev
                                        join cclabora_jarvis.sch_mrp_tbdata_devolucion_pa pa on pa.id_dev_pa=dev.id_dev_pa
                                         join cclabora_jarvis.sch_admin_tbdata_productos p on dev.id_producto=p.prodCODIGO where id_analisis_dev=" . trim($id_analisis_dev) . " limit 1; ", $jarvisConex)->fetch_object();

        $meses = $this->dimeMeses();
        $tpdiID_I = 'XIA';
        $tpdiID_S = 'XSA';
        $ingresoI = 0;
        $salidaS = 0;
        $cant_lote = 0;

        if (is_object($datosDEV)) {
            $nro_rfq = "DEV:" . $datosDEV->RetReqNumber;
            $lote = $datosDEV->lote_pro;
            $cant_lote = $datosDEV->cant_analisis_dev;
            $caducidadLote = '';
            $datosLote = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_reg_lotes where lote_desc='" . trim($lote) . "' limit 1 ", $jarvisConex)->fetch_object();
            if (is_object($datosLote)) {
                $caducidadLote = $datosLote->fecha_vence_lote;
            } else {
                $datosLote = $this->consultaBD1("SELECT * FROM fsql020.lotes where ltLOTE='" . trim($lote) . "' limit 1 ", $jarvisConex)->fetch_object();
                if (is_object($datosLote)) {
                    $caducidadLote = $datosLote->ltCADUCIDAD;
                }
            }
            if (empty($caducidadLote)) {
                $caducidadLote = '0000-00-00';
            }

            $costo = $datosDEV->cant_analisis_dev * $datosDEV->costo_u;
            if ($cant_lote > 0 && !empty($lote)) {
                $docinvNUMERO = 0;
                if (!empty($bodega_s)) {
                    $bodedaSalida = $this->consultaBD1("SELECT almacenID,almacenDESCRIPCION FROM fsql020.almacenes where almacenCODIGO=" . trim($bodega_s) . " limit 1 ", $jarvisConex)->fetch_object();
                    if (is_object($bodedaSalida)) {
                        $mes = (int)date('m');
                        $concepto_s = "Salida por Transferencia a " . utf8_encode($datosDEV->nombre_analisis_ca) . ", " . $nro_rfq . ", " . strtoupper($meses[$mes]);
                        $result_asi = $this->consultaBD1('select * from fsql020.almacen_secuencias_inventarios where almacenID="' . $bodedaSalida->almacenID . '" and tpdiID="' . $tpdiID_S . '" limit 1', $jarvisConex)->fetch_object();
                        if (is_object($result_asi)) {
                            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                            $this->consultaBD1('update fsql020.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', $jarvisConex);
                        } else {
                            if ($this->consultaBD1('insert into fsql020.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodedaSalida->almacenID . '","' . $tpdiID_S . '")', $jarvisConex)) {
                                $result_asi = $this->consultaBD1('select * from fsql020.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                $docinvNUMERO = $result_asi->almseCNUMERO;
                            }
                        }
                        if ($docinvNUMERO > 0) {
                            //$userF=$this->auditoriaFiresoft($concepto_s.'-J','163','I',48);
                            $userF[0] = 48;
                            if ($userF[0] == 0) {
                                $userF[0] = 48;
                            }
                            if ($this->consultaBD1('insert into fsql020.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_S . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodedaSalida->almacenID . '","' . $concepto_s . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex)) {
                                $docinvID = $this->consultaBD1('select * from fsql020.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                                }
                                $verificaStock = $this->consultaBD1('select * from fsql020.stocks where prodID="' . $datosDEV->prodID . '" and almacenID="' . $bodedaSalida->almacenID . '"', $jarvisConex);
                                if ($verificaStock->num_rows > 0) {
                                    $result_stock = $verificaStock->fetch_object();
                                    $stocksID = $result_stock->stocksID;
                                } else {
                                    $this->consultaBD1('insert fsql020.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodedaSalida->almacenID . '","' . $datosDEV->prodID . '","' . $cant_lote . '","' . $costo . '")', $jarvisConex);
                                    $stocksID_r = $this->consultaBD1('select stocksID from fsql020.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                                    $stocksID = $stocksID_r->stocksID;
                                }
                                if ($stocksID != 0) {
                                    if ($this->consultaBD1('insert into fsql020.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $cant_lote . '","' . $costo . '","S","' . $datosDEV->presentacionID . '","' . $cant_lote . '")', $jarvisConex)) {
                                        $datosKardex = $this->consultaBD1("select * from fsql020.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                        $this->consultaBD('select * from fsql020.stocks where stocksID="' . $stocksID . '"', 'jarvis');
                                        if (is_object($datosKardex)) {
                                            $this->consultaBD1("insert into fsql020.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($lote) . "','" . trim($caducidadLote) . "') ", $jarvisConex);
                                            $datosLote = $this->consultaBD1("select * from fsql020.lotes order by ltID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                            if (is_object($datosLote)) {
                                                $this->consultaBD1('insert into fsql020.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . $cant_lote . '") ', $jarvisConex);
                                                $salidaS = 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }

                if (!empty($bodega_i) && $salidaS != 0) {
                    $docinvNUMERO = 0;
                    $concepto_e = "Ingreso por Transferencia a " . utf8_encode($datosDEV->nombre_analisis_ca) . ", " . $nro_rfq . ", " . strtoupper($meses[$mes]);
                    //$userF=$this->auditoriaFiresoft($concepto_e.'-J','163','I',48);
                    $userF[0] = 48;
                    if ($userF[0] == 0) {
                        $userF[0] = 48;
                    }
                    $bodegaEntrada = $this->consultaBD1("SELECT almacenID,almacenDESCRIPCION FROM fsql020.almacenes where almacenCODIGO=" . trim($bodega_i) . " limit 1 ", $jarvisConex)->fetch_object();
                    if (is_object($bodegaEntrada)) {
                        $result_asi = $this->consultaBD1('select * from fsql020.almacen_secuencias_inventarios where almacenID="' . $bodegaEntrada->almacenID . '" and tpdiID="' . $tpdiID_I . '" limit 1', $jarvisConex)->fetch_object();
                        if (is_object($result_asi)) {
                            $docinvNUMERO = $result_asi->almseCNUMERO + 1;
                            $this->consultaBD1('update fsql020.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO . '" where almsecID="' . $result_asi->almsecID . '"', $jarvisConex);
                        } else {
                            if ($this->consultaBD1('insert into fsql020.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values ("1","' . $bodegaEntrada->almsecID . '","' . $tpdiID_I . '")', $jarvisConex)) {
                                $result_asi = $this->consultaBD1('select * from fsql020.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                $docinvNUMERO = $result_asi->almseCNUMERO;
                            }
                        }
                        if ($docinvNUMERO > 0) {
                            if ($this->consultaBD1('insert into fsql020.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tpdiID_I . '","' . $docinvNUMERO . '","' . date("Y-m-d") . '","' . $bodegaEntrada->almacenID . '","' . $concepto_e . '","V",' . trim($userF[0]) . ',"' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex)) {
                                $docinvID = $this->consultaBD1('select docinvID from fsql020.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                                }
                                $stocksID = 0;
                                $verificaStock = $this->consultaBD1('select * from fsql020.stocks where prodID="' . $datosDEV->prodID . '" and almacenID="' . $bodegaEntrada->almacenID . '"', $jarvisConex);
                                if ($verificaStock->num_rows > 0) {
                                    $result_stock = $verificaStock->fetch_object();
                                    $stocksID = $result_stock->stocksID;
                                } else {
                                    $this->consultaBD1('insert fsql020.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodegaEntrada->almacenID . '","' . $datosDEV->prodID . '","' . $cant_lote . '","' . $costo . '")', $jarvisConex);
                                    $stocksID_r = $this->consultaBD1('select stocksID from fsql020.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                                    $stocksID = $stocksID_r->stocksID;
                                }
                                if ($stocksID != 0) {
                                    if ($this->consultaBD1('insert into fsql020.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . $cant_lote . '","' . $costo . '","E","' . $datosDEV->presentacionID . '","' . $cant_lote . '")', $jarvisConex)) {
                                        $this->consultaBD1('select * from fsql020.stocks where stocksID="' . $stocksID . '"', $jarvisConex);
                                        $datosKardex = $this->consultaBD1("select * from fsql020.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                        if (is_object($datosKardex)) {
                                            $this->consultaBD1("insert into fsql020.lotes (ltLOTE,ltCADUCIDAD) values ('" . trim($lote) . "','" . trim($caducidadLote) . "') ", $jarvisConex);
                                            $datosLote = $this->consultaBD1("select * from fsql020.lotes order by ltID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                            if (is_object($datosLote)) {
                                                $this->consultaBD1('insert into fsql020.movimientoslotes (krdID,ltID,movltCANTIDAD) values ("' . trim($datosKardex->krdID) . '","' . trim($datosLote->ltID) . '","' . trim($cant_lote) . '") ', $jarvisConex);
                                                $ingresoI = 1;
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }
            }

        }
        $ban = 0;
        if ($ingresoI != 0 && $salidaS != 0) {
            $ban = 1;
        }
        return $ban;
    }

    public function tktDevAna($id_tkt, $dir, $tipo)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $comple = '';
        if ($tipo == 1) {
            $comple = "pa.id_dev_pa=" . trim($id_tkt);
        } else if ($tipo == 2) {
            $comple = "dev.id_bulto_dev=" . trim($id_tkt);
        }

        $sth_dev = $this->consultaBD1("SELECT pa.recha_recepcion_dev,pa.RetReqNumber,pa.nro_bultos,pa.id_empleado as receptor,dev.*,ca.*,p.prodID,prodCODIGO,p.prodDESCRIPCION,adev.fecha_reg_dev,adev.observacion_analisis_ca,adev.cant_analisis_dev,adev.id_empleado FROM cclabora_jarvis.sch_mrp_tbdata_devolucion_pa pa
                                                    join cclabora_jarvis.sch_mrp_tbdata_bulto_dev dev on pa.id_dev_pa=dev.id_dev_pa
                                                    join cclabora_jarvis.sch_garcal_tbdata_anslisis_dev adev on dev.id_bulto_dev=adev.id_bulto_dev
                                                    join cclabora_jarvis.sch_garcal_tbdata_anslisis_ca ca on ca.id_analisis_ca=adev.id_analisis_ca
                                                    join cclabora_jarvis.sch_admin_tbdata_productos p on dev.id_producto=p.prodCODIGO  where " . $comple . " order by dev.bultos_dev ASC ;", $jarvisConex);
        $jarvisConex->close();
        $path = $dir . '/../' . 'src\UserBundle\GACalidadBundle\Resources\public\docs\devoluciones\ticketBultoDev.html.twig';
        $path2 = $dir . '/../' . 'src\UserBundle\GACalidadBundle\Resources\public\docs\devoluciones\ ';
        $i = 0;
        $unlink = array();
        $html = array();
        if ($sth_dev->num_rows > 0) {
            while ($result_dev = $sth_dev->fetch_object()) {
                $nombreProducto = substr($result_dev->prodDESCRIPCION, 0, 46);
                /*if (strlen ($nombreProducto)>24) {
                    $caracter = round(strlen($nombreProducto)/2,0);
                    $prod1 =substr($nombreProducto, 0, -$caracter );
                    $prod2 = substr($nombreProducto, $caracter);
                    $complemento = '<tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    ';
                }else{
                    $prod1 = $nombreProducto;
                    $prod2='';
                    $complemento = '<tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                     <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>';
                }*/
                $complemento = '<tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>';
                $prod1 = $nombreProducto;
                $fecha = explode(" ", $result_dev->recha_recepcion_dev);
                $fecha_a = explode(" ", $result_dev->fecha_reg_dev);
                if ($result_dev->receptor != 0) {
                    $datosEmpleado = $this->dimeEmpleado($result_dev->receptor);

                    if (is_object($datosEmpleado)) {
                        $auxN = explode(" ", $datosEmpleado->emplNOMBRES);
                        $auxA = explode(" ", $datosEmpleado->emplAPELLIDOS);
                        $nombre = $auxN[0] . " " . $auxA[0];
                    } else {
                        $nombre = 'No registrado';
                    }

                } else {
                    $nombre = 'No registrado';
                }


                if ($result_dev->id_empleado != 0) {
                    $datosEmpleado = $this->dimeEmpleado($result_dev->id_empleado);

                    if (is_object($datosEmpleado)) {
                        $auxN = explode(" ", $datosEmpleado->emplNOMBRES);
                        $auxA = explode(" ", $datosEmpleado->emplAPELLIDOS);
                        $nombre_ana = $auxN[0] . " " . $auxA[0];
                    } else {
                        $nombre_ana = 'No registrado';
                    }

                } else {
                    $nombre_ana = 'No registrado';
                }


                $cbar = '';
                $result_dev->id_barcode;
                if (!empty($result_dev->id_barcode)) {
                    $cbar = $result_dev->id_barcode;
                    $cbar = str_replace("(", "", $cbar);
                    $cbar = str_replace(")", "", $cbar);
                    $charset = 'C128';
                    $myBarcode = new barCode();
                    $myBarcode->savePath = trim($path2);
                    $myBarcode->getBarcodePNGPath($cbar, $charset, 2, 45);
                    $barcode = $charset . '_' . $cbar . ".png";
                    $link = trim($path2) . $barcode;
                    $unlink[] = $link;
                }
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosLote = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_reg_lotes where lote_desc='" . trim($result_dev->lote_pro) . "' limit 1;", $jarvisConex)->fetch_object();
                $jarvisConex->close();
                $ext = '';
                if (is_object($datosLote)) {
                    $datetime1 = date_create(date('Y-m-d'));
                    $datetime2 = date_create($datosLote->fecha_vence_lote);
                    $interval = date_diff($datetime1, $datetime2);
                    $dias = $interval->format('%R%a');
                    if ($dias >= 0 && $dias <= 180) {
                        $ext = '- Fecha de Lote Dentro de 6 meses de Vencimiento, Transferir a PA POR LIQUIDAR';
                    }
                }

                $link = trim($path2) . $barcode;
                $header = 'A P R O B A D O';
                if ($result_dev->id_analisis_ca == 5) {
                    $header = 'R E C H A Z A D O';
                }
                $html[$i] = file_get_contents($path);
                $html[$i] = str_replace("{nombreProd1}", $prod1, $html[$i]);
                // $html[$i] = str_replace("{nombreProd2}",$prod2,$html[$i]);
                $html[$i] = str_replace("{codigoProd}", $result_dev->id_producto, $html[$i]);
                $html[$i] = str_replace("{qty}", $result_dev->cant_analisis_dev, $html[$i]);
                $html[$i] = str_replace("{op}", $result_dev->RetReqNumber, $html[$i]);
                $html[$i] = str_replace("{fecha_i}", $fecha[0], $html[$i]);
                $html[$i] = str_replace("{f_analisis}", $fecha_a[0], $html[$i]);
                $html[$i] = str_replace("{bulto}", $result_dev->bultos_dev . ' de ' . $result_dev->nro_bultos, $html[$i]);
                $html[$i] = str_replace("{empleado}", $nombre, $html[$i]);
                $html[$i] = str_replace("{nombre_ana}", $nombre_ana, $html[$i]);
                $html[$i] = str_replace("{observ_ana}", $result_dev->observacion_analisis_ca . ' ' . $ext, $html[$i]);
                $html[$i] = str_replace("{lote}", $result_dev->lote_pro, $html[$i]);
                $html[$i] = str_replace("{cod}", $barcode, $html[$i]);
                $html[$i] = str_replace("{observ}", $result_dev->observacion_bulto_dev, $html[$i]);
                $html[$i] = str_replace("{barcode}", $result_dev->id_barcode, $html[$i]);
                $html[$i] = str_replace("{link}", $link, $html[$i]);
                $html[$i] = str_replace("{complemento}", $complemento, $html[$i]);
                $html[$i] = str_replace("{titulo}", $header, $html[$i]);
                $html[$i] = str_replace("{estado_d}", utf8_encode($result_dev->nombre_analisis_ca), $html[$i]);
                $html[$i] = str_replace("{propietario}", $this->dimePropietario($result_dev->prodCODIGO), $html[$i]);
                $i++;
            }

            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
            foreach ($html as $key => $valor) {
                $pagina .= $valor;
            }

            $pagina .= "</body></html>";
            $paper_size = array(0, 0, 950, 600); // TAMA? IMPRESORA TICKETS NO MODIFICAR
            $dompdf = new Dompdf();
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();
            $nombrepdf = 'devolucion';
            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
            $todosPDf = trim($nombrepdf . ".pdf");

            foreach ($unlink as $links) {
                //unlink($links);
            }

            return "http://servercc1/Jarvis/src/UserBundle/GACalidadBundle/Resources/public/docs/devoluciones/" . trim($todosPDf);

        } else {
            return 0;
        }

    }

    public function generaCodigoBarraPicking($cod, $dir)
    {
        $charset = 'C128';
        $myBarcode = new barCode();
        $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\ ';
        $myBarcode->savePath = trim($path);
        $myBarcode->getBarcodePNGPath($cod, $charset, 2, 45);
        //$bcHTMLRaw = $myBarcode->getBarcodeHTML($cod, 'C128C', 2, 45);
        return $charset . '_' . $cod . ".png";
    }

    public function PdfpickinPed($id_ped, $dir)
    {
        $linkPDF = 0;
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosDes = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido where id_despacho_ped=" . $id_ped . " limit 1;", $jarvisConex)->fetch_object();
        $jarvisConex->close();
        if (is_object($datosDes)) {
            $nro_ped = $datosDes->nro_ped;
            $tipo = 'PEDIDO ';
            if ($datosDes->fvtaID == '0' && $nro_ped[0] != 'D') {
                $tipo = 'MUESTRA ';
            } else if ($nro_ped[0] == 'D') {
                $tipo = 'REPOSICI&OacuteN ';
                //$nombre='Factura: '.$datosDes->fvtaSECUENCIA;
            }
            $factura = $tipo . ' SIN FACTURA';
            if (is_int($datosDes->fvtaID)) {
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosFactura = $this->consultaBD1("SELECT * FROM cclabora_fsql007.facturasventa where fvtaID=" . trim($datosDes->fvtaID) . " limit 1;", $jarvisConex)->fetch_object();
                $jarvisConex->close();
                if (is_object($datosFactura)) {
                    $factura = $datosFactura->fvtaSECUENCIA;
                }
            }

            $cbar = $datosDes->id_barcode;
            $cbar = str_replace("(", "", $cbar);
            $cbar = str_replace(")", "", $cbar);
            $barcode = $this->generaCodigoBarraPicking($cbar, $dir);
            $datosCliente = $this->dimeCliente($datosDes->clieID);

            if (is_object($datosCliente)) {


                $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\ ';
                $link = trim($path2) . $barcode;
                $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\picking_list.html.twig';
                $html = file_get_contents($path);
                $titulo = 'PICKING LIST ' . $tipo . ': ' . $nro_ped;
                $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
                $nombre = '';
                $atc = 'No registrado';
                $datosAtc = $this->dimeTaGenereles($datosCliente->clieID_VENDEDOR);
                if (is_object($datosAtc)) {
                    $atc = $datosAtc->fgralNOMBRE;
                }
                $html = str_replace("{titulo}", $titulo, $html);
                $html = str_replace("{fecha}", date('Y/m/d'), $html);
                $html = str_replace("{hora}", date('H:i:S'), $html);
                $html = str_replace("{pagina}", 1, $html);
                $html = str_replace("{link}", $link, $html);
                $html = str_replace("{barcode}", '', $html);
                $html = str_replace("{cliente}", $datosCliente->clieRAZONSOCIAL, $html);
                $html = str_replace("{atc}", $atc, $html);
                $fecha = explode(" ", $datosDes->fecha_reg);
                $html = str_replace("{fecha_hora_recibo}", $fecha[0], $html);
                $ma = explode(";", $datosCliente->clieEMAIL);
                if (count($ma) > 0) {
                    $mails = $ma[0];
                } else {
                    $mails = $datosCliente->clieEMAIL;
                }
                $html = str_replace("{email}", $mails, $html);
                $html = str_replace("{telefono}", $datosCliente->clieFONO1, $html);
                $html = str_replace("{celular}", $datosCliente->clieCELULAR, $html);
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosPedido = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_orderheader oh join cclabora_jarvis.sch_admin_tbdata_customeraddress ca on (oh.OrderCustomerCode=ca.CustomerAddressCode and oh.OrderShipToAddressCode=ca.CustomerAddressId)  where oh.OrderNumber='" . $nro_ped . "' and oh.EstadoOrder!=91 limit 1; ", $jarvisConex)->fetch_object();
                $jarvisConex->close();
                $direccion = '';
                $instrucciones = '';
                $ciudad = '';
                $provincia = '';
                $datosCiProv = $this->dimeCiudadProvincia($datosCliente->cityID);
                if (is_object($datosCiProv)) {
                    $ciudad = $datosCiProv->cityNAME;
                    $provincia = $datosCiProv->provinciaNOMBRE;
                }
                if (is_object($datosPedido)) {
                    $direccion = $datosPedido->CustomerAddressStreet;
                    $ciudad = strtoupper($datosPedido->CustomerAddressCity);
                    $provincia = strtoupper($datosPedido->CustomerAddressState);
                    $instrucciones = $datosPedido->OrderSpecialInstructions;
                }
                $items = array();
                $table_prod = '';
                $jarvisConex = $this->abrirconexion('jarvis');
                $sth_descrip = $this->consultaBD1("SELECT bdes.cant_descrip,bop.lote_op,pro.prodDESCRIPCION,pro.prodCODIGO FROM cclabora_jarvis.sch_mrp_tbdata_descrip_bulto_despacho bdes
                                                            join cclabora_jarvis.sch_prod_tbdata_lote_despacho ldes on ldes.id_lote_despacho=bdes.id_lote_despacho
                                                            join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_bultos_op=ldes.id_bultos_op
                                                            join cclabora_jarvis.sch_prod_tbdata_liquidacion_op op on op.id_liqop=bop.id_liqop
                                                            join cclabora_jarvis.sch_admin_tbdata_productos pro on pro.prodCODIGO=op.id_producto
                                                            where ldes.id_despacho_ped='" . trim($datosDes->id_despacho_ped) . "' ", $jarvisConex);
                $jarvisConex->close();
                $table_prod = '';
                if ($sth_descrip->num_rows > 0) {
                    while ($result_descrip = $sth_descrip->fetch_object()) {
                        $items[$result_descrip->prodDESCRIPCION] = 1;
                        $table_prod .= '<tr style="width:100%;">
                                            <td>' . utf8_encode($result_descrip->prodCODIGO) . '</td>
                                            <td>' . utf8_encode($result_descrip->prodDESCRIPCION) . '</td>
                                            <td>' . $result_descrip->lote_op . '</td>
                                            <td>' . $result_descrip->cant_descrip . '</td>
                                          </tr>';
                    }
                }


                $html = str_replace("{direccion}", $direccion, $html);
                $html = str_replace("{provincia}", $provincia, $html);
                $html = str_replace("{contacto}", $datosCliente->clieCONTACTO, $html);
                $html = str_replace("{ciudad}", $ciudad, $html);
                $html = str_replace("{observacion_e}", $instrucciones, $html);
                $auxpicking = explode(" ", $datosDes->fecha_reg);
                $html = str_replace("{fecha_picking}", $auxpicking[0], $html);
                $html = str_replace("{hora_picking}", $auxpicking[1], $html);
                $html = str_replace("{tiempo_picking}", $datosDes->tiempo_picking, $html);
                $Empickig = $this->dimeEmpleado($datosDes->id_empleado);
                $nombre_empl = 'Sin Registro';
                if (is_object($Empickig)) {
                    $nomre_empl = $Empickig->emplNOMBRES . " " . $Empickig->emplAPELLIDOS;
                }
                $html = str_replace("{nombre_picking}", $nomre_empl, $html);
                $html = str_replace("{num_items}", count($items), $html);
                $html = str_replace("{TABLA}", $table_prod, $html);


                $pagina .= $html;
                $pagina .= "</body></html>";
                $paper_size = array(0, 0, 950, 600); // TAMA�O IMPRESORA TICKETS NO MODIFICAR
                $options = new Options();
                $options->set('enable_html5_parser', true);
                $dompdf = new Dompdf($options);
                $dompdf->setPaper($paper_size, 'landscape');
                $dompdf->loadHtml($pagina);
                $dompdf->render();
                $pdf = $dompdf->output();
                $nombrepdf = "pickinlist";
                file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
                unlink(trim($path2) . $barcode);
                $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/despacho/" . $nombrepdf . '.pdf';
            }


        }

        return $linkPDF;

    }

    public function PdfpackingPed($id_ped, $dir)
    {
        $linkPDF = 0;
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosDes = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido where id_despacho_ped=" . $id_ped . " limit 1;", $jarvisConex)->fetch_object();
        $jarvisConex->close();
        $tipop = 0;
        if (is_object($datosDes)) {
            $nro_ped = $datosDes->nro_ped;
            $tipo = 'PEDIDO ';
            if ($datosDes->fvtaID == '0' && $nro_ped[0] != 'D') {
                $tipo = 'MUESTRA ';
                $tipop = 1;
            } else if ($nro_ped[0] == 'D') {
                $tipo = 'REPOSICI&OacuteN ';
                $tipop = 2;
                //$nombre='Factura: '.$datosDes->fvtaSECUENCIA;
            }
            $factura = $tipo . ' SIN FACTURA';
            if (is_int($datosDes->fvtaID)) {
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosFactura = $this->consultaBD1("SELECT * FROM cclabora_fsql007.facturasventa where fvtaID=" . trim($datosDes->fvtaID) . " limit 1;", $jarvisConex)->fetch_object();
                $jarvisConex->close();
                if (is_object($datosFactura)) {
                    $factura = $datosFactura->fvtaSECUENCIA;
                }
            }


            $cbar = $datosDes->id_barcode;
            $cbar = str_replace("(", "", $cbar);
            $cbar = str_replace(")", "", $cbar);
            $barcode = $this->generaCodigoBarraPicking($cbar, $dir);
            $datosCliente = $this->dimeCliente($datosDes->clieID);

            if (is_object($datosCliente)) {
                $validaCliente = array(0 => '', 1 => '');
                $jarvisConex = $this->abrirconexion('jarvis');
                $val = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_despacho_pedido where clieID=" . trim($datosCliente->clieID) . " and estado_desp=2;", $jarvisConex);
                if ($val->num_rows <= 3) {
                    $respuesta[0] = 'CLIENTE NUEVO:  ';
                    $vendedor = $this->dimeVendedor($datosCliente->clieID_VENDEDOR);
                    if (is_object($vendedor)) {
                        $validaCliente[1] = 'ENVIAR A ' . $vendedor->zona_atc;
                        $validaCliente[2] = $vendedor->zona_atc;
                    }


                }
                $jarvisConex->close();

                $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\ ';
                $link = trim($path2) . $barcode;
                $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\packing_list.html.twig';
                $html = file_get_contents($path);
                $titulo = 'PICKING LIST ' . $tipo . ': ' . $nro_ped;
                $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
                $nombre = '';
                $atc = 'No registrado';
                $datosAtc = $this->dimeTaGenereles($datosCliente->clieID_VENDEDOR);
                if (is_object($datosAtc)) {
                    $atc = $datosAtc->fgralNOMBRE;
                }
                $html = str_replace("{titulo}", $titulo, $html);
                $html = str_replace("{fecha}", date('Y/m/d'), $html);
                $html = str_replace("{pagina}", 1, $html);
                $html = str_replace("{hora}", date('H:i:S'), $html);
                $html = str_replace("{link}", $link, $html);
                $html = str_replace("{barcode}", '', $html);
                $html = str_replace("{cliente}", $datosCliente->clieRAZONSOCIAL, $html);
                $html = str_replace("{atc}", $atc, $html);
                $fecha = explode(" ", $datosDes->fecha_reg);
                $html = str_replace("{fecha_hora_recibo}", $fecha[0], $html);
                $ma = explode(";", $datosCliente->clieEMAIL);
                if (count($ma) > 0) {
                    $mails = $ma[0];
                } else {
                    $mails = $datosCliente->clieEMAIL;
                }
                $html = str_replace("{email}", $mails, $html);
                $html = str_replace("{telefono}", $datosCliente->clieFONO1, $html);
                $html = str_replace("{celular}", $datosCliente->clieCELULAR, $html);
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosPedido = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_orderheader oh join cclabora_jarvis.sch_admin_tbdata_customeraddress ca on (oh.OrderCustomerCode=ca.CustomerAddressCode and oh.OrderShipToAddressCode=ca.CustomerAddressId)  where oh.OrderNumber='" . $nro_ped . "' and oh.EstadoOrder!=91 limit 1; ", $jarvisConex)->fetch_object();
                $jarvisConex->close();
                $direccion = '';
                $instrucciones = '';
                $ciudad = '';
                $provincia = '';
                $datosCiProv = $this->dimeCiudadProvincia($datosCliente->cityID);
                if (is_object($datosCiProv)) {
                    $ciudad = $datosCiProv->cityNAME;
                    $provincia = $datosCiProv->provinciaNOMBRE;
                }
                if (is_object($datosPedido)) {
                    $direccion = $datosPedido->CustomerAddressStreet;
                    $ciudad = strtoupper($datosPedido->CustomerAddressCity);
                    $provincia = strtoupper($datosPedido->CustomerAddressState);
                    $instrucciones = $datosPedido->OrderSpecialInstructions;
                }

                if (trim($tipop) == 1) {
                    $jarvisConex = $this->abrirconexion('jarvis');
                    $datosMuestra = $this->consultaBD1("SELECT p.provinciaNOMBRE,c.cityNAME,m.dir_envio_m,m.observaciones FROM cclabora_jarvis.sch_sales_tbdata_muestras_clientes  m
                                                      join cclabora_jarvis.sch_admin_tbdata_ciudades c on c.cityID=m.cityID
                                                      join cclabora_jarvis.sch_admin_tbdata_provincias p on p.provinciaID=c.provinciaID
                                                       where m.id_muestras_c=" . trim($nro_ped) . " limit 1;", $jarvisConex)->fetch_object();
                    $jarvisConex->close();
                    if (is_object($datosMuestra)) {
                        $direccion = $datosMuestra->dir_envio_m;
                        $ciudad = strtoupper($datosMuestra->cityNAME);
                        $provincia = strtoupper($datosMuestra->provinciaNOMBRE);
                        $instrucciones = $datosMuestra->observaciones;
                    }

                } else if (trim($tipop) == 2) {
                    $jarvisConex = $this->abrirconexion('jarvis');
                    $datosReposicion = $this->consultaBD1("SELECT p.provinciaNOMBRE,c.cityNAME,m.direccion_envio,m.observaciones_repo FROM cclabora_jarvis.sch_sales_tbdata_reposiciones  m
                                                      join cclabora_jarvis.sch_admin_tbdata_ciudades c on c.cityID=m.cityID
                                                      join cclabora_jarvis.sch_admin_tbdata_provincias p on p.provinciaID=c.provinciaID
                                                      where m.nro_ref==" . trim($nro_ped) . " limit 1;", $jarvisConex)->fetch_object();
                    $jarvisConex->close();
                    if (is_object($datosReposicion)) {
                        $direccion = $datosReposicion->direccion_envio;
                        $ciudad = strtoupper($datosReposicion->cityNAME);
                        $provincia = strtoupper($datosReposicion->provinciaNOMBRE);
                        $instrucciones = $datosReposicion->observaciones_repo;
                    }
                }
                $items = array();
                $table_prod = '';
                $jarvisConex = $this->abrirconexion('jarvis');
                $sth_descrip = $this->consultaBD1("SELECT bdes.cant_descrip,bop.lote_op,pro.prodDESCRIPCION,pro.prodCODIGO FROM cclabora_jarvis.sch_mrp_tbdata_descrip_bulto_despacho bdes
                                                            join cclabora_jarvis.sch_prod_tbdata_lote_despacho ldes on ldes.id_lote_despacho=bdes.id_lote_despacho
                                                            join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_bultos_op=ldes.id_bultos_op
                                                            join cclabora_jarvis.sch_prod_tbdata_liquidacion_op op on op.id_liqop=bop.id_liqop
                                                            join cclabora_jarvis.sch_admin_tbdata_productos pro on pro.prodCODIGO=op.id_producto
                                                            where ldes.id_despacho_ped='" . trim($datosDes->id_despacho_ped) . "' ", $jarvisConex);
                $jarvisConex->close();
                $table_prod = '';
                if ($sth_descrip->num_rows > 0) {
                    while ($result_descrip = $sth_descrip->fetch_object()) {
                        $items[$result_descrip->prodDESCRIPCION] = 1;
                        $table_prod .= '<tr style="width:100%;">
                                            <td>' . utf8_encode($result_descrip->prodDESCRIPCION) . '</td>
                                            <td>' . $result_descrip->lote_op . '</td>
                                            <td>' . $result_descrip->cant_descrip . '</td>
                                          </tr>';
                    }
                }
                if (!empty($validaCliente[1])) {
                    $direccion = $validaCliente[1];
                }


                $html = str_replace("{ped}", $datosDes->nro_ped, $html);
                $html = str_replace("{direccion}", $direccion, $html);
                $html = str_replace("{provincia}", $provincia, $html);
                $html = str_replace("{contacto}", $datosCliente->clieCONTACTO, $html);
                $html = str_replace("{ciudad}", $ciudad, $html);
                $html = str_replace("{observacion_e}", $instrucciones, $html);
                $auxpicking = explode(" ", $datosDes->fecha_reg);
                $html = str_replace("{fecha_picking}", $auxpicking[0], $html);
                $html = str_replace("{hora_picking}", $auxpicking[1], $html);
                $html = str_replace("{paquetes}", $datosDes->bultos, $html);
                $html = str_replace("{peso}", round($datosDes->peso_total, 3), $html);
                $html = str_replace("{transporte}", $datosDes->transporte, $html);
                $html = str_replace("{obser_reg}", $datosDes->observaciones, $html);
                $auxpacking = explode(" ", $datosDes->fecha_packing);
                $html = str_replace("{fecha_packing}", $auxpacking[0], $html);
                $html = str_replace("{hora_packing}", $auxpacking[1], $html);
                $html = str_replace("{tiempo_packing}", $datosDes->tiempo_packing, $html);

                $html = str_replace("{tiempo_picking}", $datosDes->tiempo_picking, $html);
                $Empickig = $this->dimeEmpleado($datosDes->id_empleado);
                $nombre_empl = 'Sin Registro';
                if (is_object($Empickig)) {
                    $nomre_empl = $Empickig->emplNOMBRES . " " . $Empickig->emplAPELLIDOS;
                }


                $Empackig = $this->dimeEmpleado($datosDes->empleado_packing);
                $nombre_packing = 'Sin Registro';
                if (is_object($Empackig)) {
                    $nombre_packing = $Empackig->emplNOMBRES . " " . $Empackig->emplAPELLIDOS;
                }

                $html = str_replace("{nombre_packing}", $nombre_packing, $html);
                $html = str_replace("{nombre_picking}", $nomre_empl, $html);
                $html = str_replace("{num_items}", count($items), $html);
                $html = str_replace("{TABLA}", $table_prod, $html);


                $pagina .= $html;
                $pagina .= "</body></html>";
                $paper_size = array(0, 0, 950, 600); // TAMA�O IMPRESORA TICKETS NO MODIFICAR
                $options = new Options();
                $options->set('enable_html5_parser', true);
                $dompdf = new Dompdf($options);
                $dompdf->setPaper($paper_size, 'landscape');
                $dompdf->loadHtml($pagina);
                $dompdf->render();
                $pdf = $dompdf->output();
                $nombrepdf = "packinlist";
                file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
                unlink(trim($path2) . $barcode);
                $linkPDF = "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/despacho/" . $nombrepdf . '.pdf';
            }


        }

        return $linkPDF;

    }


    public function Pdfetqpacking($id, $dir)
    {

        set_time_limit(5000);
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth_des = $this->consultaBD1('select * from cclabora_jarvis.sch_mrp_tbdata_despacho_pedido where  id_despacho_ped="' . trim($id) . '" ', $jarvisConex);
        $html = array();

        if ($sth_des->num_rows > 0) {
            $result_des = $sth_des->fetch_object();
            $path = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\ticketDespacho.html.twig';
            $path2 = $dir . '/../' . 'src\UserBundle\LogisticaBundle\Resources\public\docs\despacho\ ';
            $i = 1;
            $todosPDf = array();
            $datosCliente = $this->dimeCliente($result_des->clieID);

            if (strlen($datosCliente->clieRAZONSOCIAL) > 21) {
                $cliente = substr($datosCliente->clieRAZONSOCIAL, 0, 21);
            } else {
                $cliente = $datosCliente->clieRAZONSOCIAL;
            }
            $direccion = strtoupper($datosCliente->clieCALLEP);
            if (!empty($datosCliente->clieCALLES)) {
                $direccion .= " ," . strtoupper($datosCliente->clieCALLES);
            }

            if (strlen($direccion) > 50) {
                $direccion = substr($direccion, 0, 33);
            }
            $aLocadidad = $this->dimeCiudadProvincia($datosCliente->cityID);

            $telefono = $datosCliente->clieFONO2;
            if (!empty($datosCliente->clieCELULAR)) {
                $telefono .= " " . $datosCliente->clieCELULAR;
            }
            $email = explode(";", $datosCliente->clieEMAIL);

            if (count($email) == 0) {
                $email = explode(",", $datosCliente->clieEMAIL);
            }

            $datosVendedor = $this->consultaBD('SELECT * FROM cclabora_fsql007.tablasgenerales where  fgralID= "' . trim($datosCliente->clieID_VENDEDOR) . '"', 'jarvis')->fetch_object();
            $nombreATC = "S/R";
            if (is_object($datosVendedor)) {
                $nombreATC = $datosVendedor->fgralNOMBRE;
            }

            $sth_bultos = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_bulto_despacho where id_despacho_pedido='" . trim($id) . "';", $jarvisConex);
            $i = 0;
            $table_prod = '';
            if ($sth_bultos->num_rows > 0) {
                while ($result_bulto = $sth_bultos->fetch_object()) {
                    $bulto = $result_bulto->orden_bulto . ' de ' . $sth_bultos->num_rows;

                    $html[$i] = file_get_contents($path);
                    /**NUEVA INFORMACION*/
                    $html[$i] = str_replace("{fecha_envio}", date("Y-m-d", strtotime($result_des->fecha_packing)), $html[$i]);
                    $html[$i] = str_replace("{packer}", $result_des->empleado_packing, $html[$i]);
                    $html[$i] = str_replace("{picker}", $result_des->id_empleado, $html[$i]);
                    $html[$i] = str_replace("{link}", "C:/inetpub/wwwroot/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/despacho/codigoBARRA.jpeg", $html[$i]);
                    $html[$i] = str_replace("{guia}", "701674616", $html[$i]);
                    /***/
                    $html[$i] = str_replace("{cliente}", $cliente, $html[$i]);
                    $html[$i] = str_replace("{pedido}", $result_des->nro_ped, $html[$i]);
                    $html[$i] = str_replace("{direccion}", $direccion, $html[$i]);
                    $html[$i] = str_replace("{ciudad}", $aLocadidad->cityNAME, $html[$i]);
                    $html[$i] = str_replace("{provincia}", $aLocadidad->provinciaNOMBRE, $html[$i]);
                    $html[$i] = str_replace("{telefono}", $telefono, $html[$i]);
                    $html[$i] = str_replace("{email}", $email[0], $html[$i]);
                    $html[$i] = str_replace("{paq}", $bulto, $html[$i]);
                    $html[$i] = str_replace("{transporte}", $result_des->transporte, $html[$i]);
                    $html[$i] = str_replace("{atc}", $nombreATC, $html[$i]);
                    $html[$i] = str_replace("{observacion}", $result_des->observaciones, $html[$i]);
                    /* $sth_descrip = $this->consultaBD1("SELECT bdes.cant_descrip,bop.lote_op,pro.prodDESCRIPCION FROM cclabora_jarvis.sch_mrp_tbdata_descrip_bulto_despacho bdes
                                                             join cclabora_jarvis.sch_prod_tbdata_lote_despacho ldes on ldes.id_lote_despacho=bdes.id_lote_despacho
                                                             join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_bultos_op=ldes.id_bultos_op
                                                             join cclabora_jarvis.sch_prod_tbdata_liquidacion_op op on op.id_liqop=bop.id_liqop
                                                             join cclabora_jarvis.sch_admin_tbdata_productos pro on pro.prodCODIGO=op.id_producto
                                                             where bdes.id_bulto_despacho=".trim($result_bulto->id_bulto_despacho)." and ldes.estado_lote_despacho=2;",$jarvisConex);
                     $table_prod='';
                     if ($sth_descrip->num_rows>0){
                         while($result_descrip = $sth_descrip->fetch_object()){
                             $producto = $result_descrip->prodDESCRIPCION;
                             if (strlen($producto)>30){
                                 $producto= substr($producto, 0, 20);
                             }
                             $table_prod.='<tr>
                                             <td><font size="6">'.utf8_encode($producto).'</font></td>
                                             <td><font size="6">'.$result_descrip->lote_op.'</font></td>
                                             <td><font size="6">&nbsp;&nbsp;'.$result_descrip->cant_descrip.'</font></td>
                                           </tr>';
                         }
                     }
                     $html[$i] = str_replace("{tableProd}",$table_prod,$html[$i]);*/
                    $i++;
                }
            }
            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
            for ($x = 0; $x < $i; $x++) {
                $pagina .= $html[$x];
            }
            $pagina .= "</body></html>";
            $paper_size = array(0, 0, 950, 600); // TAMA�O IMPRESORA TICKETS NO MODIFICAR
            $dompdf = new Dompdf();
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();
            $nombrepdf = 'etqdespacho';
            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);

            return "http://servercc1/Jarvis/src/UserBundle/LogisticaBundle/Resources/public/docs/despacho/" . $nombrepdf . '.pdf';

        } else {
            return 0;
        }

    }

    public function historicoCliente($clieID, $header_bool, $TR_table_params = '')
    {

        $query_string = "SELECT CONCAT('001-001-',RIGHT(CONCAT('000000000',a.fvtaSECUENCIA),9)) AS FACTURA, a.fvtaEMISION AS EMISION,
                         a.fvtaVENCIMIENTO as VENCIMIENTO, ROUND((f.detcCUOTA - f.detcPAGOS - b.edccHABER) , 2) AS VENCIDO, a.fvtaTOTAL AS TOTAL,
                         (SELECT DATEDIFF(a.fvtaEMISION,'" . date("Y-m-d") . "'))+59 as DIAS,d.clieDIASPLAZO
                         FROM cclabora_fsql007.FacturasVenta a
                         INNER JOIN cclabora_fsql007.MovimientosClientes b ON a.edccID = b.edccID
                         INNER JOIN cclabora_fsql007.Clientes d ON b.clieID = d.clieID
                         INNER JOIN cclabora_fsql007.DetalleCuotasVentas f ON a.fvtaID = f.fvtaID
                         LEFT JOIN cclabora_fsql007.TablasGenerales c ON b.edcc_IDVENDEDOR = c.fgralID
                         WHERE b.clieID = '" . $clieID . "'
                         AND a.fvtaEMISION <= '" . date("Y-m-d") . "'
                         AND a.fvtaEMISION BETWEEN '2000-01-01' AND '" . date("Y-m-d") . "' GROUP BY f.fvtaID ORDER BY 6 DESC";
        $porVencer = 0;
        $vencido = 0;
        $TH_table_params = '';
        if ($TR_table_params == "colors") $TR_table_colors = true; else $TR_table_colors = false;
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1($query_string, $jarvisConex);
        $sth1 = $this->consultaBD1($query_string, $jarvisConex);
        $jarvisConex->close();
        $column_count = $sth->field_count;
        $output = "";
        //$totalvencido=0;$totalvencido=0;
        global $totalvencido;
        global $totalxvencer;
        $totalvencido = 0;
        while ($result1 = $sth1->fetch_object()) {

            if (($result1->DIAS > 0) and ($result1->VENCIDO > 0)) {
                //if (($result1->DIAS < $result1->clieDIASPLAZO) and ($result1->VENCIDO > 0)){
                $totalxvencer += $result1->VENCIDO;
            }

            if (($result1->DIAS < 0) and ($result1->VENCIDO > 0)) {
                $totalvencido += $result1->VENCIDO;
            }
        }
        $vencido = 0;
        while ($result = $sth->fetch_object()) {
            $ban = 0;
            if ($header_bool) {
                $res = (array)$result;
                // $header_line = ("<TR>");
                $headers = array_keys($res);
                for ($column_num = 0; $column_num < $column_count; $column_num++) {
                    $field_name = $headers[$column_num];
                    // $header_line.=("<TH $TH_table_params>$field_name</TH>");
                }

                //$header_line.=("</TR>");
                //$output .= $header_line;
            }
            if (is_array($TR_table_params)) {
                $TR_table_parms = implode(" ", $TR_table_params);
            }

            $x = 0;

            $output .= ("<TR  $TR_table_params >");

            foreach ($result as $key => $arr) {
                $PASO1 = 0;
                $PASO2 = 0;
                if ($TR_table_colors) {
                    $TR_table_params = 'class="' . ($key % 2 <> 0 ? 'cclabsgraybackground' : 'cclabswhiteBackground') . '"';
                }
                if ($arr == -0.00) {
                    $arr = 0.00;
                }
                if ($key == "DIAS") {
                    if ($arr < 0) {
                        $PASO1 = 1;
                    }
                }

                if ($key == "VENCIDO") {

                    if ($arr > 0) {
                        $ban = 1;
                        $vencido = $vencido + $arr;
                    }
                    if ($arr == 0) {
                        $PASO2 = 1;
                    }
                    if (($arr > 0) and ($result->DIAS > 0)) {
                        $arr = 0.00;
                    }
                }
                if ($key == "TOTAL") {
                    $porVencer = $porVencer + $arr;
                }

                if ($key == "DIAS") {
                    if ($arr < 0) {
                        if ($ban == 1) {
                            $dias = ($arr * -1);
                            $output .= "<TD>$dias</TD>";
                        } else {
                            //$output .= "<TD $TD_table_params>$arr</TD>";
                            $output .= "<TD>PAGADO</TD>";
                        }
                    } else {
                        $output .= "<TD>$arr</TD>";
                    }
                } else {
                    $output .= "<TD>$arr</TD>";
                }
                $x++;
            }
            flush();

        }
        $output .= ("</TR>");
        //$output.=("</TABLE>");
        $resultado = array();
        $resultado[0] = $output;
        $resultado[1] = $totalxvencer;
        $resultado[2] = $totalvencido;
        return $resultado;

    }

    public function botonesDEV($id, $dev, $id_pa)
    {
        $botones = '<div class="panel-footer" style="align-content: center;" id="botones">
						<input type="hidden" id="idm_dev" name="idm_dev" value="' . $dev . '">
						<input type="hidden" id="id_devpa" name="id_devpa" value="' . $id_pa . '">';
        if ($id != '') {
            if ($id == 57) {
                $botones .= '<button type="button" class="btn btn-success" onclick="guardagRegr(56)">APROBACI&Oacute;N</button>&nbsp;';
            }
            if ($id == 58) {
                // $botones.='<button type="button" class="btn btn-success" onclick="guardagRegr(56)">APROBACI&Oacute;N</button>&nbsp;';
                $botones .= '<button type="button" class="btn btn-success" onclick="guardagRegr(57)">CEDIS</button>&nbsp;';
            }
            if ($id == 59) {
                //$botones.='<button type="button" class="btn btn-success" onclick="guardagRegr(56)">APROBACI&Oacute;N</button>&nbsp;';
                $botones .= '<button type="button" class="btn btn-success" onclick="guardagRegr(57)">CEDIS</button>&nbsp;';
                $botones .= '<button type="button" class="btn btn-success" onclick="guardagRegr(58)">NOTA CREDITO</button>&nbsp;';
            }
        }
        $botones .= '</div>';
        return $botones;

    }

    public function ingresarPermiso()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $id_emple = '39;1;81;17;34';
        $clave = '';
        $idp = 5;
        $c_permi = 'ELIMINAR FT ';
        $tipo_p = 'MP';
        $emplid = explode(";", $id_emple);
        foreach ($emplid as $ide) {
            $this->consultaBD1("insert into cclabora_jarvis.sch_securelogin_tbdata_permisos (id_empleado,id_permiso, permiso, tipo_permiso) values (" . $ide . "," . trim($idp) . ",'" . trim($c_permi) . "','" . trim($tipo_p) . "');", $jarvisConex);
        }
        $jarvisConex->close();

    }

    public function restaurarTrans()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT kr.* FROM fsql020.documentosinventarios  dc join fsql020.kardex kr on dc.docinvID=kr.docinvID where dc.tpdiID='XIA' and docinvFECHA>='2018-01-01' and docinvFECHA<='2018-12-31';", $jarvisConex);
        $jarvisConex->close();
        $cambiado = array();
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $jarvisConex = $this->abrirconexion('jarvis');
                $upd = $this->consultaBD1("update cclabora_fsql007.kardex set krdCOSTO=" . $result->krdCOSTO . " where krdID=" . $result->krdID . ";", $jarvisConex);
                $jarvisConex->close();
                if ($upd == 1) {
                    $cambiado[$result->krdID] = $result->krdCOSTO;
                }
            }
        }

        echo "Cambiados: " . count($cambiado) . ' De: ' . $sth->num_rows;
        echo "<br><br>";
        print_r($cambiado);
    }

    public function PdfResumenEvento($id_evento, $dir)
    {
        $linkPDF = 0;
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosEvento = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_eventos  where id_evento=" . trim($id_evento) . " limit 1;", $jarvisConex)->fetch_object();
        $jarvisConex->close();
        $repuesta = array(0 => '', 1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => '', 7 => '', 8 => '', 9 => '', 10 => '', 11 => '', 12 => '', 13 => '');
        if (is_object($datosEvento)) {
            $datosEmpleado = $this->dimeEmpleado($datosEvento->id_empleado_eventoi);
            $repuesta[0] = $datosEvento->nom_evento;
            $repuesta[1] = $datosEvento->fecha_reg_evento;
            if (is_object($datosEmpleado)) {
                $repuesta[2] = $datosEmpleado->emplNOMBRES . ' ' . $datosEmpleado->emplAPELLIDOS;
            }
            if (empty($f_cerrado)) {
                $repuesta[3] = date('Y-m-d H:i:s');
            } else {
                $repuesta[3] = $f_cerrado;
            }

            $repuesta[4] = $datosEvento->observacion_evento;

            $jarvisConex = $this->abrirconexion('jarvis');
            $sth_m = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_eventos_muestras em
                                                join cclabora_jarvis.sch_sales_tbdata_muestras_clientes mc on mc.id_muestras_c=em.id_muestra_c
                                                where id_evento=" . trim($id_evento) . "; ", $jarvisConex);
            $jarvisConex->close();
            $responsable = '';
            if ($sth_m->num_rows > 0) {
                $repuesta[5] = "<tr>
                                  <th>Muestra</th>
                                  <th>Q. Prod</th>
                                  <th>Observaci&oacute;n</th>
                                  <th>Fecha</th>
                                  <th>Responsable</th>
                              </tr>";
                $liquidado = array();
                while ($result_m = $sth_m->fetch_object()) {

                    $jarvisConex = $this->abrirconexion('jarvis');
                    $sth_sobrante = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_evento_liqmuestra where  id_event_m=" . trim($result_m->id_event_m) . ";", $jarvisConex);
                    $jarvisConex->close();
                    if ($sth_sobrante->num_rows > 0) {
                        while ($result_s = $sth_sobrante->fetch_object()) {
                            if (trim($result_s->tipo_liqmue) == 'SOBRANTE') {
                                if (isset($liquidado['S'][$result_s->prodID_evem])) {
                                    $liquidado['S'][$result_s->prodID_evem] += $result_s->cant_prod;
                                } else {
                                    $liquidado['S'][$result_s->prodID_evem] = $result_s->cant_prod;
                                }
                            } else if (trim($result_s->tipo_liqmue) == 'FACTURADO') {
                                if (isset($liquidado['F'][$result_s->prodID_evem])) {
                                    $liquidado['F'][$result_s->prodID_evem] += $result_s->cant_prod;
                                } else {
                                    $liquidado['F'][$result_s->prodID_evem] = $result_s->cant_prod;
                                }
                            } else if (trim($result_s->tipo_liqmue) == 'REGALADO') {
                                if (isset($liquidado['R'][$result_s->prodID_evem])) {
                                    $liquidado['R'][$result_s->prodID_evem] += $result_s->cant_prod;
                                } else {
                                    $liquidado['R'][$result_s->prodID_evem] = $result_s->cant_prod;
                                }
                            }

                        }
                    }

                    $datosEmpleado = $this->dimeEmpleado($result_m->id_empleado);

                    if (is_object($datosEmpleado)) {
                        $auxN = explode(" ", $datosEmpleado->emplNOMBRES);
                        $auxA = explode(" ", $datosEmpleado->emplAPELLIDOS);
                        $responsable = '<small>' . $auxN[0] . ' ' . $auxA[0] . '</small>';
                    }
                    $jarvisConex = $this->abrirconexion('jarvis');
                    $sth_prod = $this->consultaBD1("SELECT sum(cantidad),prodID FROM cclabora_jarvis.sch_sales_tbdata_muestras_prod_clientes where id_muestra_c=" . trim($result_m->id_muestras_c) . " group by prodID;", $jarvisConex);
                    $jarvisConex->close();
                    $repuesta[5] .= "<tr>
                                    <td>" . $result_m->id_muestras_c . "</td>
                                    <td>" . $sth_prod->num_rows . "</td>
                                    <td><small>" . $result_m->observaciones . "</small></td>
                                    <td>" . $result_m->fecha_reg_m . "</td>
                                    <td>" . $responsable . "</td>
                                   </tr>";
                }
                $cabecera = "<tr>
                                 <th>Codigo</th>
                                 <th>Producto</th>
                                 <th>Cantidad</th>
                             </tr>";
                $repuesta[7] = $cabecera;
                $repuesta[9] = $cabecera;
                $repuesta[10] = $cabecera;
                foreach ($liquidado as $tipo => $valores) {
                    foreach ($valores as $key => $cant) {
                        $producto = $this->dimeProducto($key);
                        if (is_object($producto)) {
                            if ($tipo == 'S') {
                                $repuesta[7] .= "<tr>
                                                    <td>" . $producto->prodCODIGO . "</td>
                                                    <td>" . utf8_encode($producto->prodDESCRIPCION) . "</td>
                                                    <td>" . $cant . "</td>
                                                </tr>";
                            } else if ($tipo == 'F') {
                                $repuesta[9] .= "<tr>
                                                    <td>" . $producto->prodCODIGO . "</td>
                                                    <td>" . utf8_encode($producto->prodDESCRIPCION) . "</td>
                                                    <td>" . $cant . "</td>
                                                </tr>";
                            } else if ($tipo == 'R') {
                                $repuesta[10] .= "<tr>
                                                    <td>" . $producto->prodCODIGO . "</td>
                                                    <td>" . utf8_encode($producto->prodDESCRIPCION) . "</td>
                                                    <td>" . $cant . "</td>
                                                </tr>";
                            }
                        }
                    }
                }

            }
            $jarvisConex = $this->abrirconexion('jarvis');
            $datosDev = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_con_tbdata_returnrequest where RetReqInvoiceNumber=" . trim($id_evento) . " limit 1 ", $jarvisConex)->fetch_object();
            $jarvisConex->close();
            if (is_object($datosDev)) {
                $repuesta[11] = 'Devolución Generada: ' . $datosDev->RetReqNumber;
            }


            if (count($repuesta) > 0) {
                $path2 = $dir . '/../' . 'src\UserBundle\GEVentasBundle\Resources\public\docs\doc_ferias\ ';
                $path = $dir . '/../' . 'src\UserBundle\GEVentasBundle\Resources\public\docs\doc_ferias\resumen_feria.html.twig';
                $html = file_get_contents($path);
                $titulo = 'RESUMEN DE EVENTO ';
                $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
                $html = str_replace("{nro_eve}", $id_evento, $html);
                $html = str_replace("{titulo}", $titulo, $html);
                $html = str_replace("{fecha}", date('Y/m/d'), $html);
                $html = str_replace("{hora}", date('H:i:s'), $html);


                $jarvisConex = $this->abrirconexion('jarvis');
                $datosE = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_evento_liquidacion where id_evento=" . trim($id_evento) . " and estado_liq=1 limit 1;", $jarvisConex)->fetch_object();
                $jarvisConex->close();
                $observ = '';
                $f_cerrado = 'Sin Cerrar';
                $empleado = '';
                if (is_object($datosE)) {
                    $observ = $datosE->observ_evento;
                    $f_cerrado = $datosE->fecha_reg_liq;
                    $datosEmpleado = $this->dimeEmpleado($datosE->id_empleado_liq);
                    if (is_object($datosEmpleado)) {
                        $empleado = $datosEmpleado->emplNOMBRES . ' ' . $datosEmpleado->emplAPELLIDOS;
                    }
                }
                $html = str_replace("{evento}", $datosEvento->nom_evento, $html);
                $html = str_replace("{fecha_evento}", $datosEvento->fecha_evento, $html);
                $html = str_replace("{responsable}", $responsable, $html);
                $html = str_replace("{fecha_cierre}", $f_cerrado, $html);

                $html = str_replace("{observacion}", $datosEvento->observacion_evento, $html);
                $html = str_replace("{nva_observacion}", $observ, $html);
                $html = str_replace("{cerrado}", $empleado, $html);

                $html = str_replace("{muestras_generada}", $repuesta[5], $html);
                $html = str_replace("{retorno_producto}", $repuesta[7], $html);
                $html = str_replace("{dev_ge}", $repuesta[11], $html);
                $html = str_replace("{regalado}", $repuesta[10], $html);
                $html = str_replace("{facturado}", $repuesta[9], $html);

                $pagina .= $html;
                $pagina .= "</body></html>";
                $paper_size = array(0, 0, 950, 600); // TAMA�O IMPRESORA TICKETS NO MODIFICAR
                $options = new Options();
                $options->set('enable_html5_parser', true);
                $dompdf = new Dompdf($options);
                $dompdf->setPaper($paper_size, 'landscape');
                $dompdf->loadHtml($pagina);
                $dompdf->render();
                $pdf = $dompdf->output();
                $nombrepdf = "resumen_e";
                file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
                $linkPDF = "http://servercc1/Jarvis/src/UserBundle/GEVentasBundle/Resources/public/docs/doc_ferias/" . $nombrepdf . '.pdf';

            }
        }

        return $linkPDF;

    }

    public function dimeSaldoProducto($prodCodigo)
    {
        $saldo = 0;
        $sal = 0;
        $in = 0;
        $jarvisConez = $this->abrirconexion('jarvis');
        $sth_lotes = $this->consultaBD1("SELECT sum(rl.cant_lote) as cantidad  FROM cclabora_jarvis.sch_prod_tbdata_liquidacion_op op
                                            join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_liqop=op.id_liqop and bop.nro_op_butlo=1
                                            join cclabora_jarvis.sch_prod_tbdata_reg_lotes rl on rl.lote_desc=bop.lote_op
                                            where op.id_producto='" . $prodCodigo . "';  ", $jarvisConez)->fetch_object();
        $salidas = $this->consultaBD1("SELECT sum(ms.cant_movlote) salidas  FROM cclabora_jarvis.sch_prod_tbdata_liquidacion_op op
                                join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_liqop=op.id_liqop and bop.nro_op_butlo=1
                                join cclabora_jarvis.sch_prod_tbdata_reg_lotes rl on rl.lote_desc=bop.lote_op
                                join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes ms on ms.id_reg_lote=rl.id_reg_lotes and ms.tipo_movlote='S'
                                where op.id_producto='" . $prodCodigo . "';", $jarvisConez)->fetch_object();
        if (is_object($salidas)) {
            $sal = $salidas->salidas;
        }
        $ingresos = $this->consultaBD1("SELECT sum(ms.cant_movlote) ingresos  FROM cclabora_jarvis.sch_prod_tbdata_liquidacion_op op
                                join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_liqop=op.id_liqop and bop.nro_op_butlo=1
                                join cclabora_jarvis.sch_prod_tbdata_reg_lotes rl on rl.lote_desc=bop.lote_op
                                join cclabora_jarvis.sch_prod_tbdata_movimiento_lotes ms on ms.id_reg_lote=rl.id_reg_lotes and ms.tipo_movlote='I'
                                where op.id_producto='" . $prodCodigo . "';", $jarvisConez)->fetch_object();
        if (is_object($ingresos)) {
            $in = $ingresos->ingresos;
        }
        $jarvisConez->close();
        if (is_object($sth_lotes)) {
            $saldo = $sth_lotes->cantidad;
        }
        $total = ($saldo + $in) - $sal;
        return $total;
    }

    public function verificaPermiso($id, $empl)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $val = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_securelogin_tbdata_permisos where id_empleado=" . trim($empl) . " and id_permiso=" . trim($id) . ";", $jarvisConex);
        $jarvisConex->close();
        $ban = false;
        if ($val->num_rows > 0) {
            $ban = true;
        }

        return $ban;
    }

    public function dimeCostoPromedio($almacenID, $prodID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $costo = 0;
        $prodCos = $this->consultaBD1("SELECT stocksCOSTO FROM cclabora_fsql007.stocks WHERE prodID = " . trim($prodID) . " and almacenID =" . trim($almacenID) . " limit 1;", $jarvisConex)->fetch_object();
        $jarvisConex->close();
        if (is_object($prodCos)) {
            $costo = $prodCos->stocksCOSTO;
        }
        return $costo;
    }


    public function ingresarMuestraFiresoft($id_m)
    {
        $idUser = 74;
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT m.*,lt.lote_desc FROM cclabora_jarvis.sch_sales_tbdata_muestras_prod_clientes m join cclabora_jarvis.sch_prod_tbdata_reg_lotes lt on lt.id_reg_lotes=m.id_reg_lotes where m.id_muestra_c=" . trim($id_m) . ";", $jarvisConex);
        $datosMuestra = $this->consultaBD1("SELECT mc.*,c.clieRAZONSOCIAL FROM cclabora_jarvis.sch_sales_tbdata_muestras_clientes mc join cclabora_jarvis.sch_admin_tbdata_clientes c on mc.clieID=c.clieID where mc.id_muestras_c=" . trim($id_m) . " limit 1", $jarvisConex)->fetch_object();
        $jarvisConex->close();
        $nroM = $id_m;
        $tsalida = 'XSA';
        $tentrada = 'XIA';
        $bodega_s = 8;
        $bodega_i = 9;
        $producto = array();
        $nombre = '';
        if (is_object($datosMuestra)) {
            $nombre = $datosMuestra->clieRAZONSOCIAL;
            if ($sth->num_rows > 0) {
                while ($result = $sth->fetch_object()) {
                    if (isset($producto[$result->prodID][$result->lote_desc])) {
                        $producto[$result->prodID][$result->lote_desc] += $result->cantidad;
                    } else {
                        $producto[$result->prodID][$result->lote_desc] = $result->cantidad;
                    }
                }
            }

        }
        $jarvisConex = $this->abrirconexion('jarvis');
        if (count($producto) > 0) {
            $titulos = 'Salida a MUESTRA: ' . $id_m . " " . $nombre;
            $userF = $this->auditoriaFiresoft($titulos . ' -S', '41', 'I', $idUser);
            if ($userF[0] == 0) {
                $userF[0] = $idUser;
            }
            $sth_asi = $this->consultaBD1('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_s . '" and tpdiID="' . trim($tsalida) . '" limit 1', $jarvisConex)->fetch_object();
            $docinvNUMERO_S = 0;
            if (is_object($sth_asi)) {
                $docinvNUMERO_S = $sth_asi->almseCNUMERO + 1;
                $this->consultaBD1('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO_S . '" where almsecID="' . $sth_asi->almsecID . '"', $jarvisConex);
            } else {
                $insertAM = $this->consultaBD1('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values (1,"' . $bodega_s . '","' . $tsalida . '")', $jarvisConex);
                if ($insertAM == 1) {
                    $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                    $docinvNUMERO_S = $result_asi->almseCNUMERO;
                }
            }
            $insertDS = 0;
            $docinvIDS = '';
            if ($docinvNUMERO_S > 0) {
                $insertDS = $this->consultaBD1('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tsalida . '","' . $docinvNUMERO_S . '","' . date("Y-m-d") . '","' . $bodega_s . '","' . $titulos . '","V","' . trim($userF[0]) . '","' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex);
                if ($insertDS == 1) {
                    $docinvIDS = $this->consultaBD1('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                }
            }


            $titulos = 'Ingreso MUESTRA: ' . $id_m . " " . $nombre;
            $userF = $this->auditoriaFiresoft($titulos . ' -S', '41', 'I', $idUser);
            if ($userF[0] == 0) {
                $userF[0] = $idUser;
            }
            $sth_asi = $this->consultaBD1('select * from cclabora_fsql007.almacen_secuencias_inventarios where almacenID="' . $bodega_i . '" and tpdiID="' . trim($tentrada) . '" limit 1', $jarvisConex)->fetch_object();
            $docinvNUMERO_I = 0;
            if (is_object($sth_asi)) {
                $docinvNUMERO_I = $sth_asi->almseCNUMERO + 1;
                $this->consultaBD1('update cclabora_fsql007.almacen_secuencias_inventarios  set  almseCNUMERO="' . $docinvNUMERO_I . '" where almsecID="' . $sth_asi->almsecID . '"', $jarvisConex);
            } else {
                $insertAM = $this->consultaBD1('insert into cclabora_fsql007.almacen_secuencias_inventarios (almseCNUMERO,almacenID,tpdiID) values (1,"' . $bodega_i . '","' . $tentrada . '")', $jarvisConex);
                if ($insertAM == 1) {
                    $result_asi = $this->consultaBD('select * from cclabora_fsql007.almacen_secuencias_inventarios order by almsecID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                    $docinvNUMERO_I = $result_asi->almseCNUMERO;
                }
            }
            $insertDI = 0;
            $docinvID = 0;
            if ($docinvNUMERO_I > 0) {
                $insertDI = $this->consultaBD1('insert into cclabora_fsql007.documentosinventarios (tpdiID,docinvNUMERO,docinvFECHA,almacenID,docinvCONCEPTO,docinvESTADO,docinvINSUSER,docinvINSTIME,perfinID,ceconID,ordpID) values ("' . $tentrada . '","' . $docinvNUMERO_I . '","' . date("Y-m-d") . '","' . $bodega_i . '","' . $titulos . '","V","' . trim($userF[0]) . '","' . date("Y-m-d H:i:s") . '","1","0","0")', $jarvisConex);
                if ($insertDI == 1) {
                    $docinvID = $this->consultaBD1('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                }
            }


            foreach ($producto as $prodID => $alotes) {
                $costo = $this->dimeCostoPromedio(8, $prodID);
                $jarvisConex = $this->abrirconexion('jarvis');
                $datosProducto = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_mrp_tbdata_em em join cclabora_jarvis.sch_admin_tbdata_productos p on em.prodID=p.prodID
                                                          where em.prodID=" . trim($prodID) . " limit 1;", $jarvisConex)->fetch_object();
                if (is_object($datosProducto)) {
                    if (!empty($tsalida)) {
                        if ($docinvNUMERO_S > 0) {
                            if ($insertDS == 1) {
                                //$docinvIDS = $this->consultaBD1('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                $stocksID = 0;
                                $verificaStock = $this->consultaBD1('select * from cclabora_fsql007.stocks where prodID="' . $prodID . '" and almacenID="' . trim($bodega_s) . '"', $jarvisConex);
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvIDS->docinvID);
                                }
                                if ($verificaStock->num_rows > 0) {
                                    $result_stock = $verificaStock->fetch_object();
                                    $stocksID = $result_stock->stocksID;
                                } else {
                                    $this->consultaBD1('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_s . '",' . $prodID . ',"' . array_sum($alotes) . '","' . $costo . '")', $jarvisConex);
                                    $stocksID_r = $this->consultaBD1('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                                    $stocksID = $stocksID_r->stocksID;
                                }
                                if ($stocksID != 0) {
                                    $insertKrd = $this->consultaBD1('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvIDS->docinvID . '","' . $stocksID . '","' . array_sum($alotes) . '","' . $costo . '","S","' . $datosProducto->presentacionID . '","' . array_sum($alotes) . '")', $jarvisConex);
                                    if ($insertKrd == 1) {
                                        $datosKardex = $this->consultaBD1("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                        if (is_object($datosKardex)) {
                                            foreach ($alotes as $lote => $canLote) {
                                                $datosLotes = $this->consultaBD1("SELECT * FROM cclabora_fsql007.lotes where ltLOTE='" . trim($lote) . "' limit 1;", $jarvisConex)->fetch_object();
                                                if (is_object($datosLotes)) {
                                                    $this->consultaBD1('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values (' . trim($datosKardex->krdID) . ',' . trim($datosLotes->ltID) . ',' . trim($canLote) . ');', $jarvisConex);
                                                }
                                            }
                                        }
                                        $this->consultaBD1('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', $jarvisConex);
                                    }
                                }
                            }
                        }
                    }
                    if (!empty($tentrada)) {

                        if ($docinvNUMERO_I > 0) {
                            if ($insertDI == 1) {
                                $docinvID = $this->consultaBD1('select docinvID from cclabora_fsql007.documentosinventarios order by docinvID DESC LIMIT 1  ', $jarvisConex)->fetch_object();
                                $stocksID = 0;
                                $verificaStock = $this->consultaBD1('select * from cclabora_fsql007.stocks where prodID="' . $prodID . '" and almacenID="' . trim($bodega_i) . '"', $jarvisConex);
                                if ($userF[0] > 0) {
                                    $this->eventosAuditoria($userF[1], 4, $docinvID->docinvID);
                                }
                                if ($verificaStock->num_rows > 0) {
                                    $result_stock = $verificaStock->fetch_object();
                                    $stocksID = $result_stock->stocksID;
                                } else {
                                    $this->consultaBD1('insert cclabora_fsql007.stocks (almacenID,prodID,stocksCANTIDAD,stocksCOSTO) values ("' . $bodega_i . '",' . $prodID . ',"' . array_sum($alotes) . '","' . $costo . '")', $jarvisConex);
                                    $stocksID_r = $this->consultaBD1('select stocksID from cclabora_fsql007.stocks order by stocksID DESC LIMIT 1', $jarvisConex)->fetch_object();
                                    $stocksID = $stocksID_r->stocksID;
                                }
                                if ($stocksID != 0) {
                                    $insertKrd = $this->consultaBD1('insert into cclabora_fsql007.kardex (docinvID,stocksID,krdCANTIDAD,krdCOSTO,krdTIPO,presentacionID,krdCANTIDAD_PRESENTACION) values ("' . $docinvID->docinvID . '","' . $stocksID . '","' . array_sum($alotes) . '","' . $costo . '","E","' . $datosProducto->presentacionID . '","' . array_sum($alotes) . '")', $jarvisConex);
                                    if ($insertKrd == 1) {
                                        $datosKardex = $this->consultaBD1("select * from cclabora_fsql007.kardex order by krdID DESC LIMIT 1 ", $jarvisConex)->fetch_object();
                                        if (is_object($datosKardex)) {
                                            foreach ($alotes as $lote => $canLote) {
                                                $datosLotes = $this->consultaBD1("SELECT * FROM cclabora_fsql007.lotes where ltLOTE='" . trim($lote) . "' limit 1;", $jarvisConex)->fetch_object();
                                                if (is_object($datosLotes)) {
                                                    $this->consultaBD1('insert into cclabora_fsql007.movimientoslotes (krdID,ltID,movltCANTIDAD) values (' . trim($datosKardex->krdID) . ',' . trim($datosLotes->ltID) . ',' . trim($canLote) . ');', $jarvisConex);
                                                }
                                            }
                                        }
                                        $this->consultaBD1('select * from cclabora_fsql007.stocks where stocksID="' . $stocksID . '"', $jarvisConex);
                                    }
                                }
                            }
                        }
                    }


                }
            }
        }
        $jarvisConex->close();

    }


    public function cargarOPT_productos()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosOP = $this->consultaBD1('SELECT * FROM cclabora_jarvis.a_tem_opt_prducots', $jarvisConex);
        if ($datosOP->num_rows > 0) {
            while ($result_op = $datosOP->fetch_object()) {
                $producto = $this->dimeProductoByCodigo($result_op->procDODIGO);
                if (is_object($producto)) {
                    echo "Cargado " . $producto->prodCODIGO . "<br>";
                    $this->consultaBD1('update cclabora_jarvis.sch_mrp_tbdata_em set opt=' . $result_op->opt_valor . ' where prodID=' . $producto->prodID . ' ', $jarvisConex);
                }
            }
        }
        $jarvisConex->close();
    }

    public function corregirTransito()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $valores = '3530;3531;3532;3534;3535';
        $tipo = 'OCT';
        $aux = explode(";", $valores);
        foreach ($aux as $key => $valor) {
            $datosDoc = $this->consultaBD1("SELECT * FROM cclabora_fsql007.documentosinventarios where tpdiID='" . trim($tipo) . "' and docinvNUMERO='" . trim($valor) . "' and almacenID=14 limit 1;", $jarvisConex)->fetch_object();

            if (is_object($datosDoc)) {
                $this->consultaBD1("delete from cclabora_fsql007.kardex where docinvID=" . $datosDoc->docinvID . ";", $jarvisConex);
                $this->consultaBD1("delete from cclabora_fsql007.documentosinventarios where docinvID=" . $datosDoc->docinvID . ";", $jarvisConex);
                echo "Eliminado " . $tipo . " " . $valor . "<br>";
            }
        }
    }

    public function guardarLotes()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT * FROM cclabora_jarvis.a_temp_lote", $jarvisConex);
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $valDatos = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_prod_tbdata_reg_lotes where lote_desc='" . trim($result->lote_temp) . "' limit 1", $jarvisConex);
                if ($valDatos->num_rows == 0) {
                    $this->consultaBD1("insert into cclabora_jarvis.sch_prod_tbdata_reg_lotes (lote_desc, cant_lote, fecha_vence_lote, fecha_reg_lote, estadi_reg_lote) values ('" . trim($result->lote_temp) . "'," . $result->cant . ",'" . trim($result->fecha_lote) . "','" . date('Y-m-d H:i:s') . "',2) ", $jarvisConex);
                }
            }
        }
        $jarvisConex->close();

    }

    public function verificaPedFact()
    {
        $javisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_orderheader oh
                                join  cclabora_jarvis.sch_sales_tbdata_pedidos p on oh.OrderNumber=p.nro_ped
                                join  cclabora_jarvis.sch_mrp_tbdata_despacho_pedido dp on (p.id_ped=dp.ref_ped and dp.estado_desp=2)
                                where oh.EstadoOrder=93 and p.estato_ped=107;", $javisConex);

        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $this->consultaBD1("update cclabora_jarvis.sch_sales_tbdata_pedidos set estato_ped=93 where id_ped=" . $result->id_ped . " ;", $javisConex);
            }
        }
    }

    public function agregarProductos()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT * FROM cclabora_jarvis.a_temp_products where estado = 1", $jarvisConex);

        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $datosp = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_productos where prodDESCRIPCION =  '" . trim($result->prodDESCRIPCION) . "' limit 1;", $jarvisConex)->fetch_object();
                if (is_object($datosp)) {
                    $this->consultaBD1("update cclabora_jarvis.a_temp_products set prodCODIGO='" . $datosp->prodCODIGO . "',prodID='" . $datosp->prodID . "',estado=2 where ID_INSERT=" . $result->ID_INSERT . "; ", $jarvisConex);
                }
            }
        }
    }

    public function fechaArriboOC($id)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosOC = $this->consultaBD1("SELECT *,p.prodID FROM cclabora_jarvis.sch_mrp_tbdata_rfqoc rfq
                                       join cclabora_jarvis.sch_admin_tbdata_productos p on p.prodCODIGO=rfq.prodCODIGO
                                       where rfq.ID=" . trim($id) . " limit 1;", $jarvisConex)->fetch_object();;
        $arribo_e = '';
        if (is_object($datosOC)) {
            if (empty($datosOC->fecha_arribo)) {
                $ns = $this->dimeNivelServicio($datosOC->codigoPROVEEDOR, $datosOC->prodID);
                $fecha_rfq = explode(" ", $datosOC->FECHA);
                $dias_tras = $this->dias_transcurridos($fecha_rfq[0], date("Y-m-d"));
                $nuevafecha = strtotime('+' . $ns . ' day', strtotime(date($fecha_rfq[0])));
                $arribo_e = date('Y-m-d', $nuevafecha);
                $this->consultaBD1("update cclabora_jarvis.sch_mrp_tbdata_rfqoc set fecha_arribo='" . $arribo_e . "' where ID=" . trim($datosOC->ID) . " ", $jarvisConex);
            } else {

                $arribo_e = $datosOC->fecha_arribo;
            }
        }
        $jarvisConex->close();
        return $arribo_e;
    }

    public function eliminarTransfer($tipo, $num, $almacenID)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT * FROM cclabora_fsql007.documentosinventarios where tpdiID='" . trim(strtoupper($tipo)) . "' and docinvNUMERO=" . trim($num) . " and almacenID=" . trim($almacenID) . ";", $jarvisConex);
        if ($sth->num_rows > 0) {
            while ($result_d = $sth->fetch_object()) {
                $sth_kr = $this->consultaBD1("SELECT * FROM cclabora_fsql007.kardex WHERE docinvID=" . trim($result_d->docinvID) . ";", $jarvisConex);
                $ban = 0;
                if ($sth_kr->num_rows > 0) {
                    while ($result_k = $sth_kr->fetch_object()) {
                        $datosLote = $this->consultaBD1("SELECT * FROM cclabora_fsql007.movimientoslotes where krdID=" . trim($result_k->krdID) . " limit 1;", $jarvisConex)->fetch_object();
                        if (is_object($datosLote)) {
                            $this->consultaBD1("delete from cclabora_fsql007.lotes where ltID=" . trim($datosLote->ltID) . ";", $jarvisConex);
                            $dtel = $this->consultaBD1("delete from cclabora_fsql007.movimientoslotes where movltID=" . trim($datosLote->movltID) . ";", $jarvisConex);
                            if ($dtel == 1) {
                                $dtel_k = $this->consultaBD1("delete from cclabora_fsql007.kardex WHERE docinvID=" . trim($result_k->docinvID) . ";", $jarvisConex);
                                if ($dtel_k == 1) {
                                    $ban = 1;
                                }
                            }
                        }
                    }
                }
                if ($ban == 1) {
                    $this->consultaBD1("delete from  cclabora_fsql007.documentosinventarios WHERE docinvID=" . trim($result_d->docinvID) . ";", $jarvisConex);
                    echo "Eliminado: " . $result_d->docinvID . " <br>";
                }
            }

        }
    }


    public function dimeMotivoPSS($id)
    {
        $motivo = '';
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosF = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_sales_tbdata_pss_motivos where idmotivo=" . trim($id) . " limit 1;", $jarvisConex)->fetch_object();
        if (is_object($datosF)) {
            $motivo = $datosF->motivo;
        }
        $jarvisConex->close();
        return $motivo;
    }


    public function llenarStocksHistorial()
    {
        $funciones = new funciones();
        $jarvisConex = $funciones->abrirconexion('jarvis');
        $sth = $funciones->consultaBD1("SELECT * FROM cclabora_jarvis.sch_admin_tbdata_productos p join cclabora_jarvis.sch_mrp_tbdata_em em on p.prodID=em.prodID where em.tipo='PA';", $jarvisConex);
        $mes = (int)date('m');
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                for ($i = 1; $i <= $mes; $i++) {

                    $date = '2020-' . $i . '-01';
                    if ($i == $mes) {
                        $st = $funciones->consultaBD1("SELECT * FROM fsql020.stocks where almacenID=8 and prodID=" . $result->prodID . " limit 1;", $jarvisConex)->fetch_object();
                        if (is_object($st)) {
                            $stock = $st->stocksCANTIDAD;
                        }
                    }
                    $funciones->consultaBD1("insert into cclabora_jarvis.sch_mrp_tbdata_stock_historial (prodID, idBodega, cantStockh, fechaStockh, fecha_registrosh) values (" . $result->prodID . ",17," . $stock . ",'" . $date . "','" . date('Y-m-d H:i:s') . "');", $jarvisConex);
                }
            }
        }

    }

    public function DevMuestrasDocumento()
    {
        $motivo = '';
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_con_tbdata_docs_dev dev join cclabora_jarvis.sch_mrp_tbdata_despacho_pedido  p on dev.id_referencia=p.id_despacho_ped where p.fvtaID='0';", $jarvisConex);
        $resul = '';
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $this->consultaBD1("delete from cclabora_jarvis.sch_con_tbdata_docs_dev where id_docdev=" . $result->id_docdev . ";", $jarvisConex);
                $resul .= 'Eliminado ' . $result->id_docdev . '<br>';
            }
        }
        echo $resul;
        $jarvisConex->close();
        return $resul;
    }

    public function actualizarTiemposProduccion()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT * FROM cclabora_jarvis.a_tiempos_prod tp join cclabora_jarvis.sch_admin_tbdata_productos  p on tp.prodCODIGO=p.prodCODIGO;", $jarvisConex);
        $resul = '';
        $i = 1;
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $tiempo = (float)str_replace(",", ".", $result->tiempo);
                $upta = $this->consultaBD1("update cclabora_jarvis.sch_mrp_tbdata_em set  opt=" . $tiempo . ",le=" . $result->lote . " where prodID=" . $result->prodID . ";", $jarvisConex);
                if ($upta == 1) {
                    $i++;
                }

            }
        }
        echo "Registros Modificados : " . $i;
        $jarvisConex->close();
    }

    public function actualizarNumeroPedidos()
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $sth = $this->consultaBD1("SELECT oh.OrderNumber,od.OrderFinalDetailGUID FROM cclabora_jarvis.sch_sales_tbdata_orderfinaldetail od
                                  join cclabora_jarvis.sch_sales_tbdata_orderheader oh on oh.OrderDate=od.OrderDate and oh.OrderSalesPersonCode=od.OrderSalesPersonCode
                                  where year(od.OrderDate)>=2018 and od.OrderNumber is null;", $jarvisConex);
        $i = 0;
        if ($sth->num_rows > 0) {
            while ($result = $sth->fetch_object()) {
                $update = $this->consultaBD1("update cclabora_jarvis.sch_sales_tbdata_orderfinaldetail set OrderNumber=" . $result->OrderNumber . " where OrderFinalDetailGUID='" . $result->OrderFinalDetailGUID . "' ", $jarvisConex);
                if ($update == 1) {
                    $i++;
                }

            }
        }
        $jarvisConex->close();
        echo "Actualizados " . $i . ' de ' . $sth->num_rows;
    }

    public function PdfIdePA($prodID, $cantidad, $lote, $caducidad, $dir)
    {
        $funciones = new funciones();
        $javisConex = $funciones->abrirconexion('jarvis');
        $sth_lot = $funciones->consultaBD1('SELECT * FROM cclabora_jarvis.sch_admin_tbdata_productos p Join cclabora_jarvis.sch_mrp_tbdata_em em on p.prodID=em.prodID where p.prodID=' . $prodID . ';', $javisConex);
        $links_un = array();
        if ($sth_lot->num_rows > 0) {
            $path = $dir . '/../' . 'src\UserBundle\ProduccionBundle\Resources\public\docs\lostespa\identificadorPA.html.twig';
            $path2 = $dir . '/../' . 'src\UserBundle\ProduccionBundle\Resources\public\docs\lostespa\ ';
            $i = 1;
            $todosPDf = '';
            while ($result_lot = $sth_lot->fetch_object()) {


                $bulto = $i . ' de ' . $sth_lot->num_rows;
                $nombreProducto = substr($result_lot->prodDESCRIPCION, 0, 48);
                if (strlen($nombreProducto) > 30) {
                    $caracter = round((strlen($nombreProducto) - 2) / 2, 0);
                    $prod1 = substr($nombreProducto, 0, -$caracter);
                    $prod2 = substr($nombreProducto, $caracter + 2);
                    $complemento = '';
                } else {
                    $prod1 = $nombreProducto;
                    $prod2 = '';
                    $complemento = '<tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                     <tr>
                                        <td align="right">&nbsp;</td>
                                    </tr>

                                    ';
                }

                $auxFecha = explode("-", $caducidad);

                $fechaid = substr($auxFecha[0], -2) . $auxFecha[1] . $auxFecha[2];

                $fechaMostrar = $auxFecha[2] . '/' . $auxFecha[1] . '/' . $auxFecha[0];

                $cbar = '(01)' . $result_lot->ean_14 . '(17)' . $fechaid . '(10)' . $lote;

                $charset = 'C128';
                $myBarcode = new barCode();
                $myBarcode->savePath = trim($path2);
                $myBarcode->getBarcodePNGPath($cbar, $charset, 2, 45);
                $barcode = $charset . '_' . $cbar . ".png";
                $link = trim($path2) . $barcode;
                $header = "D E T E N I D O";
                $html[$i] = file_get_contents($path);
                $html[$i] = str_replace("{nombreProd1}", $prod1, $html[$i]);
                $html[$i] = str_replace("{nombreProd2}", $prod2, $html[$i]);
                $html[$i] = str_replace("{codigoProd}", $result_lot->prodCODIGO, $html[$i]);
                $html[$i] = str_replace("{unidades}", $cantidad, $html[$i]);
                $html[$i] = str_replace("{fechaC}", $fechaMostrar, $html[$i]);
                $html[$i] = str_replace("{lote}", $lote, $html[$i]);
                $html[$i] = str_replace("{gtin}", $result_lot->ean_14, $html[$i]);
                $html[$i] = str_replace("{cod}", $barcode, $html[$i]);
                $html[$i] = str_replace("{barcode}", $cbar, $html[$i]);
                $html[$i] = str_replace("{link}", $link, $html[$i]);
                $html[$i] = str_replace("{complemento}", $complemento, $html[$i]);


                $links_un[$i] = $link;

                $i++;
            }

            $pagina = '<!DOCTYPE html>
                <html>
                <head>
                    <title> CCLabs </title>
                    <meta charset="utf-8">
                    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                    <meta name="author" content="">
                </head>
                <style>
                    .texto {
                        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    }
                </style>
                <body>';
            for ($x = 1; $x < $i; $x++) {
                $pagina .= $html[$x];
            }
            $pagina .= "</body></html>";
            $paper_size = array(25, 0, 120, 450); // TAMA? IMPRESORA TICKETS NO MODIFICAR
            $dompdf = new Dompdf();
            $dompdf->set_option('dpi', 600);
            $dompdf->setPaper($paper_size, 'landscape');
            $dompdf->loadHtml($pagina);
            $dompdf->render();
            $pdf = $dompdf->output();
            $nombrepdf = 'identificador';
            file_put_contents(trim($path2) . $nombrepdf . ".pdf", $pdf);
            $todosPDf = $nombrepdf . ".pdf";
            foreach ($links_un as $key => $valor) {
                //  unlink($links_un[$key]);
            }
            $javisConex->close();
            return "http://servercc1/Jarvis/src/UserBundle/ProduccionBundle/Resources/public/docs/lostespa/" . $todosPDf;

        } else {
            $javisConex->close();
            return 0;
        }

    }

    public function pdfadjunto($idLiq, $path, $path2)
    {
        $jarvisConex = $this->abrirconexion('jarvis');
        $datosOP = $this->consultaBD1("SELECT * FROM cclabora_jarvis.sch_garcal_tbdata_analisis_pa apa
                                            join cclabora_jarvis.sch_prod_tbdata_bultos_op bop on bop.id_bultos_op=apa.id_bultos_op
                                            join cclabora_jarvis.sch_prod_tbdata_liquidacion_op op on op.id_liqop=bop.id_liqop
                                            join  cclabora_jarvis.sch_admin_tbdata_productos p on p.prodCODIGO=op.id_producto
                                           where apa.id_analisispa=" . trim($idLiq) . " limit 1", $jarvisConex)->fetch_object();
        if (is_object($datosOP)) {
            $html = file_get_contents($path);
            $html = str_replace("{consecutivo}", $datosOP->consecutivo_pa, $html);
            $html = str_replace("{producto}", utf8_encode($datosOP->prodDESCRIPCION), $html);
            $html = str_replace("{codigo}", $datosOP->prodCODIGO, $html);
            $html = str_replace("{analists}", $datosOP->lote_pa, $html);
            $html = str_replace("{elaboracion}", $datosOP->fecha_op, $html);
            $html = str_replace("{lote}", $datosOP->lote_op, $html);
            $html = str_replace("{vencimiento}", $datosOP->fecha_caducidad_op, $html);
            $sth_tabla = $this->consultaBD1("SELECT nombre_tipoensayo,metodo_ensayo,resultado,emplNOMBRES,emplAPELLIDOS FROM cclabora_jarvis.sch_garcal_tbdata_analisis_pa_ensayo pe
                                                  join cclabora_jarvis.sch_garcal_tbdata_ensayos_tipo et on et.idTipoEnsayo=pe.idTipoEnsayo
                                                  join cclabora_fsql007.empleados emp on emp.emplID=pe.id_empleado
                                                  where pe.id_analisispa=" . trim($idLiq) . " ", $jarvisConex);
            $table = '';
            if ($sth_tabla->num_rows > 0) {
                $i = 1;
                while ($result_table = $sth_tabla->fetch_object()) {
                    $nom = explode(" ", $result_table->emplNOMBRES);
                    $ape = explode(" ", $result_table->emplAPELLIDOS);
                    $nombre = $nom[0] . ' ' . $ape[0];
                    $table .= '<tr>
                                <td>' . $i . '</td>
                                <td>' . $result_table->nombre_tipoensayo . '</td>
                                <td>' . $result_table->metodo_ensayo . '</td>
                                <td>' . $result_table->resultado . '</td>
                                <td>' . $nombre . '</td>
                            </tr>';
                    $i++;
                }
            }
            $html = str_replace("{tabla}", $table, $html);
            $html = str_replace("{fecha}", $datosOP->fecha_reg, $html);
            $html = str_replace("{ref_q}", $datosOP->referenciq_quimico, $html);
            $html = str_replace("{pag_q}", '', $html);
            $html = str_replace("{ref_f}", $datosOP->referencia_fisico, $html);
            $html = str_replace("{pag_f}", '', $html);
            $html = str_replace("{ref_m}", $datosOP->referencia_micro, $html);
            $html = str_replace("{pag_m}", '', $html);
            $html = str_replace("{observaciones}", $datosOP->observaciones, $html);
            $options = new Options();
            $options->set('enable_html5_parser', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $nombre_pdf = 'adjunto';
            $pdf = $dompdf->output();
            file_put_contents($path2 . $nombre_pdf . ".pdf", $pdf);
            $pedidoPDF = $path2 . $nombre_pdf . ".pdf";
            $jarvisConex->close();
            return "http://servercc1/Jarvis/src/UserBundle/GACalidadBundle/Resources/public/docs/coa_pa/" . $nombre_pdf . ".pdf";


        } else {
            return '';
        }
    }
}