<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php

/**
 * I have problems with iconv on my local machine so I use this simple 
 * implementation instead, feel free to use something more complicated or 
 * robust if your situation requires it: 
 *      http://stackoverflow.com/questions/3542818/remove-accents-without-using-iconv/
 */
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
    /*
     * The part in the regular expression that read "\p{L}\p{M}" makes sure we 
     * also get all the multibyte characters.
     * You can learn more about unicode and regular expressions at:
     *          http://www.regular-expressions.info/unicode.html
     */
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


// Test
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
