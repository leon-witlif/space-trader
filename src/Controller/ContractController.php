<?php

declare(strict_types=1);

namespace App\Controller;

use App\SpaceTrader\APIClient as SpaceTraderAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContractController extends AbstractController
{
    public function __construct(
        private readonly SpaceTraderAPI $spaceTraderApi,
    ) {
    }

    #[Route('/contract/{contract}/accept', 'app.contract.accept')]
    public function acceptAction(Request $request, string $contract): Response
    {
        $agentToken = $request->getSession()->get('agentToken');

        $this->spaceTraderApi->acceptContract($agentToken, $contract);

        return $this->redirectToRoute('app.agent.detail');
    }
}
