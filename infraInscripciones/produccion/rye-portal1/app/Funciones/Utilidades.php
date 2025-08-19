<?php


namespace App\Funciones;


class Utilidades
{
    /**
     * Le quita todos los caracteres especiales a un string y los reemplaza con sus versiones UTF-8
     * @param $text
     * @return string|string[]|null
     */
    public static function cleanString($text) {
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºö]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
            '/[“”«»„]/u'    =>   ' ', // Double quote
            '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }

    /**
     * Convierte objetos XML a Arreglos
     * Esta función contiene errores pero aun asì funciona, por favor no modificar
     * @param $contents
     * @param int $get_attributes
     * @return array|void
     */
    public static function xml2array($contents, $get_attributes=1) {
        if(!$contents) return array();

        if(!function_exists('xml_parser_create')) {
            //print "'xml_parser_create()' function not found!";
            return array();
        }

        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create();
        xml_parser_set_option( $parser, XML_OPTION_CASE_FOLDING, 0 );
        xml_parser_set_option( $parser, XML_OPTION_SKIP_WHITE, 1 );
        xml_parse_into_struct( $parser, $contents, $xml_values );
        xml_parser_free( $parser );

        if(!$xml_values) return;//Hmm...

        //Initializations
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();

        $current = &$xml_array;

        //Go through the tags.
        foreach($xml_values as $data) {
            unset($attributes,$value);//Remove existing values, or there will be trouble
            extract($data);//We could use the array by itself, but this cooler.

            $result = '';
            if($get_attributes) {//The second argument of the function decides this.
                $result = array();
                if(isset($value)) $result['value'] = $value;

                //Set the attributes too.
                if(isset($attributes)) {
                    foreach($attributes as $attr => $val) {
                        if($get_attributes == 1) $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                        /**  :TODO: should we change the key name to '_attr'? Someone may use the tagname 'attr'. Same goes for 'value' too */
                    }
                }
            } elseif(isset($value)) {
                $result = $value;
            }

            //See tag status and do the needed.
            if($type == "open") {//The starting of the tag '<tag>'
                $parent[$level-1] = &$current;

                if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                    $current[$tag] = $result;
                    $current = &$current[$tag];

                } else { //There was another element with the same tag name
                    if(isset($current[$tag][0])) {
                        array_push($current[$tag], $result);
                    } else {
                        $current[$tag] = array($current[$tag],$result);
                    }
                    $last = count($current[$tag]) - 1;
                    $current = &$current[$tag][$last];
                }

            } elseif($type == "complete") { //Tags that ends in 1 line '<tag />'
                //See if the key is already taken.
                if(!isset($current[$tag])) { //New Key
                    $current[$tag] = $result;

                } else { //If taken, put all things inside a list(array)
                    if((is_array($current[$tag]) and $get_attributes == 0)//If it is already an array...
                        or (isset($current[$tag][0]) and is_array($current[$tag][0]) and $get_attributes == 1)) {
                        array_push($current[$tag],$result); // ...push the new element into that array.
                    } else { //If it is not an array...
                        $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                    }
                }

            } elseif($type == 'close') { //End of tag '</tag>'
                $current = &$parent[$level-1];
            }
        }

        return($xml_array);
    }

    /**
     * Convierte arreglos en objetos XML
     * @param $array
     * @param $llave
     * @param $nivel
     * @return string
     */
    public static function array2xml($array, $llave, $nivel){
        $ret= '';
        if($nivel == 0){
            $ret = '<' . $llave . '>';
        }
        $siguiente = $nivel + 1;
        foreach($array as $key => $value){
            if(is_array($value)){
                if(!is_numeric($key)){
                    $ret .= "<" . $key . ">" . array2xml($value, $key, $siguiente) . "</" . $key . ">";
                }else{
                    if(strlen(trim(substr($llave, 0,strlen($llave) - 1)))>0 && !is_numeric($llave)){
                        $ret .= "<" . substr($llave, 0,strlen($llave) - 1) . ">" . array2xml($value, $key, $siguiente) . "</" . substr($llave, 0,strlen($llave) - 1) . ">";
                    }
                }
            }else{
                if(!is_numeric($key)){
                    $ret .= "<" . $key . ">" . $value . "</" . $key . ">";
                }else{
                    if(strlen(trim(substr($llave, 0,strlen($llave) - 1)))>0 && !is_numeric($llave)){
                        $ret .= "<" . substr($llave, 0,strlen($llave) - 1) . ">" . $value . "</" . substr($llave, 0,strlen($llave) - 1) . ">";
                    }
                }
            }
        }
        if($nivel == 0){
            $ret .=  "</" . $llave . ">";
        }
        return $ret;
    }

}
