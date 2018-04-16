@extends('layouts.main')

@section('content')
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		        <h1 class="h2">Manage Suppliers</h1>

		        <div class="btn-toolbar mb-2 mb-md-0">
		            <div class="btn-group mr-2">
		                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Add new supplier</button>

		            </div>

		        </div>
		    </div>

		    <div class="table-responsive">
		        <table id="leveranciers" class="display table table-striped table-sm" cellspacing="0" width="100%">
		            <thead>
		                <tr>
		                    <th>#ID</th>
		                    <th>Supplier Name</th>
		                    <th>Primary Contact</th>
		                    <th>City</th>
		                    <th>Sector</th>
		                    <th>Country</th>
		                    <th>&nbsp;</th>
		                    <th>&nbsp;</th>
		                    <th>&nbsp;</th>

		                </tr>
		            </thead>
		            <tfoot>
		                <tr>
		                    <th>#ID</th>
		                    <th>Supplier Name</th>
		                    <th>Primary Contact</th>
		                    <th>City</th>
		                    <th>Sector</th>
		                    <th>Country</th>
		                    <th>&nbsp;</th>
		                    <th>&nbsp;</th>
		                    <th>&nbsp;</th>

		                </tr>
		            </tfoot>
		            <tbody>
		                @if(count($leveranciers) > 0) @foreach($leveranciers->all() as $list)
		                <tr>
		                    <td><a style="color:#333; text-decoration: underline;" href='{{url("/lread/{$list->id}")}}'>{{$list->id}}</a></td>
		                    <td><a style="color:#333; text-decoration: underline;" href='{{url("/lread/{$list->id}")}}'>{{$list->supplier_name}}</a></td>
		                    <td><a style="color:#333; text-decoration: underline;" href='{{url("/lread/{$list->id}")}}'>{{$list->contact_lastname}},{{$list->contact_first_name}}</a></td>
		                    <td><a style="color:#333; text-decoration: underline;" href='{{url("/lread/{$list->id}")}}'>{{$list->supplier_city}}</a></td>
		                    <td><a style="color:#333; text-decoration: underline;" href='{{url("/lread/{$list->id}")}}'>{{$list->supplier_sector}}</a></td>
		                    <td><a style="color:#333; text-decoration: underline;" href='{{url("/lread/{$list->id}")}}'>{{$list->supplier_country}}</a></td>
		                    <td>
		                        <a class="btn btn-info btn-sm custom" href='{{url("/lread/{$list->id}")}}'>
		                            <span data-feather="eye-off"></span> view
		                        </a>
		                    </td>
		                    <td id="edit_row_">
		                        <a class="btn btn-success btn-sm custom" href='{{url("/ledit/{$list->id}")}}'>
		                            <span data-feather="edit"></span> edit
		                        </a>
		                    </td>
		                    <td id="delete_row">
		                        <a class="btn btn-danger btn-sm custom" id="{{$list->id}}" href='{{url("/ldelete/{$list->id}")}}' data-name="{{$list->supplier_name}}">
		                            <span data-feather="delete"></span> delete
		                        </a>
		                    </td>
		                </tr>
		                @endforeach @endif
		            </tbody>
		            </tbody>
		        </table>
		    </div>
		</main>
	</div>
</div>
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <form method="post" action="{{url('lstore')}}" id="lstore-form">

            {{ csrf_field() }}

            <div class="modal-content">
                <div class="alert alert-danger lstore-form-error-msg" style="display:none;">
                    <ul></ul>

                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Supplier</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="section-divider mb40"><span>SUPPLIER INFORMATION</span></div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="supplierName">Supplier name</label>
                                        <input type="hidden" class="form-control" id="supplierPrimaryContactName" placeholder="" name="supplier_primary_contact" value="">
                                        <input type="text" class="form-control" id="supplierName" placeholder="" name="supplier_name" value="">
                                        <div class="invalid-feedback">
                                            Valid supplier name is required.
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-3">

                                    <div class="mb-3">
                                        <label for="supplierStreet">Street</label>
                                        <input type="text" class="form-control" id="supplier_street" name="supplier_street" laceholder="1234 Main St">
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>
                                    <label for="supplierNumber">House Number
                                        <span class="text-muted">(Optional)</span>
                                    </label>
                                    <input type="text" class="form-control" id="supplier_number" name="supplier_number">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="supplierCountry">Country</label>
                                        <input type="text" class="form-control" id="supplier_country" name="supplier_country" placeholder="Supplier Country">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="supplier_city">City</label>
                                        <input type="text" class="form-control" id="supplier_city" name="supplier_city" placeholder="Supplier City">
                                        <div class="invalid-feedback">
                                            Please provide a valid city
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="supplierZip">Zip</label>
                                        <input type="text" class="form-control" id="supplier_zip" name="supplier_zip" placeholder="">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="ban">Bank Account Number</label>
                                        <input type="text" class="form-control" id="ban" name="ban" placeholder="">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="vn">VAT Number</label>
                                        <input type="text" class="form-control" id="vn" name="vn" placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter your Vat Number address.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="supplierEmail">Supplier Email</label>

                                        <input type="text" class="form-control" id="supplier_email" name="supplier_email" placeholder="Supplier Email">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="supplierTelephone">Supplier Telephone</label>
                                        <input type="text" class="form-control" id="supplier_telephone" name="supplier_telephone" placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter your Supplier Telephone.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="supplierGeneralFax">General Fax</label>
                                        <input type="text" class="form-control" id="supplier_general_fax" name="supplier_general_fax" value="" placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter your shipping.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="supplierRate">Commission rate</label>
                                        <input type="text" class="form-control" id="supplier_rate" name="supplier_rate" value="" placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter your Commission rate.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="supplierSector">Sector</label>
                                        <input type="text" class="form-control" id="supplier_sector" name="supplier_sector" value="" placeholder="">
                                        <div class="invalid-feedback">
                                            Please enter your Sector.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="vn">Exclusivity Status</label>
                                        <select class="custom-select d-block w-100" name="supplier_exclusivity_status">
                                            <option value="">Choose...</option>
                                            <option vaue="0">No</option>
                                            <option vaue="1">Yes</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select Suppier.
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="section-divider mb40"><span>PRIMARY CONTACT INFORMATION</span></div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="supplierContactFirstName">First name</label>
                                        <input type="text" class="form-control" id="supplierContactFirstName" name="contact_first_name" placeholder="" value="">
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="contactLastname">Last name</label>
                                        <input type="text" class="form-control" id="contactLastname" name="contact_lastname" placeholder="" value="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="contactEmail">Email</label>
                                        <input type="text" class="form-control" id="contactEmail" name="contact_email" placeholder="" value="">
                                        <div class="invalid-feedback">
                                            Valid Email is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="contactTelephone">Telephone</label>
                                        <input type="text" class="form-control" id="contact_telephone" name="contact_telephone" placeholder="">
                                        <div class="invalid-feedback">
                                            Telephone required
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="function">function</label>
                                        <input type="text" class="form-control" name="contact_function" id="function" placeholder="">
                                        <div class="invalid-feedback">
                                            Function required
                                        </div>
                                    </div>
                                </div>
                                <!-- CONTACT PERSON INFORMATION -->
                                <div class="section-divider mb40"><span>CONTACT PERSON INFORMATION</span></div>

                                <button class="add_field_button btn btn-info btn-submit btn-sm">Add More Fields</button>
                                <div class="row input_fields_wrap">
                                    &nbsp;

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary btn-submit" id="lstore-submit" name="submit" value="Add" /> -->
                    <button type="submit" id="lstore-submit" class="btn btn-success btn-md pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection