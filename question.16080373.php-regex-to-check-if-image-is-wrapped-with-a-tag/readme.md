I would *very* strongly advise against using a regular expression for this. 
Besides being more error prone and less readable, it also does not give you the 
ability to manipulate the content easily.

You would be better of loading the content into a DomDocument, retrieving all 
`<img>` elements and validating whether or not their parents are `<a>` elements. 
All you would have to do then is validate whether or not the value of the `href` 
attribute ends with the desired extension.

A very crude implementation would look a bit like [this][1]:

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
            $sLinkValue = $t_oNode->parentNode->getAttribute('href');
            $sExtension = substr($sLinkValue, strrpos($sLinkValue, '.'));

            echo '<li>I am wrapped in an anchor tag '
               . 'and I link to  a ' . $sExtension . ' file '
            ; 
        }
    }
    ?>

I'll leave an exact implementation as an exercise for the reader ;-)


  [1]: http://ideone.com/mhOHSa (Live example at ideone.com)
