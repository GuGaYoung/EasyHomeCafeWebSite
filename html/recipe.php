<?php
    include "headerNav.php";

ini_set("allow_url_fopen", 1);
include "simple_html_dom.php";

$data = file_get_html("https://www.10000recipe.com/recipe/list.html?q=&query=&cat1=&cat2=&cat3=&cat4=59&fct=&order=reco&lastcate=cat4&dsearch=&copyshot=&scrap=&degree=&portion=&time=&niresource=");
$i = 0;

foreach($data->find('li[class=common_sp_list_li]') as $element) {

    foreach($element->find('div[class=common_sp_thumb]') as $img) {
        /*        $img = str_replace('<div class="common_sp_thumb">','',$img);
                $img = str_replace('</div>','',$img);*/
        $img = str_replace('<img src="https://recipe1.ezmember.co.kr/img/icon_vod.png">','',$img);
        $img = str_replace ('<a href="/recipe', '<a target="_blank" href= "https://www.10000recipe.com/recipe', $img);
        $imgArray[$i] =  $img;
    }

    foreach($element->find('div[class=common_sp_caption_tit line2]') as $title) {
        $title = str_replace('<div class="common_sp_caption_tit line2">','',$title);
        $title = str_replace('</div>','',$title);
        $titleArray[$i] = $title;
        $i++;

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipe.css">
    <title>EasyHomeCafe-recipe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        //스크롤 바닥 감지
        window.onscroll = function(e) {
            //추가되는 임시 콘텐츠
            //window height + window scrollY 값이 document height보다 클 경우,
            if((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

                let recipe =
                    '<div class="card recipeCard" style="max-width: 98%; max-height: 300px;">\n' +
                    '                <div class="row no-gutters">\n' +
                    '                    <div class="col-md-3">\n' +
                    '                        <?php
                                                echo $imgArray[9];
                                                echo "</div>";
                                                echo "<div class=\"card-body\">";
                                                echo "<h2 class=\"recipeTitle\">$titleArray[9]</h2>";
                                                ?>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '<div class="card recipeCard" style="max-width: 98%; max-height: 300px;">\n' +
                    '                <div class="row no-gutters">\n' +
                    '                    <div class="col-md-3">\n' +
                    '                        <?php
                                                echo $imgArray[6];
                                                echo "</div>";
                                                echo "<div class=\"card-body\">";
                                                echo "<h2 class=\"recipeTitle\">$titleArray[6]</h2>";
                                                ?>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '<div class="card recipeCard" style="max-width: 98%; max-height: 300px;">\n' +
                    '                <div class="row no-gutters">\n' +
                    '                    <div class="col-md-3">\n' +
                    '                        <?php
                                                echo $imgArray[11];
                                                echo "</div>";
                                                echo "<div class=\"card-body\">";
                                                echo "<h2 class=\"recipeTitle\">$titleArray[11]</h2>";
                                                ?>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '<div class="card recipeCard" style="max-width: 98%; max-height: 300px;">\n' +
                    '                <div class="row no-gutters">\n' +
                    '                    <div class="col-md-3">\n' +
                    '                        <?php
                                                echo $imgArray[12];
                                                echo "</div>";
                                                echo "<div class=\"card-body\">";
                                                echo "<h2 class=\"recipeTitle\">$titleArray[12]</h2>";
                                                ?>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '<div class="card recipeCard" style="max-width: 98%; max-height: 300px;">\n' +
                    '                <div class="row no-gutters">\n' +
                    '                    <div class="col-md-3">\n' +
                    '                        <?php
                                                echo $imgArray[1];
                                                echo "</div>";
                                                echo "<div class=\"card-body\">";
                                                echo "<h2 class=\"recipeTitle\">$titleArray[1]</h2>";
                                                ?>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>';
               //실행할 로직 (콘텐츠 추가)
                //article에 추가되는 콘텐츠를 append
                $('main').append(recipe);
            }
        };
    </script>
</head>
<body>
<main>
    <ul class="recipes">
        <div class="card recipeCard" style="max-width: 98%; max-height: 300px;">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <?php echo $imgArray[1]?>
                </div>
                <div class="card-body">
                    <h2 class="recipeTitle"><?php echo $titleArray[1]?></h2>
                </div>
            </div>
        </div>
        <div class="card recipeCard" style="max-width: 98%; max-height: 300px;">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <?php echo $imgArray[3]?>
                </div>
                <div class="card-body">
                    <h2 class="recipeTitle"><?php echo $titleArray[3]?></h2>
                </div>
            </div>
        </div>
    </ul>
    <div class="card recipeCard" style="max-width: 98%; max-height: 300px;">
        <div class="row no-gutters">
            <div class="col-md-3">
                <?php echo $imgArray[4]?>
            </div>
            <div class="card-body">
                <h2 class="recipeTitle"><?php echo $titleArray[4]?></h2>
            </div>
        </div>
    </div>
    <div class="card recipeCard" style="max-width: 98%; max-height: 300px;">
        <div class="row no-gutters">
            <div class="col-md-3">
                <?php echo $imgArray[5]?>
            </div>
            <div class="card-body">
                <h2 class="recipeTitle"><?php echo $titleArray[5]?></h2>
            </div>
        </div>
    </div>
    <div class="card recipeCard" style="max-width: 98%; max-height: 300px;">
        <div class="row no-gutters">
            <div class="col-md-3">
                <?php echo $imgArray[6]?>
            </div>
            <div class="card-body">
                <h2 class="recipeTitle"><?php echo $titleArray[6]?></h2>
            </div>
        </div>
    </div>
    <div class="card recipeCard" style="max-width: 98%; max-height: 300px;">
        <div class="row no-gutters">
            <div class="col-md-3">
                <?php echo $imgArray[8]?>
            </div>
            <div class="card-body">
                <h2 class="recipeTitle"><?php echo $titleArray[8]?></h2>
            </div>
        </div>
    </div>
    </ul>
</main>
<!--<script type="text/javascript" src="infinite.js"></script>-->
</body>
</html>