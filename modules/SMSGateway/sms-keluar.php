<div class="card">
    <div class="header">
        <h2>
            SMS KELUAR
        </h2>
    </div>
    <div class="body">
        <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
        <table id="datatable" class="table table-bordered table-hover table-striped display nowrap js-exportable" width="100%">
            <thead>
                <tr>
                    <th>Penerima</th>
                    <th>Isi SMS</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM sentitems";
            if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
            	$sql .= " WHERE (InsertIntoDB BETWEEN '$_POST[tgl_awal] 00:00:01' AND '$_POST[tgl_akhir] 23:59:59')";
            }
            $sql .= " ORDER BY InsertIntoDB";
            $query = query($sql);
            $no = 1;
            while($row = fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['CreatorID']; ?></td>
                    <td><?php echo $row['TextDecoded']; ?></td>
                    <td><?php echo $row['InsertIntoDB']; ?></td>
                    <td><?php echo $row['Status']; ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row clearfix">
            <form method="post" action="">
            <div class="col-sm-5">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="tgl_awal" class="datepicker form-control" placeholder="Pilih tanggal awal...">
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="tgl_akhir" class="datepicker form-control" placeholder="Pilih tanggal akhir...">
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="form-line">
                        <input type="submit" class="btn bg-blue btn-block btn-lg waves-effect">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
