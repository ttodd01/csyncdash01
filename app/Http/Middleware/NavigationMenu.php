<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;

Use Caffeinated\Menus\Facades\Menu;
use Illuminate\Support\Facades\Auth;

class NavigationMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        Menu::make('Default', function($menu) {

            if(!Auth::guest()) {

                $menu->add('Dashboard', ['route' => 'dashboard'])
                    ->active('home')
                    ->prepend('<i class="fa fa-dashboard"></i>');
                if (Auth::user()->getRank()->slug == "partner") {
                    $menu->add('Tools', ['route' => 'apps.tools'])
                        ->prepend('<i class="fa fa-wrench"></i>');
                    $menu->add('Sponsorships', ['route' => 'apps.sponsorships'])
                        ->prepend('<i class="fa fa-info"></i>');

                }

                if (Auth::user()->getRank()->slug == "partner") {
                    $menu->add('Me')->divide();
                    $menu->add('Settings', ['route' => 'user.settings'])
                        ->prepend('<i class="fa fa-cogs"></i>');
                    $menu->add('My Contract', ['url' => 'user/contract'])
                        ->prepend('<i class="fa fa-gavel"></i>');
                    $menu->add('Payments', ['route' => 'user.payments'])
                        ->prepend('<i class="fa fa-euro"></i>');

                }


                /***
                 * Developer Role
                 */
                if (Auth::user()->getRank()->slug == "admin") {
                    $menu->add('Tools', ['route' => 'apps.tools'])
                        ->prepend('<i class="fa fa-wrench"></i>');
                    $menu->add('Sponsorships', ['route' => 'apps.sponsorships'])
                        ->prepend('<i class="fa fa-info"></i>');

                }
                if (Auth::user()->getRank()->slug == "admin") {
                    $menu->add('Me')->divide();
                    $menu->add('Settings', ['route' => 'user.settings'])
                        ->prepend('<i class="fa fa-cogs"></i>');
                    $menu->add('My Contract', ['url' => 'user/contract'])
                        ->prepend('<i class="fa fa-gavel"></i>');
                    $menu->add('Payments', ['route' => 'user.payments'])
                        ->prepend('<i class="fa fa-euro"></i>');
                }
                if (Auth::user()->getRank()->slug == "admin") {
                    $menu->add('My Network')->divide();
                    $menu->add('My Partners', ['route' => 'network.partners'])
                        ->prepend('<i class="fa fa-database"></i>');
                    $menu->add('Network Settings', ['route' => 'network.settings'])
                        ->prepend('<i class="fa fa-cogs"></i>');
                    $menu->add('CMS Manager', ['route' => 'youtube.channels'])
                        ->prepend('<i class="fa fa-users"></i>');
                    $menu->add('Content ID ', ['route' => 'claims.claims'])
                        ->prepend('<i class="fa fa-users"></i>');
                    $menu->add('Manage Tools', ['route' => 'admin.manage-sponsorships'])
                        ->prepend('<i class="fa fa-dashboard"></i>');
                    $menu->add('Manage Payments', ['url' => 'earnings/channel'])
                        ->prepend('<i class="fa fa-euro"></i>');
                }

            }


        });
        return $next($request);
    }
}
