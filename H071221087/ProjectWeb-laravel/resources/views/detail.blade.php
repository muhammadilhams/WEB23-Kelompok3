<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bibliophile's Haven</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body class="hold-transition sidebar-mini">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 mt-3">
                        <div class="col-sm-6">
                            <h1>Novel</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        @foreach ($bookNovel as $buku)
        <div class="card card-solid">
            <div class="card-body">
                <div class="row mt-2">
                        <div class="col-12 col-sm-3">
                            <div class="col-12">
                                <img src="/Novel/{{$buku->image}}" class="product-image" style="width: 350px " alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 " style="margin-left: 100px">
                            <h3 class="my-3">{{$buku->name}}</h3>
                            <p>
                                {{$buku->description}}
                            </p>

                            <hr>
                            <h4>Author</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1"
                                    autocomplete="off" checked>
                                    {{$buku->author}}
                                </label>
                            </div>

                            <h4 class="mt-3">Penerbit</small></h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b1"
                                    autocomplete="off">
                                    <span>{{$buku->publisher}}</span>
                                </label>
                            </div>
                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    Rp. {{$buku->price}}
                                </h2>
                            </div>
                            <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>
                                <div class="btn btn-danger btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    Add to Wishlist
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer mt-2">
            <strong>Copyright &copy; 2023 <a href="">Bibliophile's Haven</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="AdminLTE-3.2.0/dist/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
        </script>
</body>
</html>

@endforeach
