$(document).ready(function(){
    $('.hamburger').click(function(){
        $(this).toggleClass('is-active');
    });
    var sticky = document.querySelector('.sticky');

    if (sticky.style.position !== 'sticky') {
        var stickyTop = sticky.offsetTop;

        document.addEventListener('scroll', function () {
            window.scrollY >= stickyTop ?
                sticky.classList.add('fixed') :
                sticky.classList.remove('fixed');
        });
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
});