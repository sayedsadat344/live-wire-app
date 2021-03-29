<div>
    <div class="form-group">
        <label for="Name">Contact Name</label>
        <input type="text" wire:model="name" class="form-control input-sm"  placeholder="Name">
    </div>
    <div class="form-group">
        <label for="Email">Contact Email</label>
        <input type="email"  wire:model="email" class="form-control input-sm" placeholder="Enter email">
    </div>
    <button wire:click="store()" class="btn btn-primary">Save contact</button>
</div>