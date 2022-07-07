$(function() {
    $(document).on('click', function(e) {
        if(!$(e.target).closest('.profile_icon').length) {
            $('.header_auth_link_menu').removeClass('is-active')
        } else {
            $('.header_auth_link_menu').toggleClass('is-active')
        }
    })
})
