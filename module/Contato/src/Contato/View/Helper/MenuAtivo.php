<?php

/**
 * namespace de localizacao do nosso helper
 */

namespace Contato\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Http\Request;

class MenuAtivo extends AbstractHelper {

    protected $request;
    
    /**
     * construct
     */
    public function __construct(Request $request) {
        
        $this->request = $request;
        
    }
    
    /**
     * metodo __invoke
     * @return class css menu active
     */
    public function __invoke($url = ""){
        
        return $this->request->getUri()->getPath() == $url ? 'class="active"' : "";
        
    }

}
