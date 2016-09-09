---
permalink: /question.16067272.in-php-get-entire-word-from-mysql-search-result-using-like/index.html
---

I read [your discussion on this][1] and more robust implementation might be in 
order. Especially taking your need to support [diacritics][2] into account. 
Using a single regular expression to fix all your problems might seem tempting, 
but the more complicated it becomes the harder it gets to maintain or expand 
upon. To quote [Jamie Zawinski][3]

> Some people, when confronted with a problem, think “I know, I'll use regular expressions.”  Now they have two problems. 

As I have problems with [`iconv`][4] on my local machine, I used a more simple 
implementation instead, feel free to use [something more complicated or robust][5] 
if your situation requires it.

I use a simple regular expression in this solution to get a set of alphanumeric 
characters only (also known as a "word"), the part in the regular expression 
that reads `\p{L}\p{M}` makes sure we also [get all the multibyte characters][6].

You can see [this code working on IDEone][7].

    <?php
    function stripAccents($p_sSubject) {
        $sSubject = (string) $p_sSubject;

        $sSubject = str_replace('æ', 'ae', $sSubject);
        $sSubject = str_replace('Æ', 'AE', $sSubject);

        $sSubject = strtr(
              utf8_decode($sSubject)
            , utf8_decode('àáâãäåçèéêëìíîïñòóôõöøùúûüýÿÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝ')
            , 'aaaaaaceeeeiiiinoooooouuuuyyAAAAAACEEEEIIIINOOOOOOUUUUY'
        );


        return $sSubject;
    }
    
    function emphasiseWord($p_sSubject, $p_sSearchTerm){
    
        $aSubjects = preg_split('#([^a-z0-9\p{L}\p{M}]+)#iu', $p_sSubject, null, PREG_SPLIT_DELIM_CAPTURE);
    
        foreach($aSubjects as $t_iKey => $t_sSubject){
            $sSubject = stripAccents($t_sSubject);
            
            if(stripos($sSubject, $p_sSearchTerm) !== false || mb_stripos($t_sSubject, $p_sSearchTerm) !== false){
                $aSubjects[$t_iKey] = '<strong>' . $t_sSubject . '</strong>';
            }
        }
    
        $sSubject = implode('', $aSubjects);
        
        return $sSubject;
    }
    
    
    /////////////////////////////// Test \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $aTest = array(
          'goo' => 'I love Google to make my searches, but I`m starting to worry about privacy.'
        , 'peo' => 'people, People, PEOPLE, peOple, people!, people., people?, "people, people" péo'
        , 'péo' => 'people, People, PEOPLE, peOple, people!, people., people?, "people, people" péo'
        , 'gen' => '"gente", "inteligente", "VAGENS", and "Gente" ...vocês da física que passam o dia protegendo...'
        , 'voce' => '...vocês da física que passam o dia protegendo...'
        , 'o' => 'Characters like æ,ø,å,Æ,Ø and Å are used in Denmark, Sweden and Norway'
        , 'ø' => 'Characters like æ,ø,å,Æ,Ø and Å are used in Denmark, Sweden and Norway'
        , 'ae' => 'Characters like æ,ø,å,Æ,Ø and Å are used in Denmark, Sweden and Norway'
        , 'Æ' => 'Characters like æ,ø,å,Æ,Ø and Å are used in Denmark, Sweden and Norway'
    );
    
    $sContent = '<dl>';
    foreach($aTest as $t_sSearchTerm => $t_sSubject){
        $sContent .= '<dt>' . $t_sSearchTerm . '</dt><dd>' . emphasiseWord($t_sSubject, $t_sSearchTerm) .'</dd>';
    }
    $sContent .= '</dl>';
    
    echo $sContent;
    ?>


  [1]: http://chat.stackoverflow.com/rooms/28393/discussion-between-arraintxo-and-joao-paulo-apolinario-passos
  [2]: http://en.wikipedia.org/wiki/Diacritics
  [3]: https://twitter.com/jwz
  [4]: http://php.net/manual/en/function.iconv.php
  [5]: http://stackoverflow.com/questions/3542818/remove-accents-without-using-iconv/
  [6]: http://www.regular-expressions.info/unicode.html
  [7]: http://ideone.com/GELaBn
