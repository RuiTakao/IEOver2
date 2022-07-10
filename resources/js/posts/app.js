require('./../header/variables')

$(function() {
    $(document).on('click', function(e) {
        if(!$(e.target).closest('.article_config_btn').length) {
            $('.article_config_menu').removeClass('is-active')
        } else {
            $('.article_config_menu').toggleClass('is-active')
        }
    })
})
