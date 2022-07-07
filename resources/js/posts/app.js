require('./../header/variables')

$(function() {
    $(document).on('click', function(e) {
        if(!$(e.target).closest('.article_show_config_btn').length) {
            $('.article_show_config_menu').removeClass('is-active')
        } else {
            $('.article_show_config_menu').toggleClass('is-active')
        }
    })
})
