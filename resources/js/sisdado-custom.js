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