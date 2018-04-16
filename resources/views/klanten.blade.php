@extends('layouts.main')

@section('content')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Manage Client</h1> @if (\Session::get('success'))
                <div class="alert alert-success alert-dismissable fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Updated!</strong> {{ \Session::get('success') }}
                </div>
                @endif

                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Add new client</button>

                    </div>

                </div>
            </div>

            <div class="table-responsive">
                <table id="klanten" class="display table table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Company Name</th>
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
                            <th>Client ID</th>
                            <th>Company Name</th>
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
                        @if(count($klantens) > 0) @foreach($klantens->all() as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td><a style="color:#333; text-decoration: underline;" href='{{url("/kread/{$list->id}")}}'>{{$list->company_name}}</a></td>
                            <td><a style="color:#333; text-decoration: underline;" href='{{url("/kread/{$list->id}")}}'>{{$list->contact_first_name}},{{$list->contact_lastname}}</a></td>
                            <td><a style="color:#333; text-decoration: underline;" href='{{url("/kread/{$list->id}")}}'>{{$list->company_city}}</a></td>
                            <td><a style="color:#333; text-decoration: underline;" href='{{url("/kread/{$list->id}")}}'>{{$list->company_sector}}</a></td>
                            <td><a style="color:#333; text-decoration: underline;" href='{{url("/kread/{$list->id}")}}'>{{$list->company_country}}</a></td>
                            <td>
                                <a class="btn btn-info btn-sm custom" href='{{url("/kread/{$list->id}")}}'>
                                    <span data-feather="eye-off"></span> view
                                </a>
                            </td>
                            <td id="edit_row_">
                                <a class="btn btn-success btn-sm custom" href='{{url("/kedit/{$list->id}")}}'>
                                    <span data-feather="edit"></span> edit
                                </a>
                            </td>
                            <td id="delete_row">
                                <a class="btn btn-danger btn-sm custom" id="{{$list->id}}" href='{{url("/kdelete/{$list->id}")}}' data-name="{{$list->company_name}}">
                                    <span data-feather="delete"></span> delete
                                </a>
                            </td>

                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <form method="post" action="{{url('kstore')}}" id="kstore-form">

            {{ csrf_field() }}

            <div class="modal-content">
                <div class="alert alert-danger kstore-form-error-msg" style="display:none;">
                    <ul></ul>

                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Client</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="section-divider mb40"><span>CLIENT INFORMATION</span></div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="companyName">Client name</label>
                                        <!-- <input type="hidden" class="form-control" id="clientAddress" name="contact_first_name" value=""> -->
                                        <input type="text" class="form-control" id="companyName" name="company_name">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-3">

                                    <div class="mb-3">
                                        <label for="companyStreet">Street</label>
                                        <input type="text" class="form-control" id="company_street" name="company_street">
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>
                                    <label for="companyNumber">House Number
                                        <span class="text-muted">(Optional)</span>
                                    </label>
                                    <input type="text" class="form-control" id="company_number" name="company_number">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="companyCountry">Country</label>
                                        <input type="text" class="form-control" id="company_country" name="company_country">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="company_city">City</label>
                                        <input type="text" class="form-control" id="company_city" name="company_city">
                                        <div class="invalid-feedback">
                                            Please provide a valid city
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="companyZip">Zip</label>
                                        <input type="text" class="form-control" id="company_zip" name="company_zip">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="ban">Bank Account Number</label>
                                        <input type="text" class="form-control" id="ban" name="ban">

                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="vn">VAT Number</label>
                                        <input type="text" class="form-control" id="vn" name="vn">
                                        <div class="invalid-feedback">
                                            Please enter your Vat Number address.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="companyEmail">Company Email</label>
                                        <input type="text" class="form-control" id="company_email" name="company_email">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="companyTelephone">Company Telephone</label>
                                        <input type="text" class="form-control" id="company_telephone" name="company_telephone">
                                        <div class="invalid-feedback">
                                            Please enter your Company Telephone.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="companyGeneralFax">General Fax</label>
                                        <input type="text" class="form-control" id="company_general_fax" name="company_general_fax">
                                        <div class="invalid-feedback">
                                            Please enter your shipping.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="companySector">Sector</label>
                                        <input type="text" class="form-control" id="company_sector" name="company_sector">
                                        <div class="invalid-feedback">
                                            Please enter your Sector.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <!-- PRIMARY CONTACT INFORMATION -->
                                <div class="section-divider mb40"><span>PRIMARY CONTACT INFORMATION</span></div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="primaryContactName">First name</label>
                                        <input type="text" class="form-control" id="primaryContactName" name="contact_first_name">
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="contactLastname">Last name</label>
                                        <input type="text" class="form-control" id="contactLastname" name="contact_lastname">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="contactEmail">Email</label>
                                        <input type="text" class="form-control" id="contactEmail" name="contact_email">
                                        <div class="invalid-feedback">
                                            Valid Email is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="contactTelephone">Telephone</label>
                                        <input type="text" class="form-control" id="contactTelephone" name="contact_telephone">
                                        <div class="invalid-feedback">
                                            Telephone required
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="contactFunction">Function</label>
                                        <input type="text" class="form-control" id="contactFunction" name="contact_function">
                                        <div class="invalid-feedback">
                                            Contact Function required
                                        </div>
                                    </div>
                                </div>

                                <!-- CONTACT PERSON INFORMATION -->

                                <div class="section-divider mb40"><span>CONTACT PERSON INFORMATION</span></div>

                                <button class="add_field_button btn btn-info btn-sm">Add More Fields</button>
                                <div class="row input_fields_wrap">
                                    &nbsp;

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary btn-submit" id="kstore-submit" name="submit" value="Add" /> -->
                    <button type="submit" id="kstore-submit" class="btn btn-success btn-md pull-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection



