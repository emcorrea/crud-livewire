<?php

namespace App\Http\Livewire;

use App\Models\Libros as LibroModel;
use Livewire\Component;

class Libros extends Component
{
    public $libroId, $nombre, $autor, $descripcion, $nroPaginas;
    public $update = false;
    public $buscar = '';
    protected $listeners = ['eliminarLibro'];

    public function render()
    {
        $libros = ( strlen($this->buscar) === 0 ) 
            ? LibroModel::get()
            : LibroModel::where('nombre', 'like', "%$this->buscar%")->get();

        return view('livewire.libros',['libros' => $libros]);
    }

    public function refrescar()
    {
        $this->nombre       = '';
        $this->autor        = '';
        $this->nroPaginas   = '';
        $this->descripcion  = '';
    }

    public function nuevoLibro()
    {
        //Validación
        $this->validate([
            'nombre'        => 'required',
            'autor'         => 'required',
            'nroPaginas'    => 'required',
            'descripcion'   => 'required',
        ]);

        //Crear
        $libro = new LibroModel;
        $libro->nombre      = $this->nombre;
        $libro->autor       = $this->autor;
        $libro->nro_paginas = $this->nroPaginas;
        $libro->descripcion = $this->descripcion;
        $libro->save();

        //Refrescar
        $this->refrescar();
        $this->emit('cerrarModal',0);
    }

    public function editar($libroId)
    {
        $this->update = true;
        $libro = LibroModel::where('id',$libroId)->first();
        $this->libroId      = $libroId;
        $this->nombre       = $libro->nombre;
        $this->autor        = $libro->autor;
        $this->descripcion  = $libro->descripcion;
        $this->nroPaginas   = $libro->nro_paginas;
    }

    public function editarLibro()
    {
        //Validación
        $this->validate([
            'nombre'        => 'required',
            'autor'         => 'required',
            'nroPaginas'    => 'required',
            'descripcion'   => 'required',
        ]);

        //Actualizar
        if($this->libroId){

            $libro = LibroModel::find($this->libroId);
            $libro->update([
                'nombre'        => $this->nombre,
                'autor'         => $this->autor,
                'nro_paginas'   => $this->nroPaginas,
                'descripcion'   => $this->descripcion,
            ]);
            
            //Emit
            $this->emit('cerrarModal',$this->libroId);
        }
    }

    public function eliminarLibro($libroId)
    {
        LibroModel::where('id',$libroId)->delete();

    }
}
