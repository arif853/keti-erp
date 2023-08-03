
    <div id="edit_modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:65%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title text-center" id="cus_title"></h3>
                </div>

                <div class="modal-body">
                    <form  id="edit_customer_form" method="POST" >
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="reference" class="control-label">Reference</label>
                                <input type="text" class="form-control" placeholder="Reference" id="reference" name="ref">
                            </div>
                            <div class="col-md-2">
                                <label for="credit-limit" class="control-label">Credit Limit</label>
                                <input type="number" min="0" value="0" class="form-control  alert-success" id="credit_limit" name="credit_lim">
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="customar_id" class="control-label">ID</label>
                                    <input type="text" class="form-control" id="customer_id" placeholder="Id" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_name" class="control-label">Business Name*</label>
                                    <input type="text" class="form-control" id="business_name" placeholder="Business Name" name="business_name" required>
                                    <div id="saveform_errlist" class="business_name"></div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="owner_name" class="control-label">Owner Name*</label>
                                    <input type="text" class="form-control" id="owner_name" placeholder="Owner Name" name="owner_name" required>
                                    <div id="saveform_errlist" class="owner_name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone" class="control-label">Primary Phone*</label>
                                <input type="text" class="form-control" placeholder="+880 " id="phone" name="phone"  required>
                                <div id="saveform_errlist" class="phone"></div>
                            </div>
                            <div class="col-md-3">
                                <label for="phone2" class="control-label">Secondary  Phone</label>
                                <input type="text" class="form-control" placeholder="+880 " id="phone2" name="phone2">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" placeholder="example@email.com" id="email" name="email">
                            </div>
                        </div>
                        <p style="margin-top: 15px"></p>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address2" class="control-label">Delivary Address*</label>
                                <textarea type="text" class="form-control" placeholder="Address.... " id="address2" name="address2" required></textarea>
                                <div id="saveform_errlist" class="address2"></div>
                            </div>
                        </div>
                        <p style="margin-top: 15px"></p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="acc_group" class="control-label">Account Group</label>
                                    <select class="select2" id="acc_group" name="acc_group">
                                        <option value="#">&nbsp;</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="opening_balance" class="control-label">Opening Balance</label>
                                    <input type="number" min="0" class="form-control alert-success" placeholder="Opening Balance " id="open_balance"  name="open_balance">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="t_license" class="control-label">Trade License</label>
                                    <input type="text" class="form-control " placeholder="Trade License " id="t_license" name="t_license">
                                </div>
                                <div class="col-md-2">
                                    <label for="tin-number" class="control-label">TIN Number</label>
                                    <input type="text" class="form-control " placeholder="Tin Number " id="tin_number" name="tin_number">
                                </div>
                                <div class="col-md-6"></div>
                            </div>

                            <hr>
                            <p class="control-label text-info">Contact person/Manager</p>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="man-name" class="control-label">Name</label>
                                    <input type="text" class="form-control " placeholder="Name " id="man_name" name="man_name">
                                    <div id="saveform_errlist" class="man_name"></div>
                                </div>
                                <div class="col-md-3">
                                    <label for="man-phone-number" class="control-label">Phone Number</label>
                                    <input type="text" class="form-control " placeholder="Phone Number " id="man_phone" name="man_phone">
                                <div id="saveform_errlist" class="man_phone"></div>
                            </div>
                            <div class="col-md-3">
                                <label for="man-title" class="control-label">Title</label>
                                <input type="text" class="form-control " placeholder="Title" id="man_title" name="man_title">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text-right">
                                <button type="submit" id="submit" class="btn btn-primary btn-custom waves-effect waves-light submit" >Add Customer</button>
                                {{-- <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-print" aria-hidden="true"></i>                                </button>
                                <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light">Submit & print</button> --}}
                                <button type="button" class="btn btn-default btn-custom waves-effect" data-dismiss="modal" id="close">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

