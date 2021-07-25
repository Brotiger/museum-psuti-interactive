<script>
    $(document).ready(function(){
        $('#listTable').delegate('.recordRow', 'click', function(){
            let recordId = $(this).attr('record-id')
            window.location.href = "{{ route($moreType, ['name' => $name]) }}" + "/" + recordId;
            //window.location.href = window.location.href.split('?')[0] + '/more/' + recordId;
        });

        $('#resetButton').on('click', function(){
            $("[filter-field]").each(function(){
                $(this).attr("value", '');
            });
        });
    });
</script>