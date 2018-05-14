<?php

namespace App\Controller;

use App\Entity\Challenges;
use App\Entity\Comment;
use App\Form\CommentForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChallengeDetailsController extends Controller
{
    /**
     * @param int $id
     * @Route("/challenge/details/{id}", name="challenge_details")
     * @return Response
     */
    public function index(int $id)
    {
        $em = $this->getDoctrine()->getRepository('App:Challenges');
        $challenge = $em->find($id);

        $em = $this->getDoctrine()->getRepository('App:Comment');
        $comments = $em->getChallengeComments($challenge);

        return $this->render('challenge_details/index.html.twig', [
            'controller_name' => 'ChallengeDetailsController',
            'challenge' => $challenge,
            'comments' => $comments
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @Route("comment/challenge/{id}", name="post_comment_form")
     * @return Response
     */
    public function commentFormRender(Request $request, int $id)
    {
        return $this->render('comment_form/index.html.twig', [
            'controller_name' => 'ChallengeDetailsController',
            'form' => $this->newComment($request, $id),
            'challengeId' => $id
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
//     * @Route("challenge/{id}/post-comment/", name="post_new_comment")
     * @return \Symfony\Component\Form\FormView
     */
    public function newComment(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getRepository('App:Challenges');
        $challenge = $em->find($id);

        $comment = new Comment();
        $comment->setPostedOn(new \DateTime('now'));
        $comment->setUser($this->getUser());
        $comment->setChallenge($challenge);

        $form = $this->createForm(CommentForm::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
        }

        return $form->createView();
    }

}