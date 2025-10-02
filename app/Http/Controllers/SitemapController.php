<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\PenalCodeSection;
use App\Models\CriminalProcedureCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $baseUrl = config('app.url');

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
                }
            }
        } catch (\Exception $e) {
            // Table might not exist yet
        }

        // Add criminal procedure code sections if they exist
        try {
            if (class_exists('\App\Models\CriminalProcedureCode')) {
                $criminalSections = CriminalProcedureCode::all();
                foreach ($criminalSections as $section) {
                    $dynamicPages[] = [
                        'url' => '/criminal-procedure-code/public/' . $section->section_number,
                        'priority' => '0.7',
                        'changefreq' => 'monthly',
                        'lastmod' => $section->updated_at ? $section->updated_at->format('Y-m-d') : date('Y-m-d')
                    ];
                }
            }
        } catch (\Exception $e) {
            // Table might not exist yet
        }

        // Add documents if they exist
        try {
            if (class_exists('\App\Models\Document')) {
                $documents = Document::all();
                foreach ($documents as $document) {
                    $dynamicPages[] = [
                        'url' => '/documents/' . $document->id . '/download',
                        'priority' => '0.6',
                        'changefreq' => 'yearly',
                        'lastmod' => $document->updated_at ? $document->updated_at->format('Y-m-d') : date('Y-m-d')
                    ];
                }
            }
        } catch (\Exception $e) {
            // Table might not exist yet
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

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
            'Cache-Control' => 'public, max-age=3600', // Cache for 1 hour
        ]);
    }
}
