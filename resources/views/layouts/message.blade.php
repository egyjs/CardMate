@if (session('success'))
<script type="text/javascript">
    $(document).ready(function(){
        $.notify({
            type: 'success',
            title: "Success!",
            message: "{{ display(session('success')) }}"
        });
    });
</script>
@endif

@if (session('alert'))
    <script type="text/javascript">
        $(document).ready(function(){
            $.notify({
                allow_dismiss: true,
                title: "Sorry!",
                message: "{{ display(session('alert')) }}"
            },{
                type: 'danger'
            });
        });
    </script>
@endif



