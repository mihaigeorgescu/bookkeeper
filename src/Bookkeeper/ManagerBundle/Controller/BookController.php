<?php

namespace Bookkeeper\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bookkeeper\ManagerBundle\Entity\Book;
use Bookkeeper\ManagerBundle\Form\BookType;

class BookController extends Controller {

	public function indexAction() {
		return $this->render('BookkeeperManagerBundle:Book:index.html.twig');
	}


	public function showAction($id) {
		return $this->render('BookkeeperManagerBundle:Book:show.html.twig');
	}


	public function newAction() {
		$book = new Book();

		$form = $this->createForm(new Booktype(), $book, [
			'action' => $this->generateUrl('book_create'),
			'method' => 'POST'
		]);
		$form->add('submit', 'submit', ['label' => 'CreateBook']);

		return $this->render('BookkeeperManagerBundle:Book:new.html.twig', [
			'form' => $form->createView()
		]);
	}


	public function createAction(Request $request) {
		$book = new Book();

		$form = $this->createForm(new Booktype(), $book, [
			'action' => $this->generateUrl('book_create'),
			'method' => 'POST'
		]);
		$form->add('submit', 'submit', ['label' => 'CreateBook']);
		$form->handleRequest($request);
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($book);
			$em->flush();

			$this->get('session')->getFlashBag()->add('msg', 'Your book has been created!');

			return $this->redirect($this->generateUrl('book_new'));
		} else {

			$this->get('session')->getFlashBag()->add('msg', 'Something went wrong!');
			return $this->render('BookkeeperManagerBundle:Book:new.html.twig', ['form' => $form->createView()]);
		}
	}


	public function editAction($id) {
		return $this->render('BookkeeperManagerBundle:Book:edit.html.twig');
	}


	public function updateAction(Request $request, $id) {

	}


	public function deleteAction(Request $request, $id) {

	}
}
