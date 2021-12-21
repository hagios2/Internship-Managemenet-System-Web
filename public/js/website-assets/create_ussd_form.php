<?php

?>
<div class="modal fade bs-examplemodal-lg" id="addUssdModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style=" background: #0f3e68 !important;color: #ffffff !important;">
                   <b id="loading" style="position: absolute;margin-left: 50em;display: none;">processing please wait.. <img src="./assets/images/loading.gif" height="20" width="20"></b>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myLargeModalLabel">
                     Create USSD
</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <form class="form-horizontal" id="ussd_form" novalidate>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">User name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="username" id="username" required>
                                            <span class="messages"></span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Company name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="comp_name" id="comp_name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Role</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="role" id="role" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">User Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Contact Person</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="con_per" id="con_per" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Mobile</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="mobile" id="mobile" required>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Serv. Description</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="serv_desc" id="serv_desc" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Endpoint URL</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="endpoint_url" id="endpoint_url" required placeholder="eg: http://nalosolutions.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Traffic per month </label>
                                        <div class="col-sm-8">
                                            <input type="text" step="any" class="form-control" name="tarrif" id="tarrif" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Rental fee</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="rental_fee" id="rental_fee" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Extension</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="extension" class="form-control" id="extension" required>
                                           <input type="hidden" name="extension" id="extension" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Base code</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="920" class="form-control" name="base_code" id="base_code"  disabled>
                                            <input type="hidden" value="create_ussd" class="form-control" name="create_ussd" id="create_ussd"  disabled>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Resp. Expected</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control date-picker" value="OK" name="response" id="response" required disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Commen. date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control date-picker" name="commen_date" id="commen_date" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sender_single" class="col-sm-4 control-label">Expiry date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control date-picker" name="expiry_date" id="expiry_date" required>
                                            <input  id="ussd_sub" type="hidden"   value="create_ussd">
                                        </div>
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <label for="sender_single" class="col-sm-4 control-label">Password</label>-->
<!--                                        <div class="col-sm-8">-->
<!--                                            <input type="password" class="form-control date-picker" name="password" id="pass">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="sender_single" class="col-sm-4 control-label">Confirm password</label>-->
<!--                                        <div class="col-sm-8">-->
<!--                                            <input type="password" class="form-control date-picker" name="con_pass" id="con_pass">-->
<!--                                        </div>-->
<!--                                    </div>-->


                                </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ussd_close_modal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  id="ussd_submit" class="btn btn-primary">Submit </button>


                    </form>
                </div>
            </div>
        </div>
    </div>