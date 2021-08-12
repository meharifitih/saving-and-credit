<?php
session_start();
include('includes/header.php'); 
include('includes/user_navbar.php');
?>

<div class="card shadow mb-4">
    <div class="card card-primary">
        <form action="">
            <div class="card-header py-3">
                <h4>Add Payment</h4>

                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Payment</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Payment Number ..">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Member</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Your Name ..">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="date" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="number" class="form-control" id="" placeholder="00.00">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Pay</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>