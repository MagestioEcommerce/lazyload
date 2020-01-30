define([
    'jquery',
    'Magestio_LazyLoad/js/jquery.lazyload'
], function($){

    return function (options) {
        $(function () {
            $("img.lazy").lazyload();

            $("img.lazy").one("appear", function() {
                $(this).removeClass('swatch-option-loading')
            });
        });
    };
});