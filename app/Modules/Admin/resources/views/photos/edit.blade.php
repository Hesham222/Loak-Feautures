<x-admin::layout>
 <x-slot name="pageTitle">Photos | Edit</x-slot name="pageTitle">
 @section('photos-active', 'm-menu__item--active m-menu__item--open')
  <x-slot name="style">
  <!-- Some styles -->
  <style>
        .invalid-feedback {
            display: block;
        }
    </style>
  </x-slot>
    <!-- Start page content -->
      <div class="m-subheader ">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Photos
            </h3>
          </div>
        </div>
      </div>
      <div class="m-content">
        <div style="display: none;" class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
          <div class="m-alert__icon">
            <i class="flaticon-exclamation m--font-brand">
            </i>
          </div>
        </div>
        <div class="m-portlet m-portlet--mobile">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Edit
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="table-responsive">
                <section class="content">
                  <form method="POST" action="{{route('admins.photo.update', $record->id)}}" enctype="multipart/form-data"
                        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                      @csrf
                      @method('put')
                      <div class="m-portlet__body">
                          <div class="form-group m-form__group row">
                              <div class="col-lg-6">
                                  <label>Photo Category:</label>

                                  <select name="photo_category_id" required=""
                                          class="form-control m-input m-input--square"
                                          id="exampleSelect1">
                                      @foreach($photo_categories as $photo_category)
                                          <option @if(old('photo_category_id')== $photo_category->id || $photo_category->id==$record->photo_category_id) selected @endif
                                          value="{{ $photo_category->id }}">{{ $photo_category->name }}
                                          </option>
                                      @endforeach
                                  </select>
                                  @error('photo_category_id')
                                  <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-lg-6">
                                  <label>Image:</label>
                                  <input
                                      type="file"
                                      name="image"
                                      class="form-control m-input"
                                  />
                                  @if($record->image)
                                      @if(pathinfo($record->image, PATHINFO_EXTENSION) == 'mp4')
                                          <a target="_blank" href="{{asset('storage'.DS().$record->image)}}">View video</a>
                                          <input type="hidden" disabled name="mb4" value="{{ $record->image}}">
                                      @else
                                          @if(filter_var($record->image, FILTER_VALIDATE_URL))
                                              <img src="{{ $record->image }}" alt="image-not-uploaded" width="100">
                                          @else
                                              <img src="{{asset('storage'.DS().$record->image)}}" alt="image-not-uploaded" width="100">
                                          @endif
                                      @endif
                                  @endif
                                  @error('image')
                                  <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                      <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                          <div class="m-form__actions m-form__actions--solid">
                              <div class="row">
                                  <div class="col-lg-6">
                                  </div>
                                  <div class="col-lg-6 m--align-right">
                                      <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                </section>
            </div>
          </div>
        </div>
      </div>
    <!-- end page content -->

  <x-slot name="scripts">
    <!-- Some JS -->
  </x-slot>
  </x-admin::layout>
