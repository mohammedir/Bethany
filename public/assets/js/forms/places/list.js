$(function () {
    const table = $('#kt_ecommerce_forms_table'),
        language = $('#language').val(),
        app_url = $('#app_url').val(),
        filter_class = $(".filter_data");
    let id = 0, core_name = "";
    $(document).ready(function () {
        "use strict";
        get_forms();
        /*Table Actions*/
        table_function();
        date_picker();
        repeater();
    });

    function table_function() {
        form_status();
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

    function form_status() {
        $(document).on('click', '#message_status', function () {
            let id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: app_url + "/admin/form_one/status/" + id,
                success: function (response) {
                    if (response['success']) {
                        Swal.fire({
                            text: "You have change order status!.",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {confirmButton: "btn fw-bold btn-primary"}
                        });
                        id = "";
                        table.DataTable().ajax.reload();
                    } else if (response['error']) {
                        Swal.fire({
                            text: "The order status was not change.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {confirmButton: "btn fw-bold btn-primary"}
                        });
                        id = "";
                    }
                }
            });
        });
    }

    function get_forms() {
        var KTAppEcommerceCategories = function () {
            var t, e, n = () => {
                t.querySelectorAll('[data-kt-ecommerce-forms-filter="delete_row"]').forEach((t => {
                    t.addEventListener("click", (function (t) {
                        t.preventDefault();
                        const n = t.target.closest("tr"),
                            o = n.querySelector('[data-kt-ecommerce-forms-filter="forms_name"]').innerText;
                        Swal.fire({
                            text: "Are you sure you want to delete " + o + "?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then((function (t) {
                            t.value ? Swal.fire({
                                text: "You have deleted " + o + "!.",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn fw-bold btn-primary"}
                            }).then((function () {
                                e.row($(n)).remove().draw()
                            })) : "cancel" === t.dismiss && Swal.fire({
                                text: o + " was not deleted.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn fw-bold btn-primary"}
                            })
                        }))
                    }))
                }))
            };
            return {
                init: function () {
                    (t = document.querySelector("#kt_ecommerce_forms_table")) && ((e = $(t).DataTable({
                        searchable: true,
                        ajax: {
                            "url": app_url + "/admin/places",
                            "type": 'GET',
                            /*"data":{core_name:core_name},*/
                        },
                        columns: [
                            {
                                data: 'id',
                                name: 'id',
                            },
                            {
                                data: 'full_name',
                                name: 'full_name',
                            },
                            {
                                data: 'added_by',
                                name: 'added_by',
                            },{
                                data: 'QRCode',
                                name: 'QRCode',
                            },{
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ],
                    })).on("draw", (function () {
                        n()
                    })), document.querySelector('[data-kt-ecommerce-forms-filter="search"]').addEventListener("keyup", (function (t) {
                        e.search(t.target.value).draw()
                    })),/* filter_class.click(function () {
                        $("<option></option>").insertBefore($('.filter_data option:first-child'));
                        filter_class.val("")
                        e.search("").draw()
                        $("option:selected").prop("selected", false)
                    }),*/ $("#reset").click(function () {
                        $("#search").val("");
                        $("<option></option>").insertBefore($('.filter_data option:first-child'));
                        filter_class.val("")
                        e.search("").draw()
                        $("option:selected").prop("selected", false)
                    }), filter_class.on("change", function () {
                        core_name = $(this).val();
                        e.search(core_name.trim()).draw()
                    }), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function () {
            KTAppEcommerceCategories.init()
        }));
    }
});
