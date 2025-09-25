<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Document;
use App\Models\PenalCodeSection;
use App\Models\CriminalProcedureCode;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate {--url=http://localhost:8000 : Base URL for the sitemap}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml file for SEO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrl = $this->option('url');

        $this->info("Generating sitemap with base URL: {$baseUrl}");

        // Static pages with their priorities and change frequencies
        $staticPages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/testimonials', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => '/documents', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/documents/police', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => '/documents/law', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => '/penal-code/public', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/criminal-procedure-code', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/tools/unicode-typing', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/tools/name-converter', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/tools/sl-idcard-details', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        // Dynamic pages from database
        $dynamicPages = [];
        $dynamicCount = 0;

        // Add penal code sections if they exist
        try {
            if (class_exists('\App\Models\PenalCodeSection')) {
                $penalSections = PenalCodeSection::all();
                foreach ($penalSections as $section) {
                    $dynamicPages[] = [
                        'url' => '/penal-code/public/' . $section->section_number,
                        'priority' => '0.7',
                        'changefreq' => 'monthly',
                        'lastmod' => $section->updated_at ? $section->updated_at->format('Y-m-d') : date('Y-m-d')
                    ];
                    $dynamicCount++;
                }
                $this->info("Added {$dynamicCount} penal code sections");
            }
        } catch (\Exception $e) {
            $this->warn("Penal code sections table not found or accessible");
        }

        // Add criminal procedure code sections if they exist
        try {
            if (class_exists('\App\Models\CriminalProcedureCode')) {
                $criminalSections = CriminalProcedureCode::all();
                $criminalCount = 0;
                foreach ($criminalSections as $section) {
                    $dynamicPages[] = [
                        'url' => '/criminal-procedure-code/public/' . $section->section_number,
                        'priority' => '0.7',
                        'changefreq' => 'monthly',
                        'lastmod' => $section->updated_at ? $section->updated_at->format('Y-m-d') : date('Y-m-d')
                    ];
                    $criminalCount++;
                }
                $this->info("Added {$criminalCount} criminal procedure code sections");
            }
        } catch (\Exception $e) {
            $this->warn("Criminal procedure code sections table not found or accessible");
        }

        // Add documents if they exist
        try {
            if (class_exists('\App\Models\Document')) {
                $documents = Document::all();
                $documentCount = 0;
                foreach ($documents as $document) {
                    $dynamicPages[] = [
                        'url' => '/documents/' . $document->id . '/download',
                        'priority' => '0.6',
                        'changefreq' => 'yearly',
                        'lastmod' => $document->updated_at ? $document->updated_at->format('Y-m-d') : date('Y-m-d')
                    ];
                    $documentCount++;
                }
                $this->info("Added {$documentCount} documents");
            }
        } catch (\Exception $e) {
            $this->warn("Documents table not found or accessible");
        }

        // Merge all pages
        $allPages = array_merge($staticPages, $dynamicPages);

        // Generate XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($allPages as $page) {
            $xml .= '    <url>' . "\n";
            $xml .= '        <loc>' . $baseUrl . $page['url'] . '</loc>' . "\n";
            $xml .= '        <priority>' . $page['priority'] . '</priority>' . "\n";
            $xml .= '        <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";

            if (isset($page['lastmod'])) {
                $xml .= '        <lastmod>' . $page['lastmod'] . '</lastmod>' . "\n";
            } else {
                $xml .= '        <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
            }

            $xml .= '    </url>' . "\n";
        }

        $xml .= '</urlset>';

        // Save to public directory
        $path = public_path('sitemap.xml');
        File::put($path, $xml);

        $totalPages = count($allPages);
        $this->info("✅ Sitemap generated successfully!");
        $this->info("📄 Total pages: {$totalPages}");
        $this->info("📁 Saved to: {$path}");
        $this->info("🌐 URL: {$baseUrl}/sitemap.xml");

        return 0;
    }
}
