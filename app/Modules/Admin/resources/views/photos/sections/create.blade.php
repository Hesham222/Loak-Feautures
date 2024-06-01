<x-admin::layout>
 <x-slot name="pageTitle">Sections | Create</x-slot name="pageTitle">
 @section('photos-active', 'm-menu__item--active m-menu__item--open')
 @section('photos-create-active', 'm-menu__item--active')
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
                Sections
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
                  Create
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="table-responsive">
                <section class="content">
                  <form method="POST" action="{{route('admins.photo.section.store')}}" enctype="multipart/form-data"
                        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                      @csrf
                      <div class="m-portlet__body">
                          <div class="form-group m-form__group row">
                              <input hidden name="photo_id" value="{{$record_id}}">
                              <div class="col-lg-6">
                                  <label>Section Types:</label>
                                  <select name="section_type_id" id="section_type_id" required=""
                                          class="form-control m-input m-input--square"
                                          >
                                      <option value="">-- please choose section type --</option>
                                      @foreach($sectionTypes as $sectionType)
                                          <option @if(old('section_type_id')== $sectionType->id) selected @endif
                                          value="{{ $sectionType->id }}">{{ $sectionType->name }}
                                          </option>
                                      @endforeach
                                  </select>
                                  @error('section_type_id')
                                  <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div id="appendOptions" class="col-lg-6">
                                  @include('Admin::photos.sections.append_options')
                              </div>

                          </div>
                          <div class="form-group m-form__group row">
                              <div class="col-lg-6">
                                  <label> Section Name:</label>
                                  <input
                                      type="text"
                                      value="{{old('name')}}"
                                      name="name"
                                      required=""
                                      class="form-control m-input"
                                      placeholder="Name..." />
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-lg-6">
                                  <label> Section Order:</label>
                                  <input
                                      type="number"
                                      value="{{old('order')}}"
                                      name="order"
                                      required=""
                                      class="form-control m-input"
                                       />
                                  @error('order')
                                  <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                      <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                          <div class="m-form__actions m-form__actions--solid">
                              <div class="row">
                                  <div class="col-lg-6"></div>
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
      <script>
          $('#section_type_id').change(function(){
              var section_type_id = $(this).val();
              //console.log(section_type_id)

              $.ajax({
                  type:'get',
                  url:'{{route('admins.photo.append.options')}}',
                  data:{
                      "_token": "{{ csrf_token() }}",
                      section_type_id:section_type_id,
                  },

                  success:function(resp){
                      $("#appendOptions").html(resp);

                  },error:function(){
                      alert('Error');
                  }
              });
          });
      </script>
  </x-slot>

  </x-admin::layout>
