<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    use Actions;

    public function __construct()
    {
        $this->authorize('viewAny', License::class);
    }

    public function render()
    {
        return view('livewire.licenses.index', [
            'licenses' => License::orderBy('id')->paginate(15)
        ]);
    }

    public function preventDelete ($license_id)
    {
        $this->dialog()->confirm([
            'title'       => __('Are you Sure?'),
            'acceptLabel' => __('Yes, delete'),
            'method'      => 'delete',
            'params'      => $license_id,
        ]);
    }

    public function delete ($license_id)
    {
        License::where('id', $license_id)->delete();

        $this->notification()->success(
            $title = 'Licencia eliminada correctamente',
        );

        $this->resetPage();
    }
}
