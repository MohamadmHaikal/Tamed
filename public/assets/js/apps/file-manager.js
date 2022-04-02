(function ($) {
    "use strict";
    $(function () {
        $('.search .search-full input').on('input', function () {
            var rex = new RegExp($(this).val(), 'i');
            console.log(rex);
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#pdf').on('click', function () {

            var rex = /pdf/i;
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#doc').on('click', function () {

            var rex = /docx/i;
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#xlsx').on('click', function () {

            var rex = /xlsx/i;
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#all').on('click', function () {
            $('.file-t-content tbody tr').show();
        });
        $('#addFolder').on('click', function (event) {
            event.preventDefault();
            $('#addFolderModal').modal('show');
        });
        var fileManagerToggle;
        $('#fileManagerHistory').on('click', function (event) {
            fileManagerToggle = !fileManagerToggle;
            event.preventDefault();
            if (fileManagerToggle) {
                $('.file-manager-bottom-history').show();
                $('.file-manager-bottom-default').hide();
            } else {
                $('.file-manager-bottom-history').hide();
                $('.file-manager-bottom-default').show();
            }
        });
    })
})(jQuery);
