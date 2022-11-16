$(function () {
    $(document).ready(function () {
        $("input").prop('disabled', true);
        $("textarea").prop('disabled', true);
        $("select").prop('disabled', true);
        $("input").css("color","#000")
        $("textarea").css("color","#000")

        date_picker();
        repeater();
    });
    function repeater() {
        $('#kt_docs_repeater_advanced').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },
            show: function () {
                $(this).slideDown();
                $(this).find('[data-kt-repeater="select2"]').select2();
                $(this).find('[data-kt-repeater="datepicker"]').flatpickr();
                new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
            },
            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            },
            ready: function () {
                $('[data-kt-repeater="select2"]').select2();
                $('[data-kt-repeater="datepicker"]').flatpickr();
                new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
            }
        });
        /*document.querySelectorAll('[data-kt-ecommerce-catalog-add-product="product_option"]').forEach((e => {
            $(e).hasClass("select2-hidden-accessible") || $(e).select2({minimumResultsForSearch: -1})
        }))*/
    }

    function date_picker() {
        $(".from_date").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"), 10)
            }, function (start, end, label) {
                /*var years = moment().diff(start, "years");
                alert("You are " + years + " years old!");*/
            }
        );
    }
});
