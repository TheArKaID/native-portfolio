<?php
    function getQuote()
    {
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => 'https://api.forismatic.com/api/1.0/?method=getQuote&lang=en',
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpCode===200){
            $quotearray = explode("http", $result);
            $quotetext = explode(".", $quotearray[0]);
            $quoteauthor = $quotetext[count($quotetext) - 1];
            for ($i = 0; $i < count($quotetext) - 1; $i++) {
                return "<blockquote class='quote-card'>
                <span style='font-family: lazyFont; font-size: 20pt;'>\"$quotetext[$i]\"</span><br />
                ~$quoteauthor</blockquote>";
            }
        } else{
            return "<blockquote class='quote-card'>
            <span style='font-family: lazyFont; font-size: 20pt;'>\"You're The King of Your Life\"</span><br />
            ~Arifia Kasastra R</blockquote>";
        }
    }

    function FunctionName()
    {
        
    }
?>