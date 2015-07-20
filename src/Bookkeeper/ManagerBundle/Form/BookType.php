<?php

namespace Bookkeeper\ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('title')
			->add('description')
			->add('pages');
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(['data_class' => 'Bookkeeper\ManagerBundle\Entity\Book']);
	}

	public function getName() {
		return 'bookkeeper_managerbundle_book';
	}
}
