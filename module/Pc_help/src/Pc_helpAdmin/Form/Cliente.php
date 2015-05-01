<?php

namespace Pc_helpAdmin\Form;

use Zend\Form\Form;


class Cliente extends Form {

	public function __construct($name = null) {
		parent::__construct('cliente');
			
		$this->setAttribute('method', 'post');
		$this->setInputFilter(new ClienteFilter);

		$this->add(array(
				'name' => 'id',
				'attibutes' => array(
						'type' => 'hidden'
				)
		));


		$this->add(array(
				'name' => 'nome',
				'options' => array(
						'type' => 'text',
						'label' => 'Nome'
				),
				'attributes' => array(
						'id' => 'nome_cliente',
						'placeholder' => 'Entre com o nome'
				)
		));


		$this->add(array(
				'name'=>'submit',
				'type'=>'Submit',
				'attributes'=>array(
						'value'=>'Salvar',
						'class'=>'btn-success'
				)
		));

	}




}




