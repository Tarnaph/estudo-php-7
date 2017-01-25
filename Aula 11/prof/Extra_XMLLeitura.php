<HTML>
    <HEAD>
        <TITLE>Lendo um XML</TITLE>
    </HEAD>
    <BODY>
        
<?php

    $dom = new DOMDocument();
    $dom->load("Extra_XML.xml");
    
    $estados = $dom->getElementsByTagName("OBJECT");
    
    foreach($estados as $estado)
    {
        echo $estado->getElementsByTagName("ID")->item(0)->nodeValue . "<BR>";
        echo $estado->getElementsByTagName("ID")->item(0)->getAttribute("Sul") . "<BR>";
        echo $estado->getElementsByTagName("DESCRIPTION")->item(0)->nodeValue . "<BR>";
        echo "<BR>";
    }

?>
        
    </BODY>
</HTML>