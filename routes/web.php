<?php

//use BackendController;
use App\Livewire\Comments;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Routeers\Admin\{RoleController, UserController};
use App\Http\Controllers\FavoriteController;

# Backend Controller
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RecipeSliderController;
use App\Http\Controllers\Admin\BackendController;
//use App\Http\Controllers\RecipeSliderControllerers\Admin\{BackendController, CategoryController, RoleController, UserController, UserRecipeController};
use App\Http\Controllers\Admin\RecipeController as Recipe;
use App\Http\Controllers\Admin\CategoryController;

# Frontend Controller
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/dashboard', function () {
//     return view('dashboard');
// });
// Route::resource('blogs', BlogController::class);

// pages route
Route::get('/', [PageController::class, 'homePage'])->name('homePage');

Route::get('/', [PageController::class, 'homePage']);


Route::get('/contact',  [PageController::class, 'contactPage'])->name('contactPage');
Route::get('/about',  [PageController::class, 'aboutPage'])->name('aboutPage');

Route::get('/recipes-filter',  [RecipeController::class, 'index'])->name('recipesPage');

Route::get('/recipes/{recipe:slug}',  [RecipeController::class, 'show'])->name('recipes.show');

Route::get('/articles',  [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blogPage');

Route::get('/articles/{blog:slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('article.show');


Route::post('/subscribe', [PageController::class, 'collectEmail'])->name('newsletter.subscribe');

Route::get('/search-blogs', [App\Http\Controllers\Frontend\BlogController::class, 'search'])->name('search.blogs');

Route::post('/store-contact', [PageController::class, 'storeContact'])->name('store.contact');

Route::get('/category/{category:slug}', [PageController::class, 'categoryByRecipe'])->name(name: 'category.by.recipe');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->group(function () {

    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
    ]);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Develop By Hasib Feature
     */

    # Category Route
    // Route::get('/all-categories', [CategoryController::class, 'allCategories']);
    // Route::get('/categories/status/{id}', [CategoryController::class, 'status']);
    Route::resource('category', CategoryController::class);
    # Blog Route
    // Route::get('/all-blogs', [BlogController::class, 'allBlogs']);
    Route::resource('blog', BlogController::class);
    Route::get('blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

    //Common Feature For Backend
    Route::get('subscribe', [BackendController::class, 'Subscribe'])->name('subscribe');
    Route::get('contact-us', [BackendController::class, 'contact'])->name('contact');
    Route::delete('contact-us/{contact}', [BackendController::class, 'ContactDelete'])->name('contact.delete');
    // Route::get('userList', [BackendController::class, 'userlist'])->name('user-list');
    Route::get('UserPost/{UserPost}', [BackendController::class, 'UserPost'])->name('User-Post');

    Route::get('comments/{recipe_id}', [Comments::class, 'render'])->name('comments');

    // Backend Recipe Route
    Route::resource('recipe', Recipe::class);
    Route::get('recipe/status/{recipe}', [Recipe::class, 'RecipeStatus'])->name('recipe.status');
    # Backend User Recipe List Route
    Route::get('user/recipe', [Recipe::class, 'UserRecipe'])->name('user.recipe');

    # Favorite Recipe
    Route::get('favorite/recipe', [Recipe::class, 'favorite'])->name('favorite.recipes');

    // Route::post('/recipes/{recipe}/favorite', [FavoriteController::class, 'favorite'])->name('recipes.favorite');
    // Route::delete('/recipes/{recipe}/unfavorite', [FavoriteController::class, 'unfavorite'])->name('recipes.unfavorite');

    /*develop by ekramul*/
    Route::resource('recipe-slider', RecipeSliderController::class);
    Route::get('recipe-slider/status/{recipeSlider}', [RecipeSliderController::class, 'SliderStatus'])->name('recipe-slider.status');
});

Route::get('/favorites', [FavoriteController::class, 'favorites'])->name('favorites.index');

Route::post('/recipes/{recipe}/favorite', [FavoriteController::class, 'favorite'])->name('recipes.favorite');
Route::post('/recipes/{recipe}/unfavorite', [FavoriteController::class, 'unfavorite'])->name('recipes.unfavorite');
