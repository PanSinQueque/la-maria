<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Evita errores al volver obligatoria la descripción.
        DB::table('productos')->whereNull('descripcion')->update(['descripcion' => '']);

        Schema::table('productos', function (Blueprint $table) {
            $table->text('descripcion')->nullable(false)->change();
            $table->decimal('precio', 10, 2)->nullable()->change();
        });

        $tieneImagen = Schema::hasColumn('productos', 'image_url');
        $tieneActiva = Schema::hasColumn('productos', 'activa');

        Schema::table('productos', function (Blueprint $table) use ($tieneImagen, $tieneActiva) {
            if (! $tieneImagen) {
                $table->string('image_url', 255)->after('precio');
            }
            if (! $tieneActiva) {
                $table->boolean('activa')->default(true)->after('image_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['image_url', 'activa']);
        });
    }
};
