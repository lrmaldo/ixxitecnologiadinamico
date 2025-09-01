<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\LandingPage;
use App\Livewire\Blog\Index as BlogIndex;
use App\Livewire\Blog\Show as BlogShow;
use App\Livewire\ServiceShow;
use App\Livewire\Gallery\Index as PublicGalleryIndex;
use App\Livewire\Testimonials\Index as PublicTestimonialsIndex;
use App\Livewire\Admin\Services\Index as AdminServicesIndex;
use App\Livewire\Admin\Services\Edit as AdminServicesEdit;
use App\Livewire\Admin\Testimonials\Index as AdminTestimonialsIndex;
use App\Livewire\Admin\Testimonials\Edit as AdminTestimonialsEdit;
use App\Livewire\Admin\Gallery\Index as AdminGalleryIndex;
use App\Livewire\Admin\Gallery\Edit as AdminGalleryEdit;
use App\Livewire\Admin\Posts\Index as AdminPostsIndex;
use App\Livewire\Admin\Posts\Edit as AdminPostsEdit;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ExportController;
use App\Livewire\Admin\Users\Index as AdminUsersIndex;
use App\Livewire\Admin\Users\Edit as AdminUsersEdit;
use App\Livewire\Tickets\CreatePublic as PublicTicketCreate;
use App\Livewire\Tickets\Thanks as PublicTicketThanks;

Route::get('/', LandingPage::class)->name('home');

Route::get('/blog', BlogIndex::class)->name('blog.index');
Route::get('/blog/{slug}', BlogShow::class)->name('blog.show');
Route::get('/servicios/{slug}', ServiceShow::class)->name('services.show');
Route::get('/galeria', PublicGalleryIndex::class)->name('gallery.index');
Route::get('/testimonios', PublicTestimonialsIndex::class)->name('testimonials.index');
Route::get('/soporte/ticket', PublicTicketCreate::class)->name('support.ticket.create');
Route::get('/soporte/ticket/gracias/{id}', PublicTicketThanks::class)->name('support.ticket.thanks');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/export/services.pdf', [ExportController::class, 'servicesPdf'])->middleware('auth')->name('export.services.pdf');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Admin - Services
    Route::get('admin/services', AdminServicesIndex::class)->name('admin.services');
    Route::get('admin/services/create', AdminServicesEdit::class)->name('admin.services.create');
    Route::get('admin/services/{id}', AdminServicesEdit::class)->name('admin.services.edit');

    // Admin - Testimonials
    Route::get('admin/testimonials', AdminTestimonialsIndex::class)->name('admin.testimonials');
    Route::get('admin/testimonials/create', AdminTestimonialsEdit::class)->name('admin.testimonials.create');
    Route::get('admin/testimonials/{id}', AdminTestimonialsEdit::class)->name('admin.testimonials.edit');

    // Admin - Gallery
    Route::get('admin/gallery', AdminGalleryIndex::class)->name('admin.gallery');
    Route::get('admin/gallery/create', AdminGalleryEdit::class)->name('admin.gallery.create');
    Route::get('admin/gallery/{id}', AdminGalleryEdit::class)->name('admin.gallery.edit');

    // Admin - Posts
    Route::get('admin/posts', AdminPostsIndex::class)->name('admin.posts');
    Route::get('admin/posts/create', AdminPostsEdit::class)->name('admin.posts.create');
    Route::get('admin/posts/{id}', AdminPostsEdit::class)->name('admin.posts.edit');

    // Admin - Tickets
    Route::get('admin/tickets', App\Livewire\Admin\Tickets\Index::class)->name('admin.tickets');
    Route::get('admin/tickets/create', App\Livewire\Admin\Tickets\Create::class)->name('admin.tickets.create');
    Route::get('admin/tickets/{id}', App\Livewire\Admin\Tickets\Show::class)->name('admin.tickets.show');

    // Admin - Users (solo admin)
    Route::middleware('can:admin')->group(function () {
        Route::get('admin/users', AdminUsersIndex::class)->name('admin.users');
        Route::get('admin/users/create', AdminUsersEdit::class)->name('admin.users.create');
        Route::get('admin/users/{id}', AdminUsersEdit::class)->name('admin.users.edit');
    });
});

require __DIR__.'/auth.php';
