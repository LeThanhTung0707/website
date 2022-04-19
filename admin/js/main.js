function opennav(x) {
    var test=x.querySelector(".sub-nav");
    if(test.getAttribute('class')=='sub-nav') {
        test.setAttribute('class','sub-nav open');
    } else
    {
        test.setAttribute('class','sub-nav');
    }
}

function closenav() {
    var ele = document.querySelector(".app");
    
    if( ele.getAttribute('class')=='app') {
        ele.setAttribute('class','app is-collased')
    } else ele.setAttribute('class','app')
}