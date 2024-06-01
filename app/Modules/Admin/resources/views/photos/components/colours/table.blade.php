<div class="form-group m-form__group row">
    <div class="col-lg-12">
        <label class="">Colours:</label><br>
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
            @include('Admin::photos.components.colours.row')
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-default " id="new_row"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
