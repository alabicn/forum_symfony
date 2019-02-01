<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Topic;
use App\Entity\Message;
//use App\Entity\User;

class TopicController extends AbstractController
{
    /**
     * @Route("/topic/{id}", name="show_topic")
     */
    public function show($id) {
        $topic = $this->getDoctrine()
                ->getRepository(Topic::class)
                ->find($id);

        if (!$topic) {
            throw $this->createNotFoundException(
                    'There is no topic with id : ' . $id
            );
        }

        $messages = $this->getDoctrine()
        ->getRepository(Message::class)
        ->findByIdTopic($id);
        

        return $this->render('topic/topic.html.twig', [
                    'topic' => $topic,
                    'messages' => $messages
        ]);
    }

}
