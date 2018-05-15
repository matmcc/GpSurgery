<!-- $bookable passed automatically by View Composer; $name, $admin_id passed in as option -->
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text"
              id="selectBookable_preText">
            @if(isset($prepend)) {{ $prepend }}
            @else Book:
            @endif
        </span>
    </div>
    <select name="{{ $name or "selectBookable" }}" class="form-control" id="{{ $id or "selectBookable_id" }}" required>
        <option value="" disabled selected>Select a Dr or Nurse</option>
        @foreach($bookable as $person)
            <option
                    @isset ($admin_id) @if ($person->id == $admin_id) {{ 'selected="selected"' }} @endif @endisset
                    value="{{$person->id}}"
                    style="color: {{ $person->color }}">
                {{ $person->job_title ." ". $person->name }}
            </option>
        @endforeach
    </select>
    @isset($button)
        <div class="input-group-append">
                <button class="d-none d-sm-block btn btn-success" type="submit">{{ $button }}</button>
                <button class="d-block d-sm-none btn btn-success" type="submit"><i class="fa fa-plus" style="color: white"></i></button>
        </div>
    @endisset
    <input type="hidden" name="{{ $name or "selectBookable" }}_hidden"
           id="{{ $name or "selectBookable" }}_hiddenId" value=""/>
</div>

@section('script')
<script>
    $(function () {
        $("#{{ $id or "selectBookable_id" }}").on('change', function() {
            var data = {
            'admin_id': $(this).val()
            };
            console.log(data);
            $("#{{ $name or "selectBookable" }}_hiddenId").val(data.admin_id);
        });
    });
</script>
    @parent
@endsection