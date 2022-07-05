<?php

/**
The method should take a single string parameter and return a string containing
each case-insensitive letter in the parameter followed by a colon and an asterisk
for each occurrence of the letter, separated by a commas, with no spaces.

Example:
Input: “UUAAIIS Services Practice”
Output: “u:**,a:***,i:****,s:***,e:***,r:**,v:*,c:***,p:*,t:*"

*/
class LetterCounter {
    function countLettersInString($str) {
        $strRpl = str_replace(' ', '', strtolower($str));
        $strArr = str_split($strRpl);
        $countStrArr = array_count_values($strArr);
        $output = $this->convertLetters($countStrArr);

        return $output;
    }

    function convertLetters($strArr) {
        $str = '';
        foreach($strArr as $key => $value) {
            if (!empty($str)) $str .= ',';

            $str .= $key . ':';
            $len = strlen($str) + $value;
            $str = str_pad($str, $len, '*');
        }

        return $str;
    }
}

$input = 'UUAAIIS Services Practice';

$letterCounter = new LetterCounter();
$output = $letterCounter->countLettersInString($input);

echo "expect: u:**,a:***,i:****,s:***,e:***,r:**,v:*,c:***,p:*,t:*\n";
echo "result: $output\n";

