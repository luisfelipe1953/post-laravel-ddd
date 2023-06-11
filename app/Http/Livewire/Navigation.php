<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Src\Modules\Blogs\Categories\Application\UseCase\Queries\GetAllCategoriesUseCase;

class Navigation extends Component
{
    public function render()
    {
        $categories = (new GetAllCategoriesUseCase())->__invoke();

        return view('livewire.navigation', compact('categories'));
    }
}
