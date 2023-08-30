<div wire:ignore.self class="modal fade" id="modal-nuevo" tabindex="-1" role="dialog" aria-labelledby="modal-nuevo-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-nuevo-label">Nuevo Libro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control form-control-sm" id="nombre" wire:model.defer="nombre">
                    @error('nombre')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control form-control-sm" id="autor" wire:model.defer="autor">
                    @error('autor')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nro-paginas">Numero Páginas</label>
                    <input type="number" class="form-control form-control-sm" id="nro-paginas" wire:model.defer="nroPaginas">
                    @error('nroPaginas')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control form-control-sm" wire:model.defer="descripcion"></textarea>
                    @error('descripcion')
                        <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                <button type="button" class="btn btn-success btn-sm" wire:click.prevent="nuevoLibro()"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

