<?php
namespace Pc_helpAdmin\Controller;



use Zend\Mvc\Controller\AbstractActionController,
     Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
Zend\Paginator\Adapter\ArrayAdapter;


use Pc_helpAdmin\Form\Cliente as FrmCliente;

class ClientesController extends AbstractActionController
{
	/**
	 * @var EntityManager
	 */
	
	protected $em;
	
	public function indexAction() {
	
		$list = $this->getEm()
		->getRepository('Pc_help\Entity\Cliente')
		->findAll();
	
		$page = $this->params()->fromRoute('page');
	
		$paginator = new Paginator(new ArrayAdapter($list));
		$paginator->setCurrentPageNumber($page);
		$paginator->setDefaultItemCountPerPage(4);
	
		return new ViewModel(array('data'=>$paginator, 'page'=>$page));
	}
	
	
	public function newAction () {

		$form = new FrmCliente();
		
		$request = $this->getRequest();
		
		
		if ($request->isPost()){
			$form->setData($request->getPost());
			if ($form->isValid()){
				$service = $this->getServiceLocator()->get('Pc_help\Service\Cliente');
				$service->insert($request->getPost()->toArray());
		        
				return $this->redirect()->toRoute('pc_helpAdmin',array('controller'=>'clientes'));
					
			}
		
		}
		return new ViewModel(array('form' => $form));
	}
	
      public function editAction() {
        $form = new FrmCliente();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository('Pc_help\Entity\Cliente');
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray());

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get('Pc_help\Service\Cliente');
				$service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute('pc_helpAdmin',array('controller'=>'clientes'));
            }
        }

        return new ViewModel(array('form' => $form));
    }
    
    public function deleteAction (){
    	$service = $this->getServiceLocator()->get('Pc_help\Service\Cliente');
    	if ($service->delete($this->params()->fromRoute('id',0)));
    	return $this->redirect()->toRoute('pc_helpAdmin',array('controller'=>'clientes'));
    	
    }
	
	/*
	 * @return EntityManager
	 */
	
	protected function getEm(){
		
		if (null===$this->em)
			$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		return  $this->em;
	}
	
}
