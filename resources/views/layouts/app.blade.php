<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
        <!-- Theme CSS -->
        <link href={{ asset("librerias/argon-system/assets/css/argon-design-system.min.css") }} rel="stylesheet">
        <!-- Fontawesome Icon -->
        <link href="{{ asset('librerias/fontawesom-6.4.0/css/all.min.css') }}" rel="stylesheet" type="text/css" >
        <!--DataTable-->
        <link href="{{ asset('librerias/data-table/datatables.min.css') }}" rel="stylesheet"/>
        <!--Toastify-->
        <link href="{{ asset('librerias/toastify/toastify.min.css') }}" rel="stylesheet"/>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        @livewire('libros')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Core -->
        <script src={{ asset("librerias/argon-system/assets/js/core/jquery.min.js") }}></script>
        <script src={{ asset("librerias/argon-system/assets/js/core/popper.min.js") }}></script>
        <script src={{ asset("librerias/argon-system/assets/js/core/bootstrap.min.js") }}></script>
        <!-- Argon JS -->
	    <script src={{ asset("librerias/argon-system/assets/js/argon-design-system.js") }}></script>
        <!--Sweet Alert-->
	    <script src={{ asset('librerias/js/sweetAlert.js') }}></script>
        @livewireScripts

        <script>
            Livewire.on('cerrarModal', (id) => {
                if ( id === 0 ){
                    message = 'Libro creado correctamente';
                    $('#modal-nuevo').modal('hide');
                } else {
                    message = 'Libro editado correctamente';
                    $('#modal-editar').modal('hide');
                    
                }

                Swal.fire(
                    'Excelente!',
                    message,
                    'success'
                )
            });
            
            Livewire.on('eliminar', (libroId) => {
                Swal.fire({
                    title: 'Atención!',
                    text: "Desea eliminar el libro?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log(libroId);
                            Livewire.emitTo('libros','eliminarLibro',libroId);
                            Swal.fire(
                                'Excelente!',
                                'Libro eliminado correctamente',
                                'success'
                            )
                        }
                })
            });

        </script>
    </body>
</html>
