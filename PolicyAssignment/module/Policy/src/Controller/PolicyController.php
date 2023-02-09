<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Policy\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Db\TableGateway\TableGateway;
use Policy\Form\PolicyForm;
use Policy\Form\PolicyFilter;

class PolicyController extends AbstractActionController {
    
    protected $policiesTable;


    public function indexAction() {
        return new ViewModel(array('arrPolicies' => $this->getPoliciesTable()->select()));
    }
    
    public function createAction() {
        $form = new PolicyForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter(new PolicyFilter());
            $form->setData($request->getPost());
             if ($form->isValid()) {
                    $data = $form->getData();
                    unset($data['submit']);
                    $this->getPoliciesTable()->insert($data);
                    return $this->redirect()->toRoute('policy/default', array('controller' => 'policy', 'action' => 'index'));										
            }
        }		
        return new ViewModel(array('form' => $form));
    }
    
    public function updateAction() {
        $id = $this->params()->fromRoute('id');
        if (!$id) {
            return $this->redirect()->toRoute('policy/default', array('controller' => 'policy', 'action' => 'index'));
        }
        $form = new PolicyForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter(new PolicyFilter());
            $form->setData($request->getPost());
             if ($form->isValid()) {
                    $data = $form->getData();
                    unset($data['submit']);
                    $this->getPoliciesTable()->update($data, array('id' => $id));
                    return $this->redirect()->toRoute('policy/default', array('controller' => 'policy', 'action' => 'index'));													
            }			 
        }
        else {
                $form->setData($this->getPoliciesTable()->select(array('id' => $id))->current());			
        }
        return new ViewModel(array('form' => $form, 'id' => $id));		
    }
    
    public function deleteAction() {
        $id = $this->params()->fromRoute('id');
        if ($id) {
                $this->getPoliciesTable()->delete(array('id' => $id));
        }
        return $this->redirect()->toRoute('policy/default', array('controller' => 'policy', 'action' => 'index'));										
    }
    
    public function getPoliciesTable() {
        if (!$this->policiesTable) {
                $this->policiesTable = new TableGateway(
                        'policies', 
                        $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter')
                );
        }
        return $this->policiesTable;
    }
}
