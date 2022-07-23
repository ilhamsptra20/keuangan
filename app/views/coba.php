<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/keuangan/catatan/store" method="post">
        <input type="hidden" name="user_id" value="1">
        <input type="text" name="nama">
        <label for="1">pendapatan</label>
        <input type="radio" name="jenis" id="1" value="<?= 1 ?>">
        <label for="2">pengeluaran</label>
        <input type="radio" name="jenis" id="2" value="<?= 0 ?>">
        <input type="number" name="jumlah">
        <input type="date" name="tanggal">
        <button type="submit">Submit</button>
    </form>
</body>
</html>