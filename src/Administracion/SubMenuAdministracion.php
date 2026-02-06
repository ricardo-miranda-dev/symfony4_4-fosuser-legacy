<?php
namespace App\Administracion;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuAdministracion extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/administracion")
     */
    public function indexAction()
    {
        $titulo = "Administraci&oacute;n";
        $menu = $this->menuService->dimeMenuSecundario(10);

        return $this->render(
            'Administracion/SubMenuAdministracion.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
