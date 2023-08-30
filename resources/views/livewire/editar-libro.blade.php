<div wire:ignore.self class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="modal-editar-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-editar-label">Editar Libro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="editarLibro">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control form-control-sm" id="nombre" wire:model="nombre">
                    @error('nombre')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control form-control-sm" id="autor" wire:model="autor">
                    @error('autor')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nro-paginas">Numero Páginas</label>
                    <input type="number" class="form-control form-control-sm" id="nro-paginas"  wire:model="nroPaginas">
                    @error('nroPaginas')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control form-control-sm" wire:model="descripcion"></textarea>
                    @error('descripcion')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                <button type="submit" class="btn btn-warning btn-sm" wire:click.prevent="editarLibro()"><i class="fa-regular fa-pen-to-square"></i> Editar</button>
            </div>
        </form>
        </div>
    </div>
</div>
