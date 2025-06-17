<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align: center;">
    <tr style="background-color: #f2f2f2;">
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>
    <?php $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($mhs->nama); ?></td>
        <td><?php echo e($mhs->nim); ?></td>
        <td><?php echo e($mhs->jurusan); ?></td>
        <td>
            <form action="/mahasiswa/delete/<?php echo e($mhs->id); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" style="padding:3px 5px;">Hapus</button>
            </form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<div style="margin-top:10px;">
    <?php echo e($mahasiswas->links()); ?>

</div>
<?php /**PATH C:\Users\arfon\OneDrive\Documents\PWEB_Revisi\crud-mahasiswa\resources\views/mahasiswa/list.blade.php ENDPATH**/ ?>