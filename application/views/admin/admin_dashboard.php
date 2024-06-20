<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_dashboard.css'); ?>">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <p><a href="<?php echo site_url('admin/logout'); ?>">Logout</a></p>
    <h3>Data Pendaftar</h3>

    <!-- Form pencarian -->
    <form action="<?php echo site_url('admin/cari'); ?>" method="GET">
        <label for="kode_unik">Cari berdasarkan Kode Unik:</label>
        <input type="text" id="kode_unik" name="kode_unik">
        <button type="submit">Cari</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Kode Unik</th>
                <th>Nama</th>
                <th>Email</th>
                <th>TTL</th>
                <th>Alamat</th>
                <th>Nama Wali</th>
                <th>Pekerjaan</th>
                <th>Telepon</th>
                <th>Telepon Wali</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = $this->uri->segment('3') + 1; foreach ($data_pendaftar as $p): ?>
                <tr>
                    <td><?php echo $p['kode_unik']; ?></td>
                    <td><?php echo $p['nama']; ?></td>
                    <td><?php echo $p['email']; ?></td>
                    <td><?php echo $p['TTL']; ?></td>
                    <td><?php echo $p['alamat']; ?></td>
                    <td><?php echo $p['nama_wali']; ?></td>
                    <td><?php echo $p['pekerjaan']; ?></td>
                    <td><?php echo $p['telfn']; ?></td>
                    <td><?php echo $p['telfnw']; ?></td>
                    <td>
                        <a href="<?php echo site_url('admin/edit_data/' . $p['kode_unik']); ?>">Edit</a>
                        <a href="<?php echo site_url('admin/hapusdata/' . $p['kode_unik']); ?>" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php echo $this->pagination->create_links();endforeach; ?>
        </tbody>
    </table>
</body>
</html>
