<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Contact as ModelsContact;


class Contacts extends Component
{

    public $data = [];
    public $name, $email, $selected_id;
    public $updateMode = false;
   
    /**
     * 
     * Render component with data
     */
    public function render()
    {
        $this->data = ModelsContact::all();
       
        return view('livewire.contacts');

        
    }


    /**
     * 
     * Reset input fields after successfull form submission
     */
    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
    }



    /**
     * Store contact Details
     */
    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);

        ModelsContact::create([
            'name' => $this->name,
            'email' => $this->email
        ]);


        session()->flash('message', 'Contact successfully created.');
        $this->resetInput();
    }

    /**
     * Render edit form and set old values to input fields
     */
    public function edit($id)
    {
        $record = ModelsContact::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;
    }


    /**
     * Update the contact details
     */
    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);
        if ($this->selected_id) {
            $record = ModelsContact::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }

        session()->flash('message', 'Contact successfully updated.');
    }


    /**
     * Delete the contact
     */
    public function destroy($id)
    {
        if ($id) {
            $record = ModelsContact::where('id', $id);
            $record->delete();
        }

        session()->flash('message', 'Contact successfully deleted.');
    }
 
}
