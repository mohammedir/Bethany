"language": {
"sInfo":"{{ trans('lang.text_data_tables_showing') }} START {{ trans('lang.text_data_tables_to') }} END {{ trans('lang.text_data_tables_from') }} TOTAL {{ trans('lang.text_data_tables_records') }}",
"lengthMenu": " MENU {{ trans('lang.text_data_tables_records') }} ",
"sEmptyTable":"{{ trans('lang.text_data_tables_no_data') }}",
"sLoadingRecords":"{{ trans('lang.text_data_tables_loading') }}",
"sProcessing":"{{ trans('lang.text_data_tables_processing') }}",
"sSearch":"{{ trans('lang.text_data_tables_search') }}",
"sZeroRecords":"{{ trans('lang.text_data_tables_no_result_match') }}",
"sSearchPlaceholder":"{{ trans('lang.text_data_tables_no_search_placeholder') }}",
"sInfoFiltered":"({{ trans('lang.text_data_tables_search_within') }} MAX {{ trans('lang.text_data_tables_total_records') }})",
"sInfoEmpty":"{{ trans('lang.text_data_tables_showing') }} 0 {{ trans('lang.text_data_tables_to') }} 0 {{ trans('lang.text_data_tables_from') }} 0 {{ trans('lang.text_data_tables_records') }}",
"paginate": {
{{--"previous": '<i class="fa fa-angle-right"></i>',--}}
{{--"next": '<i class="fa fa-angle-left"></i>'--}}
"previous": '{!! __('lang.text_prev_arrow') !!}',
"next": '{!! __('lang.text_next_arrow') !!}'
}
},
