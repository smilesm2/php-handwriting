<?php

function debug_time($begin_time,$end_time)
{
     if($begin_time < $end_time)
     {
        $starttime = $begin_time;
        $endtime = $end_time;
     }
     else
     {
        $starttime = $end_time;
        $endtime = $begin_time;
     }
     $timediff = $endtime-$starttime;
     $ms = explode('.', $timediff);
     $days = intval($timediff/86400);
     $remain = $timediff%86400;
     $hours = intval($remain/3600); 
     $remain = $remain%3600;
     $mins = intval($remain/60);
     $secs = $remain%60;
     $res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs, "ms"=> $ms[1]);
     return $res["min"]."分".$res["sec"]."秒".$res["ms"]." ";
}

function debug_show_writing($writing)
{
    $strokes = $writing->strokes;
    for($i = 0; $i < sizeof($strokes); $i++)
    {
        echo "<p>stroke".($i+1).":<br>";

        $points = $strokes[$i]->points;
        for($j = 0; $j < sizeof($points); $j++)
        {
            echo " (".$points[$j]->x.", ".$points[$j]->y.") ";
        }
        echo "</p>";
    }
}

function debug_show(&$obj)
{
    for($i = 0; $i < sizeof($obj); $i++)
    {
        echo $i."=><br>";
        echo 'char = <font color=red>'.$obj[$i]->char."</font><br>";
        echo 'src = '.$obj[$i]->src."<br>";
        echo 'img = '.$obj[$i]->img."<br>";
        echo 'desc = '.$obj[$i]->desc."<br>";
        echo 'score = '.$obj[$i]->score."<br><br>";
    }
}

function debug_input()
{
    $writing = new TomoeChar();
    $writing->int_n_strokes = 1;
    $stroke = new TomoeStroke();
    $points = new TomoePoint(200, 223);
//  array_push();

}


function debug_array()
{
    $str = '{"strokes":[{"points":[{"x":60,"y":66},{"x":61,"y":67},
{"x":63,"y":70},{"x":66,"y":77},{"x":69,"y":84},{"x":71,"y":91},
{"x":71,"y":91}]},{"points":[{"x":36,"y":130},{"x":37,"y":130},
{"x":38,"y":130},{"x":38,"y":131},{"x":40,"y":131},{"x":47,"y":132},
{"x":53,"y":132},{"x":57,"y":130},{"x":67,"y":127},{"x":82,"y":121},
{"x":87,"y":119},{"x":91,"y":116},{"x":92,"y":115},{"x":93,"y":115},
{"x":92,"y":115},{"x":91,"y":116},{"x":89,"y":119},{"x":86,"y":123},
{"x":85,"y":126},{"x":83,"y":131},{"x":80,"y":135},{"x":78,"y":143},
{"x":75,"y":152},{"x":72,"y":162},{"x":68,"y":175},{"x":65,"y":188},
{"x":64,"y":200},{"x":64,"y":212},{"x":64,"y":222},{"x":64,"y":231},
{"x":64,"y":239},{"x":65,"y":242},{"x":66,"y":244},{"x":67,"y":246},
{"x":69,"y":248},{"x":71,"y":248},{"x":72,"y":248},{"x":75,"y":248},
{"x":79,"y":246},{"x":88,"y":241},{"x":98,"y":235},{"x":104,"y":231},
{"x":104,"y":230},{"x":104,"y":230}]},{"points":[{"x":132,"y":56},
{"x":132,"y":57},{"x":133,"y":60},{"x":137,"y":68},{"x":145,"y":78},
{"x":149,"y":84},{"x":150,"y":85},{"x":150,"y":85}]},{"points":
[{"x":243,"y":59},{"x":242,"y":59},{"x":227,"y":72},{"x":214,"y":82},
{"x":205,"y":88},{"x":205,"y":88}]},{"points":[{"x":183,"y":46},
{"x":183,"y":47},{"x":174,"y":75},{"x":154,"y":116},{"x":143,"y":132},
{"x":141,"y":133},{"x":140,"y":133},{"x":139,"y":133},{"x":138,"y":133},
{"x":137,"y":133},{"x":136,"y":134},{"x":135,"y":134},{"x":133,"y":134},
{"x":132,"y":134},{"x":129,"y":134},{"x":127,"y":134},{"x":125,"y":134},
{"x":124,"y":134},{"x":123,"y":134},{"x":120,"y":134},{"x":119,"y":134},
{"x":119,"y":134}]},{"points":[{"x":164,"y":99},{"x":165,"y":99},
{"x":166,"y":100},{"x":170,"y":104},{"x":172,"y":107},{"x":182,"y":116},
{"x":188,"y":122},{"x":196,"y":128},{"x":203,"y":132},{"x":211,"y":135},
{"x":212,"y":135},{"x":213,"y":135},{"x":214,"y":135},{"x":215,"y":135},
{"x":215,"y":135}]},{"points":[{"x":131,"y":174},{"x":132,"y":175},
{"x":139,"y":183},{"x":153,"y":196},{"x":161,"y":203},{"x":164,"y":206},
{"x":165,"y":206},{"x":165,"y":206}]},{"points":[{"x":249,"y":172},
{"x":248,"y":172},{"x":243,"y":178},{"x":234,"y":186},{"x":227,"y":192},
{"x":219,"y":196},{"x":217,"y":197},{"x":217,"y":197}]},{"points":
[{"x":194,"y":164},{"x":193,"y":164},{"x":186,"y":180},{"x":172,"y":213},
{"x":163,"y":228},{"x":130,"y":247},{"x":130,"y":247}]},{"points":
[{"x":177,"y":211},{"x":177,"y":212},{"x":184,"y":225},{"x":196,"y":246},
{"x":202,"y":253},{"x":205,"y":257},{"x":209,"y":259},{"x":209,"y":260},
{"x":209,"y":260}]}],"width":213,"height":214,"left":36,"top":46,"type":1}';
    $obj = json_decode($str);
    debug_show($obj);
    $test = new Recognizer();
    $nodePairs = array();
