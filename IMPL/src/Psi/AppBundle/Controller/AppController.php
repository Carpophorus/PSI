<?php
namespace Psi\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{

    /**
     * 
     * @Route("/", name="app_index_action")
     * @param Request $request
     */
    public function indexAction(Request $request)
    {
        return $this->render(
                'PsiAppBundle:App:index.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }

    /**
     * 
     * @Route("/search/{summoner}", name="app_search_action")
     * @param Request $request
     */
    public function searchAction(Request $request)
    {
        return $this->render(
                'PsiAppBundle:App:search.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }
}
