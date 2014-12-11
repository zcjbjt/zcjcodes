<?php
//品鉴代码
// http://avdb.tv/search/ebod-419
	/*
	$preg_string = '/<a href=\"(.*?)" target="_blank">(.*?)<\/a>/i';
	$a = '<a href="nimashishabi" target="_blank">aaaaaaaaaaa</a>bbbbbbbbbb</a>cccccccccccccccc</a>';
	$a = '<a href="/movie/2bt7" target="_blank">見つめ合って感じ合う情熱SEX 並木優</a>�合う情熱SEX 並木優</a> 並木優</a>��</a>"';
	preg_match_all($preg_string , $a,$b);
	*/
	//print_r($b);
	
	$fanhao_fx = 'ebod' ;
	for($i = 400 ; $i <= 410 ; $i++){
		
		$search = $fanhao_fx . '-' . $i;
		$src = "http://avdb.tv/search/$search";
		$html = file_get_contents($src);
		$preg_string = '/<div style(.*)<\\/div>/i';
		preg_match_all($preg_string , $html,$match);
		
		if(!empty($match[1][0])){
			$string = $match[1][0];
			$preg_string = '/<a href=\"(.*?)" target="_blank">(.*?)<\/a><br>/Ui';
			preg_match_all($preg_string , $string,$matchb);
			if(!empty($matchb[0][0])){
				$string = $matchb[0][0];
				$string = str_replace('<br>','',$string);
				$string_a = explode('</a>' ,$string );
			}
			$name = $matchb[2][0];
			echo $search . '-' . $name . "\n";
		}
	}
	
?>