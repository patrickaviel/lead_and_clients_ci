<?php  ?>
    <div class="container-fluid extend">
        <!-- BOOTSTRAP NAVBAR -->
        <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Report Dashboard</span>
        </div>
        </nav>
        <form action="/reports/update" method="post">
            <div class="mb-3">
                <label class="form-label">From</label>
                <input type="text" name="from" id="datepicker" >
                <label class="form-label">To</label>
                <input type="text" name="to" id="datepicker2" >
                <input class="btn btn-secondary btn-sm" type="submit" value="Update">
                <?= $this->session->flashdata('error_date');?>
            </div>
        </form>
        <!-- Header -->
        <h5>List of all customers and # of leads</h5>
        <!-- table -->
        <table class="table table-striped md">
            <thead>
                <th>Customer Name</th>
                <th>Number of Leads</th>
            </thead>
            <tbody>

<?php      foreach ($leads as $lead){                  ?>
                <tr>
                    <td><?= $lead['client_name'] ?></td>
                    <td><?= $lead['number_of_leads'] ?></td>
                </tr>
<?php       }                                           ?>
    
            </tbody>
        </table>

        
        <div id="chartContainer" class="chartContainer" ></div>
    </div>
<?php $this->load->view('partials/footer.php') ?>