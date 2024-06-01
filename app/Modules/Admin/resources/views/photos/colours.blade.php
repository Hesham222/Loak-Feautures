<x-admin::layout>
 <x-slot name="pageTitle">Colours | Create</x-slot name="pageTitle">
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
                Colours
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
                  Edit Colours to Photo {{$record->id}}
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="table-responsive">
                <section class="content">
                  <form method="POST" action="{{route('admins.photo.update.colour')}}" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                      @csrf
                      <div class="m-portlet__body">
                          <div class="form-group m-form__group row">
                              <input hidden name="record_id" value="{{$record->id}}">
                          </div>
                          <div class="form-group m-form__group row">
                              <div class="col-lg-12">
                                  <label class="">الجداول:</label><br>
                                  <table  width="100%" class="table table-striped- table-bordered table-hover table-checkable" id="ingredients-table">
                                      <col style="width:60%">
                                      <col style="width:20%">
                                      <thead>
                                      <tr>
                                          <th style="font-weight: bold;">Colour</th>
                                          <th style="font-weight: bold;">Delete</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @if(count($record->PhotoColours) >= 1)
                                          @foreach($record->PhotoColours as $value)
                                              <tr>
                                                  <td>
                                                      <input
                                                          type="color"
                                                          value="{{old('colour')?old('colour'):$value->colour}}"
                                                          name="colour[]"
                                                          required=""
                                                          class="form-control m-input"
                                                          placeholder="Color..." />
                                                  </td>
                                                  @if($value->colour)
                                                      <td>
                                                          <div style="background:{{$value->colour}};width:50px;height:50px;color:#fff"></div>
                                                      </td>
                                                  @else
                                                      <td>{{"No Colours Found"}}</td>
                                                  @endif

                                                  <td>
                                                      <a
                                                          title="Remove the row"
                                                          class="btn btn-sm btn-danger"
                                                          onclick="DeleteVendorRowTable(this)">
                                                          <i class="fa fa-times" style="color: #fff"></i>
                                                      </a>
                                                  </td>
                                              </tr>
                                          @endforeach
                                      @else
                                          <td>{{"No Colour Found"}}</td>

                                      @endif
                                      </tbody>
                                  </table>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <button type="button" class="btn btn-default " id="new_row"><i class="fa fa-plus"></i></button>
                                      </div>
                                  </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js" integrity="sha512-Dz4zO7p6MrF+VcOD6PUbA08hK1rv0hDv/wGuxSUjImaUYxRyK2gLC6eQWVqyDN9IM1X/kUA8zkykJS/gEVOd3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <!-- end page content -->
  <x-slot name="scripts">
      <script>
          function DeleteVendorRowTable(i)
          {
              if($('#ingredients-table tbody tr').length == 1)
              {
                  toastr.error('You can not delete all the colours.');
                  return;
              }
              var p=i.parentNode.parentNode;
              p.parentNode.removeChild(p);
          }
          $(document).on('click','#new_row',function(){


              $.ajax({
                  url: "<?php echo e(route('admins.photo.get.colour.row')); ?>",
                  success: function (data) {
                      $('#ingredients-table > tbody:last-child').append(data['data']['responseHTML']);
                      $(".vendor-id").selectpicker();
                  },

              });
          });

      </script>
  </x-slot>

  </x-admin::layout>
