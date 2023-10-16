<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (app()->isLocal()) {
            app()->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        Str::macro('phone', function ($value) {
            $value = Str::slug($value, '');

            if (Str::substr($value, 0, 3) == '021') {
                return Str::substrReplace($value, '62', 0, 1);
            }
            if (Str::substr($value, 0, 5) == '(021)') {
                return Str::substrReplace($value, '62', 0, 2);
            }
            if (Str::substr($value, 0, 1) == '0') {
                return Str::substrReplace($value, '62', 0, 1);
            }

            return $value;
        });

        Str::macro('oddEven', function ($value) {
            return $value % 2 == 0 ? 'Even' : 'Odd';
        });

        Str::macro('percentage', function ($value) {
            return round($value, 2);
        });

        Str::macro('thousand', function ($value) {
            return number_format($value, 0, ',', '.');
        });

        Str::macro('rupiah', function ($value) {
            return 'Rp. '.number_format($value, 0, ',', '.');
        });

        Str::macro('idr', function ($value) {
            return 'IDR. '.number_format($value, 0, ',', '.');
        });

        Str::macro('dollar', function ($value) {
            return '$ '.number_format($value, 0, ',', '.');
        });

        Str::macro('yesNo', function ($value) {
            return $value ? 'Yes' : 'No';
        });

        Str::macro('active', function ($value) {
            return $value ? 'Active' : 'Inactive';
        });

        Str::macro('show', function ($value) {
            return $value ? 'Show' : 'Not Shown';
        });

        Str::macro('public', function ($value) {
            return $value ? 'Public' : 'Not Public';
        });

        Str::macro('pastor', function ($value) {
            return $value ? 'Pastor' : 'Not Pastor';
        });

        Str::macro('subscribe', function ($value) {
            return $value ? 'Subscribe' : 'Unsubscribe';
        });

        Str::macro('successDanger', function ($value) {
            return $value == 1 ? 'success' : 'danger';
        });

        Str::macro('formatSymbol', function ($value, $symbol) {
            return Str::replace(['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '{', '[', '}', ']', '|', '\\', ':', ';', '"', "'", '<', ',', '>', '.', '?', '/', ' '], $symbol, $value);
        });

        Str::macro('color', function ($value) {
            if ($value % 1 == 0) {
                $color = 'primary';
            }
            if ($value % 2 == 0) {
                $color = 'secondary';
            }
            if ($value % 3 == 0) {
                $color = 'info';
            }
            if ($value % 4 == 0) {
                $color = 'success';
            }
            if ($value % 5 == 0) {
                $color = 'warning';
            }
            if ($value % 6 == 0) {
                $color = 'danger';
            }

            return $color;
        });

        Str::macro('logColor', function ($value) {
            if ($value == 1) {
                $color = 'primary';
            }
            if ($value == 2) {
                $color = 'success';
            }
            if ($value == 3) {
                $color = 'warning';
            }
            if ($value == 4) {
                $color = 'info';
            }
            if ($value == 5) {
                $color = 'danger';
            }

            return $color;
        });

        Str::macro('formatBytes', function ($value, $precision = 2) {
            static $units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            $step = 1024;
            $i = 0;
            while (($value / $step) > 0.9) {
                $value = $value / $step;
                $i++;
            }

            return round($value, $precision).$units[$i];
        });

        Str::macro('translate', function ($value) {
            return $value ? trans('index.'.Str::snake(Str::headline($value))) : null;
        });

        Str::macro('setting', function ($value) {
            return Setting::where('key', $value)->first()->value ?? null;
        });

        Str::macro('code', function ($prefix, $table, $digit, $date) {
            $data = DB::table($table)->latest('id')->first();
            $code = Str::afterLast($data?->code, $prefix);

            if ($date) {
                $date = Carbon::parse($date)->format('ymd');
                $code = DB::table($table)->where('code', 'like', "%{$date}%")->latest('id')->first();
                if ($code) {
                    $code = Str::afterLast($code->code, $date);
                }
            }

            $increment = (int) $code + 1;
            $digit = sprintf("%0{$digit}d", $increment);

            return $prefix.$date.$digit;
        });
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Model::preventLazyLoading();
        Model::shouldBeStrict();

        if (app()->isProduction()) {
            URL::forceScheme('https');
        }
    }
}
