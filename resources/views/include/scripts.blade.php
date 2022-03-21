<script src="{{ mix('assets/js/all.js') }}"></script>
<script>
    window.translations = {
        show:"{{__('backend.Show')}}" ,
        entries: "{{__('backend.entries')}}" ,
        Search: "{{__('backend.Search:')}}" ,
        Showing: "{{__('backend.Showing')}}" ,
        NoData: "{{__('backend.No data available in table')}}" ,
        to: "{{__('backend.to')}}" ,
        nameOfItem:"{{__('backend.name of Item')}}" ,
        of:"{{__('backend.of')}}" ,
        noRecord:"{{__('backend.No matching records found')}}" ,
       
    };
</script>
<!-- Stack array for including inline js or scripts -->
@stack('plugin-scripts')

@stack('custom-scripts')
