$(function () {
    const language = $('#language').val(),
        app_url = $('#app_url').val(),
        submit_button = document.getElementById("kt_ecommerce_edit_submit"),
        cancel_button = document.getElementById("kt_ecommerce_edit_product_cancel"),
        add_form = $("#kt_ecommerce_edit_form");

    $(document).ready(function () {
        submit();
        date_picker();
        cancel();
        repeater();
        auto_calculate_age($(".auto_date"), $(".auto_age"), $("#date_of_birth_error"));
        auto_calculate_age_repeater($(".form_two_auto_date"), $(".form_two_auto_age"), $("#form_two_date_of_birth_error"));
    });

    function auto_calculate_age(input_calender, input_age, span_error_date) {
        input_age.prop('disabled', true);
        input_calender.on('change', function () {
            const dob = new Date($(this).val()),
                today = new Date();
            let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            if (age < 1)
                span_error_date.html(language === "en" ? "Enter valid date date of birth" : "أدخل تاريخ ميلاد صحيح");
            else {
                span_error_date.html("");
                input_age.val(age)
            }
        });
    }

    function auto_calculate_age_repeater(input_calender, input_age, span_error_date) {
        input_age.prop('disabled', true);
        input_calender.on('change', function () {
            console.log($(".form_two_auto_date"))
            let index = input_calender.attr("name").replace("kt_docs_repeater_advanced[", "");
            index = input_calender.attr("name").replace("][form_two_date_of_birth]", "");
            index = parseInt(index);
            console.log($(this).index())
            $('#kt_docs_repeater_advanced').children().eq(index);
            console.log($('#kt_docs_repeater_advanced').children().eq(index))
            const dob = new Date($(this).val()),
                today = new Date();
            let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            if (age < 1)
                span_error_date.html(language === "en" ? "Enter valid date date of birth" : "أدخل تاريخ ميلاد صحيح");
            else {
                span_error_date.html("");
                input_age.val(age)
            }
        });
    }

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

    function submit() {
        $("#my_form").submit(function (e) {
            e.preventDefault();
            var action_url = e.currentTarget.action;
            $.ajax({
                url: action_url,
                type: 'post',
                dataType: 'application/json',
                data: $("#my_form").serialize(),
                success: function (response) {
                    let data = JSON.parse(response.responseText);
                    console.log(data)
                    if ($.isEmptyObject(data.error)) {
                        success_submit();
                    } else {
                        failed_submit(data.error);
                    }
                },
                error: function (response) {
                    let data = JSON.parse(response.responseText);
                    if ($.isEmptyObject(data.error)) {
                        success_submit();
                    } else {
                        failed_submit(data.error);
                    }
                }

            });

        });
    }

    function print_error(errors) {
        $.each(errors, function (index, val) {
            $("#" + index + "_error").html(val);
            $("#" + index).focus();
        });
    }

    function cancel() {
        cancel_button.addEventListener("click", (t => {
            add_form.attr("data-kt-redirect", app_url + "/admin/form_one");
            t.preventDefault(), Swal.fire({
                text: language === "en" ? "Are you sure you would like to cancel?" : "هل أنت متأكد أنك تريد الإلغاء؟",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: language === "en" ? "Yes, cancel it!" : "نعم ، قم بالإلغاء!",
                cancelButtonText: language === "en" ? "No, return" : "لا تراجع",
                customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
            }).then((function (t) {
                t.value ? window.location = add_form.attr("data-kt-redirect") : "cancel" === t.dismiss && Swal.fire({
                    text: language === "en" ? "Your form has not been cancelled!." : "لم يتم إلغاء النموذج الخاص بك !.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                    customClass: {confirmButton: "btn btn-primary"}
                })
            }))
        }))
    }

    function success_submit(id) {
        //Success Submit
        $(".errors").html("");
        add_form.attr("data-kt-redirect", app_url + "/admin/places");
        (submit_button.setAttribute("data-kt-indicator", "on"), submit_button.disabled = !0, setTimeout((function () {
            submit_button.removeAttribute("data-kt-indicator"), Swal.fire({
                text: language === "en" ? "Form has been successfully submitted!" : "تم تقديم النموذج بنجاح!",
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                customClass: {confirmButton: "btn btn-primary"}
            }).then((function (e) {
                e.isConfirmed && (submit_button.disabled = !1, window.location = add_form.attr("data-kt-redirect"))
            }))
            submit_button.disabled = !1
        }), 1000));//2e3 == 1000
    }

    function failed_submit(errors) {
        //Failed Submit
        $(".errors").html("");
        (submit_button.setAttribute("data-kt-indicator", "on"), submit_button.disabled = !0, setTimeout((function () {
            submit_button.removeAttribute("data-kt-indicator"), Swal.fire({
                text: language === "en" ? "Sorry, looks like there are some errors detected, please try again." : "معذرة ، يبدو أنه تم اكتشاف بعض الأخطاء ، يرجى المحاولة مرة أخرى.",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: language === "en" ? "Ok, got it!" : "حسنًا ، فهمت!",
                customClass: {confirmButton: "btn btn-primary"}
            })
            submit_button.disabled = !1
            print_error(errors);
        }), 1000));
    }
});
