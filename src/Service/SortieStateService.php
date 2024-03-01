<?php

namespace App\Service;


use App\Entity\Etat;
use App\Entity\Sortie;
use Doctrine\ORM\EntityManagerInterface;






class SortieStateService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getEtatFerme(): Etat
    {
        $etatRepository = $this->entityManager->getRepository(Etat::class);
        $etatFerme = $etatRepository->findOneBy(['libelle' => 'Passé']);

        if (!$etatFerme instanceof Etat) {
            throw new \RuntimeException('L\'état "Fermé" n\'existe pas dans la base de données.');
        }

        return $etatFerme;
    }

    public function getEtatObject(Sortie $sortie): Etat
    {
        $now = new \DateTime();

        if ($now > $sortie->getLimiteDateInscription()) {
            return $this->getEtatFerme();
        }

        return $this->getEtatOuvert();
    }

    public function getEtatOuvert(): Etat
    {
        $etatRepository = $this->entityManager->getRepository(Etat::class);
        $etatOuvert = $etatRepository->findOneBy(['libelle' => 'Ouvert']);

        if (!$etatOuvert instanceof Etat) {
            throw new \RuntimeException('L\'état "Ouvert" n\'existe pas dans la base de données.');
        }

        return $etatOuvert;
    }

}