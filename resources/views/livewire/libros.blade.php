<div>
    <div class="row">
        <div class="col-6">
            <form action="" class="mb-4">
                <input 
                    type="text" 
                    placeholder="Buscar" 
                    class="form-control form-control-sm"
                    wire:model="buscar"
                >
            </form>
        </div>
        <div class="col-6">
            <button class="btn btn-sm btn-success float-right" id="btn-nuevo" data-toggle="modal" data-target="#modal-nuevo" wire:click=refrescar()><i class="fa-solid fa-floppy-disk"></i> Nuevo</button>
        </div>
    </div>
    <table class="table table-sm table-bordered">
        <thead class="bg-default text-white">
            <th>#</th>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Descripcion</th>
            <th>Nro. Páginas</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $libro->nombre }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ Str::limit($libro->descripcion,40) }}</td>
                    <td class="text-center">{{ $libro->nro_paginas }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-editar" wire:click="editar({{ $libro->id }})"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-sm btn-danger" wire:click="$emit('eliminar',{{ $libro->id }})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('livewire.nuevo-libro')
    @include('livewire.editar-libro')
</div>
