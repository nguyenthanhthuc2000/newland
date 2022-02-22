<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', route('home.index'));
});

// Home > personal-article
Breadcrumbs::for('personal-article', function ($trail) {
    $trail->parent('home');
    $trail->push('Bài viết cá nhân', route('post.article'));
});

// Home > personal-project
Breadcrumbs::for('personal-project', function ($trail) {
    $trail->parent('home');
    $trail->push('Dự án cá nhân', route('auth.project'));
});
