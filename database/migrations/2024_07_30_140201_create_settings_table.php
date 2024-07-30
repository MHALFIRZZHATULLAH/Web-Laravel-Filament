<?php

use App\Models\setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('lable');
            $table->string('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });
        setting::create([
            'key' => '_site_name',
            'lable' => 'Judul Situs',
            'value' => 'Laravel Filament',
            'type' => 'text',
        ]);
        setting::create([
            'key' => '_location',
            'lable' => 'Alamat Kantor',
            'value' => 'Cibubur Kota Wisata, Indonesia',
            'type' => 'text',
        ]);
        setting::create([
            'key' => '_instagram',
            'lable' => 'Instagram',
            'value' => 'https://instagram.com/halfirzzha',
            'type' => 'text',
        ]);
        setting::create([
            'key' => '_x',
            'lable' => 'X',
            'value' => 'https://x.com/halfirzzha',
            'type' => 'text',
        ]);
        setting::create([
            'key' => '_facebook',
            'lable' => 'Facebook',
            'value' => 'https://facebook.com/halfirzzha',
            'type' => 'text',
        ]);
        setting::create([
            'key' => '_site_description',
            'lable' => 'Site Description',
            'value' => 'Website ini dibuat dengan Laravel & Filament',
            'type' => 'text',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
