<?php

function isBalanced($expression) {
    $stack = [];
    $brackets = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    
    for ($i = 0; $i < strlen($expression); $i++) {
        $sym = $expression[$i];
        
        if (isset($brackets[$sym])) { 
            if (empty($stack)) { 
                return false;
            }
            $left = array_pop($stack);
            if ($brackets[$sym] !== $left) { 
                return false;
            }
        } elseif (in_array($sym, $brackets)) {
            $stack[] = $sym; 
        }
    }
    

    return empty($stack); 
}

$expressions = [
    "s * (s - a) * (s - b) * (s - c)", 
    "(– b + (b2 - 4*a*c)^0.5) / 2*a",  
    "s * (s - a) * (s - b * (s - c)",  
    "s * (s - a) * s - b) * (s - c)",  
    "(– b + (b^2 - 4*a*c)^(0.5/ 2*a)"  
];

foreach ($expressions as $expr) {
    echo "$expr → " . (isBalanced($expr) ? 'Well' : 'Not Well') . "\n";
}

?>