<?php

use App\Models\PointPackage;
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('account', function ($trail) {
    $trail->parent('home');
    $trail->push('Account', route('account'));
});

Breadcrumbs::for('buy-point', function ($trail) {
    $trail->parent('home');
    $trail->push('Buy Point', route('buy-point'));
});

Breadcrumbs::for('point-package', function ($trail, $package) {
    $trail->parent('buy-point');
    $trail->push($package->name, route('point-package', $package));
});

Breadcrumbs::for('upload-property', function ($trail) {
    $trail->parent('home');
    $trail->push('Upload Property', route('upload-property'));
});
