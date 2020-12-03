function toggleMenu() {
    let btn = $('.link-btn-mobile');
    let nav = $('.nav-mobile');

    if (btn.hasClass('open')) {
        btn.removeClass('open');
        btn.css({ 'color': '#0095d9' });
        nav.animate({ height: '0' }, 200);
    } else {
        btn.addClass('open');
        btn.css({ 'color': '#055076' });
        nav.animate({ height: '45px' }, 400);
    }
}

$(document).ready(() => {
    $(".termos input[type=radio]").change(() => {
        let wrapper = $(".termos.custom-radio");
        if(wrapper.hasClass("erro_bg")) {
            wrapper.removeClass("erro_bg");
        }
    })
    $(".dias input[type=checkbox]").change(() => {
        let wrapper = $(".dias.custom-checkbox");
        if(wrapper.hasClass("erro_bg")) {
            wrapper.removeClass("erro_bg");
        }
    })
});
