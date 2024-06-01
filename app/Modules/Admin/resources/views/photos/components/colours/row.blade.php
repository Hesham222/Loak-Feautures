            <tr>
                <td>
                    <input
                        type="color"
                        value="{{old('colour')}}"
                        name="colour[]"
                        required=""
                        class="form-control m-input"
                        placeholder="Color..." />
                    @error('colour')
                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                    @enderror
                </td>
                <td>
                    <a
                        title="Remove the row"
                        class="btn btn-sm btn-danger"
                        onclick="DeleteVendorRowTable(this)">
                        <i class="fa fa-times" style="color: #fff"></i>
                    </a>
                </td>
            </tr>

