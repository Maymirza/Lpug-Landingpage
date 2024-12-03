<?php

namespace Config;

use CodeIgniter\Config\Routing as BaseRouting;

/**
 * Routing configuration
 */
class Routing extends BaseRouting
{
    /**
     * Untuk rute yang didefinisikan.
     * Sebuah array dari file yang berisi definisi rute.
     * File-file rute dibaca berdasarkan urutan, dengan yang pertama ditemukan memiliki prioritas lebih tinggi.
     *
     * Default: APPPATH . 'Config/Routes.php'
     */
    public array $routeFiles = [
        APPPATH . 'Config/Routes.php',
        // Jika perlu, tambahkan file rute spesifik lingkungan di sini
        // APPPATH . 'Config/Development/Routes.php',
        // APPPATH . 'Config/Production/Routes.php',
    ];

    /**
     * Untuk rute yang didefinisikan dan Auto Routing.
     * Namespace default untuk Controller ketika tidak ada namespace lain yang ditentukan.
     *
     * Default: 'App\Controllers'
     */
    public string $defaultNamespace = 'App\Controllers';

    /**
     * Untuk Auto Routing.
     * Controller default yang digunakan ketika tidak ada controller lain yang ditentukan.
     *
     * Default: 'Home'
     */
    public string $defaultController = 'Home';

    /**
     * Untuk rute yang didefinisikan dan Auto Routing.
     * Metode default yang dipanggil pada controller ketika tidak ada metode lain yang ditentukan.
     *
     * Default: 'index'
     */
    public string $defaultMethod = 'index';

    /**
     * Untuk Auto Routing.
     * Apakah akan menerjemahkan dash dalam URI untuk controller/metode ke underscore.
     *
     * Default: false
     */
    public bool $translateURIDashes = false;

    /**
     * Menetapkan class/metode yang harus dipanggil jika routing tidak
     * menemukan kecocokan.
     */
    public ?string $override404 = null;

    /**
     * Jika TRUE, sistem akan mencoba mencocokkan URI dengan
     * Controllers dengan mencocokkan setiap segmen terhadap folder/file
     * di APPPATH/Controllers, ketika tidak ada kecocokan ditemukan di rute yang sudah didefinisikan.
     *
     * Jika FALSE, pencarian akan berhenti dan tidak ada routing otomatis.
     */
    public bool $autoRoute = true;

    /**
     * Untuk rute yang didefinisikan.
     * Jika TRUE, akan mengaktifkan penggunaan opsi 'prioritize'
     * ketika mendefinisikan rute.
     *
     * Default: false
     */
    public bool $prioritize = false;

    /**
     * Untuk rute yang didefinisikan.
     * Jika TRUE, segmen URI yang cocok akan diteruskan sebagai satu parameter.
     *
     * Default: false
     */
    public bool $multipleSegmentsOneParam = false;

    /**
     * Untuk Auto Routing (Ditingkatkan).
     * Pemetaan segmen URI dan namespace.
     */
    public array $moduleRoutes = [];

    /**
     * Untuk Auto Routing (Ditingkatkan).
     * Apakah akan menerjemahkan dash dalam URI untuk controller/metode ke CamelCase.
     * Contoh: blog-controller -> BlogController
     *
     * Jika Anda mengaktifkan ini, $translateURIDashes diabaikan.
     *
     * Default: false
     */
    public bool $translateUriToCamelCase = false;
}

