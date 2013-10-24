<?php

$sHtml = <<<HTML
<html>
<body>
    <img src="../images/image.jpg" />
    <a href="www.site.com/document.pdf"><img src="../images/image.jpg" /></a>
    <a href="www.site.com/document.txt"><img src="../images/image.jpg" /></a>
    <p>this is some text <a href="site.com/doc.pdf"> more text</p> 
</body>
</html>
HTML;

$oDoc = new DOMDocument();
$oDoc->loadHTML($sHtml);
$oNodeList = $oDoc->getElementsByTagName('img');

foreach($oNodeList as $t_oNode)
{
    if($t_oNode->parentNode->nodeName === 'a')
    {
        echo '<li>I am wrapped in an anchor tag!';
        
        $sLinkValue = $t_oNode->parentNode->getAttribute('href');
        $sExtension = substr($sLinkValue, strrpos($sLinkValue, '.'));
        echo 'and I link to  a ' . $sExtension . ' file'; 

    }
}
