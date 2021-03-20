<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;

class Subjects extends Component
{
    public $subject;
	
	public $confirmingSubjectDeletion = false;
    public $confirmingSubjectAdd = false;
	
	protected $rules = [
        'subject.name' => 'required|string',
        'subject.desc' => 'required|string',
    ];
	
    public function render()
    {
		$subjects = Subject::all();
		
        return view('livewire.subjects', [
            'subjects' => $subjects,
		]);
    }
	
	public function confirmSubjectDeletion($id) 
    {
        $this->confirmingSubjectDeletion = $id;
    }
 
    public function deleteSubject(Subject $subject) 
    {
        $subject->delete();
        $this->confirmingSubjectDeletion = false;
        session()->flash('message', 'Subject Deleted Successfully');
    }
 
    public function confirmSubjectAdd() 
    {
        $this->reset(['subject']);
        $this->confirmingSubjectAdd = true;
    }
 
    public function confirmSubjectEdit(Subject $subject) 
    {
        $this->resetErrorBag();
        $this->subject = $subject;
        $this->confirmingSubjectAdd = true;
    }
 
    public function saveSubject() 
    {
        $this->validate();
        $user_id = auth()->user()->id;
        $subject_name = $this->subject['name'];
        $subject_desc = $this->subject['desc'];
        if(isset($this->subject->id)) {
            $this->subject->save();
            session()->flash('message', 'Subject Saved Successfully');
        } else {
            Subject::create([
                'name' => $subject_name,
                'desc' => $subject_desc,
            ]);
            session()->flash('message', 'Subject Added Successfully');
        }
        $this->confirmingSubjectAdd = false;
 
    }
    
}
