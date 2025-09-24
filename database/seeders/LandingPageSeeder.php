<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(LandingPage::count() == 0) {
            LandingPage::create([
                'about_title' => 'Tentang Kami',
                'about_description'=>'Error Attempt to read property "partners" on null berarti Anda mencoba mengakses properti partners dari sebuah objek yang ternyata tidak ada (null) atau belum terdefinisi. Ini umum terjadi di bahasa pemrograman seperti PHP atau JavaScript, di mana Anda mengasumsikan sebuah objek atau data terkait ada, padahal kenyataannya kosong, sehingga operasi selanjutnya gagal. ',
                'about_image'=>null,
                'visi'=>'Menjadi pemasok kelistrikan, elektronika, otomasi, dan kontrol yang terkemuka di Indonesia. ',
                'misi'=>'Membangun SDM yang produktif, memberikan pelayanan terbaik, menjamin kualitas barang/jasa, dan mengikutsertakan SDM dalam pelatihan teknologi. '
            ]);
        }
    }
}
