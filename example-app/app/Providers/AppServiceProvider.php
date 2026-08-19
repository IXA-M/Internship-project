<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\MedicalStaff;
use App\Policies\MedicalStaffPolicy;
use App\Models\User;
use App\Models\Postion;
class AppServiceProvider extends ServiceProvider
{
    /**

     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(True);
        
        Gate::define('edit-job', function (User $user, Postion $job) {
            return $job->employer->user->is($user);
            });
            Gate::policy(MedicalStaff::class, MedicalStaffPolicy::class);
         }
         
         }
