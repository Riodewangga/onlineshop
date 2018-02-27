<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
        	'imagePath' =>'https://peristiwaonline.files.wordpress.com/2016/07/1468416013509.jpg',
        	'title' => 'Koala Kumal',
        	'description' => 'Menceritakan tentang seseorang yang ingin berubah menjadi dewasa.',
        	'price' => 29  
        ]);
        $product->save();

        $product = new Product([
            'imagePath' =>'https://images.gr-assets.com/books/1351823942l/16123216.jpg',
            'title' => 'Raksasa dari Jogja',
            'description' => 'Bianca wanita yang kuat dan sabar dalam menjalani hidupnya namun ia tak percaya dengan namanya “cinta”, ia bernama Bianca Dominique.',
            'price' => 25
        ]);
        $product->save();

        $product = new Product([
            'imagePath' =>'http://www.resensi-film.com/wp-content/uploads/2014/01/poster-tenggelamnya-kapal-van-der-wijck.jpg',
            'title' => 'Tenggelamnya Kapal Van Der Wijck',
            'description' => 'Di Negeri Batipuh Sapuluh Koto (Padang panjang) , seorang pemuda bergelar Pendekar Sutan, kemenakan Datuk Mantari Labih, yang merupakan pewaris tunggal harta peninggalan ibunya.',
            'price' => 50
        ]);
        $product->save();

        $product = new Product([
            'imagePath' =>'https://kampungrison.files.wordpress.com/2008/09/laskarpelangi2.jpg',
            'title' => 'Laskar Pelangi',
            'description' => 'Cerita dari sebuah daerah di Belitung, yakni di SD Muhammadiyah. Saat itu menjadi saat yang menegangkan bagi anak-anak yang ingin bersekolah di SD Muhammadiyah. Kesembilan murid yakni, Ikal, Lintang, Sahara, A Kiong, Syahdan, Kucai, Borek, Trapani tengah gelisah lantaran SD Muhammadiyah akan ditutup jika murid yang bersekolah tidak genap menjadi 10.',
            'price' => 30
        ]);
        $product->save();

        $product = new Product([
        	'imagePath' =>'http://1.bp.blogspot.com/_OmLtXkddBaM/TQBhQebtVII/AAAAAAAAASw/9hH5kuYnASg/s1600/c7896.jpg',
        	'title' => 'Robert LUDLUM The Bourne Trilogy',
        	'description' => 'Jason Bourne adalah tokoh fiktif yang diciptakan oleh novelis Robert Ludlum. Bourne adalah tokoh protagonis dalam serangkaian dua belas novel (sampai 2014) dan film-film adaptasi. Ia pertama kali muncul dalam novel The Bourne Identity (1980), dan kemudian diadaptasi untuk film televisi pada tahun 1988.',
        	'price' => 30
        ]);
        $product->save();

         $product = new Product([
            'imagePath' =>'http://1.bp.blogspot.com/_OmLtXkddBaM/TQBhQebtVII/AAAAAAAAASw/9hH5kuYnASg/s1600/c7896.jpg',
            'title' => 'Robert LUDLUM The Bourne Trilogy',
            'description' => 'Jason Bourne adalah tokoh fiktif yang diciptakan oleh novelis Robert Ludlum. Bourne adalah tokoh protagonis dalam serangkaian dua belas novel (sampai 2014) dan film-film adaptasi. Ia pertama kali muncul dalam novel The Bourne Identity (1980), dan kemudian diadaptasi untuk film televisi pada tahun 1988.',
            'price' => 30
        ]);
        $product->save();
    }
}
