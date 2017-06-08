<?php
namespace Psi\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/summoner")
 */
class SummonerController extends Controller
{

    /**
     * 
     * @Route("/view/{id}", name="summoner_view_action")
     * @param Request $request
     */
    public function viewAction(Request $request)
    {
        return $this->render(
                'PsiAppBundle:Summoner:view.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }

    /**
     * 
     * @Route("/runes/{id}", name="summoner_runes_action")
     * @param Request $request
     */
    public function runesAction(Request $request)
    {
        return $this->render(
                'PsiAppBundle:Summoner:runes.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }

    /**
     * 
     * @Route("/masteries/{id}", name="summoner_masteries_action")
     * @param Request $request
     */
    public function masteriesAction(Request $request)
    {
        
        return $this->render(
                'PsiAppBundle:Summoner:masteries.html.php', [
                'router' => $this->container->get('router'),
        ]);
    }
}
