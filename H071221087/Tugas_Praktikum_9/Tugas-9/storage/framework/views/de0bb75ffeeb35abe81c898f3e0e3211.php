<?php $__env->startSection('content'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $__env->startSection('title'); ?>
        Add Karakter
    <?php $__env->stopSection(); ?>
    <style>
        .registration-box {
            width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px 80px 30px;
            margin: 40px auto;
        }

        .registration-head h3 {
            margin: 0;
            padding-bottom: 20px;
        }

        .registration-body {
            display: flex;
            flex-direction: column;
        }

        .registration-body input {
            margin-bottom: 20px;
            height: 40px;
            width: 250px;
        }

        .registration-body button {
            background-color: rgb(29, 174, 255);
            color: black;
            border-radius: 5px;
            position: relative;
            right: 100;
            width: 100px;
            height: 35px;
        }

        .menubtn {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .menubtn a {
            display: flex;
            align-items: center;
            width: 100px;
            height: 40px;
        }

        .menubtn input {
            background-color: rgb(29, 174, 255);
            border-radius: 5px;
            width: 100px;
            height: 40px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="registration-box">
        <div class="registration-head">
            <h3>Add karakter</h3>
        </div>
        <div>
            <form action="/insertchar" method="post">
                <?php echo csrf_field(); ?>
                <div class="registration-body">
                    <input type="text" name="karakter" placeholder="Karakter" required>
                    <input type="text" name="role" placeholder="Role" required>
                    <input type="text" name="tipe" placeholder="Tipe" required>
                    <input type="text" name="asal" placeholder="Asal">
                    <input type="text" name="deskripsi" placeholder="Deskripsi">
                </div>
                <div class="menubtn">
                    <a href="/">Back</a>
                    <input id="submit" type="submit" value="ADD"></input>
                </div>
        </div>
        </form>
    </div>
    <?php $__env->stopSection(); ?>
    </div>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Kuliah\SEMESTER 3\Pemrograman Web\Praktikum Web\Tugas Praktikum\Tugas_Praktikum_9\Tugas-9\resources\views/addchar.blade.php ENDPATH**/ ?>