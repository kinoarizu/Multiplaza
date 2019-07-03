<?php
function clean($string)
{
 $c       = array (',','.');
 $string  = str_replace($c, '', $string); // Hilangkan karakter yang telah disebutkan di array $c
 return $string;
}

function clean2($string)
{
 $c       = array (',','-');
 $string  = str_replace($c, ' ', $string); // Hilangkan karakter yang telah disebutkan di array $c
 return $string;
}
?>
