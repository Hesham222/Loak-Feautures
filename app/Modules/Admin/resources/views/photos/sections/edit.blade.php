<x-admin::layout>
 <x-slot name="pageTitle">Sections | Edit</x-slot name="pageTitle">
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
                  Edit {{ $record->name }}
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="table-responsive">
                <section class="content">
                  <form method="POST" action="{{route('admins.photo.update.section', $record->id)}}" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                      @csrf
                      @method('post')
                      <div class="m-portlet__body">
                          <div class="form-group m-form__group row">
                              <div class="col-lg-6">
                                  <label>Section Type:</label>
                                  <h4>{{ $record->PhotoSectionType->name }}</h4>
                              </div>
                          </div>
                          <div class="form-group m-form__group row">
                                  @foreach($record->SectionValues as $sectionValue)
                                      @if(!is_null($sectionValue->text))
                                      <div class="col-lg-4">
                                          <input
                                              type="text"
                                              name="text-{{$sectionValue->id}}"
                                              value="{{$sectionValue->text}}"
                                              class="form-control m-input"
                                              placeholder="ادخل النص..." />
                                          @error('text')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                      </div>
                                      @endif
                                      @if(!is_null($sectionValue->image))
                                         <div class="col-lg-4">
                                           <input name="attachment-{{$sectionValue->id}}" type="file">
                                             @if(pathinfo($sectionValue->image, PATHINFO_EXTENSION) == 'pdf')
                                                 <a target="_blank" href="{{asset('storage'.DS().$sectionValue->image)}}">View pdf</a>
                                             @else
                                                 @if(filter_var($sectionValue->image, FILTER_VALIDATE_URL))
                                                     <img src="{{ $sectionValue->image }}" alt="image-not-uploaded" width="100">
                                                 @else
                                                     <img src="{{asset('storage'.DS().$sectionValue->image)}}" alt="image-not-uploaded" width="100">
                                                 @endif
                                             @endif
                                              @error('attachment')
                                              <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                              @enderror
                                         </div>
                                      @endif
                                  @endforeach
                              <br>
                          </div>
                          <div class="form-group m-form__group row">
                              <div class="col-lg-6">
                                  <label> Name:</label>
                                  <input
                                      type="text"
                                      value="{{old('name')?old('name'):$record->name}}"
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
                                      value="{{old('order')?old('order'):$record->order}}"
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
                                  <div class="col-lg-6">
                                  </div>
                                  <div class="col-lg-6 m--align-right">
                                      <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
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

  </x-slot>
  </x-admin::layout>
