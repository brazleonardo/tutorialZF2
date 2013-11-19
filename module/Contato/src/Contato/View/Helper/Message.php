<?php

/**
 * namespace de localizacao do nosso helper
 */

namespace Contato\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Mvc\Controller\Plugin\FlashMessenger as FlashMessenger;

class Message extends AbstractHelper {

    protected $flashMessenger;
    protected $message;

    /**
     * construct
     */
    public function __construct(FlashMessenger $flashMessenger) {

        $this->setFlashMessenger($flashMessenger);
        $this->setMessage();
    }

    /**
     * metodo __invoke
     * @return retorna um html para a página
     */
    public function __invoke() {

        return $this->renderHtml();
    }

    /**
     * metodo renderHtml
     * @return monta o html
     */
    public function renderHtml() {

        $html = "";
        $message = $this->getMessage();

        if ($message):
            
            $key = key($message);
        
            $html .= '<div id="alert-message">';
            $html .= '<div class="' . $key . ' lert-block fade in">';
            $html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            $html .= $message[$key];
            $html .= '</div>';
            $html .= '</div>';
            
        endif;
        
       return $html;
    }
    
    /**
     * metodo setMesssage
     * seta um valor para flashMessenger
     */
    public function setFlashMessenger($msg){
        
        $this->flashMessenger = $msg;
    }
    
    /**
     * metodo getFlashMessenger
     * @return retorna flashMessenger
     */
    public function getFlashMessenger(){
        
        return $this->flashMessenger;
    }
    
    /**
     * metodo setMesssage
     * seta um valor para message
     */
    public function setMessage(){
        
        $flashMessenger = $this->getFlashMessenger();
        
        if($flashMessenger->hasMessages()):
            
            $message = $flashMessenger->getMessages();
            $this->message = array("alert alert-warning" => array_shift($message));
            
        endif;
        
        if($flashMessenger->hasInfoMessages()):
            
            $messageInfo = $flashMessenger->getInfoMessages();
            $this->message = array("alert alert-info" => array_shift($messageInfo));
            
        endif;
        
        if($flashMessenger->hasSuccessMessages()):
            
            $messageSuccess = $flashMessenger->getSuccessMessages();
            $this->message = array("alert alert-success" => array_shift($messageSuccess));
            
        endif;
        
        if($flashMessenger->hasErrorMessages()):
            
            $messageError = $flashMessenger->getErrorMessages();
            $this->message = array("alert alert-danger" => array_shift($messageError));
            
        endif;
    }

    /**
     * metodo getMesssage
     * @return retorna mensagem
     */
    public function getMessage(){
        
        return $this->message;
    }

}