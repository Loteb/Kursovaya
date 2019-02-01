new Vue({
    el: '#vue-header-js , #vue-main-js',
    data: {},
    methods: {
        restore_main() {
            $('.swiper-container').show();
            $('.steam_option').show();
            $('.info').show();
        },
        clear_main() {
            $('.swiper-container').hide();
            $('.steam_option').hide();
            $('.info').hide();
        },
        show_account(){
            $('.account').show();
        },
        hide_account(){
            $('.account').hide();
        },
        show_statistic(){
            $('.statistic').show();
        },
        hide_statistic(){
            $('.statistic').hide();
        }
    }
});