$test->tomoe_recognizer_get_candidates($obj, $obj);
    //echo $res->distance."<br>";
    //echo $res->point->x.":".$res->point->y;
    //echo var_dump($nodePairs);
    //debug_show($new_points);
}



function debug_getInput()
{
   $str = '{"strokes":[{"points":[{"x":67,"y":55},{"x":68,"y":55},{"x":69,"y":56},{"x":70,"y":57},{"x":72,"y":57},{"x":73,"y":58},{"x":76,"y":60},{"x":78,"y":61},{"x":82,"y":63},{"x":85,"y":65},{"x":88,"y":67},{"x":92,"y":69},{"x":95,"y":71},{"x":97,"y":72},{"x":99,"y":74},{"x":100,"y":74},{"x":101,"y":74},{"x":103,"y":75},{"x":103,"y":76},{"x":104,"y":77},{"x":105,"y":77},{"x":106,"y":77},{"x":106,"y":78},{"x":106,"y":78}]},{"points":[{"x":53,"y":121},{"x":54,"y":121},{"x":56,"y":121},{"x":58,"y":121},{"x":59,"y":121},{"x":62,"y":121},{"x":64,"y":120},{"x":67,"y":120},{"x":68,"y":120},{"x":70,"y":119},{"x":72,"y":119},{"x":73,"y":119},{"x":75,"y":119},{"x":77,"y":118},{"x":79,"y":118},{"x":81,"y":117},{"x":83,"y":117},{"x":85,"y":116},{"x":86,"y":116},{"x":87,"y":116},{"x":88,"y":116},{"x":90,"y":115},{"x":92,"y":114},{"x":94,"y":114},{"x":95,"y":113},{"x":96,"y":113},{"x":97,"y":112},{"x":98,"y":112},{"x":98,"y":111},{"x":99,"y":111},{"x":100,"y":110},{"x":100,"y":109},{"x":101,"y":109},{"x":103,"y":108},{"x":105,"y":107},{"x":106,"y":106},{"x":107,"y":105},{"x":108,"y":105},{"x":109,"y":104},{"x":110,"y":104},{"x":111,"y":103},{"x":113,"y":102},{"x":114,"y":102},{"x":115,"y":101},{"x":116,"y":101},{"x":117,"y":101},{"x":117,"y":100},{"x":116,"y":101},{"x":115,"y":101},{"x":114,"y":102},{"x":113,"y":103},{"x":113,"y":104},{"x":112,"y":105},{"x":111,"y":106},{"x":110,"y":107},{"x":110,"y":109},{"x":109,"y":111},{"x":109,"y":113},{"x":108,"y":115},{"x":107,"y":117},{"x":106,"y":119},{"x":105,"y":121},{"x":105,"y":123},{"x":105,"y":126},{"x":104,"y":127},{"x":104,"y":128},{"x":104,"y":130},{"x":103,"y":131},{"x":103,"y":133},{"x":102,"y":136},{"x":102,"y":139},{"x":102,"y":140},{"x":101,"y":143},{"x":101,"y":146},{"x":101,"y":149},{"x":100,"y":152},{"x":100,"y":155},{"x":100,"y":158},{"x":99,"y":162},{"x":99,"y":163},{"x":99,"y":166},{"x":98,"y":170},{"x":98,"y":173},{"x":98,"y":176},{"x":97,"y":180},{"x":97,"y":182},{"x":97,"y":185},{"x":97,"y":188},{"x":97,"y":189},{"x":97,"y":191},{"x":97,"y":194},{"x":97,"y":195},{"x":97,"y":197},{"x":97,"y":199},{"x":97,"y":200},{"x":98,"y":201},{"x":98,"y":203},{"x":99,"y":203},{"x":99,"y":204},{"x":99,"y":206},{"x":99,"y":207},{"x":100,"y":209},{"x":101,"y":209},{"x":101,"y":210},{"x":102,"y":210},{"x":103,"y":210},{"x":105,"y":210},{"x":106,"y":208},{"x":108,"y":208},{"x":112,"y":206},{"x":115,"y":204},{"x":117,"y":204},{"x":118,"y":202},{"x":119,"y":201},{"x":120,"y":201},{"x":121,"y":200},{"x":121,"y":199},{"x":122,"y":198},{"x":124,"y":197},{"x":124,"y":197}]},{"points":[{"x":146,"y":45},{"x":146,"y":46},{"x":146,"y":47},{"x":147,"y":48},{"x":148,"y":50},{"x":148,"y":51},{"x":149,"y":52},{"x":150,"y":54},{"x":151,"y":55},{"x":152,"y":57},{"x":153,"y":59},{"x":154,"y":60},{"x":156,"y":61},{"x":157,"y":63},{"x":157,"y":64},{"x":159,"y":66},{"x":160,"y":66},{"x":160,"y":67},{"x":161,"y":68},{"x":163,"y":68},{"x":164,"y":69},{"x":166,"y":70},{"x":167,"y":71},{"x":168,"y":71},{"x":169,"y":71},{"x":169,"y":71}]},{"points":[{"x":253,"y":46},{"x":253,"y":47},{"x":252,"y":48},{"x":250,"y":50},{"x":248,"y":51},{"x":246,"y":53},{"x":244,"y":54},{"x":242,"y":56},{"x":239,"y":59},{"x":236,"y":62},{"x":234,"y":64},{"x":231,"y":67},{"x":228,"y":70},{"x":226,"y":72},{"x":224,"y":74},{"x":222,"y":75},{"x":219,"y":77},{"x":216,"y":79},{"x":214,"y":81},{"x":213,"y":81},{"x":211,"y":82},{"x":208,"y":83},{"x":206,"y":83},{"x":205,"y":83},{"x":204,"y":84},{"x":203,"y":84},{"x":203,"y":84}]},{"points":[{"x":197,"y":43},{"x":197,"y":44},{"x":197,"y":45},{"x":197,"y":47},{"x":197,"y":49},{"x":197,"y":51},{"x":197,"y":53},{"x":197,"y":56},{"x":197,"y":59},{"x":196,"y":64},{"x":194,"y":67},{"x":193,"y":71},{"x":189,"y":77},{"x":187,"y":81},{"x":185,"y":85},{"x":180,"y":90},{"x":177,"y":94},{"x":174,"y":97},{"x":169,"y":102},{"x":167,"y":106},{"x":164,"y":108},{"x":160,"y":112},{"x":157,"y":114},{"x":155,"y":115},{"x":151,"y":118},{"x":148,"y":119},{"x":146,"y":120},{"x":139,"y":121},{"x":134,"y":121},{"x":130,"y":122},{"x":124,"y":123},{"x":121,"y":123},{"x":120,"y":123},{"x":119,"y":123},{"x":119,"y":123}]},{"points":[{"x":183,"y":100},{"x":184,"y":100},{"x":185,"y":100},{"x":187,"y":100},{"x":190,"y":102},{"x":194,"y":103},{"x":200,"y":107},{"x":203,"y":109},{"x":207,"y":111},{"x":211,"y":114},{"x":214,"y":116},{"x":216,"y":117},{"x":220,"y":121},{"x":222,"y":122},{"x":224,"y":124},{"x":226,"y":125},{"x":226,"y":126},{"x":227,"y":126},{"x":227,"y":126}]},{"points":[{"x":145,"y":147},{"x":146,"y":147},{"x":147,"y":147},{"x":148,"y":149},{"x":150,"y":149},{"x":151,"y":149},{"x":153,"y":151},{"x":155,"y":152},{"x":157,"y":154},{"x":159,"y":155},{"x":161,"y":157},{"x":162,"y":157},{"x":163,"y":158},{"x":165,"y":160},{"x":167,"y":162},{"x":169,"y":164},{"x":170,"y":165},{"x":171,"y":166},{"x":172,"y":167},{"x":174,"y":168},{"x":174,"y":169},{"x":174,"y":168},{"x":174,"y":167},{"x":174,"y":167}]},{"points":[{"x":234,"y":151},{"x":234,"y":152},{"x":233,"y":153},{"x":232,"y":153},{"x":232,"y":154},{"x":230,"y":156},{"x":229,"y":156},{"x":228,"y":157},{"x":226,"y":159},{"x":223,"y":162},{"x":220,"y":164},{"x":217,"y":166},{"x":214,"y":168},{"x":212,"y":170},{"x":209,"y":172},{"x":206,"y":173},{"x":204,"y":173},{"x":203,"y":173},{"x":203,"y":174},{"x":202,"y":174},{"x":201,"y":174},{"x":200,"y":174},{"x":200,"y":174}]},{"points":[{"x":192,"y":139},{"x":192,"y":140},{"x":192,"y":141},{"x":192,"y":143},{"x":192,"y":144},{"x":191,"y":145},{"x":191,"y":148},{"x":190,"y":150},{"x":190,"y":153},{"x":189,"y":154},{"x":188,"y":158},{"x":186,"y":161},{"x":184,"y":165},{"x":183,"y":169},{"x":181,"y":173},{"x":179,"y":178},{"x":175,"y":182},{"x":173,"y":186},{"x":170,"y":191},{"x":165,"y":197},{"x":162,"y":201},{"x":158,"y":207},{"x":155,"y":212},{"x":152,"y":215},{"x":148,"y":219},{"x":147,"y":221},{"x":145,"y":223},{"x":144,"y":224},{"x":143,"y":224},{"x":143,"y":225},{"x":142,"y":225},{"x":141,"y":225},{"x":140,"y":226},{"x":140,"y":226}]},{"points":[{"x":179,"y":188},{"x":179,"y":190},{"x":180,"y":190},{"x":181,"y":191},{"x":182,"y":194},{"x":184,"y":195},{"x":186,"y":196},{"x":189,"y":199},{"x":191,"y":201},{"x":194,"y":203},{"x":197,"y":206},{"x":200,"y":209},{"x":202,"y":211},{"x":208,"y":215},{"x":212,"y":217},{"x":215,"y":220},{"x":220,"y":224},{"x":222,"y":225},{"x":225,"y":227},{"x":228,"y":228},{"x":230,"y":228},{"x":232,"y":229},{"x":233,"y":230},{"x":235,"y":231},{"x":236,"y":231},{"x":237,"y":231},{"x":237,"y":231}]}],"width":200,"height":188,"left":53,"top":43}';
   //$str = '{"strokes":[{"points":[{"x":56,"y":64},{"x":57,"y":65},{"x":57,"y":66},{"x":58,"y":67},{"x":58,"y":68},{"x":60,"y":71},{"x":61,"y":72},{"x":61,"y":74},{"x":62,"y":77},{"x":63,"y":81},{"x":65,"y":84},{"x":66,"y":88},{"x":67,"y":90},{"x":68,"y":92},{"x":69,"y":94},{"x":69,"y":95},{"x":69,"y":96},{"x":69,"y":96}]},{"points":[{"x":43,"y":145},{"x":44,"y":145},{"x":46,"y":144},{"x":49,"y":142},{"x":51,"y":141},{"x":53,"y":139},{"x":56,"y":136},{"x":61,"y":134},{"x":64,"y":131},{"x":71,"y":127},{"x":76,"y":123},{"x":79,"y":121},{"x":83,"y":118},{"x":86,"y":116},{"x":87,"y":114},{"x":88,"y":112},{"x":89,"y":111},{"x":90,"y":111},{"x":90,"y":112},{"x":90,"y":114},{"x":89,"y":116},{"x":88,"y":120},{"x":87,"y":123},{"x":86,"y":130},{"x":86,"y":135},{"x":85,"y":145},{"x":84,"y":151},{"x":82,"y":158},{"x":81,"y":164},{"x":79,"y":174},{"x":79,"y":179},{"x":77,"y":188},{"x":76,"y":197},{"x":76,"y":202},{"x":76,"y":208},{"x":76,"y":215},{"x":76,"y":217},{"x":76,"y":221},{"x":76,"y":224},{"x":76,"y":225},{"x":76,"y":226},{"x":76,"y":227},{"x":77,"y":227},{"x":77,"y":228},{"x":78,"y":228},{"x":80,"y":227},{"x":81,"y":225},{"x":83,"y":223},{"x":87,"y":219},{"x":91,"y":216},{"x":99,"y":208},{"x":104,"y":203},{"x":110,"y":198},{"x":114,"y":194},{"x":117,"y":191},{"x":117,"y":191}]},{"points":[{"x":120,"y":66},{"x":120,"y":68},{"x":121,"y":69},{"x":122,"y":71},{"x":123,"y":72},{"x":124,"y":73},{"x":124,"y":75},{"x":126,"y":76},{"x":127,"y":78},{"x":128,"y":80},{"x":130,"y":82},{"x":131,"y":84},{"x":132,"y":84},{"x":133,"y":85},{"x":133,"y":85}]},{"points":[{"x":217,"y":57},{"x":217,"y":58},{"x":217,"y":59},{"x":215,"y":60},{"x":213,"y":63},{"x":209,"y":66},{"x":203,"y":71},{"x":198,"y":75},{"x":192,"y":81},{"x":188,"y":84},{"x":183,"y":88},{"x":180,"y":89},{"x":179,"y":90},{"x":178,"y":91},{"x":177,"y":91},{"x":177,"y":91}]},{"points":[{"x":157,"y":61},{"x":157,"y":63},{"x":157,"y":64},{"x":157,"y":66},{"x":157,"y":71},{"x":156,"y":75},{"x":156,"y":78},{"x":153,"y":86},{"x":151,"y":93},{"x":147,"y":99},{"x":140,"y":110},{"x":137,"y":118},{"x":130,"y":127},{"x":123,"y":137},{"x":117,"y":143},{"x":112,"y":149},{"x":106,"y":154},{"x":103,"y":156},{"x":100,"y":157},{"x":97,"y":158},{"x":97,"y":158}]},{"points":[{"x":156,"y":112},{"x":158,"y":113},{"x":160,"y":115},{"x":161,"y":118},{"x":163,"y":120},{"x":165,"y":122},{"x":169,"y":126},{"x":171,"y":129},{"x":176,"y":132},{"x":177,"y":134},{"x":179,"y":135},{"x":180,"y":135},{"x":181,"y":135},{"x":181,"y":135}]},{"points":[{"x":124,"y":165},{"x":125,"y":167},{"x":126,"y":169},{"x":129,"y":173},{"x":131,"y":175},{"x":134,"y":178},{"x":137,"y":181},{"x":138,"y":183},{"x":140,"y":184},{"x":143,"y":186},{"x":144,"y":187},{"x":145,"y":187},{"x":145,"y":187}]},{"points":[{"x":237,"y":153},{"x":237,"y":154},{"x":236,"y":154},{"x":236,"y":155},{"x":235,"y":157},{"x":234,"y":157},{"x":233,"y":158},{"x":231,"y":161},{"x":229,"y":163},{"x":226,"y":165},{"x":221,"y":169},{"x":216,"y":171},{"x":210,"y":175},{"x":203,"y":180},{"x":197,"y":183},{"x":192,"y":186},{"x":190,"y":187},{"x":188,"y":188},{"x":186,"y":188},{"x":185,"y":188},{"x":184,"y":188},{"x":183,"y":188},{"x":183,"y":188}]},{"points":[{"x":173,"y":153},{"x":173,"y":154},{"x":173,"y":156},{"x":173,"y":157},{"x":173,"y":161},{"x":172,"y":166},{"x":172,"y":172},{"x":171,"y":177},{"x":169,"y":186},{"x":167,"y":192},{"x":165,"y":198},{"x":161,"y":205},{"x":159,"y":211},{"x":157,"y":215},{"x":153,"y":221},{"x":151,"y":224},{"x":148,"y":227},{"x":144,"y":230},{"x":141,"y":233},{"x":138,"y":235},{"x":134,"y":236},{"x":133,"y":237},{"x":132,"y":237},{"x":132,"y":237}]},{"points":[{"x":173,"y":213},{"x":174,"y":214},{"x":175,"y":216},{"x":177,"y":219},{"x":177,"y":221},{"x":179,"y":224},{"x":184,"y":228},{"x":187,"y":231},{"x":190,"y":234},{"x":194,"y":238},{"x":197,"y":241},{"x":200,"y":244},{"x":202,"y":246},{"x":204,"y":247},{"x":204,"y":247}]}],"width":194,"height":190,"left":43,"top":57}';
   $obj = json_decode($str);
    return $obj;
}


function debug_train(&$writing, $ret)
{
    $t = new Trainer();    //训练（需要大量资源，非常慢）
    $t->train();
}

function time2Units ($time)
{
   $year   = floor($time / 60 / 60 / 24 / 365);
   $time  -= $year * 60 * 60 * 24 * 365;
   $month  = floor($time / 60 / 60 / 24 / 30);
   $time  -= $month * 60 * 60 * 24 * 30;
   $week   = floor($time / 60 / 60 / 24 / 7);
   $time  -= $week * 60 * 60 * 24 * 7;
   $day    = floor($time / 60 / 60 / 24);
   $time  -= $day * 60 * 60 * 24;
   $hour   = floor($time / 60 / 60);
   $time  -= $hour * 60 * 60;
   $minute = floor($time / 60);
   $time  -= $minute * 60;
   $second = $time;
   $elapse = '';

   $unitArr = array('年'  =>'year', '个月'=>'month',  '周'=>'week', '天'=>'day',
                    '小时'=>'hour', '分钟'=>'minute', '秒'=>'second'
                    );

   foreach ( $unitArr as $cn => $u )
   {
       if ( $$u > 0 )
       {
           $elapse = $$u . $cn;
           break;
       }
   }

   return $elapse;
}


?>