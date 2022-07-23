<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<!-- <script src="<?= BASEURL; ?>/js/script.js"></script> -->
<script>
    const pengeluaran = document.querySelector('#btn-pengeluaran')
    const pendapatan = document.querySelector('#btn-pendapatan')

    const titleModal = document.querySelector('#exampleModalLabel')
    const headerModal = document.querySelector('.modal-header')
    const form = document.querySelector('#form-modal')
    
    pengeluaran.addEventListener('click', () => {
        titleModal.textContent = "Form Pengeluaran"
        headerModal.classList.add('bg-danger')
        headerModal.classList.add('text-white')
        form.action = '<?= BASEURL ?>catatan/pengeluaran'
    })

    pendapatan.addEventListener('click', () => {
        titleModal.textContent = "Form Pendapatan"
        headerModal.classList.add('bg-success')
        headerModal.classList.add('text-white')
        form.action = '<?= BASEURL ?>catatan/pendapatan'
    })
</script>

</body>
</html>