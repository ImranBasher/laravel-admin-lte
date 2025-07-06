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
        Schema::create('multiple_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('type')->nullable(); // Type of image (e.g., 'thumbnail', 'gallery')
            $table->string('purpose')->nullable(); // Purpose/use case of the image
            $table->integer('sort_order')->default(0); // For ordering multiple images
            
            // All possible foreign keys (nullable)
            $table->foreignId('general_setting_id')->nullable()->constrained('general_settings')->onDelete('cascade');
            $table->foreignId('main_banner_id')->nullable()->constrained('main_banners')->onDelete('cascade');
            $table->foreignId('service_category_id')->nullable()->constrained('service_categories')->onDelete('cascade');
            $table->foreignId('sub_service_category_id')->nullable()->constrained('sub_service_categories')->onDelete('cascade');
            $table->foreignId('service_section_id')->nullable()->constrained('service_sections')->onDelete('cascade');
            $table->foreignId('motivation_id')->nullable()->constrained('motivations')->onDelete('cascade');
            $table->foreignId('scrolling_heading_id')->nullable()->constrained('scrolling_headings')->onDelete('cascade');
            $table->foreignId('why_choose_id')->nullable()->constrained('why_chooses')->onDelete('cascade');
            $table->foreignId('facility_id')->nullable()->constrained('facilities')->onDelete('cascade');
            $table->foreignId('service_price_package_id')->nullable()->constrained('service_price_packages')->onDelete('cascade');
            $table->foreignId('blog_id')->nullable()->constrained('blogs')->onDelete('cascade');
            $table->foreignId('footer_banner_id')->nullable()->constrained('footer_banners')->onDelete('cascade');
            $table->foreignId('my_company_page_banner_id')->nullable()->constrained('my_company_page_banners')->onDelete('cascade');
            $table->foreignId('about_us_id')->nullable()->constrained('about_us')->onDelete('cascade');
            $table->foreignId('author_id')->nullable()->constrained('authors')->onDelete('cascade');
            $table->foreignId('worker_id')->nullable()->constrained('workers')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()
                  ->constrained('products')->onDelete('cascade');
            $table->foreignId('customer_review_id')->nullable()
                  ->constrained('customer_reviews')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('multiple_images', function (Blueprint $table) {
            // Drop all foreign key constraints
            $foreignKeys = [
                'general_setting_id',
                'main_banner_id',
                'service_category_id',
                'sub_service_category_id',
                'service_section_id',
                'motivation_id',
                'scrolling_heading_id',
                'why_choose_id',
                'facility_id',
                'service_price_package_id',
                'blog_id',
                'footer_banner_id',
                'my_company_page_banner_id',
                'about_us_id',
                'author_id',
                'worker_id',
                'product_id'
            ];
            
            foreach ($foreignKeys as $foreignKey) {
                if (Schema::hasColumn('multiple_images', $foreignKey)) {
                    $table->dropForeign(['multiple_images_'.$foreignKey.'_foreign']);
                }
            }
        });
        
        Schema::dropIfExists('multiple_images');
    }
};
