<?php

class View
{
    /**
    * Armazena o conteúdo HTML
    * @var string
    */
    private $st_contents;
      
    /**
    * Armazena o nome do arquivo de visualização
    * @var string
    */
    private $st_view;
      
    /**
    * Armazena os dados que devem ser mostrados ao reenderizar o 
    * arquivo de visualização
    * @var Array
    */
    private $v_params;
      
    /**
    * É possivel efetuar a parametrização do objeto ao instanciar o mesmo,
    * $st_view é o nome do arquivo de visualização a ser usado e 
    * $v_params são os dados que devem ser utilizados pela camada de visualização
    * 
    * @param string $st_view
    * @param Array $css
    * @param Array $js
    */
    function __construct($st_view = null) 
    {
        if($st_view != null)
            $this->setView($st_view);
    }   
      
    /**
    * Define qual arquivo html deve ser renderizado
    * @param string $st_view
    * @throws Exception
    */
    public function setView($st_view)
    {
        if(file_exists($st_view))
            $this->st_view = $st_view;
        else
            throw new Exception("View File '$st_view' don't exists");       
    }
      
    /**
    * Retorna o nome do arquivo que deve ser renderizado
    * @return string 
    */
    public function getView()
    {
        return $this->st_view;
    }
      
    /**
    * Define os dados que devem ser repassados à view
    * @param Array $v_params
    */
    public function setParams($v_params){
        $this->v_params = $v_params; 
    }
    /**
    * Define O nome que deve ser exibido no title
    * @param string $page_name
    */
    
    /**
    * Retorna os dados que foram ser repassados ao arquivo de visualização
    * @return Array
    */
    public function getParams()
    {
        return $this->v_params;
    }
    
    /**
     * Retorna os dados que serao repassados ao arquivo como XML
     * @return XML
     */

     public function getXMLParams(){
        if(isset($this->v_params)){
            if (is_array($this->v_params) || ($this->v_params instanceof Traversable)){
                return $this->arrayToXML($this->v_params);
            }
            $_xml = simplexml_load_string($this->v_params);
            if (!$_xml) {
                echo "Failed loading XML\n";
                foreach(libxml_get_errors() as $error) {
                    echo "\t", $error->message;
                }
            }
            return $_xml->asXML();

        }
        $_xml = new SimpleXMLElement('<root/>');
        return $_xml->asXML();
     }

     /**
     * Converte a Array XML
     * @return XML
     */
    private function arrayToXml($array, $rootElement = null, $xml = null) {
        $_xml = $xml;
          
        // If there is no Root Element then insert root
        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }
          
        // Visit all key value pair
        foreach ($array as $k => $v) {
              
            // If there is nested array then
            if (is_array($v)) { 
                  
                // Call function for nested array
                arrayToXml($v, $k, $_xml->addChild($k));
                }
                  
            else {
                  
                // Simply add child element. 
                $_xml->addChild($k, $v);
            }
        }
          
        return $_xml->asXML();
    }
    
    /**
    * Retorna uma string contendo todo 
    * o conteudo do arquivo de visualiza√ß√£o
    * 
    * @return string
    */
    public function getContents()
    {

        $xmlDocument = new DOMDocument;
        $xslDocument = new DOMDocument;

        if ($xmlDocument->loadXML($this->getXMLParams()) && $xslDocument->load($this->st_view)) {

            $xsltProc = new XSLTProcessor();

            // $xsltProc->importStyleSheet($xslDocument);
            // $xsltProc->setParameter('', 'pi',"<foo><bar>oi</bar><bar>tudo</bar></foo>");
            // $xsltProc->setParameter('', 'pi',"'t WORK!!!!!!!!!!!!!!!!!!!");
            if ($xsltProc->importStyleSheet($xslDocument)) {
                return trim($xsltProc->transformToXML($xmlDocument));

                // echo $xsltProc->transformToXML($xmlDocument);
            }
        }

    }
    /**
    * Imprime o arquivo de visualização 
    */
    public function showContents(){
        echo $this->getContents();
        exit;
    }
    public function showXML(){
        echo $this->arrayToXml();
        exit;
    }
}
?>