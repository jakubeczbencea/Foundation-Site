<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\News;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // === Szuperadmin felhasználó ===
        User::create([
            'name' => 'Admin',
            'email' => 'admin@tudasodert.hu',
            'password' => Hash::make('admin123'),
            'role' => 'superadmin',
        ]);

        // === Alapértelmezett beállítások ===
        $defaults = [
            'site_name' => 'Tudásodért Alapítvány',
            'foundation_name' => 'Tudásodért Alapítvány a Műszaki Szakképzés Támogatására',
            'tax_number' => '12345678-1-42',
            'address' => 'Budapest, Iskolaköz 1.',
            'email' => 'info@tudasodert.hu',
            'phone' => '+36 1 234 5678',
            'bank_name' => '',
            'bank_account' => '',
            'stripe_public_key' => '',
            'stripe_secret_key' => '',
            'facebook_url' => '',
            'instagram_url' => '',
            'website_url' => 'https://eotvos.hu',
        ];

        foreach ($defaults as $key => $value) {
            Setting::set($key, $value);
        }

        // === Példa adományok (törölheted éles használat előtt) ===
        $donors = [
            ['Kovács Péter', 'kovacs.peter@example.com', 25000, 'transfer', 'completed'],
            ['Nagy Anna', 'nagy.anna@example.com', 10000, 'card', 'completed'],
            ['Szabó Gábor', null, 50000, 'transfer', 'completed'],
            ['Anonim támogató', null, 5000, 'cash', 'completed'],
            ['Tóth Mária', 'toth.maria@example.com', 15000, 'card', 'pending'],
            ['Kiss László', 'kiss.laszlo@example.com', 30000, 'transfer', 'completed'],
            ['Horváth Éva', null, 8000, 'card', 'failed'],
        ];

        foreach ($donors as $i => $d) {
            Donation::create([
                'donor_name' => $d[0],
                'donor_email' => $d[1],
                'amount' => $d[2],
                'payment_method' => $d[3],
                'status' => $d[4],
                'is_anonymous' => $d[1] === null,
                'created_at' => now()->subDays(rand(1, 60)),
            ]);
        }

        // === Példa hírek ===
        News::create([
            'author_id' => 1,
            'title' => 'Új CNC gépek érkeztek az iskolába',
            'slug' => 'uj-cnc-gepek-erkeztek',
            'excerpt' => 'Az alapítvány támogatásából három új CNC gépet szereztünk be.',
            'body' => 'Az alapítvány támogatásából három új CNC megmunkáló gép érkezett az Eötvös Loránd Technikum műhelyébe. A gépek modern, iparban is használt modellek, amelyekkel diákjaink a legfrissebb technológiákat sajátíthatják el. A beszerzés összesen 4,5 millió forintba került, amelyet teljes egészében adományokból finanszíroztunk.',
            'type' => 'report',
            'is_published' => true,
            'published_at' => now()->subDays(10),
        ]);

        News::create([
            'author_id' => 1,
            'title' => 'Erasmus+ sikertörténet Sevillából',
            'slug' => 'erasmus-sikertortenet-sevillabol',
            'excerpt' => 'Diákjaink Sevillában vettek részt szakmai gyakorlaton.',
            'body' => 'Az Erasmus+ program keretében hat diákunk töltött két hetet Sevillában szakmai gyakorlaton. A résztvevők CNC programozást és ipari robotikát tanultak spanyol partneriskolánkban. Az élmény nemcsak szakmailag, hanem nyelvileg és kulturálisan is gazdagította diákjainkat.',
            'type' => 'news',
            'is_published' => true,
            'published_at' => now()->subDays(5),
        ]);

        News::create([
            'author_id' => 1,
            'title' => 'Lángossütés a jó ügyért',
            'slug' => 'langossutes-a-jo-ugyert',
            'excerpt' => 'Iskolai lángossütés akcióval gyűjtöttünk adományt.',
            'body' => 'A diákok és tanárok összefogásával lángossütés akciót szerveztünk az iskola udvarán. A befolyt összeg teljes egészében az alapítvány számláját gyarapította. Köszönjük mindenkinek a támogatást!',
            'type' => 'news',
            'is_published' => false,
        ]);
    }
}
