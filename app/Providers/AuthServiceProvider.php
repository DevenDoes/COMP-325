<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Paper' => 'App\Policies\PaperPolicy',
        'App\Source' => 'App\Policies\SourcePolicy',
        'App\Evidence' => 'App\Policies\EvidencePolicy',
        'App\Analysis' => 'App\Policies\AnalysisPolicy',
        'App\Argument' => 'App\Policies\ArgumentPolicy',
        'App\Outline' => 'App\Policies\OutlinePolicy',
        'App\Paragraph' => 'App\Policies\ParagraphPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
