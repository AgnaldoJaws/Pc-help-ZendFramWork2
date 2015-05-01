<?php


namespace Pc_helpAdmin\Controller;



use Zend\Form\Form;

use Pc_help\Entity\Cidade;
use Pc_help\Entity\TipoPessoa;

use Zend\View\Model;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel ;



abstract class CrudController extends AbstractActionController
{

	/*
	 * EntityManager
	*/
	protected $em;
	protected $service;
	protected $entity;
	protected $form;
	protected $route;
	protected $controller;


	public function indexAction()
	{
			
			

		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
			
		$repo = $em->getRepository ("Pc_help\Entity\Cliente");
		#$repoTipoPessoa = $em->getRepository ("Pc_help\Entity\TipoPessoa");
			
		/*$cidade = new Cidade();
		 $cidade->setNome_cidade("Juquiá");
			
		$em->persist($cidade);
		$em->flush();*/
			
		# objeto do tipo categoria trazendo o id 1
		# get nome e get id
		/*$cidade = $repoCidade->find(1);
		$tipoPesssoa = $repoTipoPessoa->find(1);

		$cliente = new Cliente();
		$cliente->setNome_cliente("teste2");
		$cliente->setCidade($cidade);
		$cliente->setTipoPessoa($tipoPesssoa);

		$em->persist($cliente);
		$em->flush();*/
			
		$cliente = $repo->findAll();
		/*$tipoPessoa = $repoTipoPessoa->findAll();*/
		return new ViewModel(array('cliente'=>$cliente));


	}


	public function newAction (){

		$form = new $this->form();

		$request = $this->getRequest();

		if ($request->isPost()){
			$form->setData($request->getPost());
			if ($form->isValid()){
				$service = $this->getServiceLocator()->get($this->service);
				$service->insert($request->getPost()->toArray());
				return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
					
			}

		}
		return new ViewModel(array('form'=>$form));


	}

	public function editAction(){
		$form = new $this->form;
		$request = $this->getRequest();

		#pegando os dados do id
		$repository = $this->getEm()->getRepository($this->entity);
		#trazendo a entidade cliente preenchida
		#vai pegar os parametro de acorsom com a rota
		$entity = $repository->find($this->params()->fromRoute('cod_cli',o));
		if ($this->params()->fromRoute('cod_cli',0))
			$form->setData($request->getPost());
		 
		if ($request->isPost()){
			$form->setData($request->getPost());
			if ($form->isValid()){
				$service = $this->getServiceLocator()->get($this->service);
				$service->update($request->getPost()->toArray());
				 
				return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
			}

			 
		}
		return new ViewModel(array('form'=>$form));

	}


	public function deleteAction(){
		$service = $this->getServiceLocator()-get($this->service);
		if ($service->delete($this->params()->fromRoute('id',0)))
			return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));

	}

	/*
	 * @return EntityManager
	*/

	protected function getEm() {
		if (null === $this->em)
			$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

		return $this->em;
	}


}
