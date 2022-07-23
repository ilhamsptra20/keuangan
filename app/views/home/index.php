<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Catatan Keuangan <?= $_SESSION['nama'] ?></h1>
        <a href="<?php BASEURL ?>authentication/logout" class="fs-5 text-dark">
            <i class="bi bi-lock"></i>logout
        </a>
    </div>
    <div class="row mb-2">
        <div class="col-lg-8">
            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-danger px-2 fs-5" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-pengeluaran">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="ms-2">Pengeluaran</span>
                </button>
                <button class="btn btn-success px-2 fs-5" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-pendapatan">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="ms-2">Pendapatan</span>
                </button>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="d-flex justify-content-end">
                <div class="fs-5 my-2 w-100 d-flex justify-content-end">
                    <span class="px-2 bg-primary text-white">Saldo Rp : <?= $data['saldo'] ?></span>
                </div>
            </div>
        </div>
    </div>

    

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr class="table-dark">
                <td>Tanggal</td>
                <td>Keterangan</td>
                <td>Nominal</td>
                <td>Saldo</td>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($data['catatan'])) :?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>

                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        Tidak Ada Catatan
                    </div>
                </div>
                
            <?php else : ?>
                <?php foreach ($data['catatan'] as $catatan) :?>
                    <tr class="<?php if($catatan['jenis']) echo 'table-success' ; else echo 'table-danger' ?>">
                        <td><?= date('d F Y', strtotime($catatan['tanggal'])); ?></td>
                        <td><?= $catatan['keterangan']; ?></td>
                        <td><?= $catatan['nominal']; ?></td>
                        <td><?= $catatan['saldo']; ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= BASEURL ?>catatan/store" method="post" id="form-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="deskripsi" name="keterangan">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nominal">Rp</span>
                            <input type="number" class="form-control" placeholder="1000000" aria-label="Username" aria-describedby="nominal" name="nominal">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>