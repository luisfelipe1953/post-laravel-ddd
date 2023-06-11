<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;

class UserIndex extends Component
{
    use WithPagination;

    public string $search;

    /**
     * Cambia los estilos de tailwind a bootstrap
     *
     * @var string
     */
    protected string $paginationTheme = 'bootstrap';

    /**
     * Actualiza la pagina cada vez que se renderiza el search
     *
     * @return void
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Renderiza la consulta cada vez que surjan cambios y obtiene un paginador
     *
     * @return View
     */
    public function render(): View
    {
        $users = UserEloquentModel::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.user-index', compact('users'));
    }
}
