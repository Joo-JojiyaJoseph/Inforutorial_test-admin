<?php

namespace App\View\Components;

use App\Models\Admin\Product;
use App\Models\Admin\Seo;
use App\Models\Admin\Category;
use Illuminate\View\Component;
use App\Models\Admin\Account;
use App\Models\Admin\Subcat;

class Meta extends Component
{
    public $metaData = [];

    public function __construct($routeName, $itemId)
    {
        $this->metaData = [
            'title' => config('app.name'),
            'og_title' => config('app.name'),
            'description' => '' ,
            'og_description' => '',
            'keywords' => '',
            'image' => '',
        ];





        if($routeName == 'index')
        {
            $this->metaData = Seo::where('page', 'home')->first();
        }

        if($routeName == 'about')
        {
            $this->metaData = Seo::where('page', 'about')->first();
        }

        if($routeName == 'contact')
        {
            $this->metaData = Seo::where('page', 'contact')->first();
        }

    
    }

    public function render()
    {
        return view('components.meta');
    }
}
