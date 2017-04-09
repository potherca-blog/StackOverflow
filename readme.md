---
permalink: /
---

# StackOverflow

Code and examples to go with my answers and questions on the stackoverflow website.

Currently I have several answers where I use code examples. In some cases a live 
version is profided using jsfiddle or ideone, etc, but I thought it might be a 
good idea to have all of this information together in one place as well.

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://rawgithub.com/chjj/marked/master/lib/marked.js"></script>
<script>
/*
    var sUrl = 'readme.md';
    // @TODO: The location.hash needs to be checked to see if another file has been asked for.
    $.get(sUrl, function(p_sResult) {
        var sHtml;
        // Clicks on any link to local/relative markdown files need to be 
        // caught and handled through AJAX, also the location.hash should be
        // updated to reflect this.
        sHtml = marked(p_sResult);
        $('.container').html(sHtml);
    });
*/
    addMenu();
    // For this specific purpose things could be taken even further than this...
    //
    // Any code block that use PHP could be caught and posted to the IDEone 
    // API and the result could be added to the page. Or we could run the 
    // script locally, save the output, commit that to the repo and use that
    // to display with the answer...
    //
    // For graphviz examples we could also use http://oodavid.com/gviz/

    /* Retrieve a list of available answers */
    function addMenu() {
        function foo(p_sCallback) {
            $.getJSON('https://api.github.com/repos/potherca-blog/StackOverflow/git/refs/heads'
                , function(p_oResponse, p_sStatus, p_oXHR) {
                    $.getJSON('https://api.github.com/repos/potherca-blog/StackOverflow/git/trees/' + p_oResponse[0].object.sha
                        , function(p_oResponse, p_sStatus, p_oXHR) {
                            $.each(p_oResponse.tree, function(p_i, p_oTree){
                                if(p_oTree.type === 'tree') {
                                    p_sCallback(p_oTree.path);
                                }
                            });
                        }
                    );
                }
            );
        }

        $('.container').append($('<h2>Available Answers</h2>'));
        var $List = $('.container').append($('<ul></ul>'));
        foo(function(p_sPath){
            if (p_sPath.indexOf('question.') === 0) {
                var sContent = '<li><a href="' + p_sPath + '">' + p_sPath+ '<\/a><\/li>'
                $List.append(sContent);
            }
        });    
    };
</script>

<!-- EOF -->
