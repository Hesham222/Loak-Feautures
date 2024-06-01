
<table>
    @if(isset($options))
        @foreach ($options as $option)
    <thead>
        <th>{{$option->type}}</th>
    </thead>
    <tbody>
        <tr>
            @if($option -> type == 'image')

            <td>
                <input name="attachment[]" required id="attachment[]" type="file">
            </td>
            @else
                <td>
                    <input
                        type="text"
                        name="text[]"
                        required
                        class="form-control m-input"
                        placeholder="ادخل النص..." />
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                    @enderror
                </td>

            @endif

        </tr>
    </tbody>
    @endforeach

    @endif
</table>

