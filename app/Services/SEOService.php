<?php

namespace App\Services;

class SEOService
{
    /**
     * Generate structured data for the website
     */
    public static function getOrganizationSchema($url = null)
    {
        $baseUrl = $url ?: config('app.url');

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'EZofz.lk',
            'description' => 'Sri Lankan legal documents, tools, and resources platform providing access to penal codes, criminal procedure codes, and helpful conversion tools.',
            'url' => $baseUrl,
            'logo' => $baseUrl . '/images/logo.png',
            'sameAs' => [
                // Add your social media URLs here when available
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'availableLanguage' => ['English', 'Sinhala'],
            ],
            'areaServed' => [
                '@type' => 'Country',
                'name' => 'Sri Lanka'
            ]
        ];
    }

    /**
     * Generate WebSite structured data
     */
    public static function getWebsiteSchema($url = null)
    {
        $baseUrl = $url ?: config('app.url');

        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'EZofz.lk',
            'description' => 'Sri Lankan legal documents, tools, and resources platform',
            'url' => $baseUrl,
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => $baseUrl . '/search?q={search_term_string}'
                ],
                'query-input' => 'required name=search_term_string'
            ]
        ];
    }

    /**
     * Generate Article structured data for tools and resources
     */
    public static function getToolSchema($title, $description, $url, $dateModified = null)
    {
        $baseUrl = config('app.url');

        return [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => $title,
            'description' => $description,
            'url' => $url,
            'applicationCategory' => 'Utility',
            'operatingSystem' => 'Web Browser',
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'USD'
            ],
            'provider' => [
                '@type' => 'Organization',
                'name' => 'EZofz.lk',
                'url' => $baseUrl
            ],
            'dateModified' => $dateModified ?: date('Y-m-d'),
            'inLanguage' => ['en', 'si']
        ];
    }

    /**
     * Generate FAQ structured data
     */
    public static function getFAQSchema($faqs)
    {
        $faqList = [];

        foreach ($faqs as $faq) {
            $faqList[] = [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer']
                ]
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqList
        ];
    }

    /**
     * Generate meta tags array
     */
    public static function getMetaTags($title, $description, $keywords = '', $image = null, $url = null)
    {
        $baseUrl = config('app.url');
        $fullUrl = $url ?: $baseUrl;
        $ogImage = $image ?: $baseUrl . '/images/logo.png';

        return [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
            'og:title' => $title,
            'og:description' => $description,
            'og:image' => $ogImage,
            'og:url' => $fullUrl,
            'og:type' => 'website',
            'og:site_name' => 'EZofz.lk',
            'twitter:card' => 'summary_large_image',
            'twitter:title' => $title,
            'twitter:description' => $description,
            'twitter:image' => $ogImage,
            'canonical' => $fullUrl,
        ];
    }

    /**
     * Generate breadcrumb structured data
     */
    public static function getBreadcrumbSchema($breadcrumbs)
    {
        $baseUrl = config('app.url');
        $itemList = [];

        foreach ($breadcrumbs as $index => $breadcrumb) {
            $itemList[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $baseUrl . $breadcrumb['url']
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemList
        ];
    }
}
