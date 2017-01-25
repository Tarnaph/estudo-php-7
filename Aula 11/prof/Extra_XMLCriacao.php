<HTML>
    <HEAD>
        <TITLE>Criando um XML</TITLE>
    </HEAD>
    <BODY>
        
<?php

    $states = array("PR", "RS", "SC", "SP", "RJ");
    $statesSouth = array("PR", "RS", "SC");

    $dom = new DOMDocument("1.0", "UTF-8");
    $dom->preserveWhiteSpace = FALSE;
    $dom->formatOutput = TRUE;
    
    $root = $dom->createElement("OBJECTS");
    $idFicticio = 1;
    
    foreach($states as $state)
    {
        $estadoElemento = $dom->createElement("OBJECT");
        $sulAtributo = $dom->createAttribute("Sul");
        
        if(in_array($state, $statesSouth))
        {
            $sulAtributo->value = "Sim";
        }
        else
        {
            $sulAtributo->value = "Não";
        }
        
        $idElemento = $dom->createElement("ID", $idFicticio);
        $idElemento->appendChild($sulAtributo);
        $idFicticio++;
        
        $descricaoElemento = $dom->createElement("DESCRIPTION", $state);
        
        $estadoElemento->appendChild($idElemento);
        $estadoElemento->appendChild($descricaoElemento);
        $root->appendChild($estadoElemento);
    }
    
    $dom->appendChild($root);
    $dom->save("Extra_XML.xml");

?>
        
    </BODY>
</HTML>