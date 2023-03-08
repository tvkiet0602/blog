<?php

// Trang chủ
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', route('home'));
});

// Trang chủ > Bài viết
Breadcrumbs::for('detail', function ($trail, $detail) {
    $trail->parent('home');
    $trail->push('Bài viết - '.$detail->categories->name, route('detail', ['id', $detail->id]));
});

// Trang chủ > Tạo bài viết
Breadcrumbs::for('add-posts', function ($trail) {
    $trail->parent('home');
    $trail->push('Tạo bài viết', route('add-posts',['id'=>auth()->user()->id]));
});


// Trang chủ > Danh mục
Breadcrumbs::for('list-page', function ($trail, $categories) {
    $trail->parent('home');
    $trail->push('Danh mục: '.$categories->name, route('list-page', $categories->id));
});
