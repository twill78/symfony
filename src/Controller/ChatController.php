<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Chat;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ChatRepository;

class ChatController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(ChatRepository $repo)
    {
        $chats = $repo->findAll();

        return $this->render('chats/chats.html.twig', ['chats'=>$chats]);
    }

    /**
     * @Route("/recherche", name="app_recherche", methods={"GET", "POST"})
     */
    public function recherche(Request $request, ChatRepository $repo) {

        if ($request->isMethod('POST') && $request->get('sexe') != "" && $request->get('race') == "") {
            
            $sexeChat = $request->request->get('sexe');

            $chats = $repo->findBySexe($sexeChat);

            return $this->render('chats/resultatsChats.html.twig', ['chats'=>$chats]);
        }

        if ($request->isMethod('POST') && $request->get('sexe') == "" && $request->get('race') != "") {
            
            $raceChat = $request->request->get('race');

            $chats = $repo->findByRace($raceChat);

            return $this->render('chats/resultatsChats.html.twig', ['chats'=>$chats]);
        }

        return $this->render('chats/rechercheChats.html.twig');
    }

}
