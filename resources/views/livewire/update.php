<div>
    <input type="hidden" wire:model="selected_id">
    <div class="form-group">
        <label for="Name">Contact Name</label>
        <input type="text" wire:model="name" class="form-control input-sm"  placeholder="Name">
    </div>
    <div class="form-group">
        <label>Contact Email</label>
        <input type="email" wire:model="email" class="form-control input-sm" placeholder="Enter email" >
    </div>
    <button wire:click="update()" class="btn btn-primary">Update</button>
</div>