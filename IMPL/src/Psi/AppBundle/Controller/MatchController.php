<?php
namespace Psi\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/match")
 */
class MatchController extends Controller
{

    /**
     * @Route("/view/{id}", name="match_view_action")
     * @param Request $request
     */
    public function viewAction(Request $request)
    {
        
    }
}
