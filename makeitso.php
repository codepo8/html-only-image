<?php 
    function hexcolor($c) {
        $r = ($c >> 16) & 0xFF;
        $g = ($c >> 8) & 0xFF;
        $b = $c & 0xFF;
        return '#'.str_pad(dechex($r), 2, '0', STR_PAD_LEFT).str_pad(dechex($g), 2, '0', STR_PAD_LEFT).str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
    }
    function png2table($filename) {

        $img = imagecreatefrompng($filename);
        $width = imagesx($img);
        $height = imagesy($img);
        $output = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Glass</title>
        </head>
        <body bgcolor=#190d2><center>';

        $output .= '<table width='.$width.' height='.$height.' cellpadding=0 cellspacing=0>';
        
        for($y = 0;$y < $height;++$y){
            $output .= '<tr height=1>';
            for($x = 0;$x < $width;++$x){
                $current_color = ImageColorAt($img, $x, $y);
                $output .= '<td height=1 width=1 bgcolor=' . hexcolor($current_color) . '></td>';
            }
        }
       
        $output .= '</table>';
        $output .= '</center></body></html>';
        return $output;
        
    }
 
    echo png2table('glass-smaller.png');
?>