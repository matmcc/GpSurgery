@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" />

@stop

<!-- TODO: Something in the naming is stopping the callback working  -->
@section('datetime')

        <div class={{ $format or ""}}>
            <div class="form-group">
                <label for="{{ 'datetimepicker-'.$name }}">{{ title_case($name) }}</label>
                <div class="input-group date" id="{{ 'datetimepicker-'.$name }}" data-target-input="nearest">
                    <input type="text" id="{{ 'datetimepicker-'.$name }}" class="form-control datetimepicker-input" data-target="{{ '#datetimepicker-'.$name }}"/>
                    <div class="input-group-append" data-target="{{ '#datetimepicker-'.$name }}" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

    @parent
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('{{ "#datetimepicker-$name" }}').datetimepicker({
                daysOfWeekDisabled: [0, 6],
                disabledTimeIntervals: [[moment({ h: 0 }), moment({ h: 8 })], [moment({ h: 18 }), moment({ h: 24 })]]

            });
        });
    </script>
    @parent
@stop