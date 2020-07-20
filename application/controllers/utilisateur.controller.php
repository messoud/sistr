<?php namespace Sistr;
    if(!defined('SISTR')) {throw new Error('Acces interdit');}
    
    class UtilisateurController extends \F3il\Controller{
        
        public function __construct()
        {
            parent::setDefaultActionName('default');
        }
        public function listerAction()
        {
            $configClasse = '\\F3il\\Configuration';
            $config = $configClasse::getInstance();
            $nomClasse = '\\F3il\\Page';
            $page = $nomClasse::getInstance();
            $page->setTemplate('template-bt')->setView('utilisateur-liste');
           // $page->__set("titre","Liste des utilisateurs");
            $page->run_mode = $config->__get('run_mode');
            
            $page->titre='Liste des utilisateurs' ;
            //$var = $config->__get('tar');
            $model = new UtilisateursModel();
            $page->utilisateurs = $model->lister();
            $mess =   \F3il\Messenger::getMessage();
            if($mess!==false)
            {
                \F3il\Messages::addMessage($mess, \F3il\Messages::MESSAGE_SUCCESS);
            }
            else
            {
                \F3il\Messages::addMessage('Action Lister !', \F3il\Messages::MESSAGE_SUCCESS);
            }
        }
        /**
         * Action par défaut du contrôleur 
         */
        public function defaultAction()
        {
            $configClasse = '\\F3il\\Configuration';
            $config = $configClasse::getInstance();
            $nomClasse = '\\F3il\\Page';
            $page = $nomClasse::getInstance();
            $page->setTemplate('template-b')->setView('vue2');
            $page->__set("titre","Liste des utilisateurs");
            $page->__set('run_mode' ,$config->__get('run_mode'));
            //$var = $config->__get('tar');
        }
        
        public function editerAction()
        {
            echo __METHOD__ ;
            print_r($_POST);
            die("Test");
        }
        public function supprimerAction()
        {
           /* echo __METHOD__ ;
            print_r($_POST);
            die("Test");
            * */
            $id = filter_input(INPUT_POST,"id", FILTER_VALIDATE_INT);
            if(is_null($id) or ($id===false))
            {
                throw new Error('Erreur de formulaire');
            }
          // echo $id ;
            //die("Test".$id);
            
            $userModel = new UtilisateursModel();
            $userModel->supprimer($id);
            // die("Suppression réussie !");  
            \F3il\Messenger::setMessage('Suppression effectuée !');
            \F3il\HttpHelper::redirect('?controller=utilisateur&action=lister');
        }
    }