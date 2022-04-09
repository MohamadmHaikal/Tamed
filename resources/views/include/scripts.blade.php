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
        deletemodal1:"{{__('backend.Are you sure ?')}}",
        deletemodal2:"{{__('backend.You wont be able to revert this!')}}",
        cancle:"{{__('backend.Cancel')}}",
        confirm:"{{__('backend.confirm')}}",
        deleted:"{{__('backend.Deleted!')}}",
        success:"{{__('backend.file has been deleted successfully.')}}",
        continue:"{{__('backend.continue')}}",
        nameOfProject:"{{__('backend.name of project')}}", 
        description:"{{__('backend.description')}}",
        startingFrom:"{{__('backend.Starting From')}}",
        endingIn:"{{__('backend.Ending In')}}",
        projectDetails:"{{__('backend.Project details')}}",

    };
</script>
<!-- Stack array for including inline js or scripts -->
@stack('plugin-scripts')

@stack('custom-scripts')
