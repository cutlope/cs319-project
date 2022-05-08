<?php

namespace App\Http\Livewire\Document;

use App\Models\File;
use Livewire\Component;
use App\Models\Document;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;
use Filament\Forms\Concerns\InteractsWithForms;

class FormCreate extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;

    public $name = '';
    public $file_path;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->label('Name:'),

            FileUpload::make('file_path')
                ->preserveFilenames()
                ->maxSize(102400)
                ->acceptedFileTypes(['png', 'jpg', 'pdf'])
                ->helperText('File size can not exceed 100MB and file must be of the type png, jpg, pdf')
                ->required()
                ->label('Upload File:'),
        ];
    }

    public function submit(): void
    {
        $array = array_merge([
            'patient_id' => auth()->user()->patient->id,
            'type' => pathinfo($this->form->getState()['file_path'], PATHINFO_EXTENSION)
        ], $this->form->getState());

        $file = File::create($array);

        Document::create(array_merge($array, ['file_id' => $file->id]));

        toast()->success('Successfully uploaded document')->push();

        redirect(route('document.index'));
    }

    public function render()
    {
        return view('livewire.document.form-create');
    }
}