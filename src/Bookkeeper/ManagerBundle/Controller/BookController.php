<?php

namespace Bookkeeper\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bookkeeper\ManagerBundle\Entity\Book;
use Bookkeeper\ManagerBundle\Form\BookType;

class BookController extends Controller {

	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$books = $em->getRepository('BookkeeperManagerBundle:Book')->findAll();

		return $this->render('BookkeeperManagerBundle:Book:index.html.twig', ['books' => $books]);
	}


	public function showAction($id) {
		$em = $this->getDoctrine()->getManager();
		$book = $em->getRepository('BookkeeperManagerBundle:Book')->find($id);

		return $this->render('BookkeeperManagerBundle:Book:show.html.twig', ['book' => $book]);
	}


	public function newAction() {
		$book = new Book();

		$form = $this->createForm(new Booktype(), $book, [
			'action' => $this->generateUrl('book_create'),
			'method' => 'POST'
		]);
		$form->add('submit', 'submit', ['label' => 'CreateBook']);

		return $this->render('BookkeeperManagerBundle:Book:new.html.twig', ['form' => $form->createView()]);
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

			return $this->redirect($this->generateUrl('book_show', ['id' => $book->getid()]));
		} else {

			$this->get('session')->getFlashBag()->add('msg', 'Something went wrong!');
			return $this->render('BookkeeperManagerBundle:Book:new.html.twig', ['form' => $form->createView()]);
		}
	}


	public function editAction($id) {
		$em = $this->getDoctrine()->getManager();
		$book = $em->getRepository('BookkeeperManagerBundle:Book')->find($id);

		$form = $this->createForm(new BookType(), $book, [
			'action' => $this->generateUrl('book_update', ['id' => $book->getId()]),
			'method' => 'PUT'
		]);
		$form->add('submit', 'submit', ['label' => 'Update Book']);
		return $this->render('BookkeeperManagerBundle:Book:edit.html.twig', ['form' => $form->createView()]);
	}


	public function updateAction(Request $request, $id) {
		$em = $this->getDoctrine()->getManager();
		$book = $em->getRepository('BookkeeperManagerBundle:Book')->find($id);

		$form = $this->createForm(new BookType(), $book, [
			'action' => $this->generateUrl('book_update', ['id' => $book->getId()]),
			'method' => 'PUT'
		]);
		$form->add('submit', 'submit', ['label' => 'Update Book']);

		$form->handleRequest($request);
		if ($form->isValid()) {
			$em->flush();
			$this->get('session')->getFlashBag()->add('msg', 'Your book has been updated!');
			return $this->redirect($this->generateUrl('book_show', ['id' => $id]));

		} else {
			return $this->render('BookkeeperManagerBundle:Book:edit.html.twig', ['form' => $form->createView()]);
		}
	}


	public function deleteAction(Request $request, $id) {

	}
}
