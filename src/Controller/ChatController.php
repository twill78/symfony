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
}
