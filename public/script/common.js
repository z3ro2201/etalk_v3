const scrollDiv  = document.querySelector('#container');
const headerDiv  = document.querySelector('#_apps_etalk_header');
const hamBtn     = document.querySelector('.hambuger a');
const naviDiv    = document.querySelector('#_apps_etalk_navigator');
const contDiv    = document.querySelector('#_apps_etalk_main');
const uAgent     = navigator.userAgent.toLowerCase();
let   lastScroll = 0;
let   scale      = 12;
function zoomin() {
    if(scale>=20) return false;
    scale += 1.2;
    zoom();
}
function zoomout() {
    if(scale<= 12) return false;
    scale -= 1.2;
    zoom();
}
function zoom() {
    contDiv.style.fontSize = scale + "pt";
}
function hambuger(){
    if(naviDiv.style.display !== 'block')
    {
        hamBtn.classList.add('active');
        scrollDiv.style.overflow = 'hidden';
        naviDiv.style.display = 'block';
    } else {
        hamBtn.classList.remove('active');
        scrollDiv.style.overflow = 'auto';
        naviDiv.style.display = 'none'
    }
}
function checkSurvey() {
    if(document.querySelector('input[name=covid_survey_q1]:checked')?.value == undefined) {
        alert('체크리스트 1번 문항을 응답해주세요.');
        return false;
    }
    if(document.querySelector('input[name=covid_survey_q2]:checked')?.value == undefined) {
        alert('체크리스트 2번 문항을 응답해주세요.');
        return false;
    }
    if(document.querySelector('input[name=covid_survey_q3]:checked')?.value == undefined) {
        alert('체크리스트 3번 문항을 응답해주세요.');
        return false;
    }
    console.log(document.querySelector('input[name=covid_survey_q3]:checked')?.value);
    return false;
}
contDiv.addEventListener('scroll', function() {
    if(this.scrollTop <= -10)
    {
        headerDiv.classList.remove('scroll');
        contDiv.classList.remove('scroll');
        naviDiv.classList.remove('scroll');
    }
})
scrollDiv.addEventListener('scroll', function() {
    let scrollTop = scrollDiv.scrollTop;
    let contentTop = contDiv.scrollTop;
    
    if (/Mobi|Android/i.test(navigator.userAgent)) {
        if(scrollTop >= 40 || contentTop >= 40)
        {
            if((scrollTop > lastScroll) && (lastScroll > 0) || (contDiv.scrollTop > lastScroll) && (lastScroll > 0))
            {
                contDiv.scrollTo(0,10);
                scrollDiv.classList.add('full');
                headerDiv.classList.add('scroll');
                contDiv.classList.add('scroll');
                naviDiv.classList.add('scroll');
            }
            else {
                naviDiv.classList.remove('scroll');
                scrollDiv.classList.remove('full');
                headerDiv.classList.remove('scroll');
                contDiv.classList.remove('scroll');
            }
            lastScroll =  scrollTop;
        }
        if(this.scrollTop <= 0) {
            scrollDiv.classList.remove('full');
            headerDiv.classList.remove('scroll');
            contDiv.classList.remove('scroll');
            naviDiv.classList.remove('scroll');
        }
    }
}, false);