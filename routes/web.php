<?php

use App\Http\Controllers\CalculosController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/teste', function () {
        return view('teste');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/teste/{valor}', function ($valor) {
        return "Você digitou: {$valor}";
    });

    // Cálculos
        Route::get('/calc/somar/{x}/{y}', [CalculosController::class, 'somar']);
        Route::get('/calc/subtrair/{x}/{y}', [CalculosController::class, 'subtrair']);
        Route::get('/calc/quadrado/{x}', [CalculosController::class, 'quadrado']);

    // Keepinho
    Route::prefix('/keep')->group(function () {
        Route::get('/', [KeepinhoController::class, 'index'])->name('keep');
        Route::post('/gravar', [KeepinhoController::class, 'gravar'])->name('keep.gravar');
        Route::get('/editar/{nota}', [KeepinhoController::class, 'editar'])->name('keep.editar'); // Formulário
        Route::put('/editar', [KeepinhoController::class, 'editar'])->name('keep.editarGravar'); // Ação
        Route::delete('/apagar/{nota}', [KeepinhoController::class, 'apagar'])->name('keep.apagar');
        Route::get('/lixeira', [KeepinhoController::class, 'lixeira'])->name('keep.lixeira');
        Route::get('/restaurar/{nota}', [KeepinhoController::class, 'restaurar'])->name('keep.restaurar');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::resource('produtos', ProdutosController::class);

    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::get('/carrinho/store/{produto}', [CarrinhoController::class, 'store'])->name('carrinho.store');
    Route::get('/carrinho/remove/{produto}', [CarrinhoController::class, 'remove'])->name('carrinho.remove');

    Route::resource('categorias', CategoriasController::class);
    Route::resource('categories', CategoriesController::class);

    Route::get('/posts', [PostsController::class , 'index'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class , 'create'])->name('posts.create');
    Route::post('/posts/store', [PostsController::class , 'store'])->name('posts.store');



    require __DIR__ . '/auth.php';
