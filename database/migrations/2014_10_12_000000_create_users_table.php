<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
 abstract class TryIngs {
     private  string $group;
     public function __construct()
     {
         $this->group = static::groop();
     }

     public abstract function hemoza (string $grg) : void;

     public static function groop(): string
     {
         return "grooup";
     }
 }

 class Ura extends TryIngs
 {
     public function __construct(string $under)
     {
         parent::__construct();
         print_r(self::groop());

     }

     public function hemoza(string $grg): void
     {
         // TODO: Implement hemoza() method.
     }
 }
