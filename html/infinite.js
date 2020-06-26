//스크롤 바닥 감지
window.onscroll = function(e) {
    //추가되는 임시 콘텐츠
    //window height + window scrollY 값이 document height보다 클 경우,
    if((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        //실행할 로직 (콘텐츠 추가)
        let recipe =
            '<div class="card recipeCard" style="max-width: 98%; max-height: 300px;">\n' +
            '                <div class="row no-gutters">\n' +
            '                    <div class="col-md-3">\n' +
            '                        <img src="image/icetea.jpg" class="cardimage" style="width: 350px; height: 300px;">\n' +
            '                    </div>\n' +
            '                    <div class="card-body">\n' +
            '                        <h2 class="recipeTitle">아이스티 만들기</h2>\n' +
            '                        <p class="card-text">준비물 : 물, 아이스티 가루</p>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>' +
            '<div class="card recipeCard" style="max-width: 98%; max-height: 300px;">\n' +
            '                <div class="row no-gutters">\n' +
            '                    <div class="col-md-3">\n' +
            '                        <img src="image/greentea.jpg" class="cardimage" style="width: 350px; height: 300px;">\n' +
            '                    </div>\n' +
            '                    <div class="card-body">\n' +
            '                        <h2 class="recipeTitle">녹차 만들기</h2>\n' +
            '                        <p class="card-text">준비물 : 물, 녹차잎</p>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>';
        //article에 추가되는 콘텐츠를 append
        $('main').append(recipe);
    }
};