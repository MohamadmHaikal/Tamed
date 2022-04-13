<script src="{{ mix('assets/js/all.js') }}"></script>
<script>
    window.translations = {
        show: "{{ __('backend.Show') }}",
        entries: "{{ __('backend.entries') }}",
        Search: "{{ __('backend.Search:') }}",
        Showing: "{{ __('backend.Showing') }}",
        NoData: "{{ __('backend.No data available in table') }}",
        to: "{{ __('backend.to') }}",
        nameOfItem: "{{ __('backend.name of Item') }}",
        of: "{{ __('backend.of') }}",
        noRecord: "{{ __('backend.No matching records found') }}",
        deletemodal1: "{{ __('backend.Are you sure ?') }}",
        deletemodal2: "{{ __('backend.You wont be able to revert this!') }}",
        cancle: "{{ __('backend.Cancel') }}",
        confirm: "{{ __('backend.confirm') }}",
        deleted: "{{ __('backend.Deleted!') }}",
        success: "{{ __('backend.file has been deleted successfully.') }}",
        continue: "{{ __('backend.continue') }}",
        nameOfProject: "{{ __('backend.name of project') }}",
        description: "{{ __('backend.description') }}",
        startingFrom: "{{ __('backend.Starting From') }}",
        endingIn: "{{ __('backend.Ending In') }}",
        email: "{{ __('backend.email') }}",
        projectDetails: "{{ __('backend.Project details') }}",

    };
    window.translation = {
        deletemodal1: "{{ __('backend.Are you sure ?') }}",
        deletemodal2: "{{ __('backend.You wont be able to revert this!') }}",
        cancle: "{{ __('backend.Cancel') }}",
        confirm: "{{ __('backend.confirm') }}",
        deleted: "{{ __('backend.Deleted!') }}",
        success: "{{ __('backend.file has been deleted successfully.') }}",
        continue: "{{ __('backend.continue') }}",
        userInfo: "{{ __('backend.userInfo') }}",
        email: "{{ __('backend.email') }}",
        userName: "{{ __('backend.name') }}",
        phone: "{{ __('backend.phone') }}",
        UserType: "{{ __('backend.UserType') }}",
        nameactivities: "{{ __('backend.name of activities') }}",
        save: "{{ __('backend.save') }}",
        QuotesDetails: "{{ __('backend.QuotesDetails') }}",
        Accepttheoffer:"{{ __('backend.Accept the offer') }}",
        offerrejected:"{{ __('backend.offer rejected') }}",
        Refundetails:"{{ __('backend.Refund request details') }}",
        amount:"{{ __('backend.the amount') }}",
        beneficiary:"{{ __('backend.beneficiary') }}",
        Createdat:"{{ __('backend.Created at') }}",
        Membership:"{{ __('backend.Membership No') }}",
        IBAN:"{{ __('backend.Account number IBAN') }}",




    };
</script>
<!-- Stack array for including inline js or scripts -->
@stack('plugin-scripts')

@stack('custom-scripts')
