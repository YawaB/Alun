<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

}
