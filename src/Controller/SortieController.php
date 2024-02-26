<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SortieController extends AbstractController
{
    #[Route('/sortie/create', name: 'app_sortie_create')]
    public function create(): Response
    {
        return $this->render('sortie/create.html.twig');
    }

    #[Route('/sortie/folder/{id}', name: 'app_sortie_folder')]
    public function folder(int $id): Response
    {
        return $this->render('sortie/folder.html.twig');
    }

    #[Route('/sortie/modify', name: 'app_sortie_modify')]
    public function modify(): Response
    {
        return $this->render('sortie/modify.html.twig');
    }

    #[Route('/sortie/delete', name: 'app_sortie_delete')]
    public function delete(): Response
    {
        return $this->render('sortie/delete.html.twig');
    }
}